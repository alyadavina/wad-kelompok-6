<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'beasiswa_id', 
        'userId', 
        'comment'];

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'userId');
    }

    
}
// kajd