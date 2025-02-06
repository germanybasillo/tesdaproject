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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
		$table->date('assessment_date');
		$table->string('qualification');
        $table->string('qualification2');
        $table->string('qualification3');
        $table->string('qualification4');
		$table->string('no_of_pax');
        $table->string('no_of_pax2');
        $table->string('no_of_pax3');
        $table->string('no_of_pax4');
		$table->enum('training_status', ['scholar','non-scholar'])->default('scholar');
        $table->enum('training_status2', ['scholar','non-scholar'])->default('scholar');
        $table->enum('training_status3', ['scholar','non-scholar'])->default('scholar');
        $table->enum('training_status4', ['scholar','non-scholar'])->default('scholar');
		$table->enum('status', ['pending', 'approved'])->default('pending');
		$table->string('type_of_scholar');
        $table->string('type_of_scholar2');
        $table->string('type_of_scholar3');
        $table->string('type_of_scholar4');
		$table->string('eltt');
        $table->string('eltt2');
        $table->string('eltt3');
        $table->string('eltt4');
		$table->string('rfftp');
        $table->string('rfftp2');
        $table->string('rfftp3');
        $table->string('rfftp4');
		$table->string('oropfafns')->nullable();
        $table->string('oropfafns2')->nullable();
        $table->string('oropfafns3')->nullable();
        $table->string('oropfafns4')->nullable();
		$table->string('sopcctvr');
        $table->string('sopcctvr2');
        $table->string('sopcctvr3');
        $table->string('sopcctvr4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
