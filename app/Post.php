<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'slug', 'img', 'body', 'iframe', 'user_id'
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'   => 'title',
                'onUpdate' => true,
            ]
        ];
    }
    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
                    
    public function getExtractAttribute()
    {       
        return substr($this->body, 0, 140) . '...';
    }

    public function getRutaImgAttribute()
    {
        if ($this->img) {
            return url('storage/' . $this->img);
        }   
    }
}
