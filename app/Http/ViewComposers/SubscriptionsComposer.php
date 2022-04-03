<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class SubscriptionsComposer {

	public function compose(View $view)
	{
		foreach($view->courses as $item){
			$item->newparam = "algo";
			$items[] = $item;
		}

		dd($items);

		$view->courses = $items;

		$variable = 'algo';

		dd($view);
		return $view->with(compact('variable'));
	}

	public function exclude()
	{
		// code...
	}

}