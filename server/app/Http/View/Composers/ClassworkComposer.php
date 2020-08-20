<?php

namespace App\Http\View\Composers;

use App\Models;
use Illuminate\View\View;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class ClassworkComposer
{
    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'classworks' => Models\Classwork::where('organization_id', Auth::user()->organization_id)
                ->pluck('name', 'id'),
        ]);
    }
}
