<?php

use App\Models\Invoice;
use App\Models\Restock;
use App\Models\Stock;

function def()
{
    return true;
}


function money($money)
{
    return '₦ ' . number_format($money);
}

function itemQty($id)
{
   $balance = Restock::where('item_id', $id)->sum('quantity') - Invoice::where('item_id', $id)->sum('qty');
    return $balance;
}
