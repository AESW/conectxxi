<?php
class Catalogos
{
	function __construct()
    {
        return TRUE;
    }
    
    public function estatusAprobacionVacantes(){
	    $list = array(
		    "true" => "Aprobado",
		    "false" => "Rechazado",
		    "pendiente" => "Pendiente"
	    ); 
	    return $list;
    }
    
    public function estatusReclutamientoRHFDP(){
	    $list = array(
		  	"rechazado" => "Rechazado",
		  	"aprobado" => "Aprobado"  
	    );
	    return $list;
    }
    public function estatusGenerico(){
	    $list = array(
		    "activo" => "Activo",
		    "inactivo" => "Inactivo"
	    );
	    return $list;
    }
    
    public function movimientosSQL(){
	    $list = array(
		  	"insert" => "INSERT", 
		  	"update" => "UPDATE",
		  	"delete" => "DELETE"  
	    );
	    return $list;
    }
    
    public function perfilCandidatosReclutamiento(){
	    $list = array(
		  	"operativos" => "Operativos",
		  	"profesionales" => "Profesionales",
		  	"tecadmon" => "Técnicos, Administrativos"  
	    );
	    return $list;
    }
    
    public function rhPrefijosEntrevistaPresentacion(){
	    $list = array(
		    "imagenfisica" => "Imagen física",
			"cuidadopersonal" => "Cuidado personal",
			"formaentrarsentarse" => "Forma de entrar y de sentarse"
	    );
	    return $list;
	    
    }
    
    public function rhPrefijosEntrevistaComunicacionNoVerbal(){
	    $list = array(
		    "contactovisual" => "Contacto visual",
			"tonovolumen" => "Tono, volumen y tono de voz",
			"formamoverse" => "Forma de moverse",
			"movimientomanosbrazos" => "Movimiento manos y brazos" ,
			"formasaludar" => "Forma de saludar" ,
			"formasentarse" => "Forma de sentarse" ,
			"gesticulacion" => "Gesticulación" ,
	    );
	    return $list;
	    
    }
    
    public function rhPrefijosEntrevistaComunicacionVerbal(){
	    $list = array(
		    "fluidezverbal" => "Fluidéz verbal",
			"precisioncomunidacion" => "Precisión de la comunicación",
			"riquezavocabulario" => "Riqueza de vocabulario",
			"capacidadexpresarsentimientos" => "Capacidad para expresar sentimientos",
	    );
	    return $list;
	    
    }
    
    public function rhPrefijosEntrevistaCompetenciasGenerales(){
	    $list = array(
		    "atencioncliente" => "Atención al cliente",
			"persuasivo" => "Persuasivo" ,
			"trabajoequipo" => "Trabajo en equipo" ,
			"influencianegociacion" => "Infuencia y negociación" ,
			"comunicacioneficaz" => "Comunicación eficáz" ,
			"cierreacuerdos" => "Cierre de acuerdos" ,
	    );
	    return $list;
	    
    }
    
    public function rhValoresEntrevista(){
	    $list = array(
		  	"A+" => "Excelente",
		  	"A-" => "Muy bien" ,  
		  	"B*" => "Bien" ,
		  	"B-" => "Normal" ,
		  	"C"  => "Mala"
	    );
	    
	    return $list;
    }
    
    public function evaluacionesReclutamiento(){
	    $list = array(
		  	"razonamiento" => "Evaluación de razonamiento",
		  	"razonamientogama" => "Evaluación de razonamiento Gama",
		  	"habilidades" => "Habilidades",
	    );
	    
	    return $list;
    }
    
    public function valoresEvaluacionesReclutamiento(){
	    $list = array(
		    "15menos" => "15 o menos abajo del mínimo Habilidades",
		    "16minimo" => "16 mínimo habilidades",
		    "23optimo" => "23 óptimo habilidades",
		    "29menos" => "29 o menos abajo de la media",
		    "30mas" => "30 o más arriba de la media",
	    );
	    
	    return $list;
    }
    
    public function escalaValoresEvaluacionesReclutamiento(){
	    $list = array(
		    "29" => "29 no recomendable",
		    "30a50" => "30 a 50 aceptable",
		    "51" => "Óptimo"
	    );
	    
	    return $list;
    }
	
	 public function rhUbicacion(){
	    $list = array(
		    "Puebla" => "Puebla",
		    "Tlalnepantla" => "Tlalnepantla",
		    "Tlalpan" => "Tlalpan",
			"Veracruz" => "Veracruz"
	    );
	    
	    return $list;
    }
    
    public function rhHorario(){
    	$list = array(
    			"Matutino" => "Matutino",
    			"Mixto" => "Mixto",
    			"Vespertino" => "Vespertino"
    	);
    	 
    	return $list;
    }
    
    public function rhDiaDescanso(){
    	$list = array(
    			"lunes" => "lunes",
    			"Martes" => "Martes",
    			"Miércoles" => "Miércoles",
    			"Jueves" => "Jueves",
    			"Viernes" => "Viernes",
    			"Sábado" => "Sábado",
    			"Domingo" => "Domingo"
    	);
    
    	return $list;
    }
    
    public function rhDuracionContrato(){
    	$list = array(
    			"28 Días" => "28 Días",
    			"Indefinido" => "Indefinido"
    			
    	);
    
    	return $list;
    }
    
}