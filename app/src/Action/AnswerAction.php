<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class AnswerAction
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
        $this->logger->info("Answer action dispatched");

        for ($i = 0; $i < count($this->questions); $i++) {
            if ($this->questions[$i]['id'] == $args['id']) {
                return $response
                ->withJson($this->questions[$i]['correct'])
                ->withHeader('Access-Control-Allow-Origin', 'http://pure-ravine-27491.herokuapp.com/')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
            }
        }
        
        return $response->withJson(["found" => false]);
    }
}
