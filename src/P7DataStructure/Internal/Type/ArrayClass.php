<?php declare(strict_types=1);
/**
 * \P7DataStructure\Internal\ArrayClass
 *
 *
 * @package P7DataStructure
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/P7DataStructure
 * @version 0.1
 * @since 2020-10-17
 */

namespace P7DataStructure\Internal\Type;

use P7DataStructure\Internal\Data\CommonStringLiterals as CSL;


class ArrayClass
{

    public int $length = 0;
    protected array $internalStore = [];

    public function __construct(array $data = [])
    {
        if (count($data)) {
            $this->internalStore = $data;
            $this->count();
        }
    }

    public function includes($value): bool
    {
        return in_array($value, $this->internalStore);
    }

    public function notIncludes($value): bool
    {
        return !in_array($value, $this->internalStore);
    }

    public function join(string $glue = CSL::COMMA . CSL::SINGLE_SPACE): string
    {
        return implode($glue, $this->internalStore);
    }

    public function push($item): ArrayClass
    {
        array_push($this->internalStore, $item);
        return $this;
    }

    /**
     *
     * @param array $items
     * @return $this
     */
    public function pushList(array $items): ArrayClass
    {
        $this->internalStore = array_merge($this->internalStore, $items);
        return $this;
    }

    public function pop()
    {
        return array_pop($this->internalStore);
    }

    /**
     * @return \Generator
     */
    public function popListGenerator() : \Generator
    {
        while($this->count() !== 0) {
            yield $this->pop();
        }
    }

    public function shift()
    {
        return  array_shift($this->internalStore);
    }

    public function unshift($item)
    {
        array_unshift($this->internalStore, $item);
    }

    public function unshiftList(array $items)
    {
        $this->internalStore = array_merge($items, $this->internalStore);
    }

    /**
     * @return \Generator
     */
    public function shiftListGenerator() : \Generator
    {
        while($this->count() !== 0) {
            yield $this->shift();
        }
    }

    public function getData(): array
    {
        return $this->internalStore;
    }

    public function count(): int
    {
        return $this->length = count($this->internalStore);
    }




}