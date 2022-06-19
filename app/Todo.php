<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = [];

    public function change_completed()
    {
        $this->completed = !$this->completed;
        $this->save();
        
        if($this->completed === true) return 'Yes';
        return 'No';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
