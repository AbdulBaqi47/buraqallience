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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();

            $table->index('charge_date');
            $table->index('pay_date');

            $table->integer('charge_amount');
            $table->integer('pay_amount');

            $table->index('source_id');
            $table->string('source_model');

            $table->index('account_id');

            $table->index(
                'code',
                null,
                null,
                [
                    'sparse' => true,
                ]
            );

            $table->index(
                'transaction_ledger_id',
                null,
                null,
                [
                    'sparse' => true,
                ]
            );

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
        Schema::dropIfExists('installments');
    }
};
