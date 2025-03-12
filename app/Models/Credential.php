<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    function getCustomer(){
        return $this->belongsTo(Customer::class,"customer_id","id");
    }
}
