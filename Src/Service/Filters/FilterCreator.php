<?php

namespace Src\Service\Filters;

use Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Src\Container;
use Src\Exceptions\Filters\FilterCreatorException;

class FilterCreator
{
    private FilterInterface $filterInstance;

	/**
	 * @throws ContainerExceptionInterface
	 * @throws FilterCreatorException
	 * @throws NotFoundExceptionInterface
	 */
	public function __construct(private Container $container, private string $filter)
    {
        try {
            $this->filterInstance = $this->container->get($this->filter);
        } catch (Exception $e) {
	        throw new FilterCreatorException('Can not create instance from filter');
        }
    }

    public function create()
    {
        return $this->filterInstance;
    }
}