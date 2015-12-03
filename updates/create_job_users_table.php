<?php namespace XNok\Membership\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateJobUsersTable extends Migration
{

    public function up()
    {
        Schema::create('xnok_membership_job_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xnok_membership_job_users');
    }

}
