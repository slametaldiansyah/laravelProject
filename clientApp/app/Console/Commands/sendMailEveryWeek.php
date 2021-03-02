<?php

namespace App\Console\Commands;

use App\Models\Email;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendMailEveryWeek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a weekly email to all users';

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
        $value = 'message from project-tracking';

        $listMail = Email::where('email_config_id', 8)->get();
        if ($listMail == true) {
            foreach ($listMail as $l) {
                Mail::raw("{$value}", function ($mail) use ($l) {
                    $mail->from('projecttrac6@gmail.com', 'Project-Tracking');
                    $mail->to($l->email)->subject('send messages every week');
                });
                }
                $this->info('sent to All Users');
        }else{
        return 0;
        }
    }
}
