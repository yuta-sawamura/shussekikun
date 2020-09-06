<?php

namespace App\Http\View\Composers;

use App\Models;
use Illuminate\View\View;
use Auth;

class StoreComposer
{
    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'stores' => Models\Store::where('organization_id', Auth::user()->organization_id)->pluck('name', 'id'),
        ]);
    }
}
