<?php

	namespace Offer;

	use PHPUnit\Framework\TestCase;
	use Src\Offer\Offer;

	class OfferTest extends TestCase
	{
		private Offer $offer;
		private int $testInt = 5;

		public function testGetId (): void
		{
			$this->offer->setId($this->testInt);
			$this->assertEquals($this->testInt, $this->offer->getId());
		}

		public function testGetPrice (): void
		{
			$this->offer->setPrice($this->testInt);
			$this->assertEquals($this->testInt, $this->offer->getPrice());
		}


		public function testGetVendor (): void
		{
			$this->offer->setVendor($this->testInt);
			$this->assertEquals($this->testInt, $this->offer->getVendor());
		}

		protected function setUp (): void
		{
			$this->offer = new Offer();
		}
	}