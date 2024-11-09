<?php

namespace app\services;

use app\DTO\LinkDTO;
use app\repositories\LinkRepositoryInterface;
use Yii;
use yii\base\Component;
use Exception;

class LinkService extends Component implements LinkServiceInterface
{
    const DEFAULT_TOKEN_LENGTH = 5;
    private LinkRepositoryInterface $linkRepository;

    public function __construct(LinkRepositoryInterface $linkRepository, $config = [])
    {
        $this->linkRepository = $linkRepository;
        parent::__construct($config);
    }

    /**
     * @param string $url
     * @return LinkDTO|null
     * @throws Exception
     */
    public function createLink(string $url): ?LinkDTO
    {
        $token = $this->generateToken();

        $data = new LinkDTO();
        $data->setName($token);
        $data->setUrl($url);

        return $this->linkRepository->create($data);
    }

    /**
     * @return string
     * @throws Exception
     */
    private function generateToken(): string
    {
        $chars = Yii::$app->params['token']['permittedChars'];

        // По хорошему, если код в прод, нужно делать кастомные исключения для приложения
        if (!$chars) {
            throw new Exception('Token permitted chars was not found!');
        }

        $tokenLength = Yii::$app->params['token']['tokenLength'] ?? self::DEFAULT_TOKEN_LENGTH;

        $inputLength = strlen($chars) - 1; // т.к. random_int min=0;
        $token = '';

        for ($i = 0; $i < $tokenLength; $i++) {
            $randChar = $chars[random_int(0, $inputLength)];
            $token .= $randChar;
        }

        return $token;
    }
}
