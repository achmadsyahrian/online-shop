<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('provinsi')->after('payment_status');
            $table->string('kabupaten')->after('payment_status');
            $table->string('kecamatan')->after('payment_status');
            $table->renameColumn('description', 'alamat_lengkap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('provinsi');
            $table->dropColumn('kabupaten');
            $table->dropColumn('kecamatan');
        });
    }
};
