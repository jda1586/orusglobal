<?php

class Country extends \Eloquent
{
    protected $fillable = ['name', 'language'];

    //relaciones
    public function states()
    {
        return $this->hasMany('State');
    }
    //fin relaciones
}