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

	public function find($id)
	{
		return $this->visualizr->find($id);
	}
	public function save($data = array())
	{
		return $this->visualizr->save($data);
	}

}