<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    // Relación: un cliente tiene muchas incidencias
    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public function invoices()
{
    return $this->hasMany(Invoice::class);
}
}