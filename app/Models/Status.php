<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $fillable = [
        'title_status',
    ];

    use HasFactory;

    public function Application()
    {
        return $this->hasMany(Application::class, 'id_status');
    }
}
