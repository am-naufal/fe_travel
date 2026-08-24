<?php

namespace App\Http\Controllers;

use App\Support\SiteContent;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display the FAQ page: Search FAQ, FAQ Categories, Accordion FAQ.
     */
    public function index(): View
    {
        $faqItems = SiteContent::faqItems();
        $categories = collect($faqItems)->pluck('category')->unique()->values()->all();

        return view('pages.faq', [
            'faqItems' => $faqItems,
            'categories' => $categories,
        ]);
    }
}
