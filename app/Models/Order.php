<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Order extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = ['payment_status'];


}
