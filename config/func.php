<?php
function formatCurrency($amount, $currencySymbol = '₫', $decimalPlaces = 0)
{
    // Định dạng số, 0 là số thập phân, ',' là dấu phân cách hàng nghìn
    $formattedAmount = number_format($amount, $decimalPlaces, '.', ',');

    // Thêm ký hiệu tiền vào đầu hoặc cuối số
    return  $formattedAmount . ' ' . $currencySymbol;
}
