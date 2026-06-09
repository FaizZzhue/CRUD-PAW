<?php

function generateCustomerID()
{
    return 'CUST-' . date('Y') . '-' . rand(1000,9999);
}

function generateTransactionID()
{
    return 'TRX-' . rand(1000,9999);
}