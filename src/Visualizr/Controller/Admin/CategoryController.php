<?php

namespace Visualizr\Controller\Admin;
use Visualizr\Repository\CategoryRepository;
use Event, Flash, Redirect, Input, Pagination;

class CategoryController extends \AdminController
{
	// protected $visualizr;

	public function __construct(
		CategoryRepository $category
		)
	{
		$this->category = $category;
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
		$categories = $this->category->all();

		if (Input::isPost()) {

			$data = array(
				'title' => Input::get('title'),
				);

			$this->category->save($data);

			Flash::success('Successfully Created');
			return Redirect::toAdmin('visualizr/category');
		}

		$this->template->title('Visualization Dashboard')
						->set('categories', $categories)
						->setPartial('admin.category.index');
	}
}