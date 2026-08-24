<?php

namespace App\Http\Controllers;

use App\Support\PlaceholderImage;
use App\Support\SiteContent;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * Content below is static placeholder data standing in for the
     * Tour Package / Destination / Testimonial entities named in
     * CLAUDE.md, until those are backed by real database records.
     *
     * Per the Phase 1 refactor: Home now shows only Hero, Featured
     * Packages, Why Choose Us, Testimonials, FAQ Preview, Contact CTA.
     * Top Destinations and Statistics are no longer wired into Home
     * (their section components still exist, unused, for later reuse).
     */
    public function index(): View
    {
        // Same 6 packages Featured Packages has always shown — now each
        // links to its real /packages/{slug} detail page.
        $packages = collect(SiteContent::packages())
            ->map(fn (array $package) => [...$package, 'href' => route('packages.show', $package['slug'])])
            ->all();

        $features = SiteContent::whyChooseUs();

        $faqPreview = array_slice(SiteContent::faqItems(), 0, 3);

        $testimonials = [
            ['avatar' => PlaceholderImage::make('testimoni-dewi', 96, 96), 'name' => 'Dewi Anggraini', 'role' => 'Wisatawan Keluarga, Surabaya', 'quote' => 'Bawa anak-anak ke Baluran dan Pulau Merah ternyata aman dan nyaman. Jadwalnya fleksibel banget disesuaikan sama ritme keluarga kami.', 'rating' => 5],
            ['avatar' => PlaceholderImage::make('testimoni-michael', 96, 96), 'name' => 'Michael Tanuwijaya', 'role' => 'Wisatawan asal Singapura', 'quote' => 'First time seeing blue fire at Kawah Ijen and it was surreal. The guide spoke good English and made sure everyone in our group was safe during the trek.', 'rating' => 5],
            ['avatar' => PlaceholderImage::make('testimoni-budi', 96, 96), 'name' => 'Budi Hermawan', 'role' => 'HR Manager, PT Nusantara Sejahtera', 'quote' => 'Kami pakai jasa mereka untuk company gathering ke Banyuwangi, 40 orang. Koordinasinya rapi dan tim di lapangan sangat responsif.', 'rating' => 5],
            ['avatar' => PlaceholderImage::make('testimoni-rina', 96, 96), 'name' => 'Rina Marlina', 'role' => 'Peserta Open Trip Kawah Ijen', 'quote' => 'Ikut open trip sendirian tapi langsung dapat teman baru dari peserta lain. Trekkingnya berat tapi worth it banget lihat blue fire langsung.', 'rating' => 4],
        ];

        return view('pages.home', [
            'heroImage' => PlaceholderImage::make('hero-kawah-ijen', 600, 600),
            'packages' => $packages,
            'features' => $features,
            'testimonials' => $testimonials,
            'faqPreview' => $faqPreview,
        ]);
    }
}
