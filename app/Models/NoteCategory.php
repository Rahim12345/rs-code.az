<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteCategory extends Model
{
    protected $fillable = ['name_en', 'name_az'];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
