
<div class="content_generic">
    <p align=right >Nombre de usuario:</p>
    <p align=right >Fecha y hora:</p>        
    <br>
    <div style="width: 99%" class="block_box_gen">
        <h2>Evaluaci&oacute;n de cursos</h2>
        <br>
        <label style="margin-left: 5px">Curso:</label>
        <input style="margin-left: 5.5%"type="text" name="nombreCurso" id="nombreCurso" class="nombreCurso" value="Inducci&oacute;n HSBC">
        <br>
        <br>
        <label style="margin-left: 5px"> Nombre del empleado:</label>
        <input style="margin-left: 1%" type="text" name="nomEmp" id="nomEmp" class="nomEmp" value="">
        <br>
        <br>
        <h2>Captura de resultados</h2>
        <br>
        <table cellpadding="0" cellspacing="0" width="80%">
            <tr>
                <td> <label style="margin-left: 5px;  width:300px;height:23px;">Requisitos legales y reglamentarios al producto</label></td>
                <td><input type="text"name="requis" class="requis" id="requis" style=" width:40px;height:23px;"></td>
                <td> <label style="margin-left: 5px;  width:300px;height:23px;">Lazos amistosos</label></td>
                <td><input type="text" name="lazos" class="lazos" id="lazos" style=" width:40px;height:23px;"></label></td>

            </tr>
            <tr>
                <td><label style="margin-left: 5px;  width:300px;height:23px;">Politicas de seguridad</label></td>
                <td><input type="text" name="polit" class="polit" id="polit" style=" width:40px;height:23px;"></label></td>
                <td><label style="margin-left: 5px;  width:300px;height:23px;">Matriz de penalizaci&oacute;n</td>
                <td><input type="text" name="matrPenal" class="matrPenal" id="matrPenal" style=" width:40px;height:23px;"></label></td>

            </tr>
            <tr>
                <td><label style="margin-left: 5px;  width:300px;height:23px;">Principios contra el soborno</td>
                <td><input type="text" name="princip" class="princip" id="princip" style=" width:40px;height:23px;"></label></td>
                <td><label style="margin-left: 5px;  width:300px;height:23px;">Lavado de dinero</td>
                <td><input type="text" name="lavado" class="lavado" id="lavado" style=" width:40px;height:23px;"></label></td>

            </tr>
            <tr>
                <td><label style="margin-left: 5px;  width:300px;height:23px;">Matr&iacute;z de informaci&oacute;n de cobranza</td>
                <td><input type="text" onfocus="this.blur()" name="matriz" class="matriz" id="matriz" style=" width:40px;height:23px;"></label></td>
                <td><label style="margin-left: 5px;  width:300px;height:23px;">Continuidad del negocio</td>
                <td><input type="text" onfocus="this.blur()" name="contin" class="contin" id="contin" style=" width:40px;height:23px;"></label></td>

            </tr>
        </table>

         <br>
        <h2>Evaluaci&oacute;n</h2>                  
        <br>
         <textarea style="text-align:center; float: right; margin-right: 60px" name="observaciones"  rows="10" cols="40">Observaciones</textarea>	
              <br>
        <p style="margin-left: 20px">&iquest;Curso aprobado?</p>
         <br>
         <table cellpadding="0" cellspacing="0" width="80%">
        <input type="radio" name="cursoAprob" value="1" style="margin-left: 60px">Aprobado 
        <br>
        <input type="radio" name="cursoAprob" value="2" style="margin-left: 60px">Reprogramar
        
        <br>
        <input type="radio" name="cursoAprob" value="3" style="margin-left: 60px">No Aprobado
         </table>
        <br>
       	
   </div>
     	

        <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
        <a class="btnNextFDP" id="btnEvaluar" href="evaluar">Evaluar</a>
       </div>
       
