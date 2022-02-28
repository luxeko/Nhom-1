<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('desc');
            $table->decimal('discount_percent', 2,1);
            $table->enum('status',['Active', 'Disable']);
            $table->timestamps();
            $table->softDeletes();
            
            /* id int [pk, increment]
    name varchar
    desc varchar
    discount_percent decimal
    active boolean
    created_at datetime [default: `now()`]
    delete_at timestamp
    update_at timestamp */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
