<?php

namespace App\Console\Commands;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Topic;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SeedTestingQuizzesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quizzes:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed demo quizzes with options, for testing';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $demoData = [
            'Geography' => [
                'Capitals of the world' => [
                    'description' => 'Guess which is the capital of each of those countries',
                    'questions' => [
                        'Capital of Lithuania?' => [
                            'options' => [
                                'Riga' => false, // correct or not
                                'Vilnius' => true,
                                'Tallinn' => false,
                                'Minsk' => false,
                            ],
                            'answer_explanation' => 'Riga is capital of Latvia, Tallinn is capital of Estonia, Minsk is capital of Belarus. And Vilnius is capital of Lithuania',
                            'more_info_link' => 'https://en.wikipedia.org/wiki/Vilnius',
                        ],
                        'Capital of Sweden?' => [
                            'options' => [
                                'Copenhagen' => false,
                                'Stockholm' => true,
                                'Helsinki' => false,
                                'Oslo' => false,
                            ],
                        ],
                        'Capital of Australia?' => [
                            'options' => [
                                'Canberra' => true,
                                'Sydney' => false,
                                'Melbourne' => false,
                                'Adelaide' => false,
                            ],
                        ],
                        'Capital of United States?' => [
                            'options' => [
                                'Washington' => true,
                                'New York' => false,
                                'Los Angeles' => false,
                                'Chicago' => false,
                            ],
                        ],
                        'Capital of Kenya?' => [
                            'options' => [
                                'Nairobi' => true,
                                'Maputo' => false,
                                'Luanda' => false,
                                'Dakar' => false,
                            ],
                        ]
                    ],
                    'published' => true
                ],
                'State Capitals of United States of America' => [
                    'description' => 'Do you know the capitals of US States?',
                    'questions' => [
                        'Capital of California?' => [
                            'options' => [
                                'Sacramento' => true,
                                'Los Angeles' => false,
                                'San Diego' => false,
                                'San Francisco' => false,
                            ],
                        ],
                        'Capital of New York?' => [
                            'options' => [
                                'New York City' => false,
                                'Albany' => true,
                                'Westchester' => false,
                                'Buffalo' => false,
                            ],
                        ],
                        'Capital of Texas?' => [
                            'options' => [
                                'Austin' => true,
                                'Houston' => false,
                                'San Antonio' => false,
                                'Dallas' => false,
                            ],
                        ],
                        'Capital of Illinois?' => [
                            'options' => [
                                'Chicago' => false,
                                'Aurora' => false,
                                'Springfield' => true,
                                'Naperville' => false,
                            ],
                        ],
                        'Capital of Massachusetts?' => [
                            'options' => [
                                'Boston' => true,
                                'Worcester' => false,
                                'Springfield' => false,
                                'Cambridge' => false,
                            ],
                        ]
                    ],
                    'published' => true,
                ]
            ],
            'Programming' => [
                'Laravel Basics' => [
                    'description' => 'Very basic questions about Laravel framework',
                    'questions' => [
                        'In Form Request classes that are used for validation, there are two methods. Method "rules()" should return an array, what should another method "authorize()" return?' => [
                            'options' => [
                                'Error message string' => false,
                                'Depends on parameters' => false,
                                'True or False' => true,
                                'Also an array' => false,
                            ],
                        ],
                        'If you try to run "php artisan migrate" with "APP_ENV=production", Laravel will ask you to confirm "Are you sure you want to run this in production"? What is the command to avoid this message and confirm that migration upfront?' => [
                            'options' => [
                                'php artisan migrate:fresh' => false,
                                'php artisan migrate --force' => true,
                                'php artisan migrate --seed' => false,
                                'php artisan migrate:rollback' => false,
                            ],
                        ],
                        'Look at the code snippet. What would be the result of URL "/people/steve/"?' => [
                            'code_snippet' => 'Route::get(\'people/{name}/{surname?}\', function ($name, $surname) {
    return \'Hello \' . $name . \' \' . $surname;
});',
                            'options' => [
                                'Will throw an error' => false,
                                'Will show "Hello"' => false,
                                'Will show "Hello steve"' => true,
                                'Will show "Hello steve surname"' => false,
                            ]
                        ],
                        'Look at the Blade code snippet. What is hiding behind XXXXX?' => [
                            'code_snippet' => '@foreach ($users as $user)
    @if (XXXXX->first)
        This is the first iteration.
    @endif
@endforeach',
                            'options' => [
                                '$index' => false,
                                'item()' => false,
                                '$loop' => true,
                                '$this' => false,
                            ]
                        ],
                        'See code snippet from "routes/web.php" file. How do you write a code for the link to "Create photo" form?' => [
                            'code_snippet' => 'Route::name(\'admin.\')->group(function () {
    Route::resource(\'photos\', \'PhotoController\');
});',
                            'options' => [
                                'route(\'admin.photos.create\')' => true,
                                'route(\'admin\', \'photos.create\')' => false,
                                'route(\'admin.photos\') . create' => false,
                                'route(\'photos.create\')' => false,
                            ]
                        ]
                    ],
                    'published' => true,
                    'public' => true,
                ],
            ]
        ];

        foreach ($demoData as $topic => $quizzes) {
            $newTopic = Topic::create([
                'title' => $topic
            ]);

            foreach ($quizzes as $quizName => $quizData) {
                $newQuiz = Quiz::create([
                    'title' => $quizName,
                    'slug' => Str::slug($quizName),
                    'description' => $quizData['description'],
                    'published' => $quizData['published'] ?? false,
                    'public' => $quizData['public'] ?? false,
                ]);

                foreach ($quizData['questions'] as $questionText => $question) {
                    $newQuestion = Question::create([
                        'question_text' => $questionText,
                        'topic_id' => $newTopic->id,
                        'code_snippet' => $question['code_snippet'] ?? NULL,
                        'answer_explanation' => $question['answer_explanation'] ?? NULL,
                        'more_info_link' => $question['more_info_link'] ?? NULL,
                    ]);
                    $newQuestion->quizzes()->attach($newQuiz->id);

                    foreach ($question['options'] as $optionText => $isCorrect) {
                        $newQuestion->questionOptions()->create([
                            'option' => $optionText,
                            'correct' => $isCorrect
                        ]);
                    }
                }
            }
        }


        $this->info('Data seeded successfully.');

        return Command::SUCCESS;
    }
}
