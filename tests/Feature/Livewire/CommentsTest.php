<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Comment;
use App\Http\Livewire\Comment\Edit;
use App\Http\Livewire\Comment\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentsTest extends TestCase
{
    use RefreshDatabase;
    
    public function testCommentTextIsRequired()
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(Create::class)
            ->set('comment.comment_text', '')
            ->call('submit')
            ->assertHasErrors(['comment.comment_text' => 'required']);
    }

    public function testAdminCanEditComment()
    {
        $this->actingAs(User::factory()->admin()->create());

        $comment = Comment::factory()->create();

        Livewire::test(Edit::class, [$comment])
            ->set('comment.comment_text', 'very smart comment')
            ->call('submit')
            ->assertHasNoErrors(['comment.name', 'comment.email', 'comment.comment_text', 'comment.question_id', 'comment.quiz_id'])
            ->assertRedirect(route('comments.index'));

        $this->assertTrue(Comment::where('comment_text', 'very smart comment')->exists());
    }
}
