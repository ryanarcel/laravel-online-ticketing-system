<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    public function solicitor()
    {
        return $this->belongsTo(Solicitor::class);
    }

    public function entries(){
        return $this->hasMany(Entry::class);
    }
}
