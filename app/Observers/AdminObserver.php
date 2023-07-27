<?php

namespace App\Observers;

use App\Models\Admin;

use Illuminate\Support\Str;

class AdminObserver
{
    /**
     * Handle the Admin "created" event.
     */
    public function creating(Admin $admin): void
    {
        $admin->id = Str::uuid();
    }


}
