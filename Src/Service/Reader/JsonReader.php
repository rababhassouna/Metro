<?php
declare(strict_types=1);

namespace Src\Service\Reader;

use Psr\Log\LoggerInterface;
use Exception;
use Src\Exceptions\Reader\ReaderException;

class JsonReader implements ReaderInterface
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    /**
     * read data
     * @param string $data
     * @return array
     */
    public function read(string $data): array
    {
        try {
            return json_decode($data, true);
        } catch (Exception $e){
            $this->logger->error($e->getTrace());
            throw new ReaderException();
        }

    }
}