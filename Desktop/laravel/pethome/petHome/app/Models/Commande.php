<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_commandea',
        'statut',
        'user_id',
        'animaux_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_commandea' => 'datetime',
    ];

    /**
     * Get the user that owns the commande.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the animal that is ordered.
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animaux_id');
    }

    /**
     * Get the paiement for the commande.
     */
    public function paiement()
    {
        return $this->hasOne(Paiement::class, 'commandes_id');
    }
}
