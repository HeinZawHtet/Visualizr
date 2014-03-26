<?php

namespace Visualizr;

class Bootstrap extends \Reborn\Module\AbstractBootstrap
{

	/**
	 * This method will run when module boot.
	 *
	 * @return void;
	 */
	public function boot()
	{
		// Exception Erro Bind for DataNotFound and go to 404
		\Error::bind(function(\Data\Exceptions\DataNotFoundException $e){
			return \Response::make($this->app->template->render404(), 404);
		});

		// Make helpers.php
		// require __DIR__.DS.'helpers.php';
	}

	/**
	 * Menu item register method for admin panel
	 *
	 * @return void
	 */
	public function adminMenu(\Reborn\Util\Menu $menu, $modUri)
	{
		$menu->add(
				'visualization', 'Visualizr', '/visualizr', null, 'icon-group', 20
			);

	}

	/**
	 * Module Toolbar Data for Admin Panel
	 *
	 * @return array
	 */
	public function moduleToolbar()
	{
		
	}

	/**
	 * Setting attributes for Module
	 *
	 * @return array
	 */
	public function settings()
	{
		return array();
	}

	/**
	 * Register method for Module.
	 * This method will call application start.
	 * You can register at requirement for Reborn CMS.
	 *
	 */
	public function register()
	{

	}

}
