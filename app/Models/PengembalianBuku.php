<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengembalianBuku extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'pengembalian_buku';
    protected $guarded = [''];

    public function murid()
    {
        return $this->belongsTo(Murid::class,'murid_id','id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class,'buku_id','id');
    }
}
