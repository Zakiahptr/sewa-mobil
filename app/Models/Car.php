<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const IMAGE_PATH = 'images/carPict';

    public function img()
    {
        return Storage::url($this->img);
    }

    public function user()
    {
        return $this->belongsTo((User::class));
    }
}
