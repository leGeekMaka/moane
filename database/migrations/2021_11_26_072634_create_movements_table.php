<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->enum('movement_type',['deposit','withdrawal']);
            $table->decimal('amount',11,2);
            $table->string('label',100)->nullable();
            $table->unsignedBigInteger('operation_id')->index();
            $table->unsignedBigInteger('transaction_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('operation_id')
                  ->references('id')
                  ->on('operations')
                  ;
            $table->foreign('transaction_id')
                  ->references('id')
                  ->on('transactions')
                  ;
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movements', function(Blueprint $table){
            $table->dropForeign(['operation_id','transaction_id','user_id']);
        });
        Schema::dropIfExists('movements');
    }
}
