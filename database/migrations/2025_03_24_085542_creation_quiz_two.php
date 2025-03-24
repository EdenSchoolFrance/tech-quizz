<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Chemin du fichier SQL
        $path = database_path('sql/quiz.sql');

        // Vérifier si le fichier existe
        if (File::exists($path)) {
            // Charger et exécuter le SQL
            DB::unprepared(File::get($path));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
