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
                // تحديث حالة الموقع
                $webclose = Website::first();
                $webclose->actv = 1;
                $webclose->save();
        
                // أرسل رسالة إشعار أو قم بأي إجراء آخر هنا
            })->when(function () {
                // تحديد الوقت الذي يجب فيه تشغيل الدالة
                $webclose = Website::first();
                return $webclose->data_time <= now();
            });
        
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
