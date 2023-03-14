<?php

namespace App\Jobs;

use App\Mail\reminderMail;
use App\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendReminderMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tasks = Task::all();
        $curr_date = now()->format('Y-m-d');
        $tasks->each(function (Task $t) use ($curr_date) {
            if ($t->remind_on != $curr_date) {
                Log::info("NOT sending mail for {$t->id}");
                return;
            }
            Log::info("SENDING sending mail for {$t->id}");

            /* now send the mail */
            Mail::to($t->user->email)->send(new reminderMail($t));
        });
    }
}
