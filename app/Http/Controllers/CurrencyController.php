<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;

class CurrencyController extends Controller
{

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function index()
    {
        $allCurrencies = $this->currencyService->getAllCurrency();

        return view('currency.index', compact('allCurrencies'));
    }
   
}
