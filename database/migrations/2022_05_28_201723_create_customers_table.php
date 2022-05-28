<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('customer_name', 150);
			$table->text('Customer_email');
			$table->string('Phone_number');
			$table->string('company_name', 200);
			$table->string('customer_address', 200);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('customers');
	}
}
