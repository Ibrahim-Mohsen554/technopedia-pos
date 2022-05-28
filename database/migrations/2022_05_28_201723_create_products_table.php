<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('sku_num');
			$table->string('product_name', 150);
			$table->string('product_desc', 150);
			$table->integer('brand_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->integer('Qty_instock');
			$table->decimal('buy_price');
			$table->decimal('sell_price');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}