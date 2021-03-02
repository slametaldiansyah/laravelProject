<?php

namespace App\Console;

use App\Models\Email_configuration;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        commands\sendMailEveryDay::class,
        commands\sendMailEveryWeek::class,
        commands\sendMailEveryMonth::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->command('sendmail:day')
        //     ->everyTwoMinutes();
        $day = Email_configuration::select('duration')->where('id', 5)->first();
        $week = Email_configuration::select('duration')->where('id', 8)->first();
        $month = Email_configuration::select('duration')->where('id', 8)->first();

        $h = (string)$day->duration;
        $w = $week->duration;
        $m = $month->duration;

        $schedule->command('sendmail:day')
            ->dailyAt("{$h}:00");
        $schedule->command('sendmail:week')
            ->weeklyOn($w, '8:00');
        $schedule->command('sendmail:month')
            ->monthlyOn($m, '8:00');
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
