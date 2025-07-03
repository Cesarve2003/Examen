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
        Schema::create('productos_agricolas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->string('variedad', 80)->nullable();
        $table->string('origen', 100);
        $table->date('fecha_cosecha');
        $table->decimal('peso', 8, 2);
        $table->decimal('precio_kilo', 6, 2);
        $table->enum('calidad', ['primera', 'segunda', 'tercera']);
        $table->boolean('estado')->default(true);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_agricolas');
    }
};
