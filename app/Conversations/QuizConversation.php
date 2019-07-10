<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class QuizConversation extends Conversation
{

    protected $quizId;
    protected $quizQuestions;
    protected $questionCount = 0;
    protected $userPoints = 0;
    protected $userCorrectAnswers = 0;
    protected $currentQuestion = 1;

    public function __construct($quizId)
    {
        $this->quizQuestions = optional(new \QuizQuestionsSeeder())->getData();
        $this->questionCount = $this->quizQuestions->count();
        $this->quizId = $quizId;
    }

    public function run()
    {
       $this->checkNextQuestion();
    }

    protected function checkNextQuestion()
    {
        if ($this->quizQuestions->count()) {
            return $this->askQuestion($this->quizQuestions->first());
        }
        $this->printResult();
    }


    protected function askQuestion($question)
    {
        $this->ask($this->questionTemplate($question), function (Answer $answer) use ($question) {
            $this->quizQuestions->forget(($this->currentQuestion-1));

            if ($answer->getValue() === "true") {
                $this->userPoints += $question['points'];
                $this->userCorrectAnswers++;
                $ansResult = '✅';
            } else {
                $ansResult = '❌';
            }

            $this->currentQuestion++;

            $this->say("Your answer: {$ansResult}");
            $this->checkNextQuestion();
        });
    }

    protected function questionTemplate($question)
    {
        $questionText = 'Question: '.$this->currentQuestion.' / '.$this->questionCount.' : '. $question['question'];
        $questionTemplate = Question::create($questionText);

        foreach ($question['answers'] as $answer) {
            $questionTemplate->addButton(Button::create($answer['text'])->value($answer['correct_one']));
        }

        return $questionTemplate;
    }

    protected function printResult()
    {
        $this->say('Finished 😱');
        $this->say("You reached {$this->userPoints} points! <br> Correct answers: {$this->userCorrectAnswers} / {$this->questionCount}");
    }

}
