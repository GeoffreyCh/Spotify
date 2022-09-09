<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'nationalite',
        'date_creation',
        'date_destruction',
        'photo',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_destruction' => 'date',
    ];

    public function artistes()
    {
        return $this->belongsToMany(Artiste::class);
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_groupe');
    }

    public function musiques()
    {
        return $this->belongsToMany(Musique::class);
    }

    public function annotables()
    {
        return $this->hasMany(Annotable::class);
    }
}
