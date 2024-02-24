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
        Schema::table('users', function (Blueprint $table) {
            $table->string('class')->nullable(); // Replace 'column_name' with the actual name of your column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
