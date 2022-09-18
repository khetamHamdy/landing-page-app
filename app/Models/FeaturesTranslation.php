<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturesTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    public $timestamps = false;
}
