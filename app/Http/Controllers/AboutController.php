<?php

namespace App\Http\Controllers;

use App\Support\PlaceholderImage;
use App\Support\SiteContent;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Display the About page: Company Story, Vision, Mission, Team,
     * Why Choose Us (reused from Home — see SiteContent::whyChooseUs()).
     */
    public function index(): View
    {
        $team = [
            ['photo' => PlaceholderImage::make('team-founder', 200, 200), 'name' => 'Made Wirawan', 'role' => 'Founder & CEO'],
            ['photo' => PlaceholderImage::make('team-operations', 200, 200), 'name' => 'Ayu Kartika', 'role' => 'Tour Manager'],
            ['photo' => PlaceholderImage::make('team-guide', 200, 200), 'name' => 'Rizky Pratama', 'role' => 'Head Guide'],
            ['photo' => PlaceholderImage::make('team-care', 200, 200), 'name' => 'Dewi Lestari', 'role' => 'Customer Care'],
        ];

        return view('pages.about', [
            'team' => $team,
            'features' => SiteContent::whyChooseUs(),
        ]);
    }
}
