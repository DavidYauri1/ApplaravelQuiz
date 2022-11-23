<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'quizzes';

    public $filterable = [
        'id',
        'title',
        'slug',
        'description',
    ];

    public $orderable = [
        'id',
        'title',
        'slug',
        'description',
        'published',
        'public',
        'questions_count'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'published' => 'boolean',
        'public'    => 'boolean',
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'published',
        'public',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
