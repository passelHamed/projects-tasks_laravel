<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;

    protected $fillable = ['body' , 'project_id' , 'done'];

    public function project()
    {
        return $this->belongsTo(project::class);
    }
}
