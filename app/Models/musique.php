<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musique extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre',
        'duree',
        'filepath',
        'extension',
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
        return $this->belongsToMany(Artiste::class);
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_musique');
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function annotables()
    {
        return $this->hasMany(Annotable::class);
    }
}
