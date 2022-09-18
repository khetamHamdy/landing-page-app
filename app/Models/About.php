<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['image'];
    public $translatedAttributes = ['title', 'description'];
}
