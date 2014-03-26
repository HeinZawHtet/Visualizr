<?php

namespace Visualizr\Controller;
use Visualizr\Repository\VisualizrRepository;
use Visualizr\Repository\CategoryRepository;
use Event, Flash, Redirect, Input, Pagination, Request, Response;

class VisualizrController extends \PublicController
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

	public function index()
	{
		$categories = $this->category->all();
		$visualizrs = $this->visualizr->all();
		$this->template->title('Visualization')
						->set('categories', $categories)
						->set('visualizrs', $visualizrs)
						->view('index');
	}

	public function show($id)
	{
		$visualizr = $this->visualizr->find($id);
		$this->template->title('Visualization')
						->set('visualizr', $visualizr)
						->set('id', $id)
						->view('show');
	}

	public function chartData($id)
	{	
		$getData = $this->visualizr->find($id);
		return Response::json($getData->convert_data);
	}
}