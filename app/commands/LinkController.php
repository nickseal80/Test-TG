<?php

namespace app\commands;

use app\services\LinkService;
use app\services\LinkServiceInterface;
use yii\console\Controller;
use yii\console\ExitCode;

class LinkController extends Controller
{
    private LinkServiceInterface $linkService;

    public function __construct($id, $module, LinkServiceInterface $linkService,$config = [])
    {
        $this->linkService = $linkService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex(): int
    {
        $this->linkService->hello();

        return ExitCode::OK;
    }


}

