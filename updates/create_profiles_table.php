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
            $table->boolean('membershipDoc')->default(false);
            $table->boolean('studentCard')->default(false);
            $table->boolean('cqCard')->default(false);
            $table->boolean('rib')->default(false);
            $table->boolean('paycheck')->default(false);
            $table->boolean('resume')->default(false);
            $table->boolean('ri')->default(false);         

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xnok_membership_profiles');
    }

}
