<?php

use App\Enums\ApprovalStatusEnum;
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
        Schema::create('rent_terrains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('terrain_id')->constrained()->cascadeOnDelete();
            $table->timestamp('startDate');
            $table->timestamp('endDate');
            $table->enum('approvalStatus',
                array_column(ApprovalStatusEnum::cases(), 'value'))->default(ApprovalStatusEnum::PENDING->value);
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
        Schema::dropIfExists('rent_terrains');
    }
};
