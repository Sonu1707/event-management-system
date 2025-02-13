<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Speaker extends Model{
   // Fillable attributes for mass assignment
   protected $fillable = ['name', 'email'];

   // Define a relationship to TalkProposal
   public function talkProposals()
   {
       return $this->hasMany(TalkProposal::class);
   }



}