<?php

namespace App\Support;

/**
 * Shared static content reused across multiple controllers, so pages
 * that need the same content (e.g. Home's "Why Choose Us" + About's
 * "Why Choose Us", or Home's Featured Packages + the full /packages
 * listing + Package Detail) don't each hardcode their own copy.
 *
 * Content localized to Banyuwangi (primary) & East Java (secondary)
 * tourism. Stands in for a real content model (CONTENT_MODEL_SPEC.md)
 * until one exists — same placeholder-data pattern used since Phase 1.
 */
class SiteContent
{
    public static function whyChooseUs(): array
    {
        return [
            ['icon' => 'guide', 'title' => 'Pemandu Lokal Berpengalaman', 'description' => 'Dipandu oleh pemandu asli Banyuwangi yang memahami medan Kawah Ijen hingga sudut tersembunyi Jawa Timur.'],
            ['icon' => 'price', 'title' => 'Harga Transparan', 'description' => 'Tidak ada biaya tersembunyi — rincian harga open trip maupun private trip dijelaskan sejak awal.'],
            ['icon' => 'flexible', 'title' => 'Open Trip & Private Trip', 'description' => 'Ikut open trip bareng traveler lain, atau atur itinerary custom untuk keluarga dan rombongan Anda sendiri.'],
            ['icon' => 'support', 'title' => 'Cocok untuk Grup & Korporat', 'description' => 'Tim kami siap membantu 24/7, termasuk menangani kebutuhan perjalanan dinas dan gathering korporat.'],
        ];
    }

    public static function faqItems(): array
    {
        return [
            ['category' => 'Booking', 'question' => 'Bagaimana cara memesan open trip atau private trip?', 'answer' => 'Pilih paket yang diinginkan, lalu hubungi kami melalui tombol WhatsApp di halaman paket. Tim kami akan mengonfirmasi jadwal, ketersediaan slot, dan langkah pembayaran.'],
            ['category' => 'Open Trip', 'question' => 'Apa bedanya open trip dan private trip?', 'answer' => 'Open trip digabung dengan peserta lain sehingga harga lebih hemat dan cocok untuk solo traveler, sedangkan private trip hanya untuk rombongan Anda sendiri dengan jadwal yang bisa disesuaikan.'],
            ['category' => 'Open Trip', 'question' => 'Berapa minimum peserta untuk open trip Kawah Ijen?', 'answer' => 'Open trip Kawah Ijen tetap berangkat meski hanya 1 peserta yang mendaftar, karena digabung dengan peserta dari tanggal keberangkatan yang sama.'],
            ['category' => 'Private Trip', 'question' => 'Bisakah itinerary private trip disesuaikan?', 'answer' => 'Bisa. Private trip dapat disesuaikan sepenuhnya — destinasi, durasi, hingga jadwal keberangkatan — sesuai kebutuhan keluarga atau rombongan Anda.'],
            ['category' => 'Payment', 'question' => 'Bagaimana cara pembayaran paket wisata?', 'answer' => 'Pembayaran dilakukan via transfer bank dengan uang muka (DP) untuk mengunci jadwal, dan pelunasan paling lambat 3 hari sebelum keberangkatan.'],
            ['category' => 'Payment', 'question' => 'Apakah bisa membayar di tempat (cash on trip)?', 'answer' => 'Untuk open trip, pembayaran dilakukan di muka melalui transfer. Untuk private trip dan grup korporat, skema pembayaran dapat didiskusikan langsung dengan tim kami.'],
            ['category' => 'Transportasi', 'question' => 'Apakah tersedia penjemputan dari luar Banyuwangi?', 'answer' => 'Kami menyediakan penjemputan dari Stasiun Banyuwangi, Bandara Banyuwangi (Blimbingsari), maupun Pelabuhan Ketapang. Penjemputan dari kota lain di Jawa Timur dapat diatur dengan biaya tambahan.'],
            ['category' => 'Kawah Ijen', 'question' => 'Seberapa berat trekking ke Kawah Ijen?', 'answer' => 'Trekking menuju kawah sekitar 3 km menanjak dengan durasi 1,5–2 jam. Disarankan memiliki stamina cukup dan menggunakan sepatu tertutup yang nyaman untuk medan berpasir dan berbatu.'],
            ['category' => 'Kawah Ijen', 'question' => 'Apakah masker gas untuk blue fire disediakan?', 'answer' => 'Ya, masker gas disediakan untuk seluruh peserta trekking Kawah Ijen guna melindungi dari uap belerang di sekitar area blue fire.'],
            ['category' => 'Waktu Terbaik', 'question' => 'Kapan waktu terbaik berkunjung ke Banyuwangi?', 'answer' => 'Musim kemarau (April–Oktober) adalah waktu terbaik, dengan langit cerah untuk melihat blue fire di Kawah Ijen dan cuaca yang mendukung aktivitas pantai maupun snorkeling.'],
            ['category' => 'Pembatalan', 'question' => 'Bagaimana kebijakan pembatalan perjalanan?', 'answer' => 'Pembatalan lebih dari 7 hari sebelum keberangkatan mendapat pengembalian dana sebagian. Pembatalan mendadak mengikuti kebijakan masing-masing paket, dijelaskan saat konfirmasi booking.'],
            ['category' => 'Pembatalan', 'question' => 'Bagaimana jika perjalanan dibatalkan karena cuaca (misal Kawah Ijen ditutup)?', 'answer' => 'Jika area wisata resmi ditutup oleh pengelola karena faktor keamanan, kami akan menawarkan jadwal ulang atau destinasi alternatif tanpa biaya tambahan.'],
        ];
    }

    /**
     * Full package catalog — Banyuwangi (primary) & East Java (secondary).
     * `itinerary` day-counts match each package's actual duration.
     * `highlights` is a short list of trip-defining moments, surfaced in
     * a small bullet list on Package Detail alongside the description.
     */
    public static function packages(): array
    {
        return [
            [
                'slug' => 'open-trip-kawah-ijen-1-hari',
                'title' => 'Open Trip Kawah Ijen 1 Hari',
                'destination' => 'Kawah Ijen',
                'duration' => '1 Hari',
                'price' => 'Rp 350.000',
                'rating' => 4.9,
                'image' => PlaceholderImage::make('paket-kawah-ijen', 800, 600),
                'description' => 'Saksikan fenomena blue fire yang hanya ada di dua tempat di dunia, lalu nikmati sunrise dari bibir kawah dengan danau asam terbesar di dunia sebagai latarnya. Cocok untuk solo traveler maupun rombongan kecil yang ingin trekking singkat namun berkesan.',
                'highlights' => ['Menyaksikan blue fire dini hari', 'Sunrise di bibir Kawah Ijen', 'Danau kawah asam terbesar di dunia', 'Masker gas disediakan'],
                'itinerary' => [
                    ['title' => 'Trekking Dini Hari & Blue Fire', 'description' => 'Penjemputan tengah malam dari pos Paltuding, trekking menuju kawah untuk menyaksikan blue fire, dilanjutkan sunrise dan turun kembali sebelum siang.'],
                ],
                'included' => ['Tiket masuk kawasan wisata', 'Pemandu lokal bersertifikat', 'Masker gas', 'Air mineral'],
                'excluded' => ['Transportasi menuju Paltuding', 'Sewa senter (jika diperlukan)', 'Makan', 'Pengeluaran pribadi'],
                'gallery' => [
                    PlaceholderImage::make('paket-kawah-ijen-gal-1', 400, 300),
                    PlaceholderImage::make('paket-kawah-ijen-gal-2', 400, 300),
                    PlaceholderImage::make('paket-kawah-ijen-gal-3', 400, 300),
                ],
            ],
            [
                'slug' => 'banyuwangi-explore-3h2m',
                'title' => 'Banyuwangi Explore 3 Hari 2 Malam',
                'destination' => 'Banyuwangi',
                'duration' => '3 Hari 2 Malam',
                'price' => 'Rp 1.750.000',
                'rating' => 4.8,
                'image' => PlaceholderImage::make('paket-banyuwangi-explore', 800, 600),
                'description' => 'Rangkuman terbaik Banyuwangi dalam satu paket — dari blue fire Kawah Ijen, pasir merah Pulau Merah, hingga hutan mistis De Djawatan yang terkenal lewat film Maleficent.',
                'highlights' => ['Blue fire Kawah Ijen', 'Surfing/santai di Pulau Merah', 'Foto di hutan De Djawatan', 'Kuliner khas Banyuwangi'],
                'itinerary' => [
                    ['title' => 'Kawah Ijen', 'description' => 'Trekking dini hari menuju Kawah Ijen untuk blue fire dan sunrise, istirahat siang di penginapan kota Banyuwangi.'],
                    ['title' => 'Pulau Merah & De Djawatan', 'description' => 'Menikmati pasir merah dan ombak Pulau Merah, dilanjutkan berfoto di antara pohon-pohon trembesi De Djawatan saat sore hari.'],
                    ['title' => 'Waktu Bebas & Kepulangan', 'description' => 'Waktu bebas berbelanja oleh-oleh khas Banyuwangi sebelum diantar menuju stasiun/bandara.'],
                ],
                'included' => ['Penginapan (2 malam)', 'Transportasi AC selama perjalanan', 'Pemandu lokal', 'Tiket masuk destinasi', 'Masker gas Kawah Ijen', 'Sarapan pagi'],
                'excluded' => ['Tiket kereta/pesawat menuju Banyuwangi', 'Makan siang & malam', 'Pengeluaran pribadi', 'Asuransi perjalanan'],
                'gallery' => [
                    PlaceholderImage::make('paket-banyuwangi-explore-gal-1', 400, 300),
                    PlaceholderImage::make('paket-banyuwangi-explore-gal-2', 400, 300),
                    PlaceholderImage::make('paket-banyuwangi-explore-gal-3', 400, 300),
                    PlaceholderImage::make('paket-banyuwangi-explore-gal-4', 400, 300),
                ],
            ],
            [
                'slug' => 'baluran-pulau-merah-tour',
                'title' => 'Baluran & Pulau Merah Tour',
                'destination' => 'Baluran',
                'duration' => '2 Hari 1 Malam',
                'price' => 'Rp 1.150.000',
                'rating' => 4.7,
                'image' => PlaceholderImage::make('paket-baluran', 800, 600),
                'description' => 'Jelajahi savana luas Taman Nasional Baluran yang dijuluki "Africa van Java", lalu bersantai di pasir merah eksotis Pulau Merah — kombinasi savana dan pantai dalam satu perjalanan singkat.',
                'highlights' => ['Savana & satwa liar Baluran', 'Evening Savannah di Bekol', 'Pasir merah Pulau Merah', 'Spot foto Savana Bekol'],
                'itinerary' => [
                    ['title' => 'Taman Nasional Baluran', 'description' => 'Menjelajahi savana Bekol dan Pantai Bama, mengamati rusa dan merak liar, dilanjutkan menginap di sekitar kawasan Baluran.'],
                    ['title' => 'Pulau Merah & Kepulangan', 'description' => 'Perjalanan menuju Pulau Merah untuk bersantai di pasir merah sebelum diantar menuju titik kepulangan.'],
                ],
                'included' => ['Penginapan (1 malam)', 'Transportasi AC selama perjalanan', 'Pemandu lokal', 'Tiket masuk taman nasional', 'Sarapan pagi'],
                'excluded' => ['Transportasi menuju titik kumpul', 'Makan siang & malam', 'Pengeluaran pribadi'],
                'gallery' => [
                    PlaceholderImage::make('paket-baluran-gal-1', 400, 300),
                    PlaceholderImage::make('paket-baluran-gal-2', 400, 300),
                    PlaceholderImage::make('paket-baluran-gal-3', 400, 300),
                ],
            ],
            [
                'slug' => 'banyuwangi-adventure-package',
                'title' => 'Banyuwangi Adventure Package',
                'destination' => 'Banyuwangi',
                'duration' => '3 Hari 2 Malam',
                'price' => 'Rp 2.100.000',
                'rating' => 4.9,
                'image' => PlaceholderImage::make('paket-banyuwangi-adventure', 800, 600),
                'description' => 'Untuk Anda yang mencari sisi petualangan Banyuwangi — trekking menuju Teluk Hijau yang tersembunyi, pasir hitam Pantai Wedi Ireng, dan hutan De Djawatan yang syarat legenda.',
                'highlights' => ['Trekking ke Teluk Hijau', 'Pasir hitam Pantai Wedi Ireng', 'Hutan mistis De Djawatan', 'Cocok untuk pecinta alam'],
                'itinerary' => [
                    ['title' => 'De Djawatan & Wedi Ireng', 'description' => 'Mengunjungi hutan De Djawatan di pagi hari, dilanjutkan menuju Pantai Wedi Ireng dengan pasir hitam vulkaniknya.'],
                    ['title' => 'Trekking Teluk Hijau', 'description' => 'Trekking menyusuri tebing menuju Teluk Hijau (Green Bay), bersantai di pantai tersembunyi yang dikelilingi tebing hijau.'],
                    ['title' => 'Waktu Bebas & Kepulangan', 'description' => 'Waktu bebas beristirahat sebelum diantar menuju titik kepulangan.'],
                ],
                'included' => ['Penginapan (2 malam)', 'Transportasi 4x4/trekking pendamping', 'Pemandu lokal berpengalaman', 'Tiket masuk destinasi', 'Sarapan pagi'],
                'excluded' => ['Transportasi menuju Banyuwangi', 'Makan siang & malam', 'Pengeluaran pribadi', 'Asuransi perjalanan'],
                'gallery' => [
                    PlaceholderImage::make('paket-banyuwangi-adventure-gal-1', 400, 300),
                    PlaceholderImage::make('paket-banyuwangi-adventure-gal-2', 400, 300),
                    PlaceholderImage::make('paket-banyuwangi-adventure-gal-3', 400, 300),
                ],
            ],
            [
                'slug' => 'east-java-highlights-5h4m',
                'title' => 'East Java Highlights 5 Hari 4 Malam',
                'destination' => 'Jawa Timur',
                'duration' => '5 Hari 4 Malam',
                'price' => 'Rp 4.500.000',
                'rating' => 5.0,
                'image' => PlaceholderImage::make('paket-east-java-highlights', 800, 600),
                'description' => 'Rute lengkap sisi terbaik Jawa Timur — sunrise Bromo, blue fire Kawah Ijen, air terjun Tumpak Sewu, hingga suasana sejuk Kota Batu. Untuk Anda yang ingin merasakan Jawa Timur secara menyeluruh dalam satu perjalanan.',
                'highlights' => ['Sunrise di Gunung Bromo', 'Blue fire Kawah Ijen', 'Air Terjun Tumpak Sewu', 'Wisata keluarga di Kota Batu'],
                'itinerary' => [
                    ['title' => 'Sunrise Bromo', 'description' => 'Penjemputan dini hari menuju Penanjakan untuk sunrise, dilanjutkan menyusuri lautan pasir dan Kawah Bromo.'],
                    ['title' => 'Tumpak Sewu', 'description' => 'Perjalanan menuju Lumajang untuk trekking menyaksikan Air Terjun Tumpak Sewu, "Niagara-nya Indonesia".'],
                    ['title' => 'Menuju Banyuwangi & Kawah Ijen', 'description' => 'Perjalanan menuju Banyuwangi, istirahat sebelum trekking dini hari ke Kawah Ijen.'],
                    ['title' => 'Blue Fire Kawah Ijen', 'description' => 'Trekking dini hari menyaksikan blue fire dan sunrise, dilanjutkan istirahat di Banyuwangi.'],
                    ['title' => 'Kota Batu & Kepulangan', 'description' => 'Perjalanan menuju Kota Batu untuk waktu bebas menikmati suasana sejuk sebelum kepulangan.'],
                ],
                'included' => ['Penginapan (4 malam)', 'Transportasi AC/jeep selama perjalanan', 'Pemandu lokal', 'Tiket masuk destinasi utama', 'Masker gas Kawah Ijen', 'Sarapan pagi'],
                'excluded' => ['Tiket pesawat/kereta pulang-pergi', 'Makan siang & malam', 'Pengeluaran pribadi', 'Asuransi perjalanan'],
                'gallery' => [
                    PlaceholderImage::make('paket-east-java-highlights-gal-1', 400, 300),
                    PlaceholderImage::make('paket-east-java-highlights-gal-2', 400, 300),
                    PlaceholderImage::make('paket-east-java-highlights-gal-3', 400, 300),
                    PlaceholderImage::make('paket-east-java-highlights-gal-4', 400, 300),
                ],
            ],
            [
                'slug' => 'bromo-ijen-tour-3h2m',
                'title' => 'Bromo Ijen Tour 3 Hari 2 Malam',
                'destination' => 'Bromo & Ijen',
                'duration' => '3 Hari 2 Malam',
                'price' => 'Rp 2.300.000',
                'rating' => 4.9,
                'image' => PlaceholderImage::make('paket-bromo-ijen', 800, 600),
                'description' => 'Rute klasik favorit wisatawan — sunrise Gunung Bromo dan blue fire Kawah Ijen dalam satu perjalanan efisien, menghubungkan dua ikon wisata alam Jawa Timur.',
                'highlights' => ['Sunrise di Penanjakan Bromo', 'Lautan Pasir & Kawah Bromo', 'Blue fire Kawah Ijen', 'Rute lintas Probolinggo–Banyuwangi'],
                'itinerary' => [
                    ['title' => 'Sunrise Bromo', 'description' => 'Penjemputan dini hari menuju Penanjakan, menyaksikan sunrise, dilanjutkan menyusuri lautan pasir dan naik ke Kawah Bromo.'],
                    ['title' => 'Perjalanan Menuju Ijen', 'description' => 'Perjalanan darat menuju kawasan Ijen, istirahat di penginapan sekitar Paltuding.'],
                    ['title' => 'Blue Fire Kawah Ijen & Kepulangan', 'description' => 'Trekking dini hari menyaksikan blue fire dan sunrise di Kawah Ijen sebelum diantar menuju titik kepulangan.'],
                ],
                'included' => ['Penginapan (2 malam)', 'Jeep wisata Bromo', 'Pemandu lokal', 'Masker gas Kawah Ijen', 'Sarapan pagi'],
                'excluded' => ['Transportasi menuju titik kumpul', 'Makan siang & malam', 'Pengeluaran pribadi', 'Asuransi perjalanan'],
                'gallery' => [
                    PlaceholderImage::make('paket-bromo-ijen-gal-1', 400, 300),
                    PlaceholderImage::make('paket-bromo-ijen-gal-2', 400, 300),
                    PlaceholderImage::make('paket-bromo-ijen-gal-3', 400, 300),
                ],
            ],
            [
                'slug' => 'sukamade-konservasi-penyu-2h1m',
                'title' => 'Sukamade Konservasi Penyu 2 Hari 1 Malam',
                'destination' => 'Alas Purwo',
                'duration' => '2 Hari 1 Malam',
                'price' => 'Rp 1.450.000',
                'rating' => 4.8,
                'image' => PlaceholderImage::make('paket-sukamade', 800, 600),
                'description' => 'Petualangan menembus hutan Taman Nasional Meru Betiri menuju Pantai Sukamade, tempat konservasi penyu terbesar di Pulau Jawa. Kesempatan langka menyaksikan penyu bertelur di alam liar.',
                'highlights' => ['Menyaksikan penyu bertelur (musiman)', 'Melintasi hutan Meru Betiri', 'Edukasi konservasi penyu', 'Pantai alami tanpa keramaian'],
                'itinerary' => [
                    ['title' => 'Perjalanan Menuju Sukamade', 'description' => 'Perjalanan off-road melintasi perkebunan dan hutan menuju Pantai Sukamade, tiba sore hari dan istirahat di penginapan lokal.'],
                    ['title' => 'Konservasi Penyu & Kepulangan', 'description' => 'Menyaksikan aktivitas konservasi penyu dini hari (musiman), dilanjutkan perjalanan kembali menuju kota Banyuwangi.'],
                ],
                'included' => ['Penginapan (1 malam)', 'Transportasi 4x4', 'Pemandu lokal', 'Tiket konservasi', 'Sarapan pagi'],
                'excluded' => ['Transportasi menuju Banyuwangi', 'Makan siang & malam', 'Pengeluaran pribadi'],
                'gallery' => [
                    PlaceholderImage::make('paket-sukamade-gal-1', 400, 300),
                    PlaceholderImage::make('paket-sukamade-gal-2', 400, 300),
                    PlaceholderImage::make('paket-sukamade-gal-3', 400, 300),
                ],
            ],
            [
                'slug' => 'bangsring-snorkeling-1-hari',
                'title' => 'Bangsring Underwater Snorkeling Trip',
                'destination' => 'Bangsring',
                'duration' => '1 Hari',
                'price' => 'Rp 250.000',
                'rating' => 4.6,
                'image' => PlaceholderImage::make('paket-bangsring', 800, 600),
                'description' => 'Snorkeling santai di kawasan konservasi terumbu karang Bangsring Underwater, tempat nelayan setempat mengubah kawasan tangkapan menjadi area konservasi laut yang kini ramai wisatawan.',
                'highlights' => ['Snorkeling di area konservasi karang', 'Rumah apung Bangsring', 'Edukasi konservasi laut', 'Cocok untuk keluarga'],
                'itinerary' => [
                    ['title' => 'Snorkeling Bangsring Underwater', 'description' => 'Snorkeling di area konservasi terumbu karang Bangsring, dilanjutkan bersantai di rumah apung sebelum kembali sore hari.'],
                ],
                'included' => ['Perlengkapan snorkeling', 'Pemandu lokal', 'Tiket masuk kawasan konservasi', 'Air mineral'],
                'excluded' => ['Transportasi menuju Bangsring', 'Makan', 'Pengeluaran pribadi'],
                'gallery' => [
                    PlaceholderImage::make('paket-bangsring-gal-1', 400, 300),
                    PlaceholderImage::make('paket-bangsring-gal-2', 400, 300),
                    PlaceholderImage::make('paket-bangsring-gal-3', 400, 300),
                ],
            ],
        ];
    }

    /**
     * Blog catalog. `relatedPackageSlug` lets a post's CTA link to a
     * specific real package detail page — the SEO-to-conversion bridge.
     */
    public static function blogPosts(): array
    {
        $ayu = ['name' => 'Ayu Kartika', 'role' => 'Tour Manager', 'photo' => PlaceholderImage::make('team-operations', 200, 200)];
        $rizky = ['name' => 'Rizky Pratama', 'role' => 'Head Guide', 'photo' => PlaceholderImage::make('team-guide', 200, 200)];

        return [
            [
                'slug' => 'panduan-wisata-kawah-ijen',
                'title' => 'Panduan Wisata Kawah Ijen: Blue Fire, Trekking, dan Tips Penting',
                'category' => 'Panduan Destinasi',
                'excerpt' => 'Semua yang perlu Anda ketahui sebelum trekking ke Kawah Ijen — mulai dari rute, waktu terbaik, hingga perlengkapan wajib.',
                'thumbnail' => PlaceholderImage::make('blog-kawah-ijen', 640, 400),
                'author' => $rizky,
                'publishedAt' => '2026-08-20',
                'relatedPackageSlug' => 'open-trip-kawah-ijen-1-hari',
                'body' => [
                    'Kawah Ijen adalah salah satu dari hanya dua lokasi di dunia yang memiliki fenomena blue fire — nyala api biru yang muncul dari pembakaran gas belerang bertekanan tinggi. Fenomena ini hanya terlihat jelas pada dini hari, sekitar pukul 1–4 pagi, sebelum cahaya matahari mengalahkan pendar birunya.',
                    'Trekking menuju kawah dimulai dari pos Paltuding, dengan jarak sekitar 3 km menanjak melalui jalur berpasir dan berbatu. Waktu tempuh normal sekitar 1,5–2 jam untuk pendaki dengan stamina rata-rata, sehingga penting mempersiapkan fisik sejak beberapa hari sebelumnya.',
                    'Setelah puas menikmati blue fire, banyak wisatawan memilih menunggu hingga sunrise untuk melihat danau kawah berwarna toska yang merupakan danau asam terbesar di dunia. Pemandangan ini menjadikan Kawah Ijen layak masuk daftar destinasi wajib saat berkunjung ke Banyuwangi.',
                    'Jangan lupa membawa masker gas (biasanya sudah disediakan operator wisata), jaket tebal karena suhu dini hari bisa mendekati titik beku, serta senter atau headlamp untuk penerangan selama trekking dalam gelap.',
                ],
            ],
            [
                'slug' => '10-destinasi-wisata-terbaik-di-banyuwangi',
                'title' => '10 Destinasi Wisata Terbaik di Banyuwangi yang Wajib Dikunjungi',
                'category' => 'Panduan Destinasi',
                'excerpt' => 'Dari blue fire Kawah Ijen hingga hutan De Djawatan yang instagramable — berikut daftar destinasi terbaik di Banyuwangi.',
                'thumbnail' => PlaceholderImage::make('blog-banyuwangi-destinasi', 640, 400),
                'author' => $ayu,
                'publishedAt' => '2026-08-15',
                'relatedPackageSlug' => 'banyuwangi-explore-3h2m',
                'body' => [
                    'Banyuwangi, kabupaten paling timur Pulau Jawa, kini menjelma menjadi salah satu destinasi wisata paling lengkap di Indonesia — memadukan gunung, hutan, dan pantai dalam satu wilayah yang relatif ringkas untuk dijelajahi.',
                    'Kawah Ijen tentu menjadi ikon utama dengan fenomena blue fire-nya. Tak jauh dari sana, Taman Nasional Baluran menawarkan savana luas yang dijuluki "Africa van Java", lengkap dengan rusa dan merak liar yang berkeliaran bebas.',
                    'Untuk pecinta pantai, Pulau Merah menawarkan pasir kemerahan dan ombak yang digemari peselancar, sementara Teluk Hijau dan Pantai Wedi Ireng menawarkan suasana lebih tersembunyi bagi yang mencari ketenangan.',
                    'Jangan lewatkan De Djawatan, hutan trembesi raksasa yang populer usai dijadikan lokasi syuting film Maleficent, serta Bangsring Underwater bagi yang ingin snorkeling di area konservasi terumbu karang.',
                ],
            ],
            [
                'slug' => 'tips-berburu-sunrise-di-kawah-ijen',
                'title' => 'Tips Berburu Sunrise di Kawah Ijen',
                'category' => 'Tips Perjalanan',
                'excerpt' => 'Ingin mendapatkan momen sunrise terbaik di Kawah Ijen? Simak tips waktu, posisi, dan persiapan yang perlu diperhatikan.',
                'thumbnail' => PlaceholderImage::make('blog-sunrise-ijen', 640, 400),
                'author' => $rizky,
                'publishedAt' => '2026-08-10',
                'relatedPackageSlug' => 'bromo-ijen-tour-3h2m',
                'body' => [
                    'Selain blue fire, momen sunrise di Kawah Ijen tak kalah memukau. Cahaya pagi yang perlahan menyinari danau kawah berwarna toska menciptakan pemandangan yang jarang ditemukan di tempat lain.',
                    'Untuk mendapatkan posisi terbaik, disarankan tiba di bibir kawah sebelum pukul 5 pagi, sebelum area mulai dipadati wisatawan lain yang juga berburu momen yang sama.',
                    'Bawa kamera dengan baterai penuh dan lensa wide-angle jika memungkinkan, karena suhu dingin dapat mempercepat habisnya daya baterai. Siapkan pula pakaian berlapis agar tetap nyaman menunggu momen matahari terbit.',
                ],
            ],
            [
                'slug' => 'itinerary-banyuwangi-3-hari-2-malam',
                'title' => 'Itinerary Banyuwangi 3 Hari 2 Malam untuk Pemula',
                'category' => 'Tips Perjalanan',
                'excerpt' => 'Baru pertama kali ke Banyuwangi? Berikut rencana perjalanan 3 hari 2 malam yang efisien untuk menjelajah destinasi utamanya.',
                'thumbnail' => PlaceholderImage::make('blog-itinerary-banyuwangi', 640, 400),
                'author' => $ayu,
                'publishedAt' => '2026-08-05',
                'relatedPackageSlug' => 'banyuwangi-explore-3h2m',
                'body' => [
                    'Dengan waktu terbatas 3 hari 2 malam, urutan destinasi perlu direncanakan agar perjalanan tetap efisien tanpa terburu-buru. Hari pertama sebaiknya difokuskan untuk trekking Kawah Ijen sejak dini hari, mengingat perjalanan ini membutuhkan stamina paling besar.',
                    'Hari kedua, setelah beristirahat cukup, lanjutkan menuju Pulau Merah di pagi hari untuk bersantai atau mencoba surfing, dilanjutkan ke De Djawatan menjelang sore untuk sesi foto dengan cahaya yang lebih lembut.',
                    'Hari ketiga dapat digunakan untuk berbelanja oleh-oleh khas Banyuwangi seperti kopi lokal dan batik gajah oling, sebelum menuju stasiun atau bandara untuk kepulangan.',
                ],
            ],
            [
                'slug' => 'panduan-wisata-baluran',
                'title' => 'Panduan Wisata Baluran, "Africa van Java"',
                'category' => 'Panduan Destinasi',
                'excerpt' => 'Taman Nasional Baluran menawarkan savana luas dan satwa liar yang jarang ditemukan di destinasi wisata Jawa lainnya.',
                'thumbnail' => PlaceholderImage::make('blog-baluran', 640, 400),
                'author' => $rizky,
                'publishedAt' => '2026-07-28',
                'relatedPackageSlug' => 'baluran-pulau-merah-tour',
                'body' => [
                    'Taman Nasional Baluran mendapat julukan "Africa van Java" karena bentang savananya yang luas, mengingatkan pada padang rumput sabana di Afrika. Kawasan seluas lebih dari 25.000 hektare ini menjadi rumah bagi rusa, banteng, merak, hingga kerbau liar.',
                    'Savana Bekol adalah spot utama untuk menyaksikan satwa liar, terutama pada sore hari saat suhu mulai turun dan hewan-hewan keluar mencari makan. Tak jauh dari sana, Pantai Bama menawarkan pemandangan pantai berpasir putih yang tenang.',
                    'Waktu terbaik berkunjung adalah musim kemarau, saat savana berubah warna keemasan dan jalur menuju kawasan lebih mudah dilalui. Disarankan membawa air minum yang cukup karena fasilitas di dalam kawasan taman nasional masih terbatas.',
                ],
            ],
            [
                'slug' => 'rekomendasi-wisata-jawa-timur',
                'title' => 'Rekomendasi Wisata Jawa Timur di Luar Banyuwangi',
                'category' => 'Panduan Destinasi',
                'excerpt' => 'Dari sunrise Bromo hingga air terjun Tumpak Sewu — berikut destinasi Jawa Timur yang layak dimasukkan dalam rencana liburan Anda.',
                'thumbnail' => PlaceholderImage::make('blog-jawa-timur', 640, 400),
                'author' => $ayu,
                'publishedAt' => '2026-07-20',
                'relatedPackageSlug' => 'east-java-highlights-5h4m',
                'body' => [
                    'Jawa Timur menyimpan begitu banyak destinasi alam yang tak kalah menakjubkan dari Banyuwangi. Gunung Bromo dengan lautan pasir dan sunrise ikoniknya tetap menjadi favorit wisatawan domestik maupun mancanegara.',
                    'Bagi pecinta air terjun, Tumpak Sewu di Lumajang menawarkan pemandangan air terjun raksasa yang sering dijuluki "Niagara-nya Indonesia", sementara Madakaripura di Probolinggo memiliki nuansa magis lengkap dengan legenda Gajah Mada.',
                    'Kota Malang dan Batu menjadi pilihan tepat bagi keluarga yang mencari udara sejuk dan wisata taman bermain, sementara Gili Ketapang di lepas pantai Probolinggo menawarkan snorkeling dengan akses yang relatif singkat dari daratan.',
                    'Menggabungkan destinasi-destinasi ini dengan Banyuwangi dalam satu perjalanan panjang memberikan gambaran lengkap tentang kekayaan alam Jawa Timur dari ujung timur pulau hingga kawasan pegunungannya.',
                ],
            ],
        ];
    }
}