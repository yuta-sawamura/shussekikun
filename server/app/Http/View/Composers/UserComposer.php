<?php

namespace App\Http\View\Composers;

use App\Models;
use Illuminate\View\View;
use App\Enums\User as U;
use Auth;

class UserComposer
{
    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'roles' => U\Role::getInstances(),
            'genders' => U\Gender::getInstances(),
            'status' => U\Status::getInstances(),
            'categories' => Models\Category::where('organization_id', Auth::user()->organization_id ?? null)->pluck('name', 'id'),
            'organizations' => Models\Organization::pluck('name', 'id'),
        ]);
    }
}
