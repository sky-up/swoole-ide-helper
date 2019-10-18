<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole;

/**
 * @since 4.4.8
 */
class ArrayObject implements \ArrayAccess, \Serializable, \Countable, \Iterator
{

    // property of the class ArrayObject
    protected $array;

    /**
     * @param array $array
     * @return mixed
     */
    public function __construct(array $array = []){}

    /**
     * @return bool
     */
    public function isEmpty(){}

    /**
     * @return int
     */
    public function count(){}

    /**
     * @return mixed
     */
    public function current(){}

    /**
     * @return mixed
     */
    public function key(){}

    /**
     * @return bool
     */
    public function valid(){}

    /**
     * @return mixed
     */
    public function rewind(){}

    /**
     * @return mixed
     */
    public function next(){}

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key){}

    /**
     * @param string $key
     * @param $value
     * @return self
     */
    public function set(string $key, $value){}

    /**
     * @param string $key
     * @return self
     */
    public function delete(string $key){}

    /**
     * @param $value
     * @param bool $strict
     * @param bool $loop
     * @return self
     */
    public function remove($value, bool $strict = true, bool $loop = false){}

    /**
     * @return self
     */
    public function clear(){}

    /**
     * @param string $key
     * @return mixed
     */
    public function offsetGet(string $key){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function offsetSet(string $key, $value){}

    /**
     * @param string $key
     * @return mixed
     */
    public function offsetUnset(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function offsetExists(string $key){}

    /**
     * @param string $key
     * @return bool
     */
    public function exists(string $key){}

    /**
     * @param $value
     * @param bool $strict
     * @return bool
     */
    public function contains($value, bool $strict = true){}

    /**
     * @param $value
     * @param bool $strict
     * @return mixed
     */
    public function indexOf($value, bool $strict = true){}

    /**
     * @param $value
     * @param bool $strict
     * @return mixed
     */
    public function lastIndexOf($value, bool $strict = true){}

    /**
     * @param $needle
     * @param $strict
     * @return mixed
     */
    public function search($needle, $strict = true){}

    /**
     * @param string $glue
     * @return \Swoole\StringObject
     */
    public function join(string $glue = ''){}

    /**
     * @return \Swoole\StringObject
     */
    public function serialize(){}

    /**
     * @param string $string
     * @return self
     */
    public function unserialize(string $string){}

    /**
     * @return mixed
     */
    public function sum(){}

    /**
     * @return mixed
     */
    public function product(){}

    /**
     * @param $value
     * @return mixed
     */
    public function push($value){}

    /**
     * @param $value
     * @return mixed
     */
    public function pushBack($value){}

    /**
     * @param int $offset
     * @param $value
     * @return self
     */
    public function insert(int $offset, $value){}

    /**
     * @return mixed
     */
    public function pop(){}

    /**
     * @return mixed
     */
    public function popFront(){}

    /**
     * @param int $offset
     * @param int $length
     * @param bool $preserve_keys
     * @return self
     */
    public function slice(int $offset, int $length = null, bool $preserve_keys = false){}

    /**
     * @return mixed
     */
    public function randomGet(){}

    /**
     * @param callable $fn
     * @return self
     */
    public function each(callable $fn){}

    /**
     * @param callable $fn
     * @return self
     */
    public function map(callable $fn){}

    /**
     * @param callable $fn
     * @return mixed
     */
    public function reduce(callable $fn){}

    /**
     * @param int $search_value
     * @param $strict
     * @return self
     */
    public function keys(int $search_value = null, $strict = false){}

    /**
     * @return self
     */
    public function values(){}

    /**
     * @param $column_key
     * @param ...$index
     * @return self
     */
    public function column($column_key, ...$index){}

    /**
     * @param int $sort_flags
     * @return self
     */
    public function unique(int $sort_flags = SORT_STRING){}

    /**
     * @param bool $preserve_keys
     * @return self
     */
    public function reverse(bool $preserve_keys = false){}

    /**
     * @param int $size
     * @param bool $preserve_keys
     * @return self
     */
    public function chunk(int $size, bool $preserve_keys = false){}

    /**
     * @return self
     */
    public function flip(){}

    /**
     * @param callable $fn
     * @param int $flag
     * @return self
     */
    public function filter(callable $fn, int $flag = 0){}

    /**
     * @param int $sort_order
     * @param int $sort_flags
     * @return self
     */
    public function multiSort(int $sort_order = SORT_ASC, int $sort_flags = SORT_REGULAR){}

    /**
     * @param int $sort_flags
     * @return self
     */
    public function asort(int $sort_flags = SORT_REGULAR){}

    /**
     * @param int $sort_flags
     * @return self
     */
    public function arsort(int $sort_flags = SORT_REGULAR){}

    /**
     * @param int $sort_flags
     * @return self
     */
    public function krsort(int $sort_flags = SORT_REGULAR){}

    /**
     * @param int $sort_flags
     * @return self
     */
    public function ksort(int $sort_flags = SORT_REGULAR){}

    /**
     * @return self
     */
    public function natcasesort(){}

    /**
     * @return self
     */
    public function natsort(){}

    /**
     * @param int $sort_flags
     * @return self
     */
    public function rsort(int $sort_flags = SORT_REGULAR){}

    /**
     * @return self
     */
    public function shuffle(){}

    /**
     * @param int $sort_flags
     * @return self
     */
    public function sort(int $sort_flags = SORT_REGULAR){}

    /**
     * @param callable $value_compare_func
     * @return self
     */
    public function uasort(callable $value_compare_func){}

    /**
     * @param callable $value_compare_func
     * @return self
     */
    public function uksort(callable $value_compare_func){}

    /**
     * @param callable $value_compare_func
     * @return self
     */
    public function usort(callable $value_compare_func){}

    /**
     * @return array
     */
    public function __toArray(){}

    /**
     * @param $value
     * @return mixed
     */
    protected static function detectType($value){}

    /**
     * @param string $value
     * @return \Swoole\StringObject
     */
    protected static function detectStringType(string $value){}

    /**
     * @param array $value
     * @return self
     */
    protected static function detectArrayType(array $value){}
}