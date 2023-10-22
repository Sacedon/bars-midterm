<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'species', 'age'];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
