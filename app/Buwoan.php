<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buwoan extends Model
{
    protected $fillable = ['nama_tamu', 'alamat_tamu', 'isi_buwoan', 'user_id'];
}
