<div class="content_generic">

    <br>
    <div style="width: 99%" class="block_box_gen">


        <h2><label>Nomina - NOI</label></h2>

          <div id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        <form  name="form1" id="form1" method="POST" action="exportNomina">
        
            <table cellpadding="0" cellspacing="0" class="table" style="border:0">
				   
				    <tr>
				     <td >Empresa que contrata</td>
					      <td>
						      <select name="empresa_contrata" class="empresa_contrata" id="empresa_contrata" >
							   
							   <option value="">Selecciona Empresa</option>
								  <?php
									
									  
								  if( !empty($Empresas) ):
								  foreach($Empresas as  $t){
								  ?>
								  		
								  		
								  		 <option value="<?php echo $t->idEmpresas; ?>" <?php if( isset($formArray["empresa_contrata"]) && $formArray["empresa_contrata"] ==  $t->nombreEmpresas ): echo "selected='selected'"; endif;?>><?php echo $t->nombreEmpresas; ?></option>
								  		
								  <?php	  
									  }
									  endif;
								  ?>
							   
						      </select>
					      </td>
				    </tr>
				    
				    <tr>
                <td >Fecha de inicio:</td>
                <td><input type="text" onfocus="this.blur()" name="fecha_inicio" class="fecha_inicio" id="fecha_inicio" placeholder="dd/mm/YYYY" autocomplete="off"  ></td>
               
            </tr>
            
            <tr>
                <td  >Fecha final:</td>
                <td><input type="text" onfocus="this.blur()" name="fecha_fin" class="fecha_fin" id="fecha_fin" placeholder="dd/mm/YYYY" autocomplete="off"  ></td>   
            </tr>
				    </table>
				   
        <br>
       
       <center>
        
         <a class="btnNextFDP" id="btnExportar">Exportar</a>
          <a class="btnNextFDP" href="<?php echo HOME_URL; ?>" id="btnMenu">Men&uacute; principal</a>
       
       <input class="btnNextFDP"   style="visibility:hidden"  type="submit" value="Exportar">
       
       </center>
       </form>
      
        
    </div>
    

    
        	<script type="text/javascript">
    $( "#fecha_inicio" ).datepicker({
	        dateFormat: "dd-mm-yy",
	        yearRange: "-100:+0",
	        changeYear:true,
        });

    $( "#fecha_fin" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-100:+0",
        changeYear:true,
    });

    
    </script> 
    
    
    <script type="text/javascript">
$("#btnExportar").click(function(){

    		error_campos = [];
    		if( $("#empresa_contrata").val() == "" ) {
        		error_campos.push( "empresa_contrata");
        		 $("#empresa_contrata").css("border", "2px solid red");
    		}

    		
    		
    		if( $("#fecha_inicio").val() == "" ) {
        		error_campos.push(  "#fecha_inicio");
        		 $("#fecha_inicio").css("border", "2px solid red");
    		}


    		
    		if( $("#fecha_fin").val() == "" ) {
        		error_campos.push(  "#fecha_fin");
        		 $("#fecha_fin").css("border", "2px solid red");
    		}


    	
    	    
    		
    		if( error_campos.length  == 0 )
    		{


    			var fecha_inicio=$("#fecha_inicio").val();
    			var fecha_fina=$("#fecha_fin").val();


    			if(fecha_fina>fecha_inicio)
    			
    			{


    				  $( "form#form1" ).submit();
    		 

    			}
    			else
    			{

    				$("#resultado").html("Fechas incorrectas..");
    			}
    			
    			
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>