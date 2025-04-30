<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_qualifications', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->enum('education', [
                'Matriculation',
                'Intermediate',
                'Bachelor',
                'Master',
                'M.Phil',
                'Ph.D'
            ]);
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
            $table->string('institution', 250);
            $table->string('course', 250);
            $table->string('timeframe')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_qualifications');
    }
}