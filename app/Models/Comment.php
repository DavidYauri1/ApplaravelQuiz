<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'comments';

    public $orderable = [
        'id',
        'name',
        'email',
        'comment_text',
        'question.question_text',
        'quiz.title',
    ];

    public $filterable = [
        'id',
        'name',
        'email',
        'comment_text',
        'question.question_text',
        'quiz.title',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'comment_text',
        'question_id',
        'quiz_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
