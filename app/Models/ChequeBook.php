<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeBook extends Model
{
    use HasFactory;
    protected $fillable = ['branch','date','account_no','account_type','bank_name','city'];
}
