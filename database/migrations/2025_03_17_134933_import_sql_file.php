<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Migrations\Migration;
return new class extends Migration {
public function up(): void
{
// Chemin du fichier SQL
$path = database_path('sql/dump.sql');
// Vérifier si le fichier existe
if (File::exists($path)) {
// Charger et exécuter le SQL
DB::unprepared(File::get($path));
}
}
public function down(): void
{
// Optionnel : Ajoute ici des commandes pour annuler les effets de l'importation si nécessaire
}
};