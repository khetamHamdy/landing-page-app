<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'abilities'];
    protected $casts = ['abilities' => 'array'];

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
}
