<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'title', 'description', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
