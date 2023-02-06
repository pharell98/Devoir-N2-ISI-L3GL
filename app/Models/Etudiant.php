<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public $timestamps=false;
    public function getSm()
    {
        return $this->hasMany(Semestre::class)->hasMany(Matiere::class);
    }

}
