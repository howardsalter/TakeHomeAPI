<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class QuestionAction
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
        $this->logger->info("Questions action dispatched");

        for ($i = 0; $i < count($this->questions); $i++) {
            if ($this->questions[$i]['id'] == intval($args['id'])) {
                return $response->withJson($this->questions[$i]);
            }
        }
        
        return $response->withJson(["found" => false, $args]);
    }
}
