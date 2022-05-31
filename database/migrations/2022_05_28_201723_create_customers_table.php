<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('customer_name', 150);
			$table->string('customer_phone');
			$table->string('customer_address', 200);
			$table->string('customer_email');
			$table->string('c_type');
			$table->string('company_name')->nullable();
			$table->string('created_by');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('customers');
	}
}
