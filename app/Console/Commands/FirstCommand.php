<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FirstCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:nbrb {currency?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('oolloo');

        // if(!$this->argument('currency')){
        //     // $currency = $this->secret('Which valuta?');
        //     // $currency = $this->confirm('Which valuta?');
        //     $currency = $this->anticipate('Which valuta?', ['usd, ne usd']);
        //     $this->info($currency);
        // }
        // $this->argument('currency');
        // $this->argument('');
        // $this->info($this->argument('currency'));
        return 0;
    }
}
