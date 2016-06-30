
<div class="content_generic">
    <p align=right >Nombre de usuario:</p>
    <p align=right >Fecha y hora:</p>        
    <br>
    <div style="width: 99%" class="block_box_gen">
        <h2>Evaluaci&oacute;n de cursos</h2>
        <br>
        <label style="margin-left: 5px">Curso:</label>
        <input style="margin-left: 5.5%"type="text" name="nombreCurso" id="nombreCurso" class="nombreCurso" value="Inducci&oacute;n">
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
                <td> <label style="margin-left: 5px;  width:280px;height:23px;"> C&oacute;digo de &eacute;tica</label></td>
                <td><input type="text" name="codEti" class="codEti" id="codEti" style=" width:40px;height:23px;"></td>
                <td> <label style="margin-left: 5px;  width:280px;height:23px;">Sistema</label></td>
                <td><input type="text"  name="sistema" class="sistema" id="sistema" style=" width:40px;height:23px;"></label></td>

            </tr>
            <tr>
                <td><label style="margin-left: 5px;  width:280px;height:23px;">Sistema de gesti&oacute;n de calidad</label></td>
                <td><input type="text" name="sistGest" class="sistGest" id="sistGest" style=" width:40px;height:23px;"></label></td>
                <td><label style="margin-left: 5px;  width:280px;height:23px;">Cobranza</td>
                <td><input type="text" name="cobranza" class="cobranza" id="cobranza" style=" width:40px;height:23px;"></label></td>

            </tr>
            <tr>
                <td><label style="margin-left: 5px;  width:280px;height:23px;">Seguridad de la informaci&oacute;n</td>
                <td><input type="text" name="segInf" class="segInf" id="segInf" style=" width:40px;height:23px;"></label></td>
                <td><label style="margin-left: 5px;  width:280px;height:23px;">Bur&oacute; de cr&eacute;dito</td>
                <td><input type="text" name="buro" class="buro" id="buro" style=" width:40px;height:23px;"></label></td>

            </tr>
            <tr>
                <td><label style="margin-left: 5px;  width:280px;height:23px;">C&oacute;digo de conducta (Lineamientos de Piso)</td>
                <td><input type="text"  name="codCond" class="codCond" id="codCond" style=" width:40px;height:23px; "></label></td>

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