<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre',
        'annee',
        'photo',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class);
    }

    public function musiques()
    {
        return $this->belongsToMany(Musique::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_album');
    }

    public function artistes()
    {
        return $this->belongsToMany(Artiste::class);
    }

    public function annotables()
    {
        return $this->hasMany(Annotable::class);
    }
}
