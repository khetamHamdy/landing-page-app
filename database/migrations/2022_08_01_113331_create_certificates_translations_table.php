<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_job');
            $table->longText('description');
            $table->string('locale')->index();
            $table->unique(['certificates_id', 'locale']);
            $table->foreignId('certificates_id')->unsigned()->constrained('certificates')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates_translations');
    }
};
