<?php
	declare(strict_types=1);

	namespace Src\Service\Filters;

	use Psr\Log\LoggerInterface;
	use Src\Offer\Offer;
	use Src\Offer\OfferCollectionInterface;
	use Src\Service\Filters\Interfaces\CountByPriceInterface;
	use function array_filter;
	use function count;
	use function func_get_arg;
	use function iterator_to_array;

	class CountByPrice implements FilterInterface, CountByPriceInterface
	{
		 public const  INFOMESSAGE = 'Count By Price Processing';
		public function __construct (protected LoggerInterface $logger)
		{
		}

		public function filter (OfferCollectionInterface $collection): int
		{
			$this->logger?->info(self::INFOMESSAGE);

			$start = func_get_arg(1);
			$end = func_get_arg(2);
			$filterOffers = array_filter(iterator_to_array($collection->getIterator()), function (Offer $offer) use ($start, $end) {
				if ($offer->getPrice() >= $start && $offer->getPrice() <= $end) {
					return true;
				}
			});
			return count($filterOffers);
		}

	}