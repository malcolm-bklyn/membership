<?php namespace XNok\Membership\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProfilesTable extends Migration
{

    public function up()
    {
        Schema::create('xnok_membership_profiles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();

            //Profile
            $table->enum('gender', ['M','F'])->nullable();
            $table->string('mobile')->nullable();
            $table->date('birthDate')->nullable();
            $table->text('address')->nullable();
            //School
            $table->string('promotion')->nullable();
            $table->enum('speciality', ['EMACS', 'GC', 'CIGMA', 'RISK', 'MIEE'])->nullable();
            $table->string('schoolEmail')->nullable();
            //JE
            $table->boolean('membershipDoc')->nullable();
            $table->boolean('studentCard')->nullable();
            $table->boolean('cqCard')->nullable();
            $table->boolean('rib')->nullable();
            $table->boolean('paycheck')->nullable();
            $table->boolean('resume')->nullable();
            $table->boolean('ri')->nullable();         

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xnok_membership_profiles');
    }

}
