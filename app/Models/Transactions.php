<?php

namespace App\Models;

use App\Helpers\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $guarded = ['harga_diskon'];


    public const ORDERCODE = 'INVC';

    public function TransactionDetails(){
        return $this->hasMany(TransactionDetails::class,'transaction_id');
    }

    public function product(){
        return $this->belongsToMany(Products::class, 'transaction_details', 'transaction_id', 'product_id')->withPivot('id');
    }

    public function courier(){
        return $this->belongsTo(Couriers::class, 'courier_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getImageAttribute()
    {
        return $this->proof_of_payment ? asset('storage/' . $this->proof_of_payment) : asset('assets/img/default-thumbnail.jpg');
    }

    public static function generateCode()
	{
		$dateCode = self::ORDERCODE . '/' . date('Ymd') . '/' .General::integerToRoman(date('m')). '/' .General::integerToRoman(date('d')). '/';

		$lastOrder = self::select([\DB::raw('MAX(transactions.code) AS last_code')])
			->where('code', 'like', $dateCode . '%')
			->first();
            // dd($lastOrder);

		$lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;
		
		$orderCode = $dateCode . '00001';
		if ($lastOrderCode) {
			$lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
			$nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);
			
			$orderCode = $dateCode . $nextOrderNumber;
		}

		if (self::_isOrderCodeExists($orderCode)) {
			return generateOrderCode();
		}

		return $orderCode;
	}

    private static function _isOrderCodeExists($orderCode)
	{
		return Transactions::where('code', '=', $orderCode)->exists();
	}
}
