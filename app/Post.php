<?php

namespace App;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'excerpt', 'body', 'view_count', 'image'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getBodyHtmlAttribute(){
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

}
