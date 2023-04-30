<?php

namespace App\Console;
use App\Models\Website;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       
// Schedule to run every minute
$schedule->command('website:check-close-time')->everyMinute();

// $schedule->call(function () {
//     $webclose = Website::first();
//     $currentTime = now();
//     $webcloseTime = $webclose->data_time;
    
//     if ($currentTime >= $webcloseTime) {
//         $webclose->actv=1;
//         $webclose->save();
//         // Check the box and submit form
//         $script = "<script> 
//             $('input[name=\"maintenance_mode\"]').prop('checked', true);
//             $('form').submit();
//         </script>";
        
//         return $script;
//     }
// })->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
