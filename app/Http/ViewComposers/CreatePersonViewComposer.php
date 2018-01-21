<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Town;

class CreatePersonViewComposer
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
        $towns = Town::all();
        $view->with(['towns' => $towns]);
    }
}