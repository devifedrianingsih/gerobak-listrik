<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $primaryKey = 'ArticleID';

    protected $fillable = [
        'Title',
        'Content',
        'Image',
        'DateTimeOfPublication',
        'CategoryArticle',
        'Tags',
        'AuthorID'
    ];

    public $timestamps = true;

    // Jika AuthorID adalah relasi ke model Admin
    public function author()
    {
        return $this->belongsTo(Admin::class, 'AuthorID', 'AdminID');
    }
}
