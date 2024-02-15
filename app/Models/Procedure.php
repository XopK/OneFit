<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_procedure',
        'description',
        'photo_spa',
        'id_user',
        'cost',
    ];

    protected $table = 'spa_procedures';

    public function users()
    {
        return $this->hasOne(User::class, 'id_user');
    }
}
