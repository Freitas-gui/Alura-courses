<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Season extends Model
{
    public $timestamps = false;
    protected $fillable = ['number'];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getEpisodesWatched(): Collection
    {
        return $this->episodes->filter(function (Episode $episode){
            return $episode->watched;
        });
    }
}
