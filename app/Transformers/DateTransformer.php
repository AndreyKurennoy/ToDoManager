<?php
namespace App\Transformers;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: moga
 * Date: 27.03.17
 * Time: 14:47
 */
class DateTransformer
{
	public $months = [
		0,
	    'Января',
	    'Февраля',
	    'Марта',
	    'Апреля',
	    'Мая',
	    'Июня',
	    'Июля',
	    'Августа',
	    'Сентября',
	    'Октября',
	    'Ноября',
	    'Декабря',
	];
	public function transform($data)
	{
		foreach($data as $key => $item) {
			$data[$key]->date = (new Carbon($item->date))->format('d ') . $this->months[(new Carbon($item->date))->format('n')] . (new Carbon($item->date))->format(' Y');
		}

		return($data);
	}
}