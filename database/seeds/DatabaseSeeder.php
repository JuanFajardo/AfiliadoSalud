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

        /*
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
        ]);*/

        \DB::table('centros')->insert([ 'id' => '1', 'centro' => 'PAILAVIRI']);
        \DB::table('centros')->insert([ 'id' => '2', 'centro' => 'CERRO DE PLATA']);
        \DB::table('centros')->insert([ 'id' => '3', 'centro' => 'POTOSI']);
        \DB::table('centros')->insert([ 'id' => '4', 'centro' => 'VILLA MECANICOS']);
        \DB::table('centros')->insert([ 'id' => '5', 'centro' => 'SAN PEDRO']);
        \DB::table('centros')->insert([ 'id' => '6', 'centro' => 'VILLA COLON']);
        \DB::table('centros')->insert([ 'id' => '7', 'centro' => 'SAN BENITO']);
        \DB::table('centros')->insert([ 'id' => '8', 'centro' => 'SAN GERARDO']);
        \DB::table('centros')->insert([ 'id' => '9', 'centro' => 'PARI ORCKO']);
        \DB::table('centros')->insert([ 'id' => '10', 'centro' => 'CANTUMARCA']);
        \DB::table('centros')->insert([ 'id' => '11', 'centro' => 'SAN ANSELMO']);
        \DB::table('centros')->insert([ 'id' => '12', 'centro' => 'VILLA VENEZUELA']);
        \DB::table('centros')->insert([ 'id' => '13', 'centro' => 'PLAN 40']);
        \DB::table('centros')->insert([ 'id' => '14', 'centro' => 'DELICIAS']);
        \DB::table('centros')->insert([ 'id' => '15', 'centro' => 'SAGRADA FAMILIA']);
        \DB::table('centros')->insert([ 'id' => '16', 'centro' => 'SAN CRISTOBAL']);
        \DB::table('centros')->insert([ 'id' => '17', 'centro' => 'AZANGARO']);
        \DB::table('centros')->insert([ 'id' => '18', 'centro' => 'MIRAFLORES']);
        \DB::table('centros')->insert([ 'id' => '19', 'centro' => 'BOLIVIANO CUBANO']);
        \DB::table('centros')->insert([ 'id' => '20', 'centro' => 'HOSPITAL SAN ROQUE']);
        \DB::table('centros')->insert([ 'id' => '21', 'centro' => 'HOSPITAL CALCUTA']);
        \DB::table('centros')->insert([ 'id' => '22', 'centro' => 'HUARI HUARI']);

    }
}
