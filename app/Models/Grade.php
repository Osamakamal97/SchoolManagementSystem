<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{

    use HasTranslations;

    protected $fillable = ['name', 'notes', 'status'];
    protected $hidden = ['created_at', 'updated_at'];
    public $translatable = ['name'];

}
