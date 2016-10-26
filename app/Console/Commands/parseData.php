<?php

namespace App\Console\Commands;

use App\Parser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class parseData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importData:run {csvName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importe data from a csv file';

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
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('csvName', InputArgument::REQUIRED, 'Name of csv file'),
        );
    }



    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get the csvName arguments
        $csvName = $this->argument('csvName');


        if($csvName != "null") {
            Parser::parseCsvFile($csvName);
        }
        else{
            echo 'You need to add the csv name as argument';
        }

    }
}
