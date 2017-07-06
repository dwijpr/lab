<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'aya_id', 'number', 'ar', 'tr',
    ];

    public function latin() {
        $ar = $this->ar;
        $translator = new Translator($ar);
        return $translator->translation;
    }
}
