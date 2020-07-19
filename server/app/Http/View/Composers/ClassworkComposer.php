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
            'classworks' => Models\Classwork::select('classworks.id', 'classworks.name', 'classworks.store_id', 'stores.organization_id', 'stores.name as store_name')
                ->join('stores', 'stores.id', '=', 'classworks.store_id')
                ->where('stores.organization_id', Auth::user()->organization_id)
                ->pluck('classworks.name', 'classworks.id'),
        ]);
    }
}
