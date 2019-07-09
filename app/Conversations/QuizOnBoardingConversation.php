<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class QuizOnBoardingConversation extends Conversation
{
    public function run()
    {
       $this->askQuiz();
    }

    protected function askQuiz()
    {
        $question = Question::create("Here is quiz list for you!")
            ->addButtons([
                Button::create('Who will be the winner of first Semi-final')->value('quiz'.(1)),
                Button::create('Who will be the winner of second Semi-final')->value('quiz'.(2)),
                Button::create('Who will be the winner of this Cricket Wold Cup 2019?')->value('quiz'.(3)),
            ]);
        $this->say($question);
    }
}
