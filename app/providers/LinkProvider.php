<?php

namespace app\providers;

use app\repositories\LinkRepository;
use app\repositories\LinkRepositoryInterface;
use app\services\LinkService;
use app\services\LinkServiceInterface;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;

class LinkProvider implements BootstrapInterface
{

    /**
     * @param Application $app
     * @return void
     */
    public function bootstrap($app): void
    {
        Yii::$container->set(LinkRepositoryInterface::class, LinkRepository::class);
        Yii::$container->set(LinkServiceInterface::class, LinkService::class);
    }
}