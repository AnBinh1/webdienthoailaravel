<?php

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
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->increments('admin_id');
            $table->string('admin_name');
            $table->string('admin_email',100);
            $table->string('admin_password');
            $table->string('admin_phone');
            $table->timestamps(); // thêm dòng này để có created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_admin');
    }
};
