<?php

namespace Src\Offer;

use Iterator;
use Src\Offer\Iterator\OffersIterator;

class OfferCollection implements OfferCollectionInterface
{
    /**
     * @var offer[]
     */
    private array $offers = [];

    /**
     * @param OfferInterface $offer
     */
    public function add(OfferInterface $offer): void
    {
        $this->offers[] = $offer;
    }


	/**
	 * @param int $index
	 * @return Offer|null
	 */
	public function get(int $index):Offer|null
    {
	    if (isset($this->offers[$index])) {
		    return $this->offers[$index];
	    }

	    return null;
    }


	/**
	 * @return Iterator
	 */
	public function getIterator(): Iterator
    {
        return new OfferIterator($this);

    }
}