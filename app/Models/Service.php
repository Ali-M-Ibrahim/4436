<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    function getCustomers(){
        return $this->belongsToMany(
            Customer::class, // related model
            "customer_services", // pivot table name
            "service_id", // current model FK
            "customer_id" // related model FK
        );
    }
}
