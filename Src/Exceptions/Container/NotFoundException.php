<?php

declare(strict_types = 1);

namespace Src\Exceptions\Container;

use Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends \Exception implements NotFoundExceptionInterface
{
}