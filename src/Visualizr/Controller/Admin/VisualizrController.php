<?php

namespace Visualizr\Controller\Admin;
use Visualizr\Repository\VisualizrRepository;
use Visualizr\Repository\CategoryRepository;
use Visualizr\Service\EmptyArrayFilter;
use Visualizr\Service\Validation\ChartValidator;
use Event, Flash, Redirect, Input, Pagination, Request, Response;

class VisualizrController extends \AdminController
{
    protected $visualizr;
    protected $category;

	public function __construct(
		VisualizrRepository $visualizr,
		CategoryRepository $category,
		EmptyArrayFilter $emptyArrayFilter,
		ChartValidator $validation
		)
	{
		$this->visualizr = $visualizr;
		$this->category = $category;
		$this->emptyArrayFilter = $emptyArrayFilter;
		$this->validation = $validation;
	}

	public function before()
	{
		$this->template->style('visualization.css', 'visualizr');
	}

	/**
	 * Main Dashboard for Visualization
	 *
	 * @return void	 
	 **/
	public function index()
	{
		
		$visualizrs = $this->visualizr->sort();

		$this->template->title('Visualization Dashboard')
						->set('visualizrs', $visualizrs)
						->setPartial('admin.index');
	}

	/**
	 * Step by Step wizard for Data Entry
	 *
	 * @return void	 
	 **/
	public function step()
	{
		$chartType = \Uri::segment(6);

		$categories = $this->category->all();

		switch ($chartType) {
			case "pie":
			
				$this->template->title("Pie Chart")
						->setPartial("admin.step-pie");

				break;

			case "column":
			
				$this->template->title("Column Chart")
						->setPartial("admin.step-column");

				break;

			case "bar":
		
				$this->template->title("Bar Chart")
						->setPartial("admin.step-bar");

			break;
					
			default:
				$this->template->title("Choose a Type")
							->setPartial("admin.step-choose");
				break;
		}

		$this->template->style('jquery.handsontable.full.css', 'visualizr')
						->script('jquery.handsontable.full.js', 'visualizr')
						->set('categories', $categories)
						->script('visualization-admin.js', 'visualizr');
	}

	/**
	 * Creating Data
	 *
	 * @return void	 
	 **/

	public function create()
	{
		if (Input::isPost()) {
			if($this->validation->passes())
			{
				$this->emptyArrayFilter->dataArray = Input::get('data');
				$dataArray = $this->emptyArrayFilter->dataFilter();			

				$data = array(
					'title' => Input::get('title'),
					'category_id' => Input::get('category_id'),
					'type' => Input::get('type'),
					'tags' => explode(',', Input::get('tags') ),
					'data' => $dataArray,
					'options' => Input::get('options')
				);

				$this->visualizr->save($data);
				// Flash::success('successessfully Created');
				// return Redirect::toAdmin('visualizr');
				$latestId = $this->visualizr->where('title', '=', Input::get('title'));
				return $latestId;
			}

			return Response::json((array) $this->validation->getErrors(), 400);
		}

		return Redirect::toAdmin('visualizr');
	}


	public function edit($id)
	{
		$visualizr = $this->visualizr->find($id);
		$categories = $this->category->all();

		switch ($visualizr->type) {
			case "pie":
			
				$this->template->title("Pie Chart")
						->setPartial("admin.step-pie");

				break;

			case "column":
			
				$this->template->title("Column Chart")
						->setPartial("admin.step-column");

				break;

			case "bar":
		
				$this->template->title("Bar Chart")
						->setPartial("admin.step-bar");

			break;
					
			default:
				$this->template->title("Choose a Type")
							->setPartial("admin.step-choose");
				break;
		}

		$this->template->set('visualizr', $visualizr)
						->set('categories', $categories)
						->style('jquery.handsontable.full.css', 'visualizr')
						->script('jquery.handsontable.full.js', 'visualizr')
						->script('visualization-admin.js', 'visualizr');
	}


	/**
	 * Delete Data
	 *
	 **/

	public function delete($id)
	{
		return "You are deleting $id";

	}
	public function show($id)
	{
		// if ($this->request->isAjax()) {
		// 	return $this->visualizr->find($id);
		// }

		$this->template->title('test')
						->view('show');
	}
}