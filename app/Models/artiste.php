<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'date_deces',
        'nationalite',
        'pseudo',
        'photo',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_deces' => 'date',
    ];

    public function musiques()
    {
        return $this->belongsToMany(Musique::class);
    }

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_artiste');
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }

    public function annotables()
    {
        return $this->hasMany(Annotable::class);
    }
}
