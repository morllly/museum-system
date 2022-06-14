<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibits', function (Blueprint $table) {
            $table->id();
            $table->string('inventory_number');
            $table->string('title');
            $table->foreignId('keyword_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('collection_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('creator');
            $table->date('receipt_date');
            $table->text('entry_method');
            $table->string('creation_time');
            $table->text('characteristics');
            $table->text('description');
            $table->text('safety');
            $table->text('image')->nullable();
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
        Schema::dropIfExists('exhibits');
    }
}
