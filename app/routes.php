<?php
// Routes

$app->get('/', App\Action\HomeAction::class)
    ->setName('homepage');

$app->get('/questions', App\Action\QuestionsAction::class)
    ->setName('questions');

$app->get('/questions/ids', App\Action\QuestionsIdsAction::class)
    ->setName('ids');

$app->get('/question/{id}', App\Action\QuestionAction::class)
    ->setName('question');

$app->get('/question/{id}/answer', App\Action\AnswerAction::class)
    ->setName('answer');        