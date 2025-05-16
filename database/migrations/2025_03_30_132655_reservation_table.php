<?php

use App\Models\Seat;
use App\Models\Show;
use App\Models\ShowTime;
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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ShowTime::class,'show_time_id')->constrained('show_times')->cascadeOnDelete();
            $table->foreignIdFor(Seat::class, 'seat_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->decimal('price', 8, 2);
            $table->dateTime('reservation_time'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
