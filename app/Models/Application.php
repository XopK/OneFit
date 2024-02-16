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
            return 1;
        } elseif($this->id_status == 3) {
            return 2;
        } elseif($this->id_status == 4) {
            return 3;
        }

    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function procedure()
    {
        return $this->belongsTo(Procedure::class, 'id_procedure');
    }
}
