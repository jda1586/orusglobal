<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;

    protected $fillable = ['name', 'rol_id', 'terms', 'staus'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    //relaciones
    public function details()
    {
        return $this->hasOne('UserDetails');
    }

    public function documents()
    {
        return $this->hasMany('UserDocument');
    }

    public function payments()
    {
        return $this->hasMany('UserPayment');
    }

    public function rol()
    {
        return $this->belongsTo('Rol');
    }
    //fin relaciones

}
