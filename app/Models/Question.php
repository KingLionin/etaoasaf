<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'questions';

    protected $fillable = [
         'title',
         'option_id'
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
