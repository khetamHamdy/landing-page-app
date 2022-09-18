<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $primaryKey='admin_id';
    protected  $fillable=['style','admin_id' ,'location','phone' ,'email'];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
