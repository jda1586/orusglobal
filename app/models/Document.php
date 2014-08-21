<?php

class Document extends \Eloquent
{
    protected $fillable = ['name', 'description', 'status'];

    // relaciones
    public function items()
    {
        return $this->hasMany('UserDocument');
    }
    // fin relaciones
}