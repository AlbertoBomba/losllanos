<?php

namespace App\Console\Commands;

use App\Models\Review;
use Illuminate\Console\Command;

class TestReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:reviews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test reviews functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->info('Testing Review model...');
            
            $total = Review::count();
            $this->info("Total reviews: {$total}");
            
            $approved = Review::approved()->count();
            $this->info("Approved reviews: {$approved}");
            
            $pending = Review::pending()->count();
            $this->info("Pending reviews: {$pending}");
            
            $featured = Review::featured()->count();
            $this->info("Featured reviews: {$featured}");
            
            $avgRating = Review::approved()->avg('rating');
            $this->info("Average rating: " . round($avgRating, 2));
            
            $this->info('✅ All tests passed!');
            
        } catch (\Exception $e) {
            $this->error('❌ Error: ' . $e->getMessage());
            $this->error('File: ' . $e->getFile() . ':' . $e->getLine());
        }
    }
}
