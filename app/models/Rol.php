<?php

class Rol extends \Eloquent
{
    protected $fillable = ['name', 'description', 'permissions', 'status'];

    //relaciones
    public function users()
    {
        return $this->hasMany('User');
    }
    //fin relaciones
}