<?php
	declare(strict_types=1);

	use PHPUnit\Framework\TestCase;
	use Src\Logger;
	use Src\Offer\OfferCollection;
	use Src\Service\Filters\CountByPrice;
	use Src\Service\OfferFormatter\Formatter;

	class CountByPriceTest extends TestCase
	{
		/**
		 * @dataProvider getFiltersProvider
		 */
		public function test_filter_by_price (int $start, int $end, int $expectedCount): void
		{
			$loggerMock = $this->createMock(Logger::class);
			$loggerMock->expects($this->once())->method('info')->with(CountByPrice::INFOMESSAGE);
			$countByPrice = new CountByPrice($loggerMock);
			$actualCount = $countByPrice->filter($this->getOfferData(), $start, $end);
			self::assertSame($expectedCount, $actualCount);
		}

		public function getFiltersProvider (): array
		{
			return [
				[10, 250, 2],
				[10, 20, 1],
				[500, 600, 0],
				[0, 0, 0]
			];
		}

		private function getOfferData (): OfferCollection
		{
			$data = [
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
			$offerCollection = new OfferCollection();
			$loggerMock = $this->createMock(Logger::class);
			$formatter = new Formatter($offerCollection,$loggerMock);
			return $formatter->format($data);
		}
	}