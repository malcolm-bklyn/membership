<?php namespace XNok\Membership\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateJobsTable extends Migration
{

    public function up()
    {
        Schema::create('xnok_membership_jobs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xnok_membership_jobs');
    }

}
