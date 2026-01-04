<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Routing configuration
 */
class Routing extends BaseConfig
{
    /**
     * An array of files that contain route definitions.
     * Routes are executed in the order they are defined, so you will want
     * to be careful that you don't have conflicting route definitions.
     */
    public array $routeFiles = [
        APPPATH . 'Config/Routes.php',
    ];

    /**
     * The default namespace to use for Controllers when no other
     * namespace has been specified.
     */
    public string $defaultNamespace = 'App\Controllers';

    /**
     * The default controller to use when no other controller has been
     * specified.
     */
    public string $defaultController = 'Index';

    /**
     * The default method to use within the controller when no other
     * method has been specified.
     */
    public string $defaultMethod = 'index';

    /**
     * Whether to translate dashes in URIs to underscores in method names.
     * If you want your action methods to use dashes in URIs, set this to TRUE.
     *
     * For example:
     *     my-method -> my_method
     */
    public bool $translateURIDashes = false;

    /**
     * Whether to match URI against Controllers when it doesn't match
     * defined routes.
     *
     * If false, and no route is defined, then the Router will attempt to
     * match the URI against Controllers by matching each segment against
     * folders/files in APPPATH/Controllers, when a match is found, the remaining
     * segments will be passed to the _remap method if it exists or as parameters
     * to the default method.
     */
    public bool $autoRoute = true;

    /**
     * Improved version of $autoRoute.
     * 
     * This option enables the auto-routing, and new auto-routing improves the
     * auto-routing feature.
     * - It does not match to Controllers that don't have route definitions.
     * - It does not match to any methods that are not public.
     * - It does not match to any methods that start with underscore (_).
     */
    public bool $autoRouteImproved = false;

    /**
     * A callable that will be used to override the normal 404
     * Exception when no matching route is found. The exception
     * will be passed to the callable.
     */
    public $override404;

    /**
     * When true, the system will attempt to match the HTTP verb
     * (GET, POST, etc) to the method name.
     * 
     * For example:
     *     Route: posts/index
     *     HTTP Verb: GET
     *     Method: getIndex()
     * 
     * If the method doesn't exist, it will fall back to the $defaultMethod.
     */
    public bool $prioritize = false;
}