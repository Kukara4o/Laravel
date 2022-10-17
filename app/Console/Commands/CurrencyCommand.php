<?php

namespace App\Console\Commands;

use App\Mail\CurrencyMail;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class CurrencyCommand extends Command
{

protected $signature = 'currency:mail {currency?}';


protected $description = 'meaw';


public function handle()
{
try{
$actualCurrencies = Http::get('https://www.nbrb.by/api/exrates/rates?periodicity=0')->json();
} catch(ConnectionException $exception){
$this->error('Попытка не удалась.');
return 0;
}

$currencies = $actualCurrencies;
$currenciesExist = [];
$rates =[];

foreach ($currencies as $currencyKey => $actualCurrency){
$currenciesExist[$actualCurrency['Cur_Abbreviation']] = $actualCurrency['Cur_Abbreviation'];
$rates[$actualCurrency['Cur_Abbreviation']]=$actualCurrency['Cur_OfficialRate'];
}

$currenciesIs = implode(' ', $currenciesExist);

if(!$this->argument('currency')){
$currencyPick = $this->ask("Доступные валюты: $currenciesIs");
}else{
$currencyPick = $this->argument('currency');
}


$currencyParams = [
'name' => $currencyPick,
'rate' => $rates[$currencyPick],
];

$mail = new CurrencyMail($currencyParams);
Mail::send($mail);
$this->info('Сообщение отправлено!');

return 0;
}
}