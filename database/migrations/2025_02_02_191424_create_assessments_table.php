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
		$table->string('qualification1');
        $table->string('qualification2');
        $table->string('qualification3');
        $table->string('qualification4');
		$table->string('no_of_pax1');
        $table->string('no_of_pax2');
        $table->string('no_of_pax3');
        $table->string('no_of_pax4');
		$table->enum('training_status1', ['scholar1','non-scholar1'])->default('scholar1');
        $table->enum('training_status2', ['scholar2','non-scholar2'])->default('scholar2');
        $table->enum('training_status3', ['scholar3','non-scholar3'])->default('scholar3');
        $table->enum('training_status4', ['scholar4','non-scholar4'])->default('scholar4');
		$table->enum('status', ['pending', 'approved'])->default('pending');
		$table->string('type_of_scholar1');
        $table->string('type_of_scholar2');
        $table->string('type_of_scholar3');
        $table->string('type_of_scholar4');
		$table->string('eltt1');
        $table->string('eltt2');
        $table->string('eltt3');
        $table->string('eltt4');
		$table->string('rfftp1');
        $table->string('rfftp2');
        $table->string('rfftp3');
        $table->string('rfftp4');
		$table->string('oropfafns1')->default('N/A');
        $table->string('oropfafns2')->default('N/A');
        $table->string('oropfafns3')->default('N/A');
        $table->string('oropfafns4')->default('N/A');
		$table->string('sopcctvr1');
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
