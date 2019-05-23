<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1557434411WorkingHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('working_hours', function (Blueprint $table) {
            if(Schema::hasColumn('working_hours', 'start_time')) {
                $table->dropColumn('start_time');
            }
            if(Schema::hasColumn('working_hours', 'finish_time')) {
                $table->dropColumn('finish_time');
            }
            
        });
Schema::table('working_hours', function (Blueprint $table) {
            
if (!Schema::hasColumn('working_hours', 'start_time')) {
                $table->time('start_time');
                }
if (!Schema::hasColumn('working_hours', 'end_time')) {
                $table->time('end_time')->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('working_hours', function (Blueprint $table) {
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
            
        });
Schema::table('working_hours', function (Blueprint $table) {
                        $table->datetime('start_time')->nullable();
                $table->datetime('finish_time')->nullable();
                
        });

    }
}
