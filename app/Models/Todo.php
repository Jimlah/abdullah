<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'is_marked',
    ];

    protected $casts = [
        'marked' => 'boolean'
    ];

    public function toggleMark(): bool
    {
        if($this->is_marked)
        {
            $this->update(['is_marked' => false]);
            return true;
        }
        $this->update(['is_marked' => true]);
        return true;
    }
}
