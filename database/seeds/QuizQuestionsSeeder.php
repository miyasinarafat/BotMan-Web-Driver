<?php

use Illuminate\Database\Seeder;

class QuizQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }

    public function getData()
    {
        return collect([
            [
                'question' => 'Who created Laravel?',
                'points' => '5',
                'answers' => [
                    ['text' => 'MD Iyasin Arafat', 'correct_one' => false],
                    ['text' => 'Jeffrey Way', 'correct_one' => false],
                    ['text' => 'Taylor Otwell', 'correct_one' => true],
                ],
            ],
            [
                'question' => 'Which of the following is a Laravel product?',
                'points' => '10',
                'answers' => [
                    ['text' => 'Horizon', 'correct_one' => true],
                    ['text' => 'Sunset', 'correct_one' => false],
                    ['text' => 'Nightfall', 'correct_one' => true],
                ],
            ],
            [
                'question' => 'When did Taylor release the first version of Laravel?',
                'points' => '20',
                'answers' => [
                    ['text' => '2009', 'correct_one' => false],
                    ['text' => '2010', 'correct_one' => false],
                    ['text' => '2011', 'correct_one' => true],
                ],
            ],
            [
                'question' => 'Which of these Symfony packages is NOT used in Laravel?',
                'points' => '25',
                'answers' => [
                    ['text' => 'symfony / console', 'correct_one' => false],
                    ['text' => 'symfony / http-kernel', 'correct_one' => false],
                    ['text' => 'symfony / doctrine-bridge', 'correct_one' => true],
                ],
            ],
            [
                'question' => 'In which Laravel version where Blade components and slots introduced?',
                'points' => '30',
                'answers' => [
                    ['text' => '5.4', 'correct_one' => true],
                    ['text' => '5.5', 'correct_one' => false],
                    ['text' => '5.6', 'correct_one' => false],
                ],
            ],
        ]);
    }
}
