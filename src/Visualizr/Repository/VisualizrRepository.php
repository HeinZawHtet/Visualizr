<?php

namespace Visualizr\Repository;
use Visualizr\Model\Visualizr;

class VisualizrRepository
{

	public function __construct(Visualizr $visualizr)
	{
		$this->visualizr = $visualizr;
	}

	public function all()
	{
		return $this->visualizr->all();
	}

	public function sort()
	{
		return $this->visualizr->sort('created_at', 'desc')->get();
	}

	public function find($id)
	{
		return $this->visualizr->find($id);
	}
	public function save($data = array())
	{
		return $this->visualizr->save($data);
	}
	public function getOptionById($id)
	{
		return $this->visualizr->find($id)->options;
	}
	public function where($key, $operator, $value)
	{
		return $this->visualizr->where($key, $operator, $value)->onlyOne();
	}


}