<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SSS extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('SSS')) {
            Schema::create('SSS', function (Blueprint $table) {
                $table->id('id');
                $table->decimal('Min')->nullable();
                $table->decimal('Max')->nullable();
                $table->decimal('Contribution')->nullable();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        //
    }
}
