<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
    protected $connection = 'andi.kata';
    protected $table = 'quran';
}
