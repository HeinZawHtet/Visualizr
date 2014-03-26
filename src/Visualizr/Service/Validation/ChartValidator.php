<?php namespace Visualizr\Service\Validation;

class ChartValidator extends VisualizrValidator
{
	/**
	* Validation rules
	*/
	public static $rules = array(
		'title' => 'required',
		'category_id' => 'required',
		'type' => 'required',
		'tags' => '',
		'data' => 'required',
	);
}