<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandsTable extends Migration {

	public function up()
	{
		Schema::create('brands', function(Blueprint $table) {
			$table->increments('id');
			$table->string('brand_name', 150);
			$table->string('brand_desc', 150)->nullable();
			$table->integer('category_id')->unsigned();
			$table->string('created_by');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('brands');
	}
}
