<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Buku extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'buku';
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'rak_id');
    }
}
