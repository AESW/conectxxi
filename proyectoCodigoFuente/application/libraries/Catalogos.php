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
	
	   public function fdpOficina(){
    	$list = array(
    			"MEXICO"=>"MEXICO",
"HERMOSILLO"=>"HERMOSILLO",
"GUADALAJARA"=>"GUADALAJARA",
"VERACRUZ"=>"VERACRUZ",
"PUEBLA"=>"PUEBLA",
"MONTERREY"=>"MONTERREY",
"MERIDA"=>"MERIDA",
"LEON"=>"LEON",
"TIJUANA"=>"TIJUANA",
"CHIHUAHUA"=>"CHIHUAHUA",
"CULIACAN"=>"CULIACAN",
"CD OBREGON"=>"CD OBREGON",
"MORELIA"=>"MORELIA",
"MAZATLAN"=>"MAZATLAN",
"TUXTLA"=>"TUXTLA",
"GUAYMAS"=>"GUAYMAS",
"TAMPICO"=>"TAMPICO",
"SAN LUIS POTOSI"=>"SAN LUIS POTOSI",
"MEXICALI"=>"MEXICALI",
"PUERTO VALLARTA"=>"PUERTO VALLARTA",
"CD JUAREZ"=>"CD JUAREZ",
"CANCUN"=>"CANCUN",
"QUERETARO"=>"QUERETARO",
"LA PAZ"=>"LA PAZ",
"LOS MOCHIS"=>"LOS MOCHIS",
"ENSENADA"=>"ENSENADA",
"TORREON"=>"TORREON",
"COLIMA                                  "=>"COLIMA                                  ",
"TAPACHULA"=>"TAPACHULA",
"AGUASCALIENTES                          "=>"AGUASCALIENTES                          ",
"REYNOSA"=>"REYNOSA",
"TLALNEPANTLA                            "=>"TLALNEPANTLA                            ",
"VILLAHERMOSA                            "=>"VILLAHERMOSA                            ",
"PACHUCA                                 "=>"PACHUCA                                 "

    	);
    
    	return $list;
    }
	
	public function fdpPlaza(){
    	$list = array(
    			"AGUASCALIENTE"=>"AGUASCALIENTE",
"BAJA CALIFORNIA"=>"BAJA CALIFORNIA",
"BAJA CALIFORNIA SUR"=>"BAJA CALIFORNIA SUR",
"CAMPECHE"=>"CAMPECHE",
"COAHUILA"=>"COAHUILA",
"COLIMA"=>"COLIMA",
"CHIAPAS"=>"CHIAPAS",
"CHIHUAHUA"=>"CHIHUAHUA",
"DF"=>"DF",
"DURANGO"=>"DURANGO",
"GUANAJUATO"=>"GUANAJUATO",
"GUERRERO"=>"GUERRERO",
"HIDALGO"=>"HIDALGO",
"JALISCO"=>"JALISCO",
"ESTADO DE MEXICO"=>"ESTADO DE MEXICO",
"MICHOACAN"=>"MICHOACAN",
"MORELOS"=>"MORELOS",
"NAYARIT"=>"NAYARIT",
"NUEVO LEON"=>"NUEVO LEON",
"OAXACA"=>"OAXACA",
"PUEBLA"=>"PUEBLA",
"QUERETARO"=>"QUERETARO",
"QUINTANA ROO"=>"QUINTANA ROO",
"SAN LUIS POTOSI"=>"SAN LUIS POTOSI",
"SINALOA"=>"SINALOA",
"SONORA"=>"SONORA",
"TABASCO"=>"TABASCO",
"TAMAULIPAS"=>"TAMAULIPAS",
"TLAXCALA"=>"TLAXCALA",
"VERACRUZ"=>"VERACRUZ",
"YUCATAN"=>"YUCATAN",
"ZACATECAS"=>"ZACATECAS"


    	);
    
    	return $list;
    }
	
	 public function fdpJefeInmediato(){
	    $list = array(
		  	"AGUILAR BALCAZAR ARTURO"=>"AGUILAR BALCAZAR ARTURO",
"AGUILAR PEREZ JESUS ALBERTO"=>"AGUILAR PEREZ JESUS ALBERTO",
"AGUILAR ZETINA EDUARDO SAMUEL"=>"AGUILAR ZETINA EDUARDO SAMUEL",
"AGUILAR ZETINA EDUARDO SAMUEL "=>"AGUILAR ZETINA EDUARDO SAMUEL ",
"ALEJANDRO NAPOLES NANCY "=>"ALEJANDRO NAPOLES NANCY ",
"AMBRIZ FRAGOSO BEATRIZ"=>"AMBRIZ FRAGOSO BEATRIZ",
"AMBRIZ FRAGOSO VIVIANA"=>"AMBRIZ FRAGOSO VIVIANA",
"ARANDA RODRIGUEZ JESUS SALVADOR"=>"ARANDA RODRIGUEZ JESUS SALVADOR",
"AVILA REYES MARIA CRISTINA"=>"AVILA REYES MARIA CRISTINA",
"BAEZ SANDOVAL ENRIQUE ALDRINI"=>"BAEZ SANDOVAL ENRIQUE ALDRINI",
"BALBUENA GONZALEZ ALEJANDRO"=>"BALBUENA GONZALEZ ALEJANDRO",
"BARRON GARCIA MOISES"=>"BARRON GARCIA MOISES",
"BECERRA BECERRA JESUS OMAR"=>"BECERRA BECERRA JESUS OMAR",
"BELTRAN MENDOZA GUSTAVO ARTURO"=>"BELTRAN MENDOZA GUSTAVO ARTURO",
"BONILLA DEL RIO SUHAILA ALEXIS"=>"BONILLA DEL RIO SUHAILA ALEXIS",
"CARBAJAL TORRES BEATRIZ GUADALUPE"=>"CARBAJAL TORRES BEATRIZ GUADALUPE",
"CASTILLO DURAN JOAQUIN"=>"CASTILLO DURAN JOAQUIN",
"CERVANTES AGUIRRE ALAN CHRISTOPHER"=>"CERVANTES AGUIRRE ALAN CHRISTOPHER",
"COSIO ESPARZA TANIA"=>"COSIO ESPARZA TANIA",
"COTA VERDUZCO EMILIO"=>"COTA VERDUZCO EMILIO",
"CRUZ HIPOLITO ALEJANDRO"=>"CRUZ HIPOLITO ALEJANDRO",
"CRUZ RIOS ALEJANDRO"=>"CRUZ RIOS ALEJANDRO",
"CUADRAS CASTRO CHRISTIAN OMAR"=>"CUADRAS CASTRO CHRISTIAN OMAR",
"CUEVAS PARDO MARCIAL ENRIQUE"=>"CUEVAS PARDO MARCIAL ENRIQUE",
"DE LA CRUZ OLIVA MARIO FRANCISCO"=>"DE LA CRUZ OLIVA MARIO FRANCISCO",
"DOMINGUEZ VALLE ARTURO"=>"DOMINGUEZ VALLE ARTURO",
"DURAN GOMEZ EMMANUEL"=>"DURAN GOMEZ EMMANUEL",
"ECHEVERRIA VENEGAS JESUS"=>"ECHEVERRIA VENEGAS JESUS",
"ESCOBEDO ROMERO GERARDO ROBERTO"=>"ESCOBEDO ROMERO GERARDO ROBERTO",
"ESPINOSA DE LOS MONTEROS DE ANDA DANIEL FERNANDO"=>"ESPINOSA DE LOS MONTEROS DE ANDA DANIEL FERNANDO",
"FERNANDEZ CONTRERAS ENRIQUE"=>"FERNANDEZ CONTRERAS ENRIQUE",
"FLORES ARELLANO MARIANA"=>"FLORES ARELLANO MARIANA",
"FLORES RAMIREZ CHRISTIAN EDWING"=>"FLORES RAMIREZ CHRISTIAN EDWING",
"FLORES SANDOVAL FERNANDO"=>"FLORES SANDOVAL FERNANDO",
"GALICIA AGUILAR JOSE ALEJANDRO"=>"GALICIA AGUILAR JOSE ALEJANDRO",
"GAONA MELCHOR GABRIEL"=>"GAONA MELCHOR GABRIEL",
"GARCIA CORREA OMAR"=>"GARCIA CORREA OMAR",
"GARRIDO GONZALEZ FEDERICO"=>"GARRIDO GONZALEZ FEDERICO",
"GERARDO ESCOBEDO"=>"GERARDO ESCOBEDO",
"GOMEZ CUEVAS RUBEN AZARI"=>"GOMEZ CUEVAS RUBEN AZARI",
"GOMEZ GALAN FERNANDO"=>"GOMEZ GALAN FERNANDO",
"GOMEZ LOPEZ RUBEN"=>"GOMEZ LOPEZ RUBEN",
"GOMEZ LUNA CESAR ALFONSO"=>"GOMEZ LUNA CESAR ALFONSO",
"GOMEZ LUNA CESAR ALFONSO "=>"GOMEZ LUNA CESAR ALFONSO ",
"GONZALEZ ELIAS JESSICA ALICIA"=>"GONZALEZ ELIAS JESSICA ALICIA",
"GONZALEZ GARCIA ALEJANDRA"=>"GONZALEZ GARCIA ALEJANDRA",
"GONZALEZ ROMERO MARTHA LUCIA"=>"GONZALEZ ROMERO MARTHA LUCIA",
"GONZALEZ TELLEZ SAUL"=>"GONZALEZ TELLEZ SAUL",
"GRANADOS CARRADA KARLA GUADALUPE"=>"GRANADOS CARRADA KARLA GUADALUPE",
"GUERRERO CABRERA MARISOL"=>"GUERRERO CABRERA MARISOL",
"GUZMAN MENDEZ JAVIER"=>"GUZMAN MENDEZ JAVIER",
"HERNANDEZ REYES GELASIO"=>"HERNANDEZ REYES GELASIO",
"HERNANDEZ SORIANO LUIS DANIEL"=>"HERNANDEZ SORIANO LUIS DANIEL",
"JIMENEZ GOMEZ FERNANDO ENRIQUE"=>"JIMENEZ GOMEZ FERNANDO ENRIQUE",
"JORGE MERCADO"=>"JORGE MERCADO",
"JULIO MORALES ANDREU"=>"JULIO MORALES ANDREU",
"LEMEN MEYER GONZALEZ ROBERTO"=>"LEMEN MEYER GONZALEZ ROBERTO",
"LOPEZ ARRIQUIVEZ MIRIAM"=>"LOPEZ ARRIQUIVEZ MIRIAM",
"LOPEZ BUZANE BLANCA PATRICIA"=>"LOPEZ BUZANE BLANCA PATRICIA",
"LOPEZ GOMEZ EDGAR"=>"LOPEZ GOMEZ EDGAR",
"LOPEZ HERNANDEZ RAUL"=>"LOPEZ HERNANDEZ RAUL",
"LOPEZ SERAFIN OMAR GUILLERMO"=>"LOPEZ SERAFIN OMAR GUILLERMO",
"LUCERO VAZQUEZ ISABEL EDUARDO"=>"LUCERO VAZQUEZ ISABEL EDUARDO",
"LUNA GARCIA JORGE ALEJANDRO"=>"LUNA GARCIA JORGE ALEJANDRO",
"MADRID GARCIA JESSICA "=>"MADRID GARCIA JESSICA ",
"MARTINEZ MORA CYNTHIA SARAI "=>"MARTINEZ MORA CYNTHIA SARAI ",
"MARTINEZ PALMERIN ENRIQUE"=>"MARTINEZ PALMERIN ENRIQUE",
"MARTINEZ PEREZ JESUS FRANCISCO"=>"MARTINEZ PEREZ JESUS FRANCISCO",
"MARTINEZ VALVERDE OSCAR ARMANDO"=>"MARTINEZ VALVERDE OSCAR ARMANDO",
"MEDINA GARCIA JORGE"=>"MEDINA GARCIA JORGE",
"MENDOZA HERNANDEZ JOSE ANTONIO"=>"MENDOZA HERNANDEZ JOSE ANTONIO",
"MERCADO ABUNDIS JORGE"=>"MERCADO ABUNDIS JORGE",
"MINERVA TEJEDA GONZALEZ"=>"MINERVA TEJEDA GONZALEZ",
"MONTALVO TOVAR MARTA CATALINA"=>"MONTALVO TOVAR MARTA CATALINA",
"MONTAÑO GONZALEZ MARIA CECILIA"=>"MONTAÑO GONZALEZ MARIA CECILIA",
"MONTAÑO MONTERO KAREN RUTH ADRIANA"=>"MONTAÑO MONTERO KAREN RUTH ADRIANA",
"MONTUFAR SICARDO HECTOR MANUEL"=>"MONTUFAR SICARDO HECTOR MANUEL",
"MORALES ANDREU JULIO"=>"MORALES ANDREU JULIO",
"MORENO BERNAL ERNESTO ADOLFO"=>"MORENO BERNAL ERNESTO ADOLFO",
"OLIVARES MIRANDA ELIAS"=>"OLIVARES MIRANDA ELIAS",
"PARRA MENDOZA MIGUEL ANGEL"=>"PARRA MENDOZA MIGUEL ANGEL",
"PEREZ PADILLA GABRIEL"=>"PEREZ PADILLA GABRIEL",
"RAMIREZ ROMERO JOSE MIGUEL"=>"RAMIREZ ROMERO JOSE MIGUEL",
"REYES GARCIA GALO ARTURO"=>"REYES GARCIA GALO ARTURO",
"REYES GUZMAN ALMA SARAI"=>"REYES GUZMAN ALMA SARAI",
"REYES LOPEZ JUDITH"=>"REYES LOPEZ JUDITH",
"RIOS GONZALEZ JULIO CESAR"=>"RIOS GONZALEZ JULIO CESAR",
"RIVERA BARRIOS CIRO"=>"RIVERA BARRIOS CIRO",
"RIVERA MARTINEZ JUAN CARLOS"=>"RIVERA MARTINEZ JUAN CARLOS",
"ROBLEDO ROMERO MARIO"=>"ROBLEDO ROMERO MARIO",
"ROMERO DIAZ EMMANUEL"=>"ROMERO DIAZ EMMANUEL",
"ROSALES MOHEDANO ANTONIO"=>"ROSALES MOHEDANO ANTONIO",
"ROSAS ROJAS YENI"=>"ROSAS ROJAS YENI",
"RUIZ BECERRA HANS"=>"RUIZ BECERRA HANS",
"SABORIT SANDOVAL EMANUEL ERNESTO"=>"SABORIT SANDOVAL EMANUEL ERNESTO",
"SANCHEZ CARREON ALEJANDRO"=>"SANCHEZ CARREON ALEJANDRO",
"SANTIAGO RAMIREZ FRANCISCO JAVIER"=>"SANTIAGO RAMIREZ FRANCISCO JAVIER",
"SIQUEIROS ARVIZU FRANCISCO ARGENIS"=>"SIQUEIROS ARVIZU FRANCISCO ARGENIS",
"SOLORZA LOPEZ BLANCA"=>"SOLORZA LOPEZ BLANCA",
"SORTILLON HERRERA FRANCISCO ROGELIO"=>"SORTILLON HERRERA FRANCISCO ROGELIO",
"SORTILLON HERRERA ROGELIO"=>"SORTILLON HERRERA ROGELIO",
"TORRES SALGADO AZUCENA"=>"TORRES SALGADO AZUCENA",
"TOXQUI LOPEZ MARIA DEL SOCORRO"=>"TOXQUI LOPEZ MARIA DEL SOCORRO",
"VÁZQUEZ GUZMÁN JULIA LILIANA"=>"VÁZQUEZ GUZMÁN JULIA LILIANA",
"VILLALPA FERNANDEZ ELLIOTT"=>"VILLALPA FERNANDEZ ELLIOTT",
"YAÑEZ RODRIGUEZ RICARDO"=>"YAÑEZ RODRIGUEZ RICARDO",
"ZARAGOZA OLGUIN MAURICIO"=>"ZARAGOZA OLGUIN MAURICIO",
"ZENDEJAS ARAIZA LESLY ISAMAR"=>"ZENDEJAS ARAIZA LESLY ISAMAR"

	    );
	    
	    return $list;
    }
	
	  public function NuevoPersonalMotivo(){
    	$list = array(
    			
    			"Baja de personal" => "Baja de personal",
    			"Incremento de cartera" => "Incremento de cartera"
    	);
    
    	return $list;
    }
    
}