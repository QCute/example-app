<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Get the migration connection name.
     *
     * @return string|null
     */
    public function getConnection()
    {
        return config('admin.database.connection') ?: config('database.default');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('admin.database.user_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->comment('')->autoIncrement();
            $table->string('username')->default('')->comment('');
            $table->string('password')->default('')->comment('');
            $table->string('name')->default('')->comment('');
            $table->string('avatar')->default('')->comment('');
            $table->string('remember_token')->default('')->comment('');
            $table->integer('created_time')->unsigned()->default(0)->comment('');
            $table->integer('updated_time')->unsigned()->default(0)->comment('');
            $table->integer('deleted_time')->unsigned()->default(0)->comment('');
            $table->unique('username');
            $table->index('created_time');
            $table->index('updated_time');
            $table->index('deleted_time');
        });

        Schema::create(config('admin.database.user_permission_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->comment('')->autoIncrement();
            $table->integer('user_id')->unsigned()->default(0)->comment('');
            $table->integer('permission_id')->unsigned()->default(0)->comment('');
            $table->integer('created_time')->unsigned()->default(0)->comment('');
            $table->integer('updated_time')->unsigned()->default(0)->comment('');
            $table->integer('deleted_time')->unsigned()->default(0)->comment('');
            $table->unique(['user_id', 'permission_id']);
            $table->index('created_time');
            $table->index('updated_time');
            $table->index('deleted_time');
        });

        Schema::create(config('admin.database.user_role_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->comment('')->autoIncrement();
            $table->integer('user_id')->unsigned()->default(0)->comment('');
            $table->integer('role_id')->unsigned()->default(0)->comment('');
            $table->integer('created_time')->unsigned()->default(0)->comment('');
            $table->integer('updated_time')->unsigned()->default(0)->comment('');
            $table->integer('deleted_time')->unsigned()->default(0)->comment('');
            $table->unique(['user_id', 'role_id']);
            $table->index('created_time');
            $table->index('updated_time');
            $table->index('deleted_time');
        });

        Schema::create(config('admin.database.role_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->comment('')->autoIncrement();
            $table->string('name')->default('')->comment('');
            $table->string('tag')->default('')->comment('');
            $table->integer('created_time')->unsigned()->default(0)->comment('');
            $table->integer('updated_time')->unsigned()->default(0)->comment('');
            $table->integer('deleted_time')->unsigned()->default(0)->comment('');
            $table->unique('name');
            $table->unique('tag');
            $table->index('created_time');
            $table->index('updated_time');
            $table->index('deleted_time');
        });

        Schema::create(config('admin.database.role_permission_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->comment('')->autoIncrement();
            $table->integer('role_id')->unsigned()->default(0)->comment('');
            $table->integer('permission_id')->unsigned()->default(0)->comment('');
            $table->integer('created_time')->unsigned()->default(0)->comment('');
            $table->integer('updated_time')->unsigned()->default(0)->comment('');
            $table->integer('deleted_time')->unsigned()->default(0)->comment('');
            $table->unique(['role_id', 'permission_id']);
            $table->index('created_time');
            $table->index('updated_time');
            $table->index('deleted_time');
        });

        Schema::create(config('admin.database.role_menu_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->comment('')->autoIncrement();
            $table->integer('role_id')->unsigned()->default(0)->comment('');
            $table->integer('menu_id')->unsigned()->default(0)->comment('');
            $table->integer('created_time')->unsigned()->default(0)->comment('');
            $table->integer('updated_time')->unsigned()->default(0)->comment('');
            $table->integer('deleted_time')->unsigned()->default(0)->comment('');
            $table->unique(['role_id', 'menu_id']);
            $table->index('created_time');
            $table->index('updated_time');
            $table->index('deleted_time');
        });

        Schema::create(config('admin.database.permission_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->comment('')->autoIncrement();
            $table->string('name')->default('')->comment('');
            $table->string('tag')->default('')->comment('');
            $table->string('http_method')->default('')->comment('');
            $table->string('http_path')->default('')->comment('');
            $table->integer('created_time')->unsigned()->default(0)->comment('');
            $table->integer('updated_time')->unsigned()->default(0)->comment('');
            $table->integer('deleted_time')->unsigned()->default(0)->comment('');
            $table->unique('name');
            $table->unique('tag');
            $table->index('created_time');
            $table->index('updated_time');
            $table->index('deleted_time');
        });

        Schema::create(config('admin.database.menu_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->comment('')->autoIncrement();
            $table->integer('parent_id')->unsigned()->default(0);
            $table->integer('type')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->string('title')->default('')->comment('');
            $table->string('icon')->default('')->comment('');
            $table->string('url')->default('')->comment('');
            $table->string('permission')->default('')->comment('');
            $table->integer('created_time')->unsigned()->default(0)->comment('');
            $table->integer('updated_time')->unsigned()->default(0)->comment('');
            $table->integer('deleted_time')->unsigned()->default(0)->comment('');
            $table->index('created_time');
            $table->index('updated_time');
            $table->index('deleted_time');
        });

        Schema::create(config('admin.database.operation_log_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->comment('')->autoIncrement();
            $table->integer('user_id')->unsigned()->default(0)->comment('');
            $table->string('path')->default('')->comment('');
            $table->string('method')->default('')->comment('');
            $table->string('ip')->default('')->comment('');
            $table->text('input')->comment('');
            $table->integer('created_time')->unsigned()->default(0)->comment('');
            $table->integer('updated_time')->unsigned()->default(0)->comment('');
            $table->integer('deleted_time')->unsigned()->default(0)->comment('');
            $table->index('user_id');
            $table->index('created_time');
            $table->index('updated_time');
            $table->index('deleted_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('admin.database.user_table'));
        Schema::dropIfExists(config('admin.database.user_permission_table'));
        Schema::dropIfExists(config('admin.database.user_role_table'));
        Schema::dropIfExists(config('admin.database.role_table'));
        Schema::dropIfExists(config('admin.database.role_permission_table'));
        Schema::dropIfExists(config('admin.database.role_menu_table'));
        Schema::dropIfExists(config('admin.database.permission_table'));
        Schema::dropIfExists(config('admin.database.menu_table'));
        Schema::dropIfExists(config('admin.database.operation_log_table'));
    }
};
