<?php

namespace app\controllers;

use app\DTO\LinkDTO;
use app\services\LinkServiceInterface;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use Yii;
use yii\web\Controller;

class LinkController extends Controller
{
    private LinkServiceInterface $linkService;

    public function __construct($id, $module, LinkServiceInterface $linkService, $config = [])
    {
        $this->linkService = $linkService;

        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $url = Yii::$app->request->post('url');

        if (!$url) {
            return $this->goBack();
        }

        /* @var LinkDTO|null $data */
        $data = $this->linkService->createLink($url);

        if (!$data) {
            Yii::$app->getSession()->addFlash('error', 'Ошибка создания токена');
            return $this->goHome();
        }



        Yii::$app->getSession()->addFlash('success', 'Токен успешно создан');
        return $this->redirect("/{$data->getName()}/{$data->getUrl()}");
    }

}
