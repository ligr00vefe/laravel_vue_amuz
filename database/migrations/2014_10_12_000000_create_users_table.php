<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique()->comment('사용자 아이디');
            $table->string('name')->comment('사용자 이름');
            $table->string('email')->unique()->comment('사용자 이메일');
            $table->timestamp('email_verified_at')->nullable()->comment('사용자 이메일 인증');
            $table->string('phone')->unique()->comment('사용자 전화번호');
            $table->string('password')->comment('사용자 비밀번호');
            $table->tinyInteger('terms')->comment('약관 동의');
            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();
        });

    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
