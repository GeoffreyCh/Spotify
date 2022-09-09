<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'genre',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function artistes()
    {
        return $this->belongsToMany(Artiste::class, 'genre_artiste');
    }

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'genre_groupe');
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'genre_album');
    }

    public function musiques()
    {
        return $this->belongsToMany(Musique::class, 'genre_musique');
    }
}
