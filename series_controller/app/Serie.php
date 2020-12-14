<?php


namespace App;

# Eloquent = ORM
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}
