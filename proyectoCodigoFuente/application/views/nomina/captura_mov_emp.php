
<div class="content_generic">
    <p align=right >Nombre de usuario:</p>
    <p align=right >Fecha y hora:</p>        
    <br>
    <div style="width: 99%" class="block_box_gen">


        <h2><label>Captura de Movimientos por empleado</label></h2>
        <br>

        <table cellpadding="50" cellspacing="0" width="100%" style="border-collapse: separate; border-spacing: 10px 5px;">
            <tr>
                <td>Nombre del Empleado</td>
                <td><input type="text" name="nomEmpleado" class="nomEmpleado" id="nomEmpleado" style="border:1px solid blue; width:250px"></td>
                <td><label>Total a pagar</label></td>
            </tr>                        

            <tr>
                <td>No. de N&oacute;mina</td>
                <td><input type="text" name="numNomina" class="numNomina" id="numNomina" style="border:1px solid blue; width:250px"></td>
                <td><input type="text" name="totalPagar" class="totalPagar" id="totalPagar" style="border:1px solid blue;"></td>
            </tr>

            <tr>
                <td>Empresa</td>
                <td><input type="text" name="empresa" class="empresa" id="empresa" style="border:1px solid blue; width:250px;"></td>
                <td><label>No. de Quincena</label></td>
            </tr>

            <tr>
                <td>D&iacute;as Trabajados</td>
                <td><input type="text" name="diasTrab" class="diasTrab" id="diasTrab" style="border:1px solid blue; height: 15px"></td>
                <td> <input type="text" name="numQuinc" class="numQuinc" id="numQuinc" style="border:1px solid blue;"></td>
            </tr>

            <tr>
                <td>Faltas</td>
                <td><input type="text" name="faltas" class="faltas" id="faltas" style="border:1px solid blue; height: 15px"></td>
                <td><label>Fecha de Pago</label></td>
            </tr>

            <tr>
                <td>Caja de Ahorro</td>
                <td><input type="text" name="cajaAhorro" class="cajaAhorro" id="cajaAhorro"style="border:1px solid blue; height: 15px"></td>
                <td><input type="text" name="fechaPago" class="fechaPago" id="fechaPago" style="border:1px solid blue"></td>
            </tr>

            <tr>
                <td>Pr&eacute;stamo Caja de Ahorro</td>
                <td><input type="text" name="prestamoCaja" class="prestamoCaja" id="prestamoCaja" style="border:1px solid blue; height: 15px"></td>
            </tr>

            <tr>
                <td>Gastos no comprobados</td>
                <td ><input type="text" name="gastosNoComprob" class="gastosNoComprob" id="gastosNoComprob"style="border:1px solid blue; height: 15px"></td>
            </tr>

            <tr>
                <td colspan="3"> <a class="btnNextFDP" id="agregarOtroMov">Agregar otro movimiento</a></td>              
            </tr>

            <tr>
                <td colspan="3"> <label style="margin-left:45%; margin-top: 30px">Comentarios</label></td>
            </tr>

            <tr>
                <td colspan="3"> <textarea style="width: 100%" name="comentarios"  rows="10" cols="40"></textarea></td>
            </tr>


        </table>

        <br>

        <a class="btnNextFDP" id="btnSalir">Salir</a>
        <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
        <a class="btnNextFDP" id="btnGuardar">Guardar</a>

    </div>

