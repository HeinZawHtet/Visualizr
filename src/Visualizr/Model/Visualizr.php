<?php

namespace Visualizr\Model;

use Bongo\Bongo;

class Visualizr extends Bongo
{
	protected $collection = 'visualizr';

	protected $date_format = true;

	public function getConvertDataAttribute()
	{
		$data = $this->attributes['data'];

		$result = array();

		foreach ($data as $k => $d) {
			foreach ($d as $key => $value) {
				if (is_numeric($value)) {
					$value = (int) $value;
				}
				$result[$k][$key] = $value;
			}
		}
		return $result;
	}
}