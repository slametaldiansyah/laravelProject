<?php

namespace App\Console\Commands;

use App\Models\Email;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendMailAuto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily email to all users';

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
        $words = [
            'aberration' => 'a state or condition markedly different from the norm',
            'convivial' => 'occupied with or fond of the pleasures of good company',
            'diaphanous' => 'so thin as to transmit light',
            'elegy' => 'a mournful poem; a lament for the dead',
            'ostensible' => 'appearing as such but not necessarily so'
        ];

        // Finding a random word
        $key = array_rand($words);
        $value = $words[$key];

        Mail::raw("{$key} -> {$value}", function ($mail) {
            $mail->from('projecttrac6@gmail.com', 'Project-Tracking');
            $mail->to('aldi24511@gmail.com')->subject('Word of the Day');;
        });

        // $users = Email::all();
        // foreach ($users as $user) {
        //     Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
        //         $mail->from('info@tutsforweb.com');
        //         $mail->to($user->email)
        //             ->subject('Word of the Day');
        //     });
        // }
        $this->info('Word of the Day sent to All Users');
        // return 0;
    }
}
