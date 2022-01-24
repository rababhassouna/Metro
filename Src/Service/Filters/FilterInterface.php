<?php
namespace Src\Service\Filters;

use Src\Offer\OfferCollectionInterface;

interface FilterInterface {
    public function filter(OfferCollectionInterface $collection):int;
}