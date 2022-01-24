<?php

declare(strict_types=1);

namespace Src;

use Psr\Log\LoggerInterface;
use Src\Service\Filters\CountByPrice;
use Src\Service\Filters\CountByVendor;
use Src\Service\Filters\Interfaces\CountByPriceInterface;
use Src\Service\Filters\Interfaces\CountByVendorInterface;

final class App
{
    public function __construct(private Container $container)
    {
        $this->container->set(LoggerInterface::class, Logger::class);
        $this->container->set(CountByPriceInterface::class, CountByPrice::class);
	    $this->container->set(CountByVendorInterface::class, CountByVendor::class);

    }
}