<?php
namespace Swoole\Server;

/**
 * @since 4.3.0
 */
class Port
{

    private $onConnect;
    private $onReceive;
    private $onClose;
    private $onPacket;
    private $onBufferFull;
    private $onBufferEmpty;
    private $onRequest;
    private $onHandShake;
    private $onMessage;
    private $onOpen;
    public $host;
    public $port;
    public $type;
    public $sock;
    public $setting;
    public $connections;

    /**
     * @return mixed
     */
    private function __construct(){}

    /**
     * @return mixed
     */
    public function __destruct(){}

    /**
     * @param $settings [required]
     * @return mixed
     */
    public function set(array $settings){}

    /**
     * @param $event_name [required]
     * @param mixed $callback [required]
     * @return mixed
     */
    public function on(string $event_name, $callback){}

    /**
     * @return mixed
     */
    public function getSocket(){}


}
