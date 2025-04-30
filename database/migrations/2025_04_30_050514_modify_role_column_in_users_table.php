<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRoleColumnInUsersTable extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Cambiar el campo 'role' de enum antiguo a uno nuevo más flexible
            $table->string('role')->default('cliente')->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Restaurar el tipo anterior (enum) en caso de rollback
            $table->enum('role', ['cliente', 'empleado'])->default('cliente')->change();
        });
    }
}
