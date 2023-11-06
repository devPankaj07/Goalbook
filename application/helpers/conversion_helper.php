<?php
// Helper function to convert USD to INR for an array of objects
function usd_to_inr_array($array)
{
    $exchangeRate = 80;
    foreach ($array as $item) {
        $dollar = $item->amount;
        $inrAmount = $dollar * $exchangeRate;
        $item->inr_amount = $inrAmount;
    }
    
    return $array;
}
?>