<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'topic_create',
            ],
            [
                'id'    => 19,
                'title' => 'topic_edit',
            ],
            [
                'id'    => 20,
                'title' => 'topic_show',
            ],
            [
                'id'    => 21,
                'title' => 'topic_delete',
            ],
            [
                'id'    => 22,
                'title' => 'topic_access',
            ],
            [
                'id'    => 23,
                'title' => 'question_create',
            ],
            [
                'id'    => 24,
                'title' => 'question_edit',
            ],
            [
                'id'    => 25,
                'title' => 'question_show',
            ],
            [
                'id'    => 26,
                'title' => 'question_delete',
            ],
            [
                'id'    => 27,
                'title' => 'question_access',
            ],
            [
                'id'    => 33,
                'title' => 'quiz_create',
            ],
            [
                'id'    => 34,
                'title' => 'quiz_edit',
            ],
            [
                'id'    => 35,
                'title' => 'quiz_show',
            ],
            [
                'id'    => 36,
                'title' => 'quiz_delete',
            ],
            [
                'id'    => 37,
                'title' => 'quiz_access',
            ],
            [
                'id'    => 38,
                'title' => 'test_create',
            ],
            [
                'id'    => 39,
                'title' => 'test_edit',
            ],
            [
                'id'    => 40,
                'title' => 'test_show',
            ],
            [
                'id'    => 41,
                'title' => 'test_delete',
            ],
            [
                'id'    => 42,
                'title' => 'test_access',
            ],
            [
                'id'    => 43,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 44,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 45,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 46,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 47,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 48,
                'title' => 'comment_create',
            ],
            [
                'id'    => 49,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 50,
                'title' => 'comment_show',
            ],
            [
                'id'    => 51,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 52,
                'title' => 'comment_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
