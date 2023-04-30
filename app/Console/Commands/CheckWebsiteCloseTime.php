<?php

namespace App\Console\Commands;

use App\Models\Website;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckWebsiteCloseTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =  'website:check-close-time';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close the website at a specific time.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $webclose = Website::first();
        $closeTime = $webclose->close_time;
        $now = Carbon::now();
        echo $closeTime . $now ;
        if ($closeTime->format('Y-m-d H:i') === $now->format('Y-m-d H:i')) {
            $webclose->actv = 1;
            $webclose->save();

            $this->info('Website is now closed.');
        } else {
            $this->info('Website is still open.');
        }
    }
}
