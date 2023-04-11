<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'genre',
        'hebergement',
        'situation_familiale',
        'adresse',
        'ville', 'departement', 'montant_facture', 'reste_a_vivre',
    ];
}
