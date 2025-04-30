<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pro_qualification;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pro_qualifications', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('course', 250);
            $table->string('institution', 250);
            $table->string('timeframe')->nullable();
            $table->enum('city', [
                'Karachi',
                'Lahore',
                'Islamabad',
                'Rawalpindi',
                'Faisalabad',
                'Multan',
                'Hyderabad',
                'Gujranwala',
                'Peshawar',
                'Quetta',
                'Sargodha',
                'Sialkot',
                'Sukkur',
                'Larkana',
                'Sheikhupura',
                'Rahim Yar Khan',
                'Jhang',
                'Gujrat',
                'Mardan',
                'Kasur',
                'Abbottabad',
                'Swabi',
                'Kohat',
                'Dera Ghazi Khan',
                'Mirpur Khas',
                'Mingora',
                'Bannu'
            ]);

            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_qualifications');
    }
};