<?php

namespace App;
use Order;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
	
	protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    protected $primaryKey = 'id';
     
     
    protected $fillable = [
        'name', 'phone', 'password', 'remember_token'
    ];
	
	protected $visible = [
		'id','name','phone'
	];
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        'id','is_admin'
    ];
	
	public function orders(){
		return $this->hasMany(Order::class);
	}
}
