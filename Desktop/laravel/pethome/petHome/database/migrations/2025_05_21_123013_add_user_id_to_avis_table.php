<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('avis', function (Blueprint $table) {
        $table->foreignId('user_id')->constrained()->after('id');
    });
}


    /**
     * Reverse the migrations.
     */
 public function down()
{
    Schema::table('avis', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}

};
