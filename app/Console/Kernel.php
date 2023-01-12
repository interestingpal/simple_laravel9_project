<?php

namespace App\Console;

use App;
use Illuminate\Support\Facades\DB;
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
        $schedule->call(function (){
            
            /**
             * Job to check expirationDate and set status of job to expired every day.
             */
            $date = today()->format('Y-m-d');
            $expiredStatus = DB::table('job_statuses')->whereIn(DB::raw('lower(name)'), ['expired'])->limit(1)->get();
            DB::table('jobs')->where('expirationDate', '>=', $date)->update(['job_status' => $expiredStatus]);

        })->dailyAt("01:00");
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
