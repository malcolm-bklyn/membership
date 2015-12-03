<?php namespace XNok\Membership\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateMandatesTable extends Migration
{

    public function up()
    {
        Schema::create('xnok_membership_mandates', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xnok_membership_mandates');
    }

}
