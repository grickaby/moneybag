<?php

/*
 * This uses Alpha Vantage API to get current stock prices
 * 
 * Use: <?php $Stocks->displayPrice('RBQ17%2ENYM', 'S72D0SUS99HASM98'); ?>
 * 
 */

Class Stock {

    private function getStock($time, $symbol, $apiKey) {

        $ch = curl_init("https://www.alphavantage.co/query?function={$time}&symbol={$symbol}&outputsize=compact&interval=1min&apikey={$apiKey}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));


        if (curl_exec($ch) === false) {
            echo 'Curl error: ' . curl_error($ch);
        }
        
        return curl_exec($ch);
    }
    
    private function stockHistory($symbol, $apiKey) {
        $result = $this->getStock('TIME_SERIES_DAILY', $symbol, $apiKey);
        $json = json_decode($result, true);
        
        $openPrice = array_shift($json["Time Series (Daily)"]);
        $listPrice = $openPrice["4. close"];
        
        return $listPrice;
    }

    public function displayPrice($symbol, $apiKey) {

        $result = $this->getStock('TIME_SERIES_INTRADAY', $symbol, $apiKey);
        $json = json_decode($result, true);

//Get Stock Current Price and Previous Price
        $thePrice = array_shift($json["Time Series (1min)"]);
        $curPrice = $thePrice["1. open"];
        $lastPrice = $this->stockHistory($symbol, $apiKey);

//Subtrack current price from last price
        $roundPrice = round($curPrice - $lastPrice, PHP_ROUND_HALF_EVEN);

        if ($curPrice < $lastPrice) {
            echo "<div class='red'>$roundPrice</div>";
        } else {
            echo "<div class='green'>$roundPrice</div>";
        }
    }

}

$Stocks = new Stock();
