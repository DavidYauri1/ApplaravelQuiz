<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'questions';

    public $orderable = [
        'id',
        'question_text',
        'code_snippet',
        'answer_explanation',
        'more_info_link',
        'topic.title',
    ];

    public $filterable = [
        'id',
        'question_text',
        'code_snippet',
        'answer_explanation',
        'more_info_link',
        'topic.title',
        'quizzes.title',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question_text',
        'code_snippet',
        'answer_explanation',
        'more_info_link',
        'topic_id',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(TestAnswer::class);
    }

    public function questionOptions()
    {
        return $this->hasMany(QuestionsOption::class)->inRandomOrder();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
