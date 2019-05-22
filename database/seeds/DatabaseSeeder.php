<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // insert into afiliados(numero, matricula, paterno, materno, nombre, sexo, fecha_nacimiento, carnet, carnet_exp, regional, centro_salud, sigla, fecha_actualizacion, id_user, deleted_at, created_at, updated_at ) values( '1',  '00-0608 VRE',  'VILLAGOMEZ',  'ROLLANO',  'ERICK RICARDO',  'MASCULINO',  '2000-06-08',  '12548013', 'CH',  'SUCRE',  'ASEGURADOS A LA CAJA BANCARIA ESTATAL DE SALUD',  'CBES',  current_timestamp,  '1',  null,  current_timestamp,  null );


        \DB::table('users')->insert([
          'id' => '1',
          'name' => 'WFLORES',
          'email' => 'WILBER FLORES VILLEGAS',
          'password' => bcrypt('WFLORES3875960'),
          'salud' => 'POTOSI',
          'log' => '0',
          'grupo' => 'Administrador'
        ]);

        \DB::table('users')->insert([
          'id' => '2',
          'name' => 'WVENTURA',
          'email' => 'WILSON VENTURA TORREZ ',
          'password' => bcrypt('WVENTURA5090635'),
          'salud' => 'POTOSI',
          'log' => '0',
          'grupo' => 'Administrador'
        ]);

        \DB::table('users')->insert([
          'id' => '3',
          'name' => 'JULLOA',
          'email' => 'JUAN JOSE ULLOA LEDEZMA',
          'password' => bcrypt('JULLOA3435438'),
          'salud' => 'POTOSI',
          'log' => '0',
          'grupo' => 'Administrador'
        ]);

    }
}
