<?php
namespace Swoole;

/**
 * @since 4.4.2
 */
class Client
{
    // constants of the class Client
    public const MSG_OOB = 1;
    public const MSG_PEEK = 2;
    public const MSG_DONTWAIT = 128;
    public const MSG_WAITALL = 64;
    public const SHUT_RDWR = 2;
    public const SHUT_RD = 0;
    public const SHUT_WR = 1;

    // property of the class Client
    public $errCode;
    public $sock;
    public $reuse;
    public $reuseCount;
    public $type;
    public $id;
    public $setting;
    private $onConnect;
    private $onError;
    private $onReceive;
    private $onClose;
    private $onBufferFull;
    private $onBufferEmpty;
    private $onSSLReady;

    /**
     * @param $type [required]
     * @param $async [optional]
     * @return mixed
     */
    public function __construct($type, $async = null){}

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
     * @param string $host [required]
     * @param int $port [optional]
     * @param float $timeout [optional]
     * @param $sock_flag [optional]
     * @return mixed
     */
    public function connect(string $host, int $port = null, float $timeout = null, $sock_flag = null){}

    /**
     * @param int $size [optional]
     * @param $flag [optional]
     * @return mixed
     */
    public function recv(int $size = null, $flag = null){}

    /**
     * @param $data [required]
     * @param $flag [optional]
     * @return mixed
     */
    public function send($data, $flag = null){}

    /**
     * @param $dst_socket [required]
     * @return mixed
     */
    public function pipe($dst_socket){}

    /**
     * @param string $filename [required]
     * @param int $offset [optional]
     * @param int $length [optional]
     * @return mixed
     */
    public function sendfile(string $filename, int $offset = null, int $length = null){}

    /**
     * @param $ip [required]
     * @param int $port [required]
     * @param $data [required]
     * @return mixed
     */
    public function sendto($ip, int $port, $data){}

    /**
     * @return mixed
     */
    public function sleep(){}

    /**
     * @return mixed
     */
    public function wakeup(){}

    /**
     * @return mixed
     */
    public function pause(){}

    /**
     * @return mixed
     */
    public function resume(){}

    /**
     * @param $how [required]
     * @return mixed
     */
    public function shutdown($how){}

    /**
     * @param mixed $callback [optional]
     * @return mixed
     */
    public function enableSSL($callback = null){}

    /**
     * @return mixed
     */
    public function getPeerCert(){}

    /**
     * @return mixed
     */
    public function verifyPeerCert(){}

    /**
     * @return mixed
     */
    public function isConnected(){}

    /**
     * @return mixed
     */
    public function getsockname(){}

    /**
     * @return mixed
     */
    public function getpeername(){}

    /**
     * @param $force [optional]
     * @return mixed
     */
    public function close($force = null){}

    /**
     * @param string $event_name [required]
     * @param mixed $callback [required]
     * @return mixed
     */
    public function on(string $event_name, $callback){}

    /**
     * @return mixed
     */
    public function getSocket(){}


}
