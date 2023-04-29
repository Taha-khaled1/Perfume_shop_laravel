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
       
        $schedule->call(function () {
            $webclose = Website::first(); // Get the Webclose model instance
            $maintenanceModeValue = 'true'; // The value to set for the maintenance_mode checkbox
        
            // Check if the current time has passed the specified data_time
            if (time() >= strtotime($webclose->data_time)) {
                // Update the Webclose model instance with the new value for maintenance_mode
                $webclose->actv = 1;
                $webclose->save();
        
                // Send a POST request to the admin.updatewebsite route with the maintenance_mode value
                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', route('admin.updatewebsite'), [
                    'form_params' => [
                        'maintenance_mode' => $maintenanceModeValue,
                    ],
                ]);
            }
        })->everyMinute();
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
