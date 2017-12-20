<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;

class UserEmailAddress extends Model
{

    protected $guarded = [];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public static function getUserIDByDefaultEmail($email){
    	return Self::select('user_id')
    				->where('is_default', 1)
    				->where('email_address',$email)
    				->first();
    }

    public static function getUserEmailAddress($id)
    {
        $sharePurchase = Self::select()->where('id',$id)
                                       ->where('user_id' , Auth::user()->id)
                                       ->first();
        return $sharePurchase;
    }
}