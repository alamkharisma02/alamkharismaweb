<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing projects table categories from Residensial/Komersial to Interior/Eksterior
        DB::table('projects')->where('category', 'Residensial')->update(['category' => 'Interior']);
        DB::table('projects')->where('category', 'Komersial')->update(['category' => 'Eksterior']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('projects')->where('category', 'Interior')->update(['category' => 'Residensial']);
        DB::table('projects')->where('category', 'Eksterior')->update(['category' => 'Komersial']);
    }
};
