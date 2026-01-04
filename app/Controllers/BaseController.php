<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['url'];

	/**
	 * Check if user is logged in
	 * 
	 * @return bool
	 */
	protected function isLoggedIn(): bool
	{
		return session()->has('iduser19') && !empty(session('iduser19'));
	}

	/**
	 * Check if session has specific variable and it's not empty
	 * 
	 * @param string $key
	 * @return bool
	 */
	protected function hasSessionVar(string $key): bool
	{
		return session()->has($key) && !empty(session($key));
	}

	/**
	 * Check if user is logged in and has valid token
	 * 
	 * @return bool
	 */
	protected function isLoggedInWithToken(): bool
	{
		return $this->isLoggedIn() && $this->hasSessionVar('token19');
	}

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

}

