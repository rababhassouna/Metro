<?php

namespace Src\Service\Filters;

use Src\Offer\OfferCollectionInterface;

class FilterByVendor implements FilterInterface
{
    public function __construct(OfferCollectionInterface $collection)
    {
    }
    public function filter(OfferCollectionInterface $collection):int
    {
        return  count($collection);
    }
}