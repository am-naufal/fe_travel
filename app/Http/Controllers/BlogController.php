<?php

namespace App\Http\Controllers;

use App\Support\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    private const PER_PAGE = 4;

    /**
     * Blog Listing: search, category filter, featured article, pagination.
     * Same server-side query-string mechanics as PackageController@index
     * (?q=&category=&page=) for the same reason — real, indexable,
     * canonical-able URLs, per PAGE_BLOG_SPEC.md's "Pagination SEO".
     */
    public function index(Request $request): View
    {
        $allPosts = collect(SiteContent::blogPosts())
            ->sortByDesc('publishedAt')
            ->values();

        $featured = $allPosts->first();

        $search = trim((string) $request->query('q', ''));
        $category = $request->query('category');
        $currentPage = (int) $request->query('page', 1);

        // Once unfiltered, the featured article is permanently excluded
        // from the grid pool (not just on page 1) — otherwise the pool
        // size would differ between pages and the same post could show
        // up twice across pagination. Whether the featured *block* is
        // actually rendered above the grid is a separate, page-1-only
        // decision below.
        $unfiltered = $search === '' && ! $category;

        $filtered = $allPosts
            ->when($unfiltered, fn ($posts) => $posts->reject(fn (array $post) => $post['slug'] === $featured['slug']))
            ->when($search !== '', fn ($posts) => $posts->filter(
                fn (array $post) => str_contains(strtolower($post['title']), strtolower($search))
                    || str_contains(strtolower($post['excerpt']), strtolower($search))
            ))
            ->when($category, fn ($posts) => $posts->where('category', $category))
            ->values();

        $categories = $allPosts->pluck('category')->unique()->sort()->values()->all();

        $items = $filtered->forPage($currentPage, self::PER_PAGE)->values();

        $posts = new LengthAwarePaginator(
            $items,
            $filtered->count(),
            self::PER_PAGE,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('pages.blog.index', [
            'featured' => ($unfiltered && $currentPage === 1) ? $featured : null,
            'posts' => $posts,
            'categories' => $categories,
            'search' => $search,
            'selectedCategory' => $category,
        ]);
    }

    /**
     * Blog Detail: resolved by slug. 404s on an unknown slug rather than
     * silently rendering an empty page.
     */
    public function show(string $slug): View|Response
    {
        $allPosts = collect(SiteContent::blogPosts());
        $post = $allPosts->firstWhere('slug', $slug);

        if (! $post) {
            abort(404);
        }

        $related = $allPosts
            ->where('slug', '!=', $slug)
            ->sortBy(fn (array $candidate) => $candidate['category'] === $post['category'] ? 0 : 1)
            ->take(3)
            ->values();

        $relatedPackage = collect(SiteContent::packages())->firstWhere('slug', $post['relatedPackageSlug']);

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Blog', 'url' => route('blog')],
            ['label' => $post['title'], 'url' => null],
        ];

        return view('pages.blog.show', [
            'post' => $post,
            'related' => $related,
            'relatedPackage' => $relatedPackage,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
