<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->unique();
            $table->string('slug', 20)->unique();
            $table->timestamps();
        });

        DB::table('projects')->insert([
            ['name' => 'Project 1', 'slug' => 'project-one'],
            ['name' => 'Project 2', 'slug' => 'project-two'],
            ['name' => 'Project 3', 'slug' => 'project-three'],
            ['name' => 'Project 4', 'slug' => 'project-four'],
            ['name' => 'Project 5', 'slug' => 'project-five']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
