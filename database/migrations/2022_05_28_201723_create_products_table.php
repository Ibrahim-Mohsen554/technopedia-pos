<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('sku_num');
			$table->string('product_name', 150);
			$table->string('barcode')->unique();
			$table->integer('brand_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->integer('Qty_instock');
			$table->decimal('buy_price');
			$table->decimal('sell_price');
            $table->string('created_by');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
