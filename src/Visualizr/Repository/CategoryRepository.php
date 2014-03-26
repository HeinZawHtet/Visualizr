<?php

namespace Visualizr\Repository;
use Visualizr\Model\Category;

class CategoryRepository
{

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	public function all()
	{
		return $this->category->all();
	}

	public function find($id)
	{
		return $this->category->find($id);
	}

	public function save($data = array())
	{
		return $this->category->save($data);
	}

}