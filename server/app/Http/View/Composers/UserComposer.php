<?php

namespace App\Http\View\Composers;

use App\User;
use App\Models\Store;
use App\Models\Category;
use App\Models\Organization;
use Illuminate\View\View;
use Illuminate\Contracts\Auth\Guard;
use App\Enums\User\Role;
use App\Enums\User\Gender;
use App\Enums\User\Status;
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
            'roles' => Role::getInstances(),
            'genders' => Gender::getInstances(),
            'status' => Status::getInstances(),
            'stores' => Store::where('organization_id', Auth::user()->organization_id)->pluck('name', 'id'),
            'categories' => Category::where('organization_id', Auth::user()->organization_id)->pluck('name', 'id'),
            'organizations' => Organization::pluck('name', 'id'),
        ]);
    }
}
