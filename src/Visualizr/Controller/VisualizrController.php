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
		$visualizrs = $this->visualizr->sort();
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

	public function embed($id)
	{
		$visualizr = $this->visualizr->find($id);
		if ( parse_url(Input::server('HTTP_REFERER'), PHP_URL_HOST) == \Config::get('visualizr::visualizr.site_url')) {
			$this->template->partialOnly()
							->set('visualizr', $visualizr)
							->set('id', $id)
							->view('embed');
		}
	}

	public function chartData($id)
	{	
		$getData = $this->visualizr->find($id);
		return Response::json($getData->convert_data);
	}

	public function chartOption($id)
	{
		$getData = $this->visualizr->getOptionById($id);
		return Response::json($getData);
	}
}