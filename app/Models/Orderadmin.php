<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Orderadmin extends Model
{
    use HasFactory;
    use CrudTrait;
    protected $table = 'orders';
    protected $fillable = ['payment_status'];

    public function getItemPriceAttribute ($value) {
        $value = 'Rp'.number_format($value, 2, ',', '.');
        return $value;
    }

    public function getTotalPriceAttribute ($value) {
        $value = 'Rp'.number_format($value, 2, ',', '.');
        return $value;
    }

    public function getItemNameAttribute ($value) {
        $value = ucfirst($value);
        return $value;
    }

    public function getPaymentStatusAttribute ($value) {
        if ($value==1) {
            $value = 'Menunggu Pembayaran';
            return $value;
        }
        if ($value==2) {
            $value = 'Sudah dibayar';
            return $value;
        }
        if ($value==3) {
            $value = 'Kadaluarsa';
            return $value;
        }
    }
}
