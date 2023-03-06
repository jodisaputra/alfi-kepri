<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplatePage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pages()
    {
        return $this->hasMany(Pages::class);
    }
}
