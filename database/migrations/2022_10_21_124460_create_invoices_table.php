<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('invoices');
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('odr_id');
            $table->string('odr_contact_name')->nullable();
            $table->string('odr_company_name')->nullable();
            $table->string('odr_email');
            $table->unsignedBigInteger('odr_mobile')->nullable();
            $table->text('odr_product');
            $table->string('billing_address')->nullable(true);
            $table->string('billing_address2')->nullable(true);
            $table->string('b_city_state_zip')->nullable(true);
            $table->unsignedInteger('payment_method')->nullable();
            $table->string('odr_transaction_id')->nullable();
            $table->text('odr_payment_status')->nullable();
            $table->string('delivery_fee')->nullable();
            $table->string('odr_total_amount')->nullable();
            $table->text('odr_tax_amount')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}