<?php

namespace App\Console;

// use App\Console\Commands\SendReminderMails;
use App\Jobs\SendReminderMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // SendReminderMails::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->call(function () {
        //     Log::debug('from call from schedule');
        // })->everyMinute();
        // $schedule->command('mail:check')->everyMinute()->runInBackground();
        $schedule->command('mail:check')->everyMinute();
        // $schedule->job(new SendReminderMail)->everyMinute();
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
