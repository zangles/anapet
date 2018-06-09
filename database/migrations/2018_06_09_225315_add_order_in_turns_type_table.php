<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderInTurnsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turn_types', function (Blueprint $table) {
            $table->unsignedInteger('orden')->nullable();
        });

        $turnTypes = [
            'Morning (2hs)',
            'Noon (2Hs)',
            'Evening (2hs)',
            'Day Care (6hs)',
            'Full Day Care (12hs)',
            'Night Stay (24hs)'
        ];

        foreach ($turnTypes as $k=>$turnName) {
            $turn = \App\TurnType::where('name', $turnName)->get()->first();
            $turn->orden = $k+1;
            $turn->save();
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turn_types', function (Blueprint $table) {
            $table->removeColumn('orden');
        });
    }
}
