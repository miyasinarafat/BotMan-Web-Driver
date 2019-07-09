<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class QuizConversation extends Conversation
{

    protected $quizId;

    public function __construct($quizId)
    {

        $this->quizId = $quizId;
    }

    public function run()
    {
       $this->askQuestion();
    }

    protected function askQuestion()
    {
        $question = Question::create("Who will be the winner of this Cricket Wold Cup 2019?")
            ->addButtons([
                Button::create('India')->value('India'),
                Button::create('New Zealand')->value('New Zealand'),
                Button::create('Australia')->value('Australia'),
                Button::create("England")->value('England'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            $ans = $answer->getText();
           $this->say('Your answer is: '. $ans .' In quiz: '.$this->quizId);
        });
    }

}
