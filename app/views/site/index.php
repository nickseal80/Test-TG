<?php

/**
 * @var yii\web\View $this
 * @var string|null $token
 * @var string|null $url
 */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Тестовое задание №1</h1>

        <p class="lead">Введите url ссылки для создания токена</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12 mb-3 text-center">
                <form action="token/create" method="post">
                    <div class="mb-3">
                        <input
                                type="text"
                                name="url"
                                class="form-control"
                                placeholder="URL"
                            <?php if (isset($url)) { ?>
                                value="<?= $url ?>"
                            <?php } ?>
                        />
                    </div>

                    <input
                            type="hidden"
                            name="<?= Yii::$app->getRequest()->csrfParam ?>"
                            value="<?= Yii::$app->getRequest()->csrfToken ?>"
                    />

                    <button type="submit" class="btn btn-primary">Создать токен</button>
                </form>
            </div>

            <?php if (isset($token)) { ?>
                <div class="col-lg-2">Ваш токен:</div>
                <div class="col-lg-2">
                    <a href="<?= $url ?>"><?= $token ?></a>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
