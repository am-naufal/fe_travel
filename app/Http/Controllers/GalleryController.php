<?php

namespace App\Http\Controllers;

use App\Support\PlaceholderImage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Display the Gallery page: Image Grid, Destination Filter, Lightbox.
     * Per PAGE_GALLERY_SPEC.md. Varied heights below are deliberate —
     * they're what make the CSS-columns masonry layout look like a
     * masonry grid instead of a uniform grid.
     */
    public function index(): View
    {
        $destinations = ['Kawah Ijen', 'Baluran', 'Pulau Merah', 'De Djawatan', 'Teluk Hijau', 'Bangsring', 'Bromo', 'Tumpak Sewu'];

        $media = [
            ['image' => PlaceholderImage::make('gallery-kawah-ijen-1', 400, 520), 'destination' => 'Kawah Ijen', 'caption' => 'Blue fire di Kawah Ijen dini hari'],
            ['image' => PlaceholderImage::make('gallery-kawah-ijen-2', 400, 300), 'destination' => 'Kawah Ijen', 'caption' => 'Danau kawah asam terbesar di dunia'],
            ['image' => PlaceholderImage::make('gallery-baluran-1', 400, 400), 'destination' => 'Baluran', 'caption' => 'Savana Bekol, "Africa van Java"'],
            ['image' => PlaceholderImage::make('gallery-baluran-2', 400, 560), 'destination' => 'Baluran', 'caption' => 'Rusa liar di Taman Nasional Baluran'],
            ['image' => PlaceholderImage::make('gallery-pulau-merah-1', 400, 300), 'destination' => 'Pulau Merah', 'caption' => 'Pasir merah dan ombak Pulau Merah'],
            ['image' => PlaceholderImage::make('gallery-pulau-merah-2', 400, 480), 'destination' => 'Pulau Merah', 'caption' => 'Sunset di Pulau Merah'],
            ['image' => PlaceholderImage::make('gallery-de-djawatan-1', 400, 400), 'destination' => 'De Djawatan', 'caption' => 'Hutan trembesi De Djawatan'],
            ['image' => PlaceholderImage::make('gallery-de-djawatan-2', 400, 300), 'destination' => 'De Djawatan', 'caption' => 'Lorong pohon De Djawatan'],
            ['image' => PlaceholderImage::make('gallery-teluk-hijau-1', 400, 520), 'destination' => 'Teluk Hijau', 'caption' => 'Teluk Hijau (Green Bay) tersembunyi'],
            ['image' => PlaceholderImage::make('gallery-teluk-hijau-2', 400, 320), 'destination' => 'Teluk Hijau', 'caption' => 'Trekking menuju Teluk Hijau'],
            ['image' => PlaceholderImage::make('gallery-bangsring-1', 400, 400), 'destination' => 'Bangsring', 'caption' => 'Snorkeling di Bangsring Underwater'],
            ['image' => PlaceholderImage::make('gallery-bangsring-2', 400, 300), 'destination' => 'Bangsring', 'caption' => 'Rumah apung Bangsring'],
            ['image' => PlaceholderImage::make('gallery-bromo-1', 400, 520), 'destination' => 'Bromo', 'caption' => 'Sunrise di Gunung Bromo'],
            ['image' => PlaceholderImage::make('gallery-bromo-2', 400, 320), 'destination' => 'Bromo', 'caption' => 'Lautan pasir Bromo'],
            ['image' => PlaceholderImage::make('gallery-tumpak-sewu-1', 400, 460), 'destination' => 'Tumpak Sewu', 'caption' => 'Air Terjun Tumpak Sewu, Lumajang'],
            ['image' => PlaceholderImage::make('gallery-tumpak-sewu-2', 400, 300), 'destination' => 'Tumpak Sewu', 'caption' => 'Tebing menuju Tumpak Sewu'],
        ];

        return view('pages.gallery', [
            'destinations' => $destinations,
            'media' => $media,
        ]);
    }
}
