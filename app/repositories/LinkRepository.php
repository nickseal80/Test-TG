<?php

namespace app\repositories;

use app\DTO\LinkDTO;
use app\models\Link;
use yii\base\Component;
use yii\db\Exception;

class LinkRepository extends Component implements LinkRepositoryInterface
{
    /**
     * @throws Exception
     */
    public function create(LinkDTO $data): ?LinkDTO
    {
        $model = new Link();

        $model->name = $data->getName();
        $model->url = $data->getUrl();

        if ($model->save()) {
            return $data;
        }

        // Подливаем масло в извечный холивар о return null :)))
        return null;
    }
}