<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Migrante;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PaisSeeder::class,
            DepartamentoSeeder::class,
            CiudadSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CategoriaSeeder::class,
            SubCategoriaSeeder::class,
            MobiliarioSeeder::class,
            CategoriaArticuloSeeder::class,
            ArticuloSeeder::class,
            TipoDonanteSeeder::class,
            DiscapacidadSeeder::class,
            SituacionMigratoriaSeeder::class,
            AsesorMigratorioSeeder::class,
            FronteraSeeder::class,
            MotivoSalidaPaisSeeder::class,
            NecesidadSeeder::class,
            FaltasSeeder::class,
        ]);

        Migrante::factory()->count(3)->create();

        $this->call([
            ActaEntregaSeeder::class,
            DetalleActaEntregaSeeder::class,
            SolicitudInsumosSeeder::class,
            DetalleSolicitudInsumosSeeder::class,
            SolicitudTrasladoSeeder::class,
            DetalleSolicitudTrasladoSeeder::class,
            DonanteSeeder::class,
            DonacionSeeder::class,
            DonacionArticuloSeeder::class,
            MigranteFaltaSeeder::class,
            ExpedienteSeeder::class,
        ]);
    }
}