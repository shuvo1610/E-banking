<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','first_name','salary','date_of_birth','designation','employee_id'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
