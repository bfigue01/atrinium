<?php

namespace Database\Seeders;
use App\Models\MenuCuentas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Menu de clientes
        MenuCuentas::create([
            'id_usuario_tipo' => 1,
            'opcion' => 'Solicitar nuevo rol',
            'ruta'=>'informacion_cliente',
        ]);
    }
}
