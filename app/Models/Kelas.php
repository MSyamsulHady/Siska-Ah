<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id_kelas';
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas', 'ruangan'];



    public function guru()
    {
        return $this->hasOne(Guru::class, 'id_guru');
    }
    public function semester()
    {
        return $this->hasOne(Semester::class, 'id_semester');
    }
}
