<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KirimEmail extends Model
{
    use HasFactory;
    protected $table = 'kirim_email';
    protected $guarded = ['id'];
}
