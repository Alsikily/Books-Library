<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('books', function (Blueprint $table) {
            $table -> id();
            $table -> string('title');
            $table -> text('description');
            $table -> date('published_at');
            $table -> text('bio');
            $table -> string('cover') -> nullable();
            $table -> foreignId('author_id') -> nullable() -> constrained('users') -> onUpdate('CASCADE') -> onDelete('CASCADE');
            $table -> unsignedSmallInteger('cat_id') -> nullable();
            $table -> foreign('cat_id') -> references('id') -> on('categories') -> onUpdate('CASCADE') -> onDelete('CASCADE');
            $table -> timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('books');
    }

};
