<?php

use App\Conversations\QuizConversation;
use App\Conversations\QuizOnBoardingConversation;
use App\Http\Controllers\BotManController;
use BotMan\BotMan\BotMan;

$botman = resolve('botman');

$botman->hears('Hi', function (BotMan $bot) {
    $bot->reply('Hello!');
});

$botman->hears('onboarding', function (BotMan $bot) {
    $bot->startConversation(new QuizOnBoardingConversation());
});

$botman->hears('quiz{id}', function (BotMan $bot, $quizId) {
    $bot->startConversation(new QuizConversation($quizId));
});

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Please try again!');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
