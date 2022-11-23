<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\PermissionRoleTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminCanAndOthersCannotAccessTopicsPage()
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->get(route('topics.index'));

        $response->assertOk();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('topics.index'));

        $response->assertForbidden();

        $response = $this->get(route('topics.index'));

        $response->assertForbidden();
    }

    public function testAdminCanAndOthersCannotAccessQuestionsPage()
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->get(route('questions.index'));

        $response->assertOk();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('questions.index'));

        $response->assertForbidden();

        $response = $this->get(route('questions.index'));

        $response->assertForbidden();
    }

    public function testAdminCanAndOthersCannotAccessQuizzesPage()
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->get(route('quizzes.index'));

        $response->assertOk();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('quizzes.index'));

        $response->assertForbidden();

        $response = $this->get(route('quizzes.index'));

        $response->assertForbidden();
    }

    public function testAdminCanAndOthersCannotAccessTestsPage()
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->get(route('tests.index'));

        $response->assertOk();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('tests.index'));

        $response->assertForbidden();

        $response = $this->get(route('tests.index'));

        $response->assertForbidden();
    }

    public function testAdminCanAndOthersCannotAccessCommentsPage()
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->get(route('comments.index'));

        $response->assertOk();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('comments.index'));

        $response->assertForbidden();

        $response = $this->get(route('comments.index'));

        $response->assertForbidden();
    }
}
