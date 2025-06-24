<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbltasks', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('task_name');
            $table->text('task_description')->nullable();
            $table->unsignedBigInteger('category_id')->foreign('category_id')->references('id')->on('tblcategories')->onDelete('cascade');
            $table->unsignedBigInteger('priority_id')->nullable()->foreign('priority_id')->references('id')->on('tblpriorities')->onDelete('cascade');
            $table->unsignedBigInteger('status_id')->foreign('status_id')->references('id')->on('tblstatus')->onDelete('cascade');
            $table->unsignedBigInteger('created_by')->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltasks');
    }
};
