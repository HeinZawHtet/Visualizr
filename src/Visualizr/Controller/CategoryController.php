<?php

namespace Visualizr\Controller;
use Visualizr\Repository\VisualizrRepository;
use Visualizr\Repository\CategoryRepository;
use Event, Flash, Redirect, Input, Pagination, Request, Response;

class CategoryController extends \PublicController
{
	// protected $visualizr;

	public function __construct(
		VisualizrRepository $visualizr,
		CategoryRepository $category
		)
	{
		$this->visualizr = $visualizr;
		$this->category = $category;
	}

	public function before()
	{
		$this->template->style('vsl-frontend.css', 'visualizr');
	}

	public function show($id)
	{
		$categories = $this->category->find($id)->visualizrs;
		var_dump($categories);
		$this->template->title('Category');
	}
}