<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'surveys';

    protected $fillable = ['survey_title', 'survey_description', 'distribute_position', 'distribute_type', 'created_at', 'start_date', 'end_date'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
