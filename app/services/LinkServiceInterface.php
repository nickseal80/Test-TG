<?php

namespace app\services;

use app\DTO\LinkDTO;

interface LinkServiceInterface
{
    public function createLink(string $url): ?LinkDTO;
}