<?php

use App\Models\Demisioner;
use App\Models\Type;
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
        $demis = new Demisioner();
        Schema::create('prestasis', function (Blueprint $table) use ($demis) {
            $table->id();
            $table->foreignId('demis');
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('tahun')->nullable();

            $table->foreign('demis')->references($demis->getKeyName())->on($demis->getTable())->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
