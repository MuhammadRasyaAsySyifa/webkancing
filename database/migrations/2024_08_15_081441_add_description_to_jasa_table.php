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
    Schema::table('jasas', function (Blueprint $table) {
        $table->text('deskripsilayanan')->nullable();
        $table->text('include')->nullable();
        $table->text('penting')->nullable();
    });
}

public function down()
{
    Schema::table('jasas', function (Blueprint $table) {
        $table->dropColumn(['deskripsilayanan', 'include', 'penting']);
    });
}

};
