<?php

class City extends \Eloquent
{
    protected $fillable = ['name', 'state_id'];

    //relaciones
    public function state()
    {
        return $this->belongsTo('State');
    }
    //relaciones
}