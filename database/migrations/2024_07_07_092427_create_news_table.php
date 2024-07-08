<?php

use App\Models\Type;
use App\Models\User;
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
        $user = new User();
        Schema::create('news', function (Blueprint $table) use ($type, $user) {
            $table->id();
            $table->string('judul', 255);
            $table->text('isi_berita');
            $table->foreignId('status');
            $table->foreignId('kategori');

            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->timestamps();
            $table->boolean('activations')->default(true);

            $table->foreign('status')->references($type->getKeyName())->on($type->getTable())->onDelete('cascade');
            $table->foreign('kategori')->references($type->getKeyName())->on($type->getTable())->onDelete('cascade');
            $table->foreign('created_by')->references($user->getKeyName())->on($user->getTable())->onDelete('cascade');
            $table->foreign('updated_by')->references($user->getKeyName())->on($user->getTable())->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
