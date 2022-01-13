<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function solicitors()
    {
        return $this->hasMany(Solicitor::class);
    }

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
