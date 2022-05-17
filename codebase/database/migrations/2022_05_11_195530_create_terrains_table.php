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
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->string("name");
            $table->string("description")->nullable();
            $table->string("street");
            $table->string("streetNumber");
            $table->string("postcode");
            $table->string("province");
            $table->string("locality");
            $table->double("latitude")->nullable();
            $table->double("longitude")->nullable();
            $table->boolean("water")->default(false);
            $table->boolean("electricity")->default(false);
            $table->boolean("threePhaseElectricity")->default(false);
            $table->boolean("sanitaryBlock")->default(false);
            $table->boolean("showers")->default(false);
            $table->boolean("toilets")->default(false);
            $table->boolean("sinks")->default(false);
            $table->integer("max_people")->default(0);
            $table->integer("hectare")->default(0);
            $table->integer("supermarket_rating")->default(1);
            $table->integer("activities_rating")->default(1);
            $table->integer("remote_rating")->default(1);
            $table->integer("wood_rating")->default(1);
            $table->integer("playground_rating")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terrains');
    }
};
