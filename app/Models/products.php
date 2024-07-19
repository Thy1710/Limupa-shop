<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'promotion',
        'quantity',
        'color',
        'ram',
        'storage',
        'display',
        'battery_capacity',
        'operating_system',
        'image',
        'status',
        'category_id'
    ];
    protected $primarykey = 'id';
    protected $table = 'products';
    public $timestamp = false;

    public function category(){
        return $this->belongsTo(categories::class);
    }

}
