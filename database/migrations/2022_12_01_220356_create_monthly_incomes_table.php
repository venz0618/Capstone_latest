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
        Schema::create('monthly_incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regular_special_loan_details_id');
            $table->string('product_loan');
            $table->integer('borrower_income');
            $table->integer('other_income');
            $table->integer('spouse_income');
            $table->integer('amount_applied');
            $table->integer('term_applied');
            $table->string('mode_of_payment');
            $table->foreign('regular_special_loan_details_id')->references('id')->on('regular_special_loan_details')->onDelete('cascade');
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
        Schema::dropIfExists('monthly_incomes');
    }
};
