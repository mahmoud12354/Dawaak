<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bestseller extends Model
{
    use HasFactory;
    protected $fillable = ['title','price','image', 'highlights', 'about', 'dosage', 'indications', 'specifications'];

}
