<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceAndStockToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Agregar las nuevas columnas `precio` y `stock`
            $table->decimal('precio', 8, 2)->nullable();
            $table->integer('stock')->nullable();

            // Eliminar la columna `age` si existe
            if (Schema::hasColumn('students', 'age')) {
                $table->dropColumn('age');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Eliminar las columnas agregadas
            $table->dropColumn('precio');
            $table->dropColumn('stock');

            // Restaurar la columna `age` en caso de revertir la migración
            $table->integer('age')->nullable();
        });
    }
}


