<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_main_menu',
        'id_sub_menu',
        'product_name',
        'price',
        'name_details',
        'name_details_more',
        'product_home',
        'status_product',
        'images'
    ];
}
