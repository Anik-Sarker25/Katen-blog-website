<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [''];

    public function reletionwithtags() {
        return $this->belongsToMany(Tag::class);
    }
    public function reletionwithcategory() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function reletionwithuser() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }



}
