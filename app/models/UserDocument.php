<?php

class UserDocument extends \Eloquent
{
    protected $fillable = ['user_id', 'document_id', 'path', 'status'];

    //relaciones
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function document()
    {
        return $this->belongsTo('Document');
    }
    //fin relaciones
}