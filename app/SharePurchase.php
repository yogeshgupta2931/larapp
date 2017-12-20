<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use Carbon\Carbon;

class SharePurchase extends Model
{
	//Enables to accept all fields for create/update operations
    protected $guarded = [];
    //Laravel inbuilt approach to use soft deletes
    use SoftDeletes;

    protected $dates = ['deleted_at'];
   	
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getUserSharePurchase($id)
    {
    	$sharePurchase = Self::select()->where('id',$id)
                                        ->where('user_id' , Auth::user()->id)
                                        ->first();
        return $sharePurchase;
    }
    public function getTransactionDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value, 'America/New_York')->toDateString();
    }

}