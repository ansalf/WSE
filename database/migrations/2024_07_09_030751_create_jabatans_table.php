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
        $type = new Type();
        $demis = new Demisioner();
        Schema::create('jabatans', function (Blueprint $table) use ($demis, $type) {
            $table->id();
            $table->foreignId('demis');
            $table->foreignId('jabatan');
            $table->string('tahun')->nullable();

            $table->foreign('demis')->references($demis->getKeyName())->on($demis->getTable())->onDelete('cascade');
            $table->foreign('jabatan')->references($type->getKeyName())->on($type->getTable())->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatans');
    }
};
