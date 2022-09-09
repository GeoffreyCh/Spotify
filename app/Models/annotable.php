<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annotable extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'album_id',
        'artiste_id',
        'musique_id',
        'groupe_id',
        'playlist_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'album_id' => 'integer',
        'artiste_id' => 'integer',
        'musique_id' => 'integer',
        'groupe_id' => 'integer',
        'playlist_id' => 'integer',
    ];

    public function annotations()
    {
        return $this->hasMany(Annotation::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function artiste()
    {
        return $this->belongsTo(Artiste::class);
    }

    public function musique()
    {
        return $this->belongsTo(Musique::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
