<?php

namespace app\repositories;

use app\DTO\LinkDTO;

interface LinkRepositoryInterface
{
    public function create(LinkDTO $data): ?LinkDTO;
}