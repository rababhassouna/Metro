<?php

	namespace Src\Offer;

	use Iterator;

	interface OfferCollectionInterface
	{
		/**
		 * @param OfferInterface $offer
		 */
		public function add (OfferInterface $offer): void;

		/**
		 * @param int $index
		 * @return Offer
		 */
		public function get (int $index): Offer|null;

		/**
		 * @return array
		 */

		public function getIterator (): Iterator;
	}