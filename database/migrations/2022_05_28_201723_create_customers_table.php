<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('customer_name', 150);
			$table->string('phone');
			$table->string('address', 200);
			$table->string('email');
			$table->string('c_type');
			$table->string('company_name');
			$table->string('created_by');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('customers');
	}
}
