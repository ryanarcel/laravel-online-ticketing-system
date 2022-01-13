<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    protected $table = 'attendees';

    public function entries(){
        return $this->hasMany(Entry::class);
    }

    public function solicitor()
    {
        return $this->belongsTo(Solicitor::class);
    }
    
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
