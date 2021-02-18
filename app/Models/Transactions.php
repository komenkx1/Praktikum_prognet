<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function TransactionDetails(){
        return $this->hasMany(TransactionDetails::class,'transaction_id');
    }
}
