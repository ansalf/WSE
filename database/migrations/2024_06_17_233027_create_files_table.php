<?php

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
        Schema::create('files', function (Blueprint $table) use ($type) {
            $table->id();
            $table->bigInteger('transtypeid')->constrained($type->getTable())->cascadeOnUpdate()->cascadeOnDelete();
            $table->bigInteger('refid');
            $table->text('directories');
            $table->string('filename', 100);
            $table->string('mimetype', 100);
            $table->double('filesize');

            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->boolean('activations')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
