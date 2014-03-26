<?php namespace Visualizr\Service\Validation;

abstract class VisualizrValidator {
	protected $input;
	protected $errors;

	public function __construct($input = null)
	{
		$this->input = $input ?: \Input::get('*');
	}

	public function passes()
	{
		$validation = new \Reborn\Form\Validation($this->input, static::$rules);

		if($validation->valid()) return true;

		$this->errors = $validation->getErrors();

		return false;
	}

	public function getErrors()
	{
		return $this->errors;
	}
}