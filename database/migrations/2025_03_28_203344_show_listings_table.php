<?php

use App\Models\Hall;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('show_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Hall::class, 'hall_id')->constrained()->cascadeOnDelete(); 
            $table->string('title');
            $table->string('description');
            $table->dateTime('start_time');
            $table->date('date');
            $table->string('director');
            $table->decimal('base_price', 8, 2)->after('price')->default(2000);
            $table->string('image_path')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('show_listings');
    }
};
