<?php

namespace App\Services;

use App\Models\Currency;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class CurrencyService {

    protected $currencyService;

    public function __construct(Currency $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    //getting currencies from NBP api:
    public function getAllCurrency()
    {
        $url ='http://api.nbp.pl/api/exchangerates/tables/A?format=json';
        
        $response = Http::get($url);

        $datas = json_decode($response, true);
        
        $currencies = $datas[0]['rates'];
        
        foreach($currencies as $currency=>$items)
            {
                $currency = Currency::where('name', '=', $items['currency'])->first();

                if ($currency === null) {
                    Currency::create([
                    'name' => $items['currency'],
                    'currency_code' => $items['code'],
                    'exchange_rate' => $items['mid']
                    ]);
                } else {
                    Currency::where('name', $items['currency'])->update(['exchange_rate'=> $items['mid']]);
                }    
            };
                        
        return $allCurrencies = Currency::orderBy('name')->get();   
    }
}
