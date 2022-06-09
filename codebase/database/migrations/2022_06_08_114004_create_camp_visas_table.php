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
        Schema::create('camp_visas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rent_terrain_id')->constrained()->cascadeOnDelete();
            $table->boolean('tents')->default(false);
            $table->boolean('activities')->default(false);
            $table->boolean('theme')->default(false);
            $table->boolean('camp_booklet')->default(false);
            $table->boolean('forest_permission')->default(false);
            $table->boolean('municipality_contact')->default(false);
            $table->boolean('fire_agency_contact')->default(false);
            $table->boolean('tools')->default(false);
            $table->boolean('parents_info_session')->default(false);
            $table->boolean('leaders_info_session')->default(false);
            $table->boolean('extra_info_session')->default(false);
            $table->boolean('fire_insurance')->default(false);
            $table->boolean('transport_insurance')->default(false);
            $table->boolean('persons_insurance')->default(false);
            $table->boolean('cars_insurance')->default(false);
            $table->boolean('theft_insurance')->default(false);
            $table->boolean('social_assistance_insurance')->default(false);
            $table->boolean('group_equipment_insurance')->default(false);
            $table->boolean('medical_assistance_certificate')->default(false);
            $table->boolean('camp_registration')->default(false);
            $table->boolean('final_contact_landlord')->default(false);
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
        Schema::dropIfExists('camp_visas');
    }
};
