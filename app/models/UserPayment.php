<?php

class UserPayment extends \Eloquent
{
    protected $fillable = ['user_id', 'details', 'status'];

    //relaciones
    public function user()
    {
        return $this->belongsTo('User');
    }
    //fin relaciones
}