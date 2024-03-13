<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('sale_date');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_method', ['credit_card', 'cash']);
			
            $table->unsignedBigInteger('sale_details_id'); // **Se modifica el nombre de la columna**
            $table->foreign('sale_details_id')->references('id')->on('sale_details')->onDelete('cascade');
           	
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
        Schema::dropIfExists('sales');
    }
}
