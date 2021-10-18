<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetUpMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_up_menus', function (Blueprint $table) {
            $table->id();
            $table->string('rolename')->nullable();
            $table->string('scripting')->nullable();
            $table->string('manageusers')->nullable();
            $table->string('viewusers')->nullable();
            $table->string('adduser')->nullable();
            $table->string('deleteuser')->nullable();
            $table->string('edituser')->nullable();
            $table->string('setuproles')->nullable();
            $table->string('manageaccount')->nullable();
            $table->string('manageinvoices')->nullable();
            $table->string('manageCOD')->nullable();
            $table->string('managecommissions')->nullable();
            $table->string('settings')->nullable();
            $table->string('viewshipping')->nullable();
            $table->string('editshipping')->nullable();
            $table->string('viewcommission')->nullable();
            $table->string('editcommission')->nullable();
            $table->string('report')->nullable();
          
            $table->timestamps();
        });
    }

   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('set_up_menus');
    }
}
