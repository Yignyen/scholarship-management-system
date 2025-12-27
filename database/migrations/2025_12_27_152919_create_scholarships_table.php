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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
             // Scholarship details
            $table->string('name');              // Scholarship name
            $table->text('eligibility');         // Who can apply
            $table->decimal('amount', 10, 2);    // Amount
            $table->date('deadline');            // Last date to apply
            $table->string('funded_by');         // Sponsored by
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
