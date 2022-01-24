<?php
declare(strict_types=1);

namespace Src\Offer;

class Offer implements OfferInterface
{
    private int $id;
    private string $productTitle;
    private float $price;
    private int $vendor;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Offer
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Offer
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductTitle(): string
    {
        return $this->quantity;
    }

    /**
     * @param string $productTitle
     * @return Offer
     */
    public function setProductTitle(string $productTitle): self
    {
        $this->productTitle = $productTitle;

        return $this;
    }

    /**
     * @return int
     */
    public function getVendor(): int
    {
        return $this->vendor;
    }

    /**
     * @param int $vendor
     * @return Offer
     */
    public function setVendor(int $vendor): self
    {
        $this->vendor = $vendor;

        return $this;
    }
}