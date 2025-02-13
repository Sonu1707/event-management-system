<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TalkProposal extends Model
{
    // Fillable attributes for mass assignment
    protected $fillable = ['title', 'description', 'speaker_id', 'status', 'tags','presentation_path'];

    // Define a relationship to Speaker
    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }

    // Define a relationship to Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Define a relationship to Revision
    public function revisions()
    {
        return $this->hasMany(Revision::class);
    }

    // Helper method to get tags as an array
    public function getTagsArray()
    {
        return explode(',', $this->tags);
    }
}