<?php

namespace App\Console;

use App\Models\EmailVerificationCode;
use App\Models\PasswordResetCode;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('sanctum:prune-expired --hours=24')->daily();

        $schedule->call(function () {
            EmailVerificationCode::where('created_at', '<', now()->subHour())->delete();
        })->everyMinute();

        $schedule->call(function () {
            PasswordResetCode::where('created_at', '<', now()->subHour())->delete();
        })->everyMinute();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');


        require base_path('routes/console.php');
    }
}
