<?php

use Illuminate\Database\Seeder;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'usuario' => 'Genetica',
            'nombre' => 'Administrador',
            'password' => bcrypt('genetica123')
        ]);

        DB::table('usuarios')->insert([
            'usuario' => 'aldo',
            'nombre' => 'Aldo utpyme',
            'password' => bcrypt('aldo123')
        ]);

        DB::table('rol_usuario')->insert([
            'rol_id' => 13,
            'usuario_id' => 1,
            'estado' => 1
        ]);

        DB::table('rol_usuario')->insert([
            'rol_id' => 14,
            'usuario_id' => 2,
            'estado' => 1
        ]);
    }
}
