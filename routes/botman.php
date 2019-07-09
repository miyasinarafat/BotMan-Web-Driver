<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\BotMan;

$botman = resolve('botman');

$botman->hears('Hi', function (BotMan $bot) {
    //dd(app('request')->get('userId'));
    dd($bot->getUser()->getId());
    //$bot->ask('What is your name?', function ($ans) use ($bot) {
   //     dd($ans);
    //});


    //$bot->reply('Hello!');
});

$botman->hears('quiz{id}', function (BotMan $bot, $quizId) {
   dd($quizId, $bot->getMessage());
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
