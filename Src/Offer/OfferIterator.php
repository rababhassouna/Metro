<?php
declare(strict_types=1);

namespace Src\Offer;

use Iterator;

class OfferIterator implements Iterator
{

    private OfferCollection $offerCollection;

    /**
     * @var int Stores the current traversal position. An iterator may have a
     * lot of other fields for storing iteration state, especially when it is
     * supposed to work with a particular kind of offerCollection.
     */
    private int $position = 0;


    public function __construct(protected OfferCollection $collection)
    {
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): Offer
    {
        return $this->collection->get($this->position);
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        $this->position++;
    }

    public function valid($position = null): bool
    {
        return !is_null($this->collection->get($this->position));

    }
}