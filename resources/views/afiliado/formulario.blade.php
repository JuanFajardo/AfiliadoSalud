<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table border="0">

      <tbody>
        <tr>
          <td colspan="2">
            <table width="100%"  border="0">
              <tr>
                <td width="20%"> <img src="{{asset('img/logo_salud.png')}}" width="150" alt=""> </td>
                <td > <center>GOBIERNO AUTÓNOMO MUNICIPAL DE POTOSÍ<br>SECRETARIA DE DESARROLLO HUMANO<br> JEFATURA DE SALUD </center> </td>
                <td width="20%"> <img src="{{asset('img/logo_sus.png')}}"  width="150" alt=""> </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="2"> <center> <b> <u>Datos de la persona asegurada</u> </b> </center>
          </td>
        </tr>

        <tr>
          <td colspan="2"> &nbsp; </center>
          </td>
        </tr>

        <tr>
          <th width="30%" style="text-align:left;">Matricula: </th>        <td style="text-align:left;"> {{strtoupper($dato->matricula) }} </td>
        </tr>
        <tr>
          <th style="text-align:left;">Nombre Completo: </th>  <td style="text-align:left;"> {{strtoupper($dato->nombre) }} {{strtoupper($dato->paterno) }} {{strtoupper($dato->materno) }} </td>
        </tr>
        <tr>
          <th style="text-align:left;">Carnet: </th>           <td style="text-align:left;"> {{strtoupper($dato->carnet) }} </td>
        </tr>
        <tr>
          <th style="text-align:left;">Fecha Nacimiento: </th> <td style="text-align:left;"> {{strtoupper($dato->fecha_nacimiento) }} </td>
        </tr>
        <tr>
          <th style="text-align:left;">Caja de salud: </th>    <td style="text-align:left;"> {{strtoupper($dato->centro_salud) }} </td>
        </tr>
        <tr>
          <th style="text-align:left;">Regional: </th>         <td style="text-align:left;"> POTOSÍ </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"> La fuente es del Ministerio de Salud donde se encontró a la persona asegurada por tanto el paciente deberá pasar a ser atendido en <b>Caja de Salud:</b> {{$dato->centro_salud}} </td>
        </tr>
      </tfoot>
    </table>

  </body>
</html>
