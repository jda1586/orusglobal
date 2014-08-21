<?php

class State extends \Eloquent
{
    protected $fillable = ['name', 'country_id'];

    //relaciones
    public function country()
    {
        return $this->belongsTo('Country');
    }

    public function cities()
    {
        return $this->hasMany('City');
    }
    //fin relaciones
}