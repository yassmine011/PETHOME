<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'montant',
        'date_paiement',
        'methode_paiement',
        'statut',
        'commandes_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_paiement' => 'date',
    ];

    /**
     * Get the commande that owns the paiement.
     */
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commandes_id');
    }
}
