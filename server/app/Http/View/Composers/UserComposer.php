<?php

namespace App\Http\View\Composers;

use App\User;
use App\Models;
use Illuminate\View\View;
use Illuminate\Contracts\Auth\Guard;
use App\Enums\User as U;
use Auth;

class UserComposer
{
    /**
     * @var String
     */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

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
            //'stores' => Models\Store::where('organization_id', Auth::user()->organization_id)->pluck('name', 'id'),
            'categories' => Models\Category::where('organization_id', Auth::user()->organization_id)->pluck('name', 'id'),
            'organizations' => Models\Organization::pluck('name', 'id'),
        ]);
    }
}
