<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function TransactionDetails(){
        return $this->hasMany(TransactionDetails::class,'product_id');
    }
}
