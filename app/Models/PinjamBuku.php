<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PinjamBuku extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pinjam_buku';
    protected $guarded = ['id'];

    public function murid()
    {
        return $this->belongsTo(Murid::class,'murid_id','id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class,'buku_id','id');
    }
}
