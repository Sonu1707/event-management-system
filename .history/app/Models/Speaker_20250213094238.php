<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Speaker extends Model{
   // Fillable attributes for mass assignment
   protected $fillable = ['user_id', 'name', 'email'];

   // Define a relationship to user
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function talkProposals()
   {
       return $this->hasMany(TalkProposal::class);
   }



}