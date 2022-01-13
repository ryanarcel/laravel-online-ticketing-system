<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $table = "entries";
    protected $fillable = ["attendee_id", "sponsor_id", "cost", "ticket_no", "payment_refNo"];

    public function attendee(){
        return $this->belongsTo(Attendee::class);
    }

    public function sponsor(){
        return $this->belongsTo(Sponsor::class);
    }
}
