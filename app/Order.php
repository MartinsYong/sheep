<?php

namespace App;

use User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
	
	protected $visible = ['id','owner','picker','origin','dest','description','updated_at','setout_time','taken','owner_phone','owner_name','picker_phone','picker_name'];
	
	protected $fillable = ['owner','picker','origin','dest','description','updated_at','setout_time'];
	
	public function users(){
		return $this->belongsToMany(App\User);
	}
}
