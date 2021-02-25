<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function Transactions(){
        return $this->belongsToMany(Transactions::class, 'transaction_details', 'product_id', 'transaction_id')->withPivot('id');
    }

    public function reviews(){
        return $this->hasMany(ReviewProducts::class,'product_id');
    }
}
