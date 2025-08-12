<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate {--force : Force regeneration even if files exist}';
    protected $description = 'Generate XML sitemaps for SEO optimization';

    protected $sitemaps = [
        'main' => 'sitemap.xml',
        'pages' => 'sitemap-pages.xml',
        'posts' => 'sitemap-posts.xml',
        'products' => 'sitemap-products.xml',
    ];

    public function handle()
    {
        $this->info('🗺️  Generating sitemaps for Los Llanos website...');
        
        $force = $this->option('force');
        
        // Generate individual sitemaps
        $this->generateMainSitemap($force);
        $this->generatePagesSitemap($force);
        $this->generatePostsSitemap($force);
        $this->generateProductsSitemap($force);
        
        // Generate sitemap index
        $this->generateSitemapIndex($force);
        
        $this->info('✅ All sitemaps generated successfully!');
        $this->showSitemapInfo();
    }

    protected function generateMainSitemap($force)
    {
        $file = public_path($this->sitemaps['main']);
        
        if (!$force && File::exists($file)) {
            $this->line("⚠️  Main sitemap exists, use --force to regenerate");
            return;
        }

        $xml = $this->createXmlHeader();
        
        // Homepage - highest priority
        $xml .= $this->createUrlEntry(
            route('home'),
            Carbon::now(),
            'daily',
            '1.0'
        );

        // Main sections
        $mainPages = [
            ['route' => 'productos', 'changefreq' => 'weekly', 'priority' => '0.9'],
            ['route' => 'blog-de-caza', 'changefreq' => 'daily', 'priority' => '0.8'],
            ['route' => 'productos.aves-de-caza', 'changefreq' => 'weekly', 'priority' => '0.8'],
            ['route' => 'quienes-somos', 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['route' => 'contact.index', 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['route' => 'reviews.index', 'changefreq' => 'weekly', 'priority' => '0.6'],
        ];

        foreach ($mainPages as $page) {
            if (Route::has($page['route'])) {
                $xml .= $this->createUrlEntry(
                    route($page['route']),
                    Carbon::now()->subDays(rand(1, 30)),
                    $page['changefreq'],
                    $page['priority']
                );
            }
        }

        $xml .= $this->createXmlFooter();
        
        File::put($file, $xml);
        $this->line("✅ Generated: {$this->sitemaps['main']}");
    }

    protected function generatePagesSitemap($force)
    {
        $file = public_path($this->sitemaps['pages']);
        
        if (!$force && File::exists($file)) {
            $this->line("⚠️  Pages sitemap exists, use --force to regenerate");
            return;
        }

        $xml = $this->createXmlHeader();
        
        // Product pages
        $productPages = [
            ['route' => 'productos.aves-de-caza.perdices', 'name' => 'Perdices', 'priority' => '0.8'],
            ['route' => 'productos.aves-de-caza.faisanes', 'name' => 'Faisanes', 'priority' => '0.8'],
            ['route' => 'productos.aves-de-caza.codornices', 'name' => 'Codornices', 'priority' => '0.8'],
            ['route' => 'productos.aves-de-caza.palomas', 'name' => 'Palomas', 'priority' => '0.8'],
            ['route' => 'productos.sueltas', 'name' => 'Tiradas y Sueltas', 'priority' => '0.7'],
        ];

        foreach ($productPages as $page) {
            if (Route::has($page['route'])) {
                $xml .= $this->createUrlEntry(
                    route($page['route']),
                    Carbon::now()->subDays(rand(7, 30)),
                    'weekly',
                    $page['priority']
                );
            }
        }

        // Legal pages
        $legalPages = [
            ['route' => 'politica-privacidad', 'priority' => '0.3'],
            ['route' => 'terminos-condiciones', 'priority' => '0.3'],
        ];

        foreach ($legalPages as $page) {
            if (Route::has($page['route'])) {
                $xml .= $this->createUrlEntry(
                    route($page['route']),
                    Carbon::now()->subMonths(rand(1, 6)),
                    'yearly',
                    $page['priority']
                );
            }
        }

        $xml .= $this->createXmlFooter();
        
        File::put($file, $xml);
        $this->line("✅ Generated: {$this->sitemaps['pages']}");
    }

    protected function generatePostsSitemap($force)
    {
        $file = public_path($this->sitemaps['posts']);
        
        if (!$force && File::exists($file)) {
            $this->line("⚠️  Posts sitemap exists, use --force to regenerate");
            return;
        }

        $xml = $this->createXmlHeader();
        
        // Get published posts
        try {
            $posts = Post::where('status', 'published')
                        ->orderBy('created_at', 'desc')
                        ->get();
            
            foreach ($posts as $post) {
                $xml .= $this->createUrlEntry(
                    route('blog-de-caza.show', $post->slug),
                    $post->updated_at ?? $post->created_at,
                    'monthly',
                    '0.7'
                );
            }
            
            $this->line("📝 Added {$posts->count()} blog posts to sitemap");
        } catch (\Exception $e) {
            $this->warn("⚠️  Could not fetch posts: " . $e->getMessage());
            // Add manual blog entries if database is not accessible
            $this->addManualBlogEntries($xml);
        }

        $xml .= $this->createXmlFooter();
        
        File::put($file, $xml);
        $this->line("✅ Generated: {$this->sitemaps['posts']}");
    }

    protected function generateProductsSitemap($force)
    {
        $file = public_path($this->sitemaps['products']);
        
        if (!$force && File::exists($file)) {
            $this->line("⚠️  Products sitemap exists, use --force to regenerate");
            return;
        }

        $xml = $this->createXmlHeader();
        
        // Product categories with detailed information
        $products = [
            [
                'url' => route('productos.aves-de-caza.perdices'),
                'lastmod' => Carbon::now()->subDays(7),
                'changefreq' => 'weekly',
                'priority' => '0.9',
                'images' => [
                    asset('images/general/perdiz-volando.webp'),
                    asset('images/general/cazador-perdiz.webp'),
                ]
            ],
            [
                'url' => route('productos.aves-de-caza.faisanes'),
                'lastmod' => Carbon::now()->subDays(14),
                'changefreq' => 'weekly',
                'priority' => '0.9',
                'images' => [
                    asset('images/general/faisan-volando.webp'),
                    asset('images/general/cazador-faisan.webp'),
                ]
            ],
            [
                'url' => route('productos.aves-de-caza.codornices'),
                'lastmod' => Carbon::now()->subDays(10),
                'changefreq' => 'weekly',
                'priority' => '0.9',
                'images' => [
                    asset('images/general/codornices.webp'),
                    asset('images/general/codorniz-volando.webp'),
                ]
            ],
            [
                'url' => route('productos.aves-de-caza.palomas'),
                'lastmod' => Carbon::now()->subDays(21),
                'changefreq' => 'weekly',
                'priority' => '0.8',
                'images' => [
                    asset('images/general/paloma-volando.webp'),
                ]
            ],
        ];

        foreach ($products as $product) {
            $xml .= $this->createUrlEntry(
                $product['url'],
                $product['lastmod'],
                $product['changefreq'],
                $product['priority'],
                $product['images'] ?? []
            );
        }

        $xml .= $this->createXmlFooter();
        
        File::put($file, $xml);
        $this->line("✅ Generated: {$this->sitemaps['products']}");
    }

    protected function generateSitemapIndex($force)
    {
        $file = public_path('sitemap_index.xml');
        
        if (!$force && File::exists($file)) {
            $this->line("⚠️  Sitemap index exists, use --force to regenerate");
            return;
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        foreach ($this->sitemaps as $key => $filename) {
            if (File::exists(public_path($filename))) {
                $xml .= "  <sitemap>\n";
                $xml .= "    <loc>" . url($filename) . "</loc>\n";
                $xml .= "    <lastmod>" . Carbon::now()->toISOString() . "</lastmod>\n";
                $xml .= "  </sitemap>\n";
            }
        }
        
        $xml .= '</sitemapindex>';
        
        File::put($file, $xml);
        $this->line("✅ Generated: sitemap_index.xml");
    }

    protected function createXmlHeader()
    {
        return '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
               '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
    }

    protected function createXmlFooter()
    {
        return '</urlset>';
    }

    protected function createUrlEntry($url, $lastmod, $changefreq, $priority, $images = [])
    {
        $xml = "  <url>\n";
        $xml .= "    <loc>" . htmlspecialchars($url) . "</loc>\n";
        $xml .= "    <lastmod>" . $lastmod->toISOString() . "</lastmod>\n";
        $xml .= "    <changefreq>{$changefreq}</changefreq>\n";
        $xml .= "    <priority>{$priority}</priority>\n";
        
        // Add image information if provided
        foreach ($images as $imageUrl) {
            $xml .= "    <image:image>\n";
            $xml .= "      <image:loc>" . htmlspecialchars($imageUrl) . "</image:loc>\n";
            $xml .= "    </image:image>\n";
        }
        
        $xml .= "  </url>\n";
        
        return $xml;
    }

    protected function addManualBlogEntries(&$xml)
    {
        // Add some example blog entries manually if database is not accessible
        $manualPosts = [
            ['slug' => 'caza-perdiz-roja-consejos', 'date' => Carbon::now()->subDays(30)],
            ['slug' => 'temporada-caza-2024-2025', 'date' => Carbon::now()->subDays(60)],
            ['slug' => 'mejores-tecnicas-caza-codorniz', 'date' => Carbon::now()->subDays(90)],
        ];
        
        foreach ($manualPosts as $post) {
            if (Route::has('blog-de-caza.show')) {
                $xml .= $this->createUrlEntry(
                    route('blog-de-caza.show', $post['slug']),
                    $post['date'],
                    'monthly',
                    '0.7'
                );
            }
        }
    }

    protected function showSitemapInfo()
    {
        $this->newLine();
        $this->info('📋 SITEMAP INFORMATION:');
        
        foreach ($this->sitemaps as $name => $filename) {
            $file = public_path($filename);
            if (File::exists($file)) {
                $size = File::size($file);
                $this->line("📄 {$filename}: " . number_format($size) . " bytes");
            }
        }
        
        $indexFile = public_path('sitemap_index.xml');
        if (File::exists($indexFile)) {
            $size = File::size($indexFile);
            $this->line("📄 sitemap_index.xml: " . number_format($size) . " bytes");
        }
        
        $this->newLine();
        $this->info('🔗 SITEMAP URLs:');
        $this->line('Main: ' . url('sitemap_index.xml'));
        $this->line('Individual: ' . url('sitemap.xml'));
        
        $this->newLine();
        $this->info('📝 NEXT STEPS:');
        $this->line('1. Submit sitemap_index.xml to Google Search Console');
        $this->line('2. Add sitemap URL to robots.txt');
        $this->line('3. Set up automatic regeneration with cron job');
    }
}
