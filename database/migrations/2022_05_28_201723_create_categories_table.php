<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('category_name', 150);
			$table->string('category_descreption', 200)->nullable();
            $table->string('created_by',150);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
