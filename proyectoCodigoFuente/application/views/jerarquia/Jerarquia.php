  <div class="formulario_NEmpleado">
<div id="tab-container" class="tab-container">
  	<div class='panel-container'>




        <h2><label>Jerarquia</label></h2>
        
  	<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/_styles.css" media="screen">     		

<input type="text" style="margin-left:45%;width:45%" name="text_buscar" class="text_buscar" id="text_buscar"  placeholder="Buscar" >				
 <a  href="#" class="btnNextFDP" id="btnBuscar"><i class="glyphicon glyphicon-search"></i> Buscar</a>						
	
<br>
<br>



<form id="formGerente" name="formGerente"> 

 



        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: separate; border-spacing: 10px 5px;" id="jerarquia" name="jerarquia">
           
			
		  	
						
							
							
							
<?php


 $arrayCategories = array();
 ?>
 
 <?php

 
 
//createTree($arrayCategories, 0);

 function createTree($array, $currentParent, $currLevel = 0, $prevLevel = -1) {

foreach ($array as $categoryId => $category) {

if ($currentParent == $category['Id_arbol']) {                       
/*echo "<li>
			<label for='folder2'>Folder 2</label> <input type='checkbox' id='folder2' /> 
			<ol>
				<li class='file'><a href=''>File 1</a></li>
				<li>
					<label for='subfolder2'>Subfolder 1</label> <input type='checkbox' id='subfolder2' /> 
					<ol>
						<li class='file'><a href=''>Subfile 1</a></li>
						<li class='file'><a href=''>Subfile 2</a></li>
						<li class='file'><a href=''>Subfile 3</a></li>
						<li class='file'><a href=''>Subfile 4</a></li>
						<li class='file'><a href=''>Subfile 5</a></li>
						<li class='file'><a href=''>Subfile 6</a></li>
					</ol>
				</li>
			</ol>
		</li>";*/
    if ($currLevel > $prevLevel) echo " <ol class='tree'  > "; 

    if ($currLevel == $prevLevel) echo " </li> ";
    
    $ruta=HOME_URL;

    echo "<li> <label for='subfolder2'><a href='".$ruta."Panel/UsuarioInfo/".$category['idUsuarios']."' TARGET='_new' style='text-decoration:none;' >".$category['name']."</a></label> <input type='checkbox'   id='subfolder2'/>";

    if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

    $currLevel++; 

    createTree ($array, $categoryId, $currLevel, $prevLevel);

    $currLevel--;               
    }   

}

if ($currLevel == $prevLevel) echo " </li>  </ol> ";

}   
?>
<div id="content" class="general-style1">



<?php 

createTree($Usuarios, 0); ?>
<?php

?>

</div>	
              
              </td>
              
            </tr>                        




           

      



        </table>

    
      
        </form>
      </div>
    </div> 
    </div>
    
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>  
       <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript">	               

	
	

           $('#btnBuscar').click(function(event) {

        	//   if ($('#formGerente').valid()) {


        		//   event.preventDefault();

   
               
        	     empresa = $('#text_buscar').val();
                    $.post("<?php echo HOME_URL; ?>Panel/BuscarJerarquia", {
                    	empresa : empresa
                    }, function(data) {
                        $("#content").html(data);

                      
                        
                   });   

        //	   } else {
        	//          alertify.error("Favor de completar los datos requeridos");
        	  //    } 

                
        		
           });



           
        </script>	
        
        
         <script type="text/javascript">	               

	
	
         $( "#text_buscar" ).keypress(function() {
        	 $("#paso").html(" ");
        	});
           
        </script>	
        
        
  