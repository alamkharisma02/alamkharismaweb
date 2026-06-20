<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Seed default slides to prevent empty display on first run
        DB::table('hero_slides')->insert([
            [
                'title' => 'Pertamina EP Zona 4',
                'image' => '/images/projects/pertamina-ep-zona4.jpg',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kantor WOPOM Interior',
                'image' => '/images/projects/interior-office-1.jpg',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Lapangan Miring SKK Migas',
                'image' => '/images/projects/lapangan-miring.jpg',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Office Interior Finishing',
                'image' => '/images/projects/interior-office-2.jpg',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
