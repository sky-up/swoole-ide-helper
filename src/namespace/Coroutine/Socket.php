<?php
namespace Swoole\Coroutine;

/**
 * @since 4.3.0
 */
class Socket
{

    public $fd;
    public $errCode;

    /**
     * @param $domain [required]
     * @param $type [required]
     * @param $protocol [optional]
     * @return mixed
     */
    public function __construct($domain, $type, $protocol=null){}

    /**
     * @param $address [required]
     * @param $port [optional]
     * @return mixed
     */
    public function bind($address, int $port=null){}

    /**
     * @param $backlog [optional]
     * @return mixed
     */
    public function listen($backlog=null){}

    /**
     * @param $timeout [optional]
     * @return mixed
     */
    public function accept(float $timeout=null){}

    /**
     * @param $host [required]
     * @param $port [optional]
     * @param $timeout [optional]
     * @return mixed
     */
    public function connect(string $host, int $port=null, float $timeout=null){}

    /**
     * @param $length [optional]
     * @param $timeout [optional]
     * @return mixed
     */
    public function recv(int $length=null, float $timeout=null){}

    /**
     * @param $data [required]
     * @param $timeout [optional]
     * @return mixed
     */
    public function send($data, float $timeout=null){}

    /**
     * @param $length [optional]
     * @param $timeout [optional]
     * @return mixed
     */
    public function recvAll(int $length=null, float $timeout=null){}

    /**
     * @param $data [required]
     * @param $timeout [optional]
     * @return mixed
     */
    public function sendAll($data, float $timeout=null){}

    /**
     * @param $peername [required]
     * @param $timeout [optional]
     * @return mixed
     */
    public function recvfrom($peername, float $timeout=null){}

    /**
     * @param $addr [required]
     * @param $port [required]
     * @param $data [required]
     * @return mixed
     */
    public function sendto($addr, int $port, $data){}

    /**
     * @param $how [required]
     * @return mixed
     */
    public function shutdown($how){}

    /**
     * @return mixed
     */
    public function close(){}

    /**
     * @return mixed
     */
    public function getpeername(){}

    /**
     * @return mixed
     */
    public function getsockname(){}

    /**
     * @return mixed
     */
    public function getSocket(){}


}
