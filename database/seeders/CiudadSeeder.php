<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ciudades = [
            // Aquí definirás un array asociativo con los departamentos
            1 => ['La Ceiba', 'Tela', 'Jutiapa', 'La Masica', 'Arizona', 'Esparta', 'San Francisco', 'San Francisco del Norte', 'Punta Sal'],
            2 => ['Trujillo', 'Tocoa', 'Sonaguera', 'Bonito Oriental', 'Sabá', 'Santa Fe', 'Santa Rosa de Aguán', 'Limón', 'Iriona', 'Balfate'],
            3 => ['Comayagua', 'Ajuterique', 'El Rosario', 'Esquías', 'Humuya', 'La Libertad', 'Lamaní', 'Las Lajas', 'La Trinidad', 'Lejamaní', 'Meámbar', 'Minas de Oro', 'Ojos de Agua', 'San Jerónimo', 'San José de Comayagua', 'Siguatepeque', 'Villa de San Antonio'],
            4 => ['Santa Rosa de Copán', 'Cabañas', 'Concepción', 'Copán Ruinas', 'Corquín', 'Cucuyagua', 'Dolores', 'Dulce Nombre', 'El Paraíso', 'Florida', 'La Jigua', 'La Unión', 'Nueva Arcadia', 'San Agustín', 'San Antonio', 'San Jerónimo', 'San José', 'San Juan de Opoa', 'San Nicolás', 'San Pedro', 'Santa Rita', 'Trinidad de Copán'],
            5 => ['San Pedro Sula', 'Choloma', 'Omoa', 'Puerto Cortés', 'La Lima', 'Villanueva', 'Pimienta', 'Potrerillos', 'San Antonio de Cortés', 'Santa Cruz de Yojoa', 'San Francisco de Yojoa', 'San Manuel', 'Villanueva'],
            6 => ['Yuscarán', 'Alauca', 'Danlí', 'El Paraíso', 'Guinope', 'Jacaleapa', 'Liure', 'Morocelí', 'Oropolí', 'Potrerillos'],
            7 => ['Tegucigalpa', 'Valle de Ángeles', 'Santa Lucía', 'Talanga', 'Villa de San Francisco', 'San Ignacio', 'Guaimaca', 'Nueva Armenia', 'Orica', 'Distrito Central', 'Ojojona'],
            8 => ['Puerto Lempira', 'Brus Laguna', 'Ahuas', 'Wampusirpi', 'Villeda Morales', 'Juan Francisco Bulnes', 'Raista', 'Paplaya'],
            9 => ['La Esperanza', 'Intibucá', 'Camasca', 'Colomoncagua',  'Concepción', 'Dolores', 'Magdalena', 'Masaguara', 'San Antonio', 'San Isidro', 'San Juan', 'San Marcos de la Sierra', 'San Miguelito',  'Santa Lucía', 'Yamaranguila', 'San Juan de Dios'],
            10 => ['Roatán', 'José Santos Guardiola', 'Guanaja', 'Utila'],
            11 => ['La Paz', 'Aguanqueterique', 'Cabañas', 'Cane', 'Chinacla', 'Guajiquiro', 'Lauterique', 'Marcala', 'Mercedes de Oriente', 'Opatoro', 'San Antonio del Norte', 'San José', 'San Juan', 'San Pedro de Tutule', 'Santa Ana', 'Santa Elena', 'San Marcos'],
            12 => ['Gracias', 'Belén', 'Candelaria', 'Cololaca', 'Erandique', 'Gualcince', 'Guarita', 'La Campa', 'La Iguala', 'Las Flores', 'La Unión', 'La Virtud', 'Lepaera', 'Mapulaca', 'Piraera', 'San Andrés', 'San Francisco', 'San Juan Guarita', 'San Manuel Colohete', 'San Rafael', 'San Sebastián', 'Santa Cruz', 'Talgua', 'Tambla', 'Tomalá', 'Valladolid', 'Virginia', 'Gracias a Dios'],
            13 => ['Nueva Ocotepeque', 'Belén Gualcho', 'Concepción', 'Dolores Merendón', 'Fraternidad', 'La Encarnación', 'La Labor', 'Lucerna', 'Mercedes', 'San Fernando', 'San Francisco del Valle', 'San Jorge', 'San Marcos', 'Santa Fe', 'Sensenti', 'Sinuapa'],
            14 => ['Juticalpa', 'Campamento', 'Catacamas', 'Concordia', 'Dulce Nombre de Culmí', 'El Rosario', 'Esquipulas del Norte', 'Gualaco', 'Guarizama', 'Jano', 'La Unión', 'Mangulile', 'Manto', 'Salamá', 'San Esteban', 'San Francisco de Becerra', 'San Francisco de la Paz', 'Santa María del Real', 'Silca', 'Yocón', 'San Francisco de La Paz', 'La Libertad', 'Santa Cruz de Yojoa'],
            15 => ['Santa Bárbara', 'Arada', 'Atima', 'Azacualpa', 'Ceguaca', 'Concepción del Norte', 'Concepción del Sur', 'Chinda', 'El Níspero', 'Gualala', 'Ilama', 'Las Vegas', 'Macuelizo', 'Naranjito', 'Nuevo Celilac', 'Petoa', 'Protección', 'Quimistán', 'San Francisco de Ojuera', 'San José de Colinas', 'San Luis', 'San Marcos', 'San Nicolás', 'San Pedro Zacapa', 'Santa Rita', 'Trinidad', 'San Sebastián', 'San Vicente', 'San Fernando'],
            16 => ['Nacaome', 'Alianza', 'Amapala', 'Aramecina', 'Caridad', 'Goascorán', 'Langue', 'San Francisco de Coray', 'San Lorenzo', 'San Marcos', 'Santa Ana', 'San Jerónimo', 'San Antonio'],
            17 => ['Yoro', 'Arenal', 'El Negrito', 'El Progreso', 'Jocón', 'Morazán', 'Olanchito', 'Santa Rita', 'Sulaco', 'Victoria', 'La Concordia', 'El Triunfo'],
            18 => ['Choluteca', 'Apacilagua', 'Concepción de María', 'Duyure', 'El Corpus', 'Marcovia', 'Morolica', 'Namasigüe', 'Orocuina', 'Pespire', 'San Antonio de Flores', 'San Isidro', 'San José', 'San Marcos de Colón', 'Santa Ana de Yusguare', 'El Triunfo', 'La Venta', 'San Lucas', 'Cabañas'],
        ];

        foreach ($ciudades as $departamento_id => $ciudadesDepartamento) {
            foreach ($ciudadesDepartamento as $nombreCiudad) {
                DB::table('ciudades')->insert([
                    'nombre_ciudad' => $nombreCiudad,
                    'departamento_id' => $departamento_id,
                    // Aquí puedes agregar fácilmente el nuevo campo
                    'created_by' => 1, // Por ejemplo
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
