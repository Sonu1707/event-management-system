<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('revisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('talk_proposal_id')->constrained(); // Foreign key to talk proposals
            $table->text('changes'); // Description of changes made
            $table->timestamp('timestamp'); // When the change was made
            $table->foreignId('user_id')->constrained(); // Foreign key to the user who made the change
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisions');
    }
};
