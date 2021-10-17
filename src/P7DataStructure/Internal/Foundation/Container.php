<?php declare(strict_types=1);
/**
 * \P7DataStructure\Internal\Foundation\Container - base class for iterable  data containers
 *
 *
 * @package P7DataStructure
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/P7DataStructure
 * @version 0.1
 * @since 2020-10-17
 */
namespace P7DataStructure\Internal\Foundation;

class Container  implements \Iterator
{

    protected array $internalStore = [];

    // The following functions implement interface \Iterator making it possible
    // to iterate container objects with foreach

    public function __construct(array $data=[])
    {
        if(count($data)) {
            $this->internalStore = $data;
        }
    }
    /**
     * Resetting pointer to first array element
     *
     * @return Container
     */
    public function rewind() : Container
    {
        reset($this->internalStore);
        return $this;
    }

    /**
     * Getting current element
     *
     */
    public function current()
    {
        return current($this->internalStore);
    }

    /**
     * Getting key of current element
     * @return string
     */
    public function key() : string
    {
        return key($this->internalStore);
    }

    /**
     * @return mixed|void
     */
    public function next()
    {
        return next($this->internalStore);
    }

    /**
     * Returning if current element is valid
     *
     * @return bool
     */
    public function valid() : bool
    {
        return ($this->current() !== false);
    }
}