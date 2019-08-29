<?php
namespace Swoole\Coroutine\Http;

/**
 * @since 4.4.2
 */
class Server
{
    // constants of the class Server

    // property of the class Server
    public $fd;
    public $host;
    public $port;
    public $ssl;
    public $settings;
    public $errCode;
    public $errMsg;

    /**
     * @return mixed
     */
    public function __construct(){}

    /**
     * @return mixed
     */
    public function __destruct(){}

    /**
     * @param array $settings [required]
     * @return mixed
     */
    public function set(array $settings){}

    /**
     * @param $pattern [required]
     * @param mixed $callback [required]
     * @return mixed
     */
    public function handle($pattern, $callback){}

    /**
     * @return mixed
     */
    public function onAccept(){}

    /**
     * @return mixed
     */
    public function start(){}

    /**
     * @return mixed
     */
    public function shutdown(){}


}
