<?php

namespace Src\Service\OfferFormatter;

use Psr\Log\LoggerInterface;
use Src\Exceptions\Formatter\FormatterException;
use Src\Offer\Offer;
use Src\Offer\OfferCollection;
use Src\Offer\OfferCollectionInterface;
use Exception;
class Formatter implements OfferFormatterInterface
{
	public const ERRORMESSAGE = 'Some thing went wrong!';
    /**
     * @var OfferCollection
     */

    public function __construct(public OfferCollection $offerCollection, private LoggerInterface $logger)
    {
    }

    public function format(array $data): OfferCollectionInterface
    {

        try {

            foreach ($data as $offer) {
                $newOffer = new Offer();
                $newOffer->setId($offer['offerId']);

                $newOffer->setPrice($offer['price']);
                $newOffer->setProductTitle($offer['productTitle']);

                $newOffer->setVendor($offer['vendorId']);
                $this->offerCollection->add($newOffer);
            }

            return $this->offerCollection;
        } catch (Exception $exception) {
            $this->logger->error(self::ERRORMESSAGE);
            throw new FormatterException();
        }
    }
}