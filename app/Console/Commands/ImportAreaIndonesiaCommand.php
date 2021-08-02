<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportAreaIndonesiaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:area';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Area Indonesia';

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
        try{
            DB::unprepared(file_get_contents('database/migrations/area_indonesia.sql'));
            $this->info('Success Import');
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
        return 0;
    }
}
