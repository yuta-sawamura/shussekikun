<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Enums\Day;

class DayComposer
{
    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'days' => Day::getInstances(),
        ]);
    }
}
