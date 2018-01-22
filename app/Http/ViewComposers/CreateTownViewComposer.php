<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Province;

class CreateTownViewComposer
{
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $provinces = Province::all();
        $view->with(['provinces' => $provinces]);
    }
}