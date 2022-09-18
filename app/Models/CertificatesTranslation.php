<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatesTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'title_job'];
    public $timestamps = false;

}
