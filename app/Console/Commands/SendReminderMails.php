<?php

namespace App\Console\Commands;

use App\Mail\reminderMail;
use App\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendReminderMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        /* here we have to check and send mails */
        while (true) {
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
                sleep(1);
            });
            sleep(24*60*60);
        }
        return 0;
    }
}
