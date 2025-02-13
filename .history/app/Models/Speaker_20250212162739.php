<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model{
   // Fillable attributes for mass assignment
   protected $fillable = ['name', 'email', 'bio'];

   // Define a relationship to TalkProposal
   public function talkProposals()
   {
       return $this->hasMany(TalkProposal::class);
   }

   // Define a relationship to Revision
   public function revisions()
   {
       return $this->hasMany(Revision::class);
   }

}