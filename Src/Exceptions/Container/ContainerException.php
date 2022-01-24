<?php

declare(strict_types = 1);

namespace Src\Exceptions\Container;

use Psr\Container\ContainerExceptionInterface;
use Exception;

class ContainerException extends Exception implements ContainerExceptionInterface
{

}