<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class disponibleVehicule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'disponibleVehicule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update car';

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
     DB::table('vehicules')->where('dateFinL','<=',now()->toDateString())
       ->update([
           'disponibilite'=>'0'
       ]);
     
    }
}
