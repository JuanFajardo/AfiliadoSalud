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


    }
}
