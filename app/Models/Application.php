<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'id_status',
        'id_procedure',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function isBooked()
    {
        if ($this->id_status == 1 || $this->id_status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
