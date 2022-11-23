<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @internal
 * @coversNothing
 */
class Test extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'tests';

    public $orderable = [
        'id',
        'user.name',
        'quiz.title',
        'result',
        'ip_address',
        'time_spent',
        'created_at'
    ];

    public $filterable = [
        'id',
        'user.name',
        'quiz.title',
        'result',
        'ip_address',
        'time_spent',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'quiz_id',
        'result',
        'ip_address',
        'time_spent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'test_answers', 'test_id', 'question_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
