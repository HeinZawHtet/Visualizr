<?php

namespace Visualizr\Model;

use Bongo\Bongo;

class Category extends Bongo
{
	protected $collection = 'visualizr_category';

	protected $date_format = true;

	public function visualizrs()
	{
		return $this->hasMany('Visualizr\Model\Visualizr', 'category_id', 'visualizr');
	}

}