<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionsOption extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'questions_options';

    public $filterable = [
        'id',
        'option',
        'question.question_text',
    ];

    public $orderable = [
        'id',
        'option',
        'correct',
        'question.question_text',
    ];

    protected $casts = [
        'correct' => 'boolean',
    ];

    protected $fillable = [
        'option',
        'correct',
        'question_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
