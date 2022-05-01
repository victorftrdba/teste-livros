<?php

namespace App\Console\Commands;

use App\Models\Reader;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HappyBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'happy:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command used to send e-mail for birthdays.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = date('d/m');

        $readers = Reader::all()->toArray();

        foreach ($readers as $reader) {
            $birthday = Carbon::parse($reader['birthday'])->format('d/m');

            if ($birthday == $now) {
                new \App\Mail\HappyBirthday($reader);
            }
        }
    }
}
