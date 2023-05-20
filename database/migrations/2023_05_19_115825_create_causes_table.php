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
        Schema::create('causes', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->dateTime('date');
            $table->integer("exp_donation");
            $table->integer("actual_donation")->default(0);
            $table->text("description");
            $table->string("thumbnail");
            $table->integer("category_id")->default(NULL);
            $table->integer("author_id");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('causes');
    }
};
