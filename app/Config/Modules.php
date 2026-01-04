<?php namespace Config;

// Cannot extend BaseConfig or looping resources occurs.
class Modules
{
	/*
	 |--------------------------------------------------------------------------
	 | Auto-Discovery Enabled?
	 |--------------------------------------------------------------------------
	 |
	 | If true, then auto-discovery will happen across all elements listed in
	 | $activeExplorers below. If false, no auto-discovery will happen at all,
	 | giving a slight performance boost.
	 */
	public $enabled = true;

	/*
	 |--------------------------------------------------------------------------
	 | Auto-Discovery Within Composer Packages Enabled?
	 |--------------------------------------------------------------------------
	 |
	 | If true, then auto-discovery will happen across all namespaces loaded
	 | by Composer, as well as the namespaces configured locally.
	 */
	public $discoverInComposer = true;

	/*
	|--------------------------------------------------------------------------
	| Composer Package Auto-Discovery
	|--------------------------------------------------------------------------
	|
	| Out of the box, CodeIgniter does not auto-discover any Composer installed
	| packages, but you can enable auto-discovery for each package individually
	| by adding its package name to the $composerPackages array.
	|
	| For example, if you want to auto-discover all Tatter packages you could do:
	|
	| $composerPackages = ['tatter/*'];
	|
	| Or if you want to auto-discover a specific package:
	|
	| $composerPackages = ['tatter/assets'];
	*/
	public $composerPackages = [];

	/*
	|--------------------------------------------------------------------------
	| Auto-discover Rules
	|--------------------------------------------------------------------------
	|
	| Lists the aliases of all discovery classes that will be active
	| and used during the current application request. If it is not
	| listed here, only the base application elements will be used.
	*/
	public $activeExplorers = [
		'events',
		'registrars',
		'routes',
		'services',
	];

	/**
	 * Should the application auto-discover the requested resources.
	 *
	 * Valid values are:
	 *  - events
	 *  - registrars
	 *  - routes
	 *  - services
	 *
	 * @param string $alias
	 *
	 * @return boolean
	 */
	public function shouldDiscover(string $alias)
	{
		if (! $this->enabled)
		{
			return false;
		}

		$alias = strtolower($alias);

		return in_array($alias, $this->activeExplorers);
	}
}
