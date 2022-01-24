<?php
declare(strict_types=1);

namespace Src\Service\OfferFormatter;

use Src\Offer\OfferCollectionInterface;

interface OfferFormatterInterface
{
    public function format(array $data): OfferCollectionInterface;
}