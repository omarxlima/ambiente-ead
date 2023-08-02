<?php

namespace App\Observers;

use App\Models\Lesson;

use Illuminate\Support\Str;

class LessonObserver
{
    /**
     * Handle the Lesson "created" event.
     */
    public function creating(Lesson $lesson): void
    {
        $lesson->id = Str::uuid();
        $lesson->url = Str::slug($lesson->name);

    }

    public function updating(Lesson $lesson): void
    {
        $lesson->id = Str::uuid();
    }



}
