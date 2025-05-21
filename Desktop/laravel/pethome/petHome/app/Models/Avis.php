<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'commentaire',
        'date_avis',
        'animal_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_avis' => 'date',
    ];

    /**
     * Get the animal that owns the avis.
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}

}
