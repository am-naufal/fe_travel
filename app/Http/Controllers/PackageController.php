<?php

namespace App\Http\Controllers;

use App\Support\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class PackageController extends Controller
{
    private const PER_PAGE = 4;

    /**
     * Package Listing: search, filter (by destination), pagination.
     * Server-side and query-string driven (?q=&destination=&page=) so
     * every filtered/paginated state is a real, indexable, canonical-able
     * URL, per the SEO architecture agreed for this site.
     */
    public function index(Request $request): View
    {
        $allPackages = collect(SiteContent::packages());

        $search = trim((string) $request->query('q', ''));
        $destination = $request->query('destination');

        $filtered = $allPackages
            ->when($search !== '', fn ($packages) => $packages->filter(
                fn (array $package) => str_contains(strtolower($package['title']), strtolower($search))
                    || str_contains(strtolower($package['destination']), strtolower($search))
            ))
            ->when($destination, fn ($packages) => $packages->where('destination', $destination))
            ->values();

        $destinations = $allPackages->pluck('destination')->unique()->sort()->values()->all();

        $currentPage = (int) $request->query('page', 1);
        $items = $filtered->forPage($currentPage, self::PER_PAGE)->values();

        $packages = new LengthAwarePaginator(
            $items,
            $filtered->count(),
            self::PER_PAGE,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('pages.packages.index', [
            'packages' => $packages,
            'destinations' => $destinations,
            'search' => $search,
            'selectedDestination' => $destination,
        ]);
    }

    /**
     * Package Detail: resolved by slug. 404s on an unknown slug rather
     * than silently rendering an empty page.
     */
    public function show(string $slug): View|Response
    {
        $package = collect(SiteContent::packages())->firstWhere('slug', $slug);

        if (! $package) {
            abort(404);
        }

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Paket Wisata', 'url' => route('packages')],
            ['label' => $package['title'], 'url' => null],
        ];

        return view('pages.packages.show', [
            'package' => $package,
            'breadcrumbs' => $breadcrumbs,
            'faqItems' => SiteContent::faqItems(),
        ]);
    }
}
