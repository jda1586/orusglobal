<?php

class UserDetail extends \Eloquent
{
    protected $fillable = ['user_id', 'name', 'lastname', 'address', 'zipcode', 'country_id', 'state_id', 'city_id', 'phone', 'email', 'birthday', 'gender'];

    //relaciones
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function country()
    {
        return $this->belongsTo('Country');
    }

    public function state()
    {
        return $this->belongsTo('State');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }
    //fin relaciones
}