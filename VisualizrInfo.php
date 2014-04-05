<?php

namespace Visualizr;

class VisualizrInfo extends \Reborn\Module\AbstractInfo
{
	/**
	 * Module name variable
	 *
	 * @var string
	 **/
	protected $name = 'Visualizr';

	/**
	 * Module version variable
	 *
	 * @var string
	 **/
	protected $version = '0.9';

	/**
	 * Module Display name variable.
	 *
	 * @var string
	 **/
	protected $displayName = array(
								'en' => 'Visualizr'
								);

	/**
	 * Module description variable
	 *
	 * @var string
	 **/
	protected $description = array(
							'en' => 'Visualizing Your Stats'
							);

	/**
	 * Module author name variable
	 *
	 * @var string
	 **/
	protected $author = 'Hein Zaw Htet';

	/**
	 * Module author URL variable
	 *
	 * @var string
	 **/
	protected $authorUrl = 'http://myanmarwebdev.com';

	/**
	 * Module author Email variable
	 *
	 * @var string
	 **/
	protected $authorEmail = 'maungheinzawhtet@gmail.com';

	/**
	 * Module Frontend support variable
	 *
	 * @var boolean
	 **/
	protected $frontendSupport = true;

	/**
	 * Module Backend support variable
	 *
	 * @var boolean
	 **/
	protected $backendSupport = true;

	/**
	 * Module can be use Default Module for Frontend variable
	 *
	 * @var boolean
	 **/
	protected $useAsDefaultModule = true;

	/**
	 * Module's URI Prefix variable
	 *
	 * @var string
	 **/
	protected $uriPrefix = 'visualizr';

	/**
	 * Variable for Allow to change the URI Prefix from user.
	 *
	 * @var boolean
	 **/
	protected $allowToChangeUriPrefix = false;

	/**
	 * Variable for Module Actions Roles list.
	 * Module Action permission will be decided on this role.
	 *
	 * @var array
	 **/
	protected $roles = array();

	/**
	 * Variable for Allow Custom Field.
	 * If you allow custom field in your module, set true
	 *
	 * @var boolean
	 **/
	protected $allowCustomfield = false;


	protected $sharedData = false;

}
