<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sura extends Model
{
    protected $fillable = [
        'id', 'name', 'arti', 'ar',
    ];

    public function translation() {
        $ar = $this->ar;
        $translator = new Translator($ar);
        return $translator->translation;
    }
    
    public function ayas() {
        return $this->hasMany(Aya::class);
    }

    public function image() {
        return '/img/quran_s_name/sname_' . $this->id . '.png';
    }
}
