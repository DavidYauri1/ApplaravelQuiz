<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestAnswer extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'test_answers';

    public $filterable = [
        'id',
        'user.name',
        'test.result',
        'question.question_text',
        'option.option',
    ];

    public $orderable = [
        'id',
        'user.name',
        'test.result',
        'question.question_text',
        'option.option',
        'correct',
    ];

    protected $casts = [
        'correct' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'test_id',
        'question_id',
        'option_id',
        'correct',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(QuestionsOption::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
