<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'lesson_id', 'name', 'url', 'video', 'description'
    ];

    protected $casts = [
        'id' => 'string',
    ];
    public $incrementing = false;


    public function module(){
        return $this->belongsTo(Module::class);
    }

}
