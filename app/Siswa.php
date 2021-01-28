<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JenisKelamin;

class Siswa extends Model
{
    public function jk() {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id', 'id');
    }
}
