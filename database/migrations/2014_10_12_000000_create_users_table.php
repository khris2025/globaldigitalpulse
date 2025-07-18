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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('fullname');
            $table->string('gender');
            $table->string('country');
            $table->string('address');
            $table->string('phone_number');



            $table->string('username2')->nullable();
            $table->string('email2')->unique()->nullable();
            $table->string('fullname2')->nullable();
            $table->string('gender2')->nullable();
            $table->string('country2')->nullable();
            $table->string('address2')->nullable();
            $table->string('phone_number2')->nullable();


            $table->string('account_type');



            $table->string('wallet_linking')->nullable();
            $table->string('wallet_type')->nullable();
            $table->string('walletbalance')->default(0);
            $table->string('profit')->default(0);
            $table->string('invested_amount')->default(0);
            $table->string('refbonus')->default(0);
            $table->string('btc_address_btc')->nullable();
            $table->string('btc_address_bep20')->nullable();
            $table->string('eth_address_erc20')->nullable();
            $table->string('eth_address_bep20')->nullable();
            $table->string('usdt_address_trc20')->nullable();
            $table->string('usdt_address_bep20')->nullable();
            $table->string('usdt_address_erc20')->nullable();
            $table->string('kyc_verify')->default('no');
            $table->string('email_verify')->default('no');
            $table->string('referral_code');
            $table->string('referred_by')->nullable();
            $table->integer('kyc_amount')->nullable();
            $table->string('role')->default('user');
            $table->integer('signal')->default(20);
            $table->string('account_status')->default('active');
            $table->string('investedin')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
