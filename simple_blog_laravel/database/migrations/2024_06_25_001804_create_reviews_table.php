<?php

use App\Models\User;
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('image')->nullable();//as in some cases we'll not have some images so instead we'll just show some placeholders images
            $table->string('title');
            $table->string('slug')->unique(); //what's used in the url
            $table->text('body');

            $table->timestamp('published_at')->nullable();//to manage whether or not it's published, nullable (null) means review isn't published
            $table->boolean('featured')->default(false); //if the review is featured it will be in the top 3 reviews for example

            $table->softDeletes(); //(optional) when delete the users can't show it but it still in the db and U can always restore it as admin

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};