<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->text('description')->nullable()->after('developer');
            $table->string('background_image')->nullable()->after('developer');
            $table->string('website')->nullable()->after('developer');
            $table->string('type')->nullable()->after('developer');
            $table->string('short_image')->nullable()->after('developer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->string('background_image')->nullable();
            $table->string('website')->nullable();
            $table->string('type')->nullable();
            $table->string('short_image')->nullable();
        });
    }
};
