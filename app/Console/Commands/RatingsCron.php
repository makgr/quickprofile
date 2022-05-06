<?php

namespace App\Console\Commands;

use App\Models\Register;
use Illuminate\Console\Command;

class RatingsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:cron';

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
        $users = Register::select("*")
                ->where("id", "!=", 0)
                ->get();

        

        $newRatings = 0;
        foreach ($users as $key => $value) {
            $increaseValue = rand(1,9);
            $oldratings = $value['ratings'];
            $id = $value['id'];
            $newRatings = $oldratings + $increaseValue;
            $users = Register::where("id", "=", $id)
                 ->update(['ratings' => $newRatings]);
        }

    }
}
