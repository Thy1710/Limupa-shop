<?php

namespace App\Models;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status'];
    protected $primarykey = 'id';
    protected $table = 'categories';
    public $timestamp = false;

    public function Product(){
        return $this->hasMany(products::class);
    }
}
