<?php

namespace Src\Service\Reader;


interface ReaderInterface
{
    /**
     * @param string $data
     * @return array
     */
    public function read(string $data): array;
}