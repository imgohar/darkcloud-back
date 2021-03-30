<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_tax_id')->nullable();
            $table->string('business_contact_number')->nullable();
            $table->string('nic')->nullable();
            $table->string('agree')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer("is_tfa_enabled")->default(0);
            $table->string("pin")->nullable();
            $table->string('dba')->nullable();
            $table->string('b_address_1')->nullable();
            $table->string('b_address_2')->nullable();
            $table->string('id1')->nullable();
            $table->string('id2')->nullable();
            $table->string('role')->default('customer');
            $table->string('payment_method')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
