<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
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
                Button::create('Laravel basic')->value('quiz'.(1)),
                Button::create('Laravel history')->value('quiz'.(2)),
                Button::create('Laravel advanced')->value('quiz'.(3)),
            ]);
        $this->say($question);
    }
}
