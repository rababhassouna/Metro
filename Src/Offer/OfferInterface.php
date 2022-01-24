<?php
declare(strict_types=1);

namespace Src\Offer;

use Src\Service\Vendor;

interface OfferInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getProductTitle(): string;


    /**
     * @return float
     */
    public function getPrice(): float;


    /**
     * @return int
     */
    public function getVendor(): int;
}