<?php
	require_once __DIR__ . "/vendor/autoload.php";

	use Psr\Container\ContainerExceptionInterface;
	use Src\App;
	use Src\Container;
	use Src\Logger;
	use Src\Offer\OfferCollection;
	use Src\Service\Filters\FilterCreator;
	use Src\Service\Filters\Interfaces\CountByPriceInterface;
	use Src\Service\Filters\Interfaces\CountByVendorInterface;
	use Src\Service\OfferFormatter\Formatter;
	use Src\Service\Reader\JsonReader;

	$endPoint = 'https://run.mocky.io/v3/8055dcd9-b40e-4a3a-930e-7655db3bba90';
	$container = new Container();
	$app = new App($container);  // to set container bindings

	$filterOptions = [
		'CountByPrice' => CountByPriceInterface::class,
		'CountByVendor' => CountByVendorInterface::class,
	];
	if (!in_array($argv[1], array_keys($filterOptions))) {
		throw new Exception('Your provided wrong arguments');
	}

// TODO refactored to use http client class to call the api
	$offerApiResponse = file_get_contents(__DIR__ . '/Src/Service/Reader/jsonData.json');
	$logger = new Logger();
	$reader = new JsonReader($logger);

	try {
		$offerData = $reader->read($offerApiResponse);
		$formatter = new Formatter(new OfferCollection(), $logger);
		$data = $formatter->format($offerData);

		$filter = new FilterCreator($container, $filterOptions[$argv[1]]);
		echo $filter->create()->filter($data, ...array_slice($argv, 2)) . PHP_EOL;
	} catch (Exception $e) {
		$logger->error('some thing went wrong !');
		throw new Exception($e->getMessage());
	} catch (ContainerExceptionInterface $e) {
		$logger->error('some thing went wrong !');
		throw new Exception($e->getMessage());
	}
