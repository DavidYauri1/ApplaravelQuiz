<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use App\Models\Quiz;
use Livewire\Livewire;
use App\Http\Livewire\Quiz\Edit;
use App\Http\Livewire\Quiz\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizzesTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminCanCreateQuiz()
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(Create::class)
            ->set('quiz.title', 'quiz title')
            ->call('submit')
            ->assertHasNoErrors(['quiz.title', 'quiz.slug', 'quiz.description', 'quiz.published', 'quiz.public', 'questions'])
            ->assertRedirect(route('quizzes.index'));

        $this->assertTrue(Quiz::where('title', 'quiz title')->exists());
    }

    public function testTitleIsRequired()
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(Create::class)
            ->set('quiz.title', '')
            ->call('submit')
            ->assertHasErrors(['quiz.title' => 'required']);

        Livewire::test(Edit::class)
            ->set('quiz.title', '')
            ->call('submit')
            ->assertHasErrors(['quiz.title' => 'required']);
    }

    public function testAdminCanEditQuiz()
    {
        $this->actingAs(User::factory()->admin()->create());

        $quiz = Quiz::factory()->create();

        Livewire::test(Edit::class, [$quiz])
            ->set('quiz.title', 'new quiz')
            ->set('quiz.published', true)
            ->call('submit')
            ->assertSet('quiz.published', true)
            ->assertHasNoErrors(['quiz.title', 'quiz.slug', 'quiz.description', 'quiz.published', 'quiz.public', 'questions']);

        $this->assertTrue(Quiz::where('title', 'new quiz')->where('published', true)->exists());
    }
}
