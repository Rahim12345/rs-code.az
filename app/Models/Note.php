<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title_en', 'title_az', 'body_en', 'body_az', 'note_category_id'];

    public function category()
    {
        return $this->belongsTo(NoteCategory::class, 'note_category_id');
    }
}
