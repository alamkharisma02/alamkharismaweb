<?php
 
namespace Database\Seeders;
 
use App\Models\User;
use App\Models\Project;
use App\Models\Article;
use App\Models\Lead;
use App\Models\Testimonial;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@alamkharisma.co.id'],
            [
                'name' => 'Administrator PT Alam Kharisma Bersaudara',
                'password' => Hash::make('password123'),
            ]
        );
 
        // 1.5 Create Default Settings
        $defaultSettings = [
            'site_name' => 'PT Alam Kharisma Bersaudara',
            'site_tagline' => 'Interior, Eksterior, dan Kontraktor Konstruksi',
            'hero_title' => 'Mewujudkan Interior Mewah & Konstruksi Sipil Presisi',
            'hero_subtitle' => 'PT Alam Kharisma Bersaudara berdiri sejak tahun 2018. Kami melayani pengerjaan interior mewah, perancangan eksterior modern, dan konstruksi sipil berstandar tinggi secara transparan dan profesional.',
            'hero_video_url' => 'https://assets.mixkit.co/videos/preview/mixkit-under-construction-building-site-41722-large.mp4',
            'featured_video_url' => 'https://www.youtube.com/embed/3A3aT6r1x6w',
            'featured_video_title' => 'Dokumentasi Lapangan & Hasil Kerja',
            'featured_video_subtitle' => 'Simak video footage perjalanan pengerjaan konstruksi dan interior kami dari tahap survei hingga serah terima kunci.',
            'contact_whatsapp' => '6281373122244',
            'contact_phone' => '+62 21-8889-9900',
            'contact_email' => 'info@alamkharisma.co.id',
            'contact_address' => 'Kharisma Plaza Lt. 3, Jl. Kebon Jeruk No. 45, Jakarta Barat',
            'contact_map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24580211756!2d106.74609139169922!3d-6.19658253139369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1406e40994f%3A0x600585154340a6b!2sJakarta%20Barat%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
            'legal_nib' => '1234567890123',
            'legal_siujk' => '912/SIUJK/2024',
            'company_established_year' => '2018',
            'company_about_us_title' => 'Membangun dengan Hati, Merancang dengan Presisi',
            'company_about_us_text' => 'Didirikan pada tahun 2018, PT Alam Kharisma Bersaudara hadir sebagai solusi terintegrasi untuk kebutuhan konstruksi bangunan, rancangan desain eksterior fasad, hingga pengerjaan detail interior (fit-out). Kami berkomitmen tinggi untuk memberikan hasil kerja yang presisi, penggunaan material berkualitas tinggi, anggaran belanja yang transparan, serta ketepatan waktu demi kepuasan klien kami.',
            'workflow_step1_img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop',
            'workflow_step2_img' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800&h=450&fit=crop',
            'workflow_step3_img' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&h=450&fit=crop',
            'workflow_step4_img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop',
            'workflow_step5_img' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&h=450&fit=crop',
        ];
 
        foreach ($defaultSettings as $key => $val) {
            \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $val]);
        }
 
        // 2. Create Projects - using Unsplash direct image URLs (reliable)
        $projects = [
            [
                'title' => 'Pembangunan Menara Office Apex Jakarta',
                'description' => 'Proyek pembangunan gedung perkantoran bertingkat tinggi (12 lantai) dengan konsep green building dan fasad modern glassmorphism di kawasan Segitiga Emas Jakarta. Struktur beton bertulang kekuatan tinggi, menggunakan teknologi precast untuk efisiensi waktu pengerjaan.',
                'location' => 'Kuningan, Jakarta Selatan',
                'category' => 'Komersial',
                'status' => 'Completed',
                'video_url' => 'https://www.youtube.com/embed/3A3aT6r1x6w',
                'cover_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=800&h=600&fit=crop'
                ]
            ],
            [
                'title' => 'Modern Luxury Villa Canggu',
                'description' => 'Konstruksi villa mewah dengan desain tropis modern minimalis di Bali. Menggunakan material premium seperti batu alam lokal, lantai parket kayu jati, dan pengerjaan struktur sipil berpresisi tinggi untuk mengakomodasi kolam renang infinity kantilever (cantilevered infinity pool).',
                'location' => 'Canggu, Bali',
                'category' => 'Residensial',
                'status' => 'In Progress',
                'video_url' => 'https://www.youtube.com/embed/yGcwSC8Z6_c',
                'cover_image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800&h=600&fit=crop'
                ]
            ],
            [
                'title' => 'Struktur Jembatan Beton & Jalan Akses',
                'description' => 'Pengerjaan struktur sipil berat berupa jembatan beton bertulang sepanjang 75 meter dan pembuatan jalan akses beton (rigid pavement) kelas 1 untuk menunjang aktivitas logistik pabrik manufaktur.',
                'location' => 'Pasuruan, Jawa Timur',
                'category' => 'Sipil',
                'status' => 'Completed',
                'video_url' => 'https://www.youtube.com/embed/7XlTdbK5tL4',
                'cover_image' => 'https://images.unsplash.com/photo-1545558014-8692077e9b5c?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1545558014-8692077e9b5c?w=800&h=600&fit=crop'
                ]
            ],
            [
                'title' => 'Renovasi Gedung Puskesmas Rawat Inap',
                'description' => 'Pekerjaan renovasi struktur dan arsitektur gedung layanan kesehatan masyarakat untuk meningkatkan daya tampung rawat inap dan peremajaan sistem sanitasi serta instalasi gas medis.',
                'location' => 'Sleman, Yogyakarta',
                'category' => 'Sipil',
                'status' => 'Planning',
                'video_url' => 'https://www.youtube.com/embed/l_Q9tO_8r9s',
                'cover_image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=600&fit=crop'
                ]
            ]
        ];
 
        foreach ($projects as $proj) {
            $proj['slug'] = Str::slug($proj['title']);
            Project::updateOrCreate(['slug' => $proj['slug']], $proj);
        }
 
        // 4. Create Articles - using Unsplash direct image URLs
        $articles = [
            [
                'title' => 'Panduan Cara Menghitung RAB Rumah Tinggal Bagi Pemula',
                'content' => 'Merencanakan pembangunan rumah impian membutuhkan estimasi biaya yang matang agar tidak terjadi overbudget di tengah jalan. Rencana Anggaran Biaya (RAB) adalah dokumen estimasi biaya yang wajib disiapkan. Langkah pertama adalah menghitung volume pekerjaan, mulai dari pembersihan lahan, galian tanah, pondasi, hingga finishing dinding dan atap. Langkah kedua adalah menentukan Harga Satuan Pekerjaan (HSP) berdasarkan harga material dan upah pekerja di daerah proyek. Kalikan volume dengan HSP untuk mendapatkan biaya per komponen pekerjaan. Selalu sisihkan dana darurat sebesar 10% untuk biaya tak terduga.',
                'cover_image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=450&fit=crop',
                'category' => 'Tips & Panduan',
                'is_published' => true,
                'views' => 142,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Mengenal Perbedaan Beton Readymix vs Sitemix: Mana yang Lebih Baik?',
                'content' => 'Dalam proyek pembangunan sipil maupun rumah tinggal, pemilihan metode pembuatan beton sangat krusial menentukan kekuatan struktur bangunan. Beton Readymix diproduksi di batching plant dengan kontrol kualitas tinggi menggunakan sistem komputerisasi, lalu dikirim ke lokasi proyek menggunakan truk mixer (truk molen). Cocok untuk pengecoran skala besar seperti pelat lantai (dak) atau balok struktur utama. Keunggulannya adalah mutu yang konsisten dan hemat waktu. Di sisi lain, beton Sitemix diaduk langsung di lokasi menggunakan mesin molen mini (concrete mixer) secara manual. Metode ini cocok untuk volume kecil atau lokasi yang sulit diakses truk besar. Pilihlah sesuai skala proyek dan aksesibilitas lokasi pembangunan.',
                'cover_image' => 'https://images.unsplash.com/photo-1590644365607-1c5d3de87844?w=800&h=450&fit=crop',
                'category' => 'Teknologi Material',
                'is_published' => true,
                'views' => 89,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Digitalisasi Konstruksi: Memantau Proyek Pembangunan Dari Ponsel Anda',
                'content' => 'Perkembangan teknologi kini menyentuh industri konstruksi yang sebelumnya dikenal tradisional. Program digitalisasi kontraktor memungkinkan klien memantau progres pembangunan harian secara transparan tanpa harus datang ke lapangan. Melalui portal khusus klien, kontraktor dapat mengunggah laporan harian berisi dokumentasi foto/video, persentase kemajuan pekerjaan, hingga status bahan bangunan yang datang. Hal ini meminimalkan kecurigaan dan meningkatkan rasa percaya antara pemilik proyek dengan kontraktor. Inilah standar baru konstruksi modern yang profesional.',
                'cover_image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&h=450&fit=crop',
                'category' => 'Info Sipil',
                'is_published' => true,
                'views' => 210,
                'published_at' => now()->subDays(2),
            ]
        ];
 
        foreach ($articles as $art) {
            $art['slug'] = Str::slug($art['title']);
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }
 
        // 5. Create Mock Leads
        $leads = [
            [
                'name' => 'Budi Santoso',
                'phone' => '081234567890',
                'email' => 'budi.santoso@example.com',
                'project_type' => 'Bangun Baru',
                'estimated_budget' => 750000000.00,
                'message' => 'Rencana mau membangun rumah 2 lantai luas bangunan sekitar 150 meter persegi di daerah Sleman.',
                'status' => 'New',
            ],
            [
                'name' => 'Siti Aminah',
                'phone' => '089876543210',
                'email' => 'siti.aminah@example.com',
                'project_type' => 'Renovasi',
                'estimated_budget' => 120000000.00,
                'message' => 'Ingin merenovasi area dapur dan menambah dak jemuran di lantai 2.',
                'status' => 'Contacted',
            ]
        ];
 
        foreach ($leads as $lead) {
            Lead::firstOrCreate(['email' => $lead['email']], $lead);
        }
 
        // 6. Create Mock Testimonials
        $testimonials = [
            [
                'name' => 'David Miller',
                'company' => 'Pemilik Villa Canggu',
                'content' => 'Sangat terbantu dengan sistem tahapan kerja pembangunan yang terstruktur dan transparansi RAB-nya. Seluruh pengerjaan terdokumentasi dengan sangat baik.',
                'rating' => 5,
                'avatar' => 'DM'
            ],
            [
                'name' => 'Ahmad Hidayat',
                'company' => 'Manajer Operasional PT Logistik Prima',
                'content' => 'RAB dikunci sejak awal kontrak kerja resmi (SPK). Struktur jembatan logistik kami selesai 2 minggu lebih cepat dari target dengan kekuatan beton prima.',
                'rating' => 5,
                'avatar' => 'AH'
            ],
            [
                'name' => 'dr. Kusuma',
                'company' => 'Kepala Layanan Puskesmas Rawat Inap',
                'content' => 'Layanan estimasi RAB awal via kalkulator website sangat responsif, tim teknik sipilnya sangat kooperatif membantu kelancaran renovasi gedung.',
                'rating' => 5,
                'avatar' => 'DK'
            ],
            [
                'name' => 'Bambang Pamungkas',
                'company' => 'Pemilik Rumah Tinggal (Jakarta)',
                'content' => 'Pengerjaan finishing interior mewah rumah kami diselesaikan dengan sangat rapi dan presisi tinggi. Terima kasih PT Alam Kharisma Bersaudara!',
                'rating' => 5,
                'avatar' => 'BP'
            ]
        ];
 
        foreach ($testimonials as $test) {
            Testimonial::firstOrCreate(['name' => $test['name']], $test);
        }
 
        // 7. Create Mock Videos
        $videos = [
            [
                'title' => 'Pembangunan Menara Office Apex Jakarta',
                'video_url' => 'https://www.youtube.com/embed/3A3aT6r1x6w',
                'description' => 'Video dokumentasi pengerjaan struktur beton gedung kantor 12 lantai.'
            ],
            [
                'title' => 'Modern Luxury Villa Canggu Tour',
                'video_url' => 'https://www.youtube.com/embed/yGcwSC8Z6_c',
                'description' => 'Footage cinematic penataan lanskap eksterior dan finishing interior villa mewah.'
            ],
            [
                'title' => 'Konstruksi Jembatan & Jalan Rigid Pasuruan',
                'video_url' => 'https://www.youtube.com/embed/7XlTdbK5tL4',
                'description' => 'Dokumentasi time-lapse proyek rigid pavement dan jembatan beton.'
            ]
        ];
 
        foreach ($videos as $vid) {
            Video::firstOrCreate(['title' => $vid['title']], $vid);
        }
    }
}
