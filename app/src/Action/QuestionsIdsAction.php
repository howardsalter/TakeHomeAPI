<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class QuestionsIdsAction
{
    private $view;
    private $logger;
    private $questions;

    public function __construct(Twig $view, LoggerInterface $logger, $settings)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->questions = $settings['questions'];
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $ids = [];

        $this->logger->info("Question Ids action dispatched");
        for ($i = 0; $i < count($this->questions); $i++) {
            $ids[$i] = $this->questions[$i]['id'];
        }
        
        return $response->withJson($ids);
    }
}
