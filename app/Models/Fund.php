<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','user_id','status','last_name','transfer_type','to','from','balance','transfer_mode','transfer_amount','bank_name','branch','city','date'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
