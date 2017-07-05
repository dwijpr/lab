<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quran extends Model
{
    protected $connection = 'andi.indopak';
    protected $table = 'quran';
}
