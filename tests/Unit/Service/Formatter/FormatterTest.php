<?php

	declare(strict_types=1);

	use PHPUnit\Framework\TestCase;
	use Src\Exceptions\Formatter\FormatterException;
	use Src\Logger;
	use Src\Offer\Offer;
	use Src\Offer\OfferCollection;
	use Src\Offer\OfferCollectionInterface;
	use Src\Service\OfferFormatter\Formatter;

	class FormatterTest extends TestCase
	{
		private const OFFERSARRAY = [
			[
				"offerId" => 123,
				"productTitle" => "Coffee machine",
				"vendorId" => 35,
				"price" => 15.5
			],
			[
				"offerId" => 135,
				"productTitle" => "Coffee machine2",
				"vendorId" => 40,
				"price" => 230.0
			],

			[
				"offerId" => 133,
				"productTitle" => "Coffee machine3",
				"vendorId" => 40,
				"price" => 390.0
			],
		];

		public function test_format_array_to_offer_collection (): void
		{

			$offerCollection = new OfferCollection();
			$loggerMock = $this->createMock(Logger::class);
			$formatter = new Formatter($offerCollection, $loggerMock);
			$actual = $formatter->format(self::OFFERSARRAY);
			self::assertEquals($this->getExpectedFormattedData(), $actual);

		}

		public function test_it_throw_exception (): void
		{
			$wrongOfferData = [
				[
					"x" => 123,
					"productTitle" => "Coffee machine",
					"u" => 35,
					"price" => 15.5
				]
			];
			$offerCollection = new OfferCollection();
			$loggerMock = $this->createMock(Logger::class);
			$loggerMock->expects($this->once())->method('error')->with(Formatter::ERRORMESSAGE);

			$formatter = new Formatter($offerCollection, $loggerMock);
			$this->expectException(FormatterException::class);
			 $formatter->format($wrongOfferData);
		}
		private function getExpectedFormattedData (): OfferCollectionInterface
		{
			$offerCollection = new OfferCollection();

			foreach (self::OFFERSARRAY as $offer) {
				$newOffer = new Offer();
				$newOffer->setId($offer['offerId']);

				$newOffer->setPrice($offer['price']);
				$newOffer->setProductTitle($offer['productTitle']);

				$newOffer->setVendor($offer['vendorId']);
				$offerCollection->add($newOffer);
			}
			return $offerCollection;

		}
	}
