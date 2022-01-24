<?php
	declare(strict_types=1);

	namespace Src\Service\Filters;

	use Psr\Log\LoggerInterface;
	use Src\Service\Filters\Interfaces\CountByVendorInterface;
	use Src\Offer\Offer;
	use Src\Offer\OfferCollection;
	use Src\Offer\OfferCollectionInterface;
	use function array_filter;
	use function count;
	use function func_get_arg;
	use function iterator_to_array;

	class CountByVendor implements FilterInterface, CountByVendorInterface
	{
		public function __construct (protected LoggerInterface $logger)
		{
		}

		public function filter (OfferCollectionInterface $collection): int
		{
			$this->logger?->info('Count By Vendor Processing');

			$vendorId = func_get_arg(1);

			$filterOffers = array_filter(iterator_to_array($collection->getIterator()), function (Offer $offer) use ($vendorId) {
				if ($offer->getVendor() == $vendorId ) {
					return true;
				}
			});

			return count($filterOffers);
		}

	}