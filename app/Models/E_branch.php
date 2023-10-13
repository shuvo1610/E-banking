<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E_branch extends Model
{
    use HasFactory;
    protected $fillable = ['branch','district'];

}
