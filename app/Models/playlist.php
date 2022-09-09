<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'description',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public function musiques()
    {
        return $this->belongsToMany(Musique::class);
    }

    public function annotables()
    {
        return $this->hasMany(Annotable::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
