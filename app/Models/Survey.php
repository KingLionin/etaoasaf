<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'surveys';

    protected $fillable = [
        'survey_title',
        'survey_description',
        'question_id'
    ];

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
