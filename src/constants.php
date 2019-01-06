<?php
define('SWOOLE_VERSION', '4.2.12');
define('SWOOLE_VERSION_ID', 40212);
define('SWOOLE_MAJOR_VERSION', 4);
define('SWOOLE_MINOR_VERSION', 2);
define('SWOOLE_RELEASE_VERSION', 12);
define('SWOOLE_EXTRA_VERSION', '');
define('SWOOLE_DEBUG', '');
define('SWOOLE_BASE', 1);
define('SWOOLE_PROCESS', 2);
define('SWOOLE_IPC_UNSOCK', 1);
define('SWOOLE_IPC_MSGQUEUE', 2);
define('SWOOLE_IPC_PREEMPTIVE', 3);
define('SWOOLE_SOCK_TCP', 1);
define('SWOOLE_SOCK_TCP6', 3);
define('SWOOLE_SOCK_UDP', 2);
define('SWOOLE_SOCK_UDP6', 4);
define('SWOOLE_SOCK_UNIX_DGRAM', 5);
define('SWOOLE_SOCK_UNIX_STREAM', 6);
define('SWOOLE_TCP', 1);
define('SWOOLE_TCP6', 3);
define('SWOOLE_UDP', 2);
define('SWOOLE_UDP6', 4);
define('SWOOLE_UNIX_DGRAM', 5);
define('SWOOLE_UNIX_STREAM', 6);
define('SWOOLE_SOCK_SYNC', 0);
define('SWOOLE_SOCK_ASYNC', 1);
define('SWOOLE_SYNC', 2048);
define('SWOOLE_ASYNC', 1024);
define('SWOOLE_KEEP', 4096);
define('SWOOLE_SSL', 512);
define('SWOOLE_SSLv3_METHOD', 1);
define('SWOOLE_SSLv3_SERVER_METHOD', 2);
define('SWOOLE_SSLv3_CLIENT_METHOD', 3);
define('SWOOLE_SSLv23_METHOD', 0);
define('SWOOLE_SSLv23_SERVER_METHOD', 4);
define('SWOOLE_SSLv23_CLIENT_METHOD', 5);
define('SWOOLE_TLSv1_METHOD', 6);
define('SWOOLE_TLSv1_SERVER_METHOD', 7);
define('SWOOLE_TLSv1_CLIENT_METHOD', 8);
define('SWOOLE_TLSv1_1_METHOD', 9);
define('SWOOLE_TLSv1_1_SERVER_METHOD', 10);
define('SWOOLE_TLSv1_1_CLIENT_METHOD', 11);
define('SWOOLE_TLSv1_2_METHOD', 12);
define('SWOOLE_TLSv1_2_SERVER_METHOD', 13);
define('SWOOLE_TLSv1_2_CLIENT_METHOD', 14);
define('SWOOLE_DTLSv1_METHOD', 15);
define('SWOOLE_DTLSv1_SERVER_METHOD', 16);
define('SWOOLE_DTLSv1_CLIENT_METHOD', 17);
define('SWOOLE_EVENT_READ', 512);
define('SWOOLE_EVENT_WRITE', 1024);
define('SWOOLE_ERROR_MALLOC_FAIL', 501);
define('SWOOLE_ERROR_SYSTEM_CALL_FAIL', 502);
define('SWOOLE_ERROR_PHP_FATAL_ERROR', 503);
define('SWOOLE_ERROR_NAME_TOO_LONG', 504);
define('SWOOLE_ERROR_INVALID_PARAMS', 505);
define('SWOOLE_ERROR_QUEUE_FULL', 506);
define('SWOOLE_ERROR_FILE_NOT_EXIST', 700);
define('SWOOLE_ERROR_FILE_TOO_LARGE', 701);
define('SWOOLE_ERROR_FILE_EMPTY', 702);
define('SWOOLE_ERROR_DNSLOOKUP_DUPLICATE_REQUEST', 703);
define('SWOOLE_ERROR_DNSLOOKUP_RESOLVE_FAILED', 704);
define('SWOOLE_ERROR_DNSLOOKUP_RESOLVE_TIMEOUT', 705);
define('SWOOLE_ERROR_BAD_IPV6_ADDRESS', 706);
define('SWOOLE_ERROR_UNREGISTERED_SIGNAL', 707);
define('SWOOLE_ERROR_SESSION_CLOSED_BY_SERVER', 1001);
define('SWOOLE_ERROR_SESSION_CLOSED_BY_CLIENT', 1002);
define('SWOOLE_ERROR_SESSION_CLOSING', 1003);
define('SWOOLE_ERROR_SESSION_CLOSED', 1004);
define('SWOOLE_ERROR_SESSION_NOT_EXIST', 1005);
define('SWOOLE_ERROR_SESSION_INVALID_ID', 1006);
define('SWOOLE_ERROR_SESSION_DISCARD_TIMEOUT_DATA', 1007);
define('SWOOLE_ERROR_OUTPUT_BUFFER_OVERFLOW', 1008);
define('SWOOLE_ERROR_SSL_NOT_READY', 1009);
define('SWOOLE_ERROR_SSL_CANNOT_USE_SENFILE', 1010);
define('SWOOLE_ERROR_SSL_EMPTY_PEER_CERTIFICATE', 1011);
define('SWOOLE_ERROR_SSL_VEFIRY_FAILED', 1012);
define('SWOOLE_ERROR_SSL_BAD_CLIENT', 1013);
define('SWOOLE_ERROR_SSL_BAD_PROTOCOL', 1014);
define('SWOOLE_ERROR_PACKAGE_LENGTH_TOO_LARGE', 1201);
define('SWOOLE_ERROR_DATA_LENGTH_TOO_LARGE', 1202);
define('SWOOLE_ERROR_TASK_PACKAGE_TOO_BIG', 2001);
define('SWOOLE_ERROR_TASK_DISPATCH_FAIL', 2002);
define('SWOOLE_ERROR_HTTP2_STREAM_ID_TOO_BIG', 3001);
define('SWOOLE_ERROR_HTTP2_STREAM_NO_HEADER', 3002);
define('SWOOLE_ERROR_HTTP2_STREAM_NOT_FOUND', 3003);
define('SWOOLE_ERROR_AIO_BAD_REQUEST', 4001);
define('SWOOLE_ERROR_AIO_CANCELED', 4002);
define('SWOOLE_ERROR_CLIENT_NO_CONNECTION', 5001);
define('SWOOLE_ERROR_SOCKET_CLOSED', 5002);
define('SWOOLE_ERROR_SOCKS5_UNSUPPORT_VERSION', 7001);
define('SWOOLE_ERROR_SOCKS5_UNSUPPORT_METHOD', 7002);
define('SWOOLE_ERROR_SOCKS5_AUTH_FAILED', 7003);
define('SWOOLE_ERROR_SOCKS5_SERVER_ERROR', 7004);
define('SWOOLE_ERROR_HTTP_PROXY_HANDSHAKE_ERROR', 8001);
define('SWOOLE_ERROR_HTTP_INVALID_PROTOCOL', 8002);
define('SWOOLE_ERROR_WEBSOCKET_BAD_CLIENT', 8501);
define('SWOOLE_ERROR_WEBSOCKET_BAD_OPCODE', 8502);
define('SWOOLE_ERROR_WEBSOCKET_UNCONNECTED', 8503);
define('SWOOLE_ERROR_WEBSOCKET_HANDSHAKE_FAILED', 8504);
define('SWOOLE_ERROR_SERVER_MUST_CREATED_BEFORE_CLIENT', 9001);
define('SWOOLE_ERROR_SERVER_TOO_MANY_SOCKET', 9002);
define('SWOOLE_ERROR_SERVER_WORKER_TERMINATED', 9003);
define('SWOOLE_ERROR_SERVER_INVALID_LISTEN_PORT', 9004);
define('SWOOLE_ERROR_SERVER_TOO_MANY_LISTEN_PORT', 9005);
define('SWOOLE_ERROR_SERVER_PIPE_BUFFER_FULL', 9006);
define('SWOOLE_ERROR_SERVER_NO_IDLE_WORKER', 9007);
define('SWOOLE_ERROR_SERVER_ONLY_START_ONE', 9008);
define('SWOOLE_ERROR_SERVER_SEND_IN_MASTER', 9009);
define('SWOOLE_ERROR_SERVER_INVALID_REQUEST', 9010);
define('SWOOLE_ERROR_SERVER_WORKER_EXIT_TIMEOUT', 9011);
define('SWOOLE_ERROR_CO_OUT_OF_COROUTINE', 10001);
define('SWOOLE_ERROR_CO_HAS_BEEN_BOUND', 10002);
define('SWOOLE_ERROR_CO_MUTEX_DOUBLE_UNLOCK', 10003);
define('SWOOLE_ERROR_CO_BLOCK_OBJECT_LOCKED', 10004);
define('SWOOLE_ERROR_CO_BLOCK_OBJECT_WAITING', 10005);
define('SWOOLE_ERROR_CO_YIELD_FAILED', 10006);
define('SWOOLE_ERROR_CO_GETCONTEXT_FAILED', 10007);
define('SWOOLE_ERROR_CO_SWAPCONTEXT_FAILED', 10008);
define('SWOOLE_ERROR_CO_MAKECONTEXT_FAILED', 10009);
define('SWOOLE_ERROR_CO_IOCPINIT_FAILED', 10010);
define('SWOOLE_ERROR_CO_PROTECT_STACK_FAILED', 10011);
define('SWOOLE_ERROR_CO_STD_THREAD_LINK_ERROR', 10012);
define('SWOOLE_ERROR_CO_DISABLED_MULTI_THREAD', 10013);
define('SWOOLE_TRACE_SERVER', 2);
define('SWOOLE_TRACE_CLIENT', 4);
define('SWOOLE_TRACE_BUFFER', 8);
define('SWOOLE_TRACE_CONN', 16);
define('SWOOLE_TRACE_EVENT', 32);
define('SWOOLE_TRACE_WORKER', 64);
define('SWOOLE_TRACE_REACTOR', 256);
define('SWOOLE_TRACE_PHP', 512);
define('SWOOLE_TRACE_HTTP2', 1024);
define('SWOOLE_TRACE_EOF_PROTOCOL', 2048);
define('SWOOLE_TRACE_LENGTH_PROTOCOL', 4096);
define('SWOOLE_TRACE_CLOSE', 8192);
define('SWOOLE_TRACE_HTTP_CLIENT', 16384);
define('SWOOLE_TRACE_COROUTINE', 32768);
define('SWOOLE_TRACE_REDIS_CLIENT', 65536);
define('SWOOLE_TRACE_MYSQL_CLIENT', 131072);
define('SWOOLE_TRACE_AIO', 262144);
define('SWOOLE_TRACE_SSL', 524288);
define('SWOOLE_TRACE_NORMAL', 1048576);
define('SWOOLE_TRACE_CHANNEL', 2097152);
define('SWOOLE_TRACE_TIMER', 4194304);
define('SWOOLE_TRACE_SOCKET', 8388608);
define('SWOOLE_TRACE_ALL', 4294967295);
define('SWOOLE_LOG_DEBUG', 0);
define('SWOOLE_LOG_TRACE', 1);
define('SWOOLE_LOG_INFO', 2);
define('SWOOLE_LOG_NOTICE', 3);
define('SWOOLE_LOG_WARNING', 4);
define('SWOOLE_LOG_ERROR', 5);
define('SWOOLE_IPC_NONE', 0);
define('SWOOLE_IPC_UNIXSOCK', 1);
define('SWOOLE_IPC_SOCKET', 3);
define('SWOOLE_REDIS_MODE_MULTI', 0);
define('SWOOLE_REDIS_MODE_PIPELINE', 1);
define('SWOOLE_REDIS_TYPE_NOT_FOUND', 0);
define('SWOOLE_REDIS_TYPE_STRING', 1);
define('SWOOLE_REDIS_TYPE_SET', 2);
define('SWOOLE_REDIS_TYPE_LIST', 3);
define('SWOOLE_REDIS_TYPE_ZSET', 4);
define('SWOOLE_REDIS_TYPE_HASH', 5);
define('SWOOLE_REDIS_ERR_IO', 1);
define('SWOOLE_REDIS_ERR_OTHER', 2);
define('SWOOLE_REDIS_ERR_EOF', 3);
define('SWOOLE_REDIS_ERR_PROTOCOL', 4);
define('SWOOLE_REDIS_ERR_OOM', 5);
define('SWOOLE_REDIS_ERR_CLOSED', 6);
define('SWOOLE_REDIS_ERR_NOAUTH', 7);
define('SWOOLE_REDIS_ERR_ALLOC', 8);
define('SWOOLE_HTTP_CLIENT_ESTATUS_CONNECT_FAILED', -1);
define('SWOOLE_HTTP_CLIENT_ESTATUS_REQUEST_TIMEOUT', -2);
define('SWOOLE_HTTP_CLIENT_ESTATUS_SERVER_RESET', -3);
define('SWOOLE_DEFAULT_MAX_CORO_NUM', 3000);
define('SWOOLE_MAX_CORO_NUM_LIMIT', 9223372036854775807);
define('SWOOLE_MAX_CORO_NESTING_LEVEL', 128);
define('SWOOLE_CORO_INIT', 0);
define('SWOOLE_CORO_WAITING', 1);
define('SWOOLE_CORO_RUNNING', 2);
define('SWOOLE_CORO_END', 3);
define('SWOOLE_EXIT_IN_COROUTINE', 2);
define('SWOOLE_EXIT_IN_SERVER', 4);
define('SWOOLE_HOOK_FILE', 2);
define('SWOOLE_HOOK_SLEEP', 4);
define('SWOOLE_HOOK_TCP', 8);
define('SWOOLE_HOOK_UDP', 16);
define('SWOOLE_HOOK_UNIX', 32);
define('SWOOLE_HOOK_UDG', 64);
define('SWOOLE_HOOK_SSL', 128);
define('SWOOLE_HOOK_TLS', 256);
define('SWOOLE_HOOK_BLOCKING_FUNCTION', 512);
define('SWOOLE_HOOK_ALL', 2147483647);
define('SWOOLE_FILELOCK', 2);
define('SWOOLE_MUTEX', 3);
define('SWOOLE_SEM', 4);
define('SWOOLE_RWLOCK', 1);
define('WEBSOCKET_STATUS_CONNECTION', 1);
define('WEBSOCKET_STATUS_HANDSHAKE', 2);
define('WEBSOCKET_STATUS_FRAME', 3);
define('WEBSOCKET_STATUS_ACTIVE', 3);
define('WEBSOCKET_STATUS_CLOSING', 4);
define('WEBSOCKET_OPCODE_CONTINUATION', 0);
define('WEBSOCKET_OPCODE_TEXT', 1);
define('WEBSOCKET_OPCODE_BINARY', 2);
define('WEBSOCKET_OPCODE_CLOSE', 8);
define('WEBSOCKET_OPCODE_PING', 9);
define('WEBSOCKET_OPCODE_PONG', 10);
define('WEBSOCKET_CLOSE_NORMAL', 1000);
define('WEBSOCKET_CLOSE_GOING_AWAY', 1001);
define('WEBSOCKET_CLOSE_PROTOCOL_ERROR', 1002);
define('WEBSOCKET_CLOSE_DATA_ERROR', 1003);
define('WEBSOCKET_CLOSE_STATUS_ERROR', 1005);
define('WEBSOCKET_CLOSE_ABNORMAL', 1006);
define('WEBSOCKET_CLOSE_MESSAGE_ERROR', 1007);
define('WEBSOCKET_CLOSE_POLICY_ERROR', 1008);
define('WEBSOCKET_CLOSE_MESSAGE_TOO_BIG', 1009);
define('WEBSOCKET_CLOSE_EXTENSION_MISSING', 1010);
define('WEBSOCKET_CLOSE_SERVER_ERROR', 1011);
define('WEBSOCKET_CLOSE_TLS', 1015);
define('SWOOLE_CHANNEL_OK', 0);
define('SWOOLE_CHANNEL_TIMEOUT', -1);
define('SWOOLE_CHANNEL_CLOSED', -2);
