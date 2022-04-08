<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class SubscriptionsComposer {

	public function compose(View $view)
	{
		foreach($view->courses as $item){
			$item->subscribed = in_array($item->id, user()->courses->pluck('id')->toArray()) ? true : false;
			$items[] = $item;
		}

		$view->courses = $items;

		return $view;
	}

}