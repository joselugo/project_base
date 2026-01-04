<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Session\Handlers\FileHandler;

/**
 * --------------------------------------------------------------------------
 * Session Configuration
 * --------------------------------------------------------------------------
 * 
 * Configure the session settings for your application.
 */
class Session extends BaseConfig
{
    /**
     * Initialize session configuration
     */
    public function __construct()
    {
        parent::__construct();
        
        // Ensure cookie properties have default values
        if (!isset($this->cookieDomain)) {
            $this->cookieDomain = '';
        }
        if (!isset($this->cookiePath)) {
            $this->cookiePath = '/';
        }
        if (!isset($this->cookieSecure)) {
            $this->cookieSecure = false;
        }
        if (!isset($this->cookieHTTPOnly)) {
            $this->cookieHTTPOnly = false;
        }
    }
    /**
     * --------------------------------------------------------------------------
     * Session Driver
     * --------------------------------------------------------------------------
     *
     * The session storage driver to use:
     * - CodeIgniter\Session\Handlers\FileHandler
     * - CodeIgniter\Session\Handlers\DatabaseHandler
     * - CodeIgniter\Session\Handlers\MemcachedHandler
     * - CodeIgniter\Session\Handlers\RedisHandler
     *
     * @var string
     */
    public string $driver = FileHandler::class;

    /**
     * --------------------------------------------------------------------------
     * Session Cookie Name
     * --------------------------------------------------------------------------
     *
     * The session cookie name, must contain only [0-9a-z_-] characters
     *
     * @var string
     */
    public string $cookieName = 'ci_session';

    /**
     * --------------------------------------------------------------------------
     * Session Expiration
     * --------------------------------------------------------------------------
     *
     * The number of SECONDS you want the session to last.
     * Setting to 0 (zero) means expire when the browser is closed.
     *
     * @var int
     */
    public int $expiration = 0;

    /**
     * --------------------------------------------------------------------------
     * Session Save Path
     * --------------------------------------------------------------------------
     *
     * The location to save sessions to and is driver dependent.
     * For the 'files' driver, it's a path to a writable directory.
     * WARNING: Only absolute paths are supported!
     *
     * @var string
     */
    public string $savePath = WRITEPATH . 'session';

    /**
     * --------------------------------------------------------------------------
     * Session Match IP
     * --------------------------------------------------------------------------
     *
     * Whether to match the user's IP address when reading the session data.
     *
     * WARNING: If you're using the database driver, don't forget to update
     *          your session table's PRIMARY KEY when changing this setting.
     *
     * @var bool
     */
    public bool $matchIP = false;

    /**
     * --------------------------------------------------------------------------
     * Session Time to Update
     * --------------------------------------------------------------------------
     *
     * How many seconds between CI regenerating the session ID.
     *
     * @var int
     */
    public int $timeToUpdate = 300;

    /**
     * --------------------------------------------------------------------------
     * Session Regenerate Destroy
     * --------------------------------------------------------------------------
     *
     * Whether to destroy session data associated with the old session ID
     * when auto-regenerating the session ID. When set to FALSE, the data
     * will be later deleted by the garbage collector.
     *
     * @var bool
     */
    public bool $regenerateDestroy = false;

    /**
     * --------------------------------------------------------------------------
     * Cookie Domain
     * --------------------------------------------------------------------------
     *
     * Set to .your-domain.com for site-wide cookies
     *
     * @var string
     */
    public string $cookieDomain = '';

    /**
     * --------------------------------------------------------------------------
     * Cookie Path
     * --------------------------------------------------------------------------
     *
     * Typically will be a forward slash
     *
     * @var string
     */
    public string $cookiePath = '/';

    /**
     * --------------------------------------------------------------------------
     * Cookie Secure
     * --------------------------------------------------------------------------
     *
     * Cookie will only be set if a secure HTTPS connection exists.
     *
     * @var bool
     */
    public bool $cookieSecure = false;

    /**
     * --------------------------------------------------------------------------
     * Cookie HTTP Only
     * --------------------------------------------------------------------------
     *
     * Cookie will only be accessible via HTTP(S) (no javascript)
     *
     * @var bool
     */
    public bool $cookieHTTPOnly = false;

    /**
     * --------------------------------------------------------------------------
     * Session Database Group
     * --------------------------------------------------------------------------
     *
     * DB Group for the database session.
     *
     * @var string|null
     */
    public ?string $DBGroup = null;

    /**
     * --------------------------------------------------------------------------
     * Lock Retry Interval (microseconds)
     * --------------------------------------------------------------------------
     *
     * This is used for RedisHandler. Time to wait between lock acquisition attempts.
     *
     * @var int
     */
    public int $lockRetryInterval = 100000;

    /**
     * --------------------------------------------------------------------------
     * Lock Max Retries
     * --------------------------------------------------------------------------
     *
     * This is used for RedisHandler. Maximum number of lock acquisition attempts.
     *
     * @var int
     */
    public int $lockMaxRetries = 300;
}