<?php

/**
 * Utility class to convert local currency to US Dollars. Exchange rates are set in currency.ini
 */
class CurrencyConvert
{
    function __construct()
    {
        $currencyIni = eZINI::instance("currency.ini");
        $shopIni = eZINI::instance("shop.ini");

        $this->ExchangeRates = $currencyIni->variable("USDExchangeRate", "ExchangeRate");
        $this->SiteAccessCurrency = $shopIni->variable("CurrencySettings", "PreferredCurrency");
    }

    public function toUSD($amount)
    {
        $exchangeRate = $this->ExchangeRates[$this->SiteAccessCurrency];
        if (!$exchangeRate) {
            return false;
        }

        $usd = $exchangeRate * $amount;
        return round($usd, 2);
    }

    private $ExchangeRates = false;
    private $SiteAccessCurrency = false;
}