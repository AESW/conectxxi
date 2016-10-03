<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once(APPPATH.'libraries/Sanitize.php');


class PlanMaestro extends CI_Controller
{
    
   
    
    function __construct()
    {
    	// Call the Model constructor
    	parent::__construct();
    	/*Necesario para validaciones de formulario, sanitizar variables $_POST y $_GET*/
    	$this->load->helper('email');
    	$this->load->library('form_validation');
    	$this->Sanitize = new Sanitize();
    
    	/*Mandar llamar modelos que requieran de actividades de BD*/
    	$this->load->model('Maestro');
    
    }
   
 
  


    public function index() {
    
    
    	
    	
    	$data['Planes']=$this->Maestro->Planes();
    	
    	
    	//$this->SessionL->validarSesionHome();
    	$dataHeader = array(
    			"titulo" => "Plan Maestro"
    	);
    	$this->load->view('includes/header' , $dataHeader);
    	
    	$this->load->view('planMaestro/ListaPlanMaestro',$data);
    	$this->load->view('includes/footer');
    }
    
    
    
    
    public function newPlan() {
    

    	
    	$data['Portafolio']=$this->Maestro->Portafolio();
    	$data['Producto']=$this->Maestro->Producto();
    	$data['Periodo']=$this->Maestro->Periodo();
    	$data['Responsable']=$this->Maestro->Responsable();
    	$data['DiasLaborales']=$this->Maestro->DiasLaborales();
    	$data['Parametros']=$this->Maestro->Parametros();
    	

    	$data['Planes']=$this->Maestro->Planes();
    	
    	//print_r($data['Portafolio']);
    	
    	
    	$dataHeader = array(
    			"titulo" => "Plan Maestro"
    	);
    	$this->load->view('includes/header' , $dataHeader);
    	
    
    	$this->load->view('planMaestro/PlanMaestro',$data);
    	
    	
    	$this->load->view('includes/footer');
    }
    
    
    
    public function consultaMaestro($id) {
    
    	//$apps = $this->consultas->getUsuarios2();
    	//print_r($apps);
    
    	//$this->printPre($_POST);
    	//$this->printPre($this->getUserFromSession());
    
    
    	
    	
    	$data['Portafolio']=$this->Maestro->Portafolio();
    	$data['Producto']=$this->Maestro->Producto();
    	$data['Periodo']=$this->Maestro->Periodo();
    	$data['Responsable']=$this->Maestro->Responsable();
    	$data['DiasLaborales']=$this->Maestro->DiasLaborales();
    	$data['Parametros']=$this->Maestro->Parametros();
    	
    	$data['PlanMaestro']=$this->Maestro->PlanMaestro($id);
    	$data['PlanDetalle']=$this->Maestro->PlanDetalle($id);
    	
    	
    	//print_r($data['PlanDetalle']);
    
    	$dataHeader = array(
    			"titulo" => "Plan Maestro"
    	);
    	$this->load->view('includes/header' , $dataHeader);
    	
    	
    	$this->load->view('planMaestro/ConsultarPlanMaestro',$data);
    	
    	$this->load->view('includes/footer');
    }
    
    public function AddPlan() {
    
    	
    
    
    	
    	
    	$portafolio =  $this->input->post('portafolio');
    	$periodo =  $this->input->post('periodo');
    	$responsable =  $this->input->post('responsable');
    	$datepickerFecha =  $this->input->post('datepickerFecha');
    	
    

    	$AccionesRealizar =  $this->input->post('AccionesRealizar');
    	
    	
    	
    	$id_array=array();
    	 
    	
    	$id_array[]=  json_decode($this->input->post('id_carteo'),true);
    	$id_array[] =  json_decode($this->input->post('id_sms'),true);
    	$id_array[] =  json_decode($this->input->post('id_visitas'),true);
    	$id_array[] =  json_decode($this->input->post('id_telefonia'),true);
    	$id_array[] =  json_decode($this->input->post('id_blaster'),true);
    	$id_array[] =  json_decode($this->input->post('id_personal'),true);
    	$id_array[] =  json_decode($this->input->post('id_costo'),true);
    	$id_array[] =  json_decode($this->input->post('id_total'),true);
    	$id_array[]=  json_decode($this->input->post('id_asignacion'),true);
    	$id_array[] =  json_decode($this->input->post('id_blaster_por'),true);
    	 
    	$tot_array = json_decode($this->input->post('id_carteo'),true);
    	 
    	 
    	
    	 
    	$res=$this->Maestro->AddPlan($portafolio,$periodo,$responsable,$datepickerFecha,$AccionesRealizar );
    	 
    	if ($res){
    		 
    		$res1=	$this->Maestro->AddTurno($res);
    		 
    		 
    	}
    	
    	if ($res1){
    	
    		$resMen=	$this->Maestro->AddMensual($res);
    	
    	
    	}
    	
    	
    	if ($resMen){
    	
    		$resOpera=	$this->Maestro->AddOperaciones($res);
    	
    	
    	}
    	
    	if ($resOpera){
    	
    		$resProcesos=	$this->Maestro->AddProcesos($res);
    	
    	
    	}
    	
    	if ($resProcesos){
    	
    		$res2=	$this->Maestro->AddNomina($res);
    	
    	
    	}
    	
    	
    	
    	
    	
    	if($res2)
    	{
    		 
    		for ($i=0;$i<count($tot_array);$i++)
    		 
    		{
    			 
    	
    	
    			$caralcance=$id_array[0][$i]['caralcance'];
    			$carintensidad=$id_array[0][$i]['carintensidad'];
    			$carcartas=$id_array[0][$i]['carcartas'];
    			$carcostos=$id_array[0][$i]['carcostos'];
    			$cartotal=$id_array[0][$i]['cartotal'];
    	
    			$smsalcance=$id_array[1][$i]['smsalcance'];
    			$smsintensidad=$id_array[1][$i]['smsintensidad'];
    			$smsvolumen=$id_array[1][$i]["smsvolumen"];
    			$smscosto=$id_array[1][$i]["smscosto"];
    			$smstotal=$id_array[1][$i]["smstotal"];
    	
    			$visalcance=$id_array[2][$i]['visalcance'];
    			$visintensidad=$id_array[2][$i]['visintensidad'];
    			$visvolumen=$id_array[2][$i]["visvolumen"];
    			$viscosto=$id_array[2][$i]["viscosto"];
    			$vistotal=$id_array[2][$i]["vistotal"];
    	
    			$teltiempo=$id_array[3][$i]["teltiempo"];
    			$telcosto=$id_array[3][$i]["telcosto"];
    			$teltotal=$id_array[3][$i]["teltotal"];
    	
    			$tottiempo=$id_array[4][$i]["tottiempo"];
    			$totcosto=$id_array[4][$i]["totcosto"];
    			$tottotal=$id_array[4][$i]["tottotal"];
    			$tottiempomovil=$id_array[4][$i]["tottiempomovil"];
    			$totcostomovil=$id_array[4][$i]["totcostomovil"];
    			$tottotalmovil=$id_array[4][$i]["tottotalmovil"];
    			
    	
    			
    			$cpacciones=$id_array[5][$i]["cpacciones"];
    			$cpcuentas=$id_array[5][$i]["cpcuentas"];
    			$cptiempo=$id_array[5][$i]["cptiempo"];
    			$cppronostico=$id_array[5][$i]["cppronostico"];
    			$cphoras=$id_array[5][$i]["cphoras"];
    			$cpturnos=$id_array[5][$i]["cpturnos"];
    			$cppersonas=$id_array[5][$i]["cppersonas"];
    			$cpcosto=$id_array[5][$i]["cpcosto"];
    			$cptotal=$id_array[5][$i]["cptotal"];
    	
    			$totcostoFinal=$id_array[6][$i]["totcostoFinal"];
    	
    	
    			$cthoras=$id_array[7][$i]["cthoras"];
    			$ctpersonas=$id_array[7][$i]["ctpersonas"];
    			$ctausentismo=$id_array[7][$i]["ctausentismo"];
    			$cttotal=$id_array[7][$i]["cttotal"];
    			$ctplantilla=$id_array[7][$i]["ctplantilla"];
    			$ctvariacion=$id_array[7][$i]["ctvariacion"];
    			
    			$productopersonal=$id_array[8][$i]["productopersonal"];
    			$asigcuentas=$id_array[8][$i]["asigcuentas"];
    			$asigsaldo=$id_array[8][$i]["asigsaldo"];
    			$asigfacturacion=$id_array[8][$i]["asigfacturacion"];
    			$asigutilidad=$id_array[8][$i]["asigutilidad"];
    			
    			
    			$porfijo=$id_array[9][0]["porfijo"];
    			$pormovil=$id_array[9][0]["pormovil"];
    			
    	
    			$data = array(
    					"id_plan" => $res,
    					"cuentas" => $asigcuentas,
    					"saldo" => $asigsaldo,
    					"facturacion" => $asigfacturacion,
    					"utilidad"=>$asigutilidad,
    					"caralcance" => $caralcance,
    					"carintensidad" => $carintensidad,
    					"carcartas" => $carcartas,
    					"carcostos" => $carcostos,
    					"cartotal" => $cartotal,
    					"smsalcance" => $smsalcance,
    					"smsintensidad" => $smsintensidad,
    					"smsvolumen"=>$smsvolumen,
    					"smscosto"=>$smscosto,
    					"smstotal"=>$smstotal,
    					"visalcance" => $visalcance,
    					"visintensidad" => $visintensidad,
    					"visvolumen"=>$visvolumen,
    					"viscosto"=>$viscosto,
    					"vistotal"=>$vistotal,
    					"teltiempo"=>$teltiempo,
    					"telcosto"=>$telcosto,
    					"teltotal"=>$teltotal,
    					"tottiempo"=>$tottiempo,
    					"totcosto"=>$totcosto,
    					"tottotal"=>$tottotal,
    					"tottiempomovil"=>$tottiempomovil,
    					"totcostomovil"=>$totcostomovil,
    					"tottotalmovil"=>$tottotalmovil,
    					"pormovil"=>$pormovil,
    					"porfijo"=>$porfijo,
    					"producto"=>$productopersonal,
    					"cpacciones"=>$cpacciones,
    					"cpcuentas"=>$cpcuentas,
    					"cptiempo"=>$cptiempo,
    					"cppronostico"=>$cppronostico,
    					"cphoras"=>$cphoras,
    					"cpturnos"=>$cpturnos,
    					"cppersonas"=>$cppersonas,
    					"cpcosto"=>$cpcosto,
    					"cptotal"=>$cptotal,
    					"ctctotal"=>$totcostoFinal,
    					"cthoras"=>$cthoras,
    					"ctpersonas"=>$ctpersonas,
    					"ctausentismo"=>$ctausentismo,
    					"cttotal"=>$cttotal,
    					"ctplantilla"=>$ctplantilla,
    					"ctvariacion"=>$ctvariacion
    			);
    	
    	
    	
    			$res3 =$this->db->insert('plan_detalle', $data);
    	
    	
    	
    	
    		}
    		 
    		 
    	}
    	
    	
    	if($res3) {
    		
    		$resultado = array(
    				"codigo" => 200,
    				"exito" => true,
    				"mensaje" => "Plan Maestro guardado correctamente."
    		);
    	} else {
    		DB::rollback();
    		$resultado = array(
    				"codigo" => 400,
    				"exito" => false,
    				"mensaje" => "Error, intente m�s tarde."
    		);
    	}
    	

    	
    	////ob_clean();
    	echo json_encode($resultado);
    	exit;
    	
  
    	
    		
    	
    	
    	
    }
    
    
    public function EditPlan() {
    
    	 
    	
    	
    	 
    	$id =  $this->input->post('id');
    	
    	
    	
 
    	
    	$portafolio =  $this->input->post('portafolio');
    	$periodo =  $this->input->post('periodo');
    	$responsable =  $this->input->post('responsable');
    	$datepickerFecha =  $this->input->post('datepickerFecha');
    	 
    	
    	
    	$AccionesRealizar =  $this->input->post('AccionesRealizar');
    	 
    	$id_array=array();
    	 
    	$id_array[]=  json_decode($this->input->post('id_carteo'),true);
    	$id_array[] =  json_decode($this->input->post('id_sms'),true);
    	$id_array[] =  json_decode($this->input->post('id_visitas'),true);
    	$id_array[] =  json_decode($this->input->post('id_telefonia'),true);
    	$id_array[] =  json_decode($this->input->post('id_blaster'),true);
    	$id_array[] =  json_decode($this->input->post('id_personal'),true);
    	$id_array[] =  json_decode($this->input->post('id_costo'),true);
    	$id_array[] =  json_decode($this->input->post('id_total'),true);
    	$id_array[]=  json_decode($this->input->post('id_asignacion'),true);
    	$id_array[] =  json_decode($this->input->post('id_blaster_por'),true);
    	 
    	$tot_array = json_decode($this->input->post('id_carteo'),true);
    	 
    	
    	
    	 
    	$res=$this->Maestro->EditPlan($id,$portafolio,$periodo,$responsable,$datepickerFecha,$AccionesRealizar );
    	 
    	
    	
    	
    	if($res)
    	{
    		 
    		for ($i=0;$i<count($tot_array);$i++)
    		 
    		{
    			 
    			$caralcance=$id_array[0][$i]['caralcance'];
    			$carintensidad=$id_array[0][$i]['carintensidad'];
    			$carcartas=$id_array[0][$i]['carcartas'];
    			$carcostos=$id_array[0][$i]['carcostos'];
    			$cartotal=$id_array[0][$i]['cartotal'];
    	
    			$smsalcance=$id_array[1][$i]['smsalcance'];
    			$smsintensidad=$id_array[1][$i]['smsintensidad'];
    			$smsvolumen=$id_array[1][$i]["smsvolumen"];
    			$smscosto=$id_array[1][$i]["smscosto"];
    			$smstotal=$id_array[1][$i]["smstotal"];
    	
    			$visalcance=$id_array[2][$i]['visalcance'];
    			$visintensidad=$id_array[2][$i]['visintensidad'];
    			$visvolumen=$id_array[2][$i]["visvolumen"];
    			$viscosto=$id_array[2][$i]["viscosto"];
    			$vistotal=$id_array[2][$i]["vistotal"];
    	
    			$teltiempo=$id_array[3][$i]["teltiempo"];
    			$telcosto=$id_array[3][$i]["telcosto"];
    			$teltotal=$id_array[3][$i]["teltotal"];
    	
    			$tottiempo=$id_array[4][$i]["tottiempo"];
    			$totcosto=$id_array[4][$i]["totcosto"];
    			$tottotal=$id_array[4][$i]["tottotal"];
    			$tottiempomovil=$id_array[4][$i]["tottiempomovil"];
    			$totcostomovil=$id_array[4][$i]["totcostomovil"];
    			$tottotalmovil=$id_array[4][$i]["tottotalmovil"];
    			
    	
    			
    			$cpacciones=$id_array[5][$i]["cpacciones"];
    			$cpcuentas=$id_array[5][$i]["cpcuentas"];
    			$cptiempo=$id_array[5][$i]["cptiempo"];
    			$cppronostico=$id_array[5][$i]["cppronostico"];
    			$cphoras=$id_array[5][$i]["cphoras"];
    			$cpturnos=$id_array[5][$i]["cpturnos"];
    			$cppersonas=$id_array[5][$i]["cppersonas"];
    			$cpcosto=$id_array[5][$i]["cpcosto"];
    			$cptotal=$id_array[5][$i]["cptotal"];
    			$iddetalle=$id_array[5][$i]["iddetalle"];
    	
    			$totcostoFinal=$id_array[6][$i]["totcostoFinal"];
    	
    	
    			$cthoras=$id_array[7][$i]["cthoras"];
    			$ctpersonas=$id_array[7][$i]["ctpersonas"];
    			$ctausentismo=$id_array[7][$i]["ctausentismo"];
    			$cttotal=$id_array[7][$i]["cttotal"];
    			$ctplantilla=$id_array[7][$i]["ctplantilla"];
    			$ctvariacion=$id_array[7][$i]["ctvariacion"];
    			
    			$productopersonal=$id_array[8][$i]["productopersonal"];
    			$asigcuentas=$id_array[8][$i]["asigcuentas"];
    			$asigsaldo=$id_array[8][$i]["asigsaldo"];
    			$asigfacturacion=$id_array[8][$i]["asigfacturacion"];
    			$asigutilidad=$id_array[8][$i]["asigutilidad"];
    			
    			
    			$porfijo=$id_array[9][0]["porfijo"];
    			$pormovil=$id_array[9][0]["pormovil"];
    			
    			
    	
    			$data = array(
    					
    					"cuentas" => $asigcuentas,
    					"saldo" => $asigsaldo,
    					"facturacion" => $asigfacturacion,
    					"utilidad"=>$asigutilidad,
    					"caralcance" => $caralcance,
    					"carintensidad" => $carintensidad,
    					"carcartas" => $carcartas,
    					"carcostos" => $carcostos,
    					"cartotal" => $cartotal,
    					"smsalcance" => $smsalcance,
    					"smsintensidad" => $smsintensidad,
    					"smsvolumen"=>$smsvolumen,
    					"smscosto"=>$smscosto,
    					"smstotal"=>$smstotal,
    					"visalcance" => $visalcance,
    					"visintensidad" => $visintensidad,
    					"visvolumen"=>$visvolumen,
    					"viscosto"=>$viscosto,
    					"vistotal"=>$vistotal,
    					"teltiempo"=>$teltiempo,
    					"telcosto"=>$telcosto,
    					"teltotal"=>$teltotal,
    					"tottiempo"=>$tottiempo,
    					"totcosto"=>$totcosto,
    					"tottotal"=>$tottotal,
    					"tottiempomovil"=>$tottiempomovil,
    					"totcostomovil"=>$totcostomovil,
    					"tottotalmovil"=>$tottotalmovil,
    					"pormovil"=>$pormovil,
    					"porfijo"=>$porfijo,
    					"producto"=>$productopersonal,
    					"cpacciones"=>$cpacciones,
    					"cpcuentas"=>$cpcuentas,
    					"cptiempo"=>$cptiempo,
    					"cppronostico"=>$cppronostico,
    					"cphoras"=>$cphoras,
    					"cpturnos"=>$cpturnos,
    					"cppersonas"=>$cppersonas,
    					"cpcosto"=>$cpcosto,
    					"cptotal"=>$cptotal,
    					"ctctotal"=>$totcostoFinal,
    					"cthoras"=>$cthoras,
    					"ctpersonas"=>$ctpersonas,
    					"ctausentismo"=>$ctausentismo,
    					"cttotal"=>$cttotal,
    					"ctplantilla"=>$ctplantilla,
    					"ctvariacion"=>$ctvariacion
    					
    			);
    			
    			
    					
    					$this->db->where('id', $iddetalle);
    					$this->db->where('id_plan', $id);
    			$res2 =		$this->db->update('plan_detalle', $data);
    	
    		}
    		 
    	}
    	 
    	
    	if($res2) {
    		
    		$resultado = array(
    				"codigo" => 200,
    				"exito" => true,
    				"mensaje" => "Plan Maestro guardado correctamente."
    		);
    	} else {
    		DB::rollback();
    		$resultado = array(
    				"codigo" => 400,
    				"exito" => false,
    				"mensaje" => "Error, intente m�s tarde."
    		);
    	}
    	

    	
    	////ob_clean();
    	echo json_encode($resultado);
    	exit;
    	 
   
    	 
    }
    
    
    
    public function Turno($id) {
    
    		
    	 
    	$data['Gerencia']=$this->Maestro->Gerencia();
    	$data['Supervisor']=$this->Maestro->Supervisor();
    	$data['Turno']=$this->Maestro->Turno();
    
    	 
    	 
    	$data['ControlTurno']=$this->Maestro->ControlTurno($id);
    	 
    
    	
    	
    	$dataHeader = array(
    			"titulo" => "Plan Maestro"
    	);
    	$this->load->view('includes/header' , $dataHeader);
    	 
    	 
    	$this->load->view('planMaestro/ControlTurno',$data);
    	 
    	$this->load->view('includes/footer');
    	
    	
    	
    	
    }
    
    
    public function l_producto()
    {
    	
    
    
    		$id = $this->input->post('cliente');
    		
    		
    		 
    		$clientes = $this->Maestro->Combo_producto($id);
    $i=0;
    		?>
               			<option >Seleccione...</option>
               			
               			 <?php
                
               			 foreach($clientes as  $v){
                
                ?>
                    <option value="<?php echo $v->valor?>"><?php echo $v->valor?></option>
                <?php
                ++$i;
                }
            	
            	 
           
        }
        
        
        public function Mensual($id) {
        
        	
        
        	
        
        	$data['ControlMensual']=$this->Maestro->ControlMensual($id);
        
        
        	;
        	
        	
        	$dataHeader = array(
        			"titulo" => "Plan Maestro"
        	);
        	$this->load->view('includes/header' , $dataHeader);
        	
        	
        	$this->load->view('planMaestro/MensualSemanal',$data);
        	 
        	 
        	$this->load->view('includes/footer');
        	
        	
        	
        }
    
        
        public function Catalogos() {
        
        	//$apps = $this->consultas->getUsuarios2();
        	//print_r($apps);
        
        	//$this->printPre($_POST);
        	//$this->printPre($this->getUserFromSession());
        
        
        	 
        	$data['Catalogos']=$this->Maestro->Catalogos();
        	
        	$dataHeader = array(
        			"titulo" => "Catalogos"
        	);
        	$this->load->view('includes/header' , $dataHeader);
        	
        	 
        	$this->load->view('planMaestro/ListaCatalogos',$data);
        	
        	$this->load->view('includes/footer');
        }
        
        
        public function VerCatalogo($id) {
        
        	//$apps = $this->consultas->getUsuarios2();
        	//print_r($apps);
        
        	//$this->printPre($_POST);
        	//$this->printPre($this->getUserFromSession());
        
        
        
        	
        	
        	
        	 
        	$dataHeader = array(
        			"titulo" => "Catalogos"
        	);
        	$this->load->view('includes/header' , $dataHeader);
        	 
        if($id==10 || $id==2){
        	
        	$data['Facturacion']=$this->Maestro->Facturacion();
        	
        	$data['Productos']=$this->Maestro->Productos();
        	 
        	$data['CatFac']=$this->Maestro->CatFac($id);
        	
        	$data['Clientes']=$this->Maestro->Clientes();
        	
        	$this->load->view('planMaestro/CatFacturacion',$data);
        }
        elseif ($id==5){
        	
        	$data['Catalogos']=$this->Maestro->CatalogosDetalle($id);
        	
        	$this->load->view('planMaestro/CatDiasLaborales',$data);
        	
        //	print_r($data);
        	 
        }else 
        {
        	
        	$data['Catalogos']=$this->Maestro->CatalogosDetalle($id);
        	 
        	$this->load->view('planMaestro/ListaDetalle',$data);
        	 
        	
        }
        
        	$this->load->view('includes/footer');
        	
        	//print_r($data);
        	
        }
        
        public function Diario($id) {
        
        	//$apps = $this->consultas->getUsuarios2();
        	//print_r($apps);
        
        	//$this->printPre($_POST);
        	//$this->printPre($this->getUserFromSession());
        
        
        	
        
        	 
        
        	$data['DiarioOperaciones']=$this->Maestro->DiarioOperaciones($id);
        	$data['DiarioProcesos']=$this->Maestro->DiarioProcesos($id);
        	$data['DiarioNomina']=$this->Maestro->DiarioNomina($id);
        
        	
        	$dataHeader = array(
        			"titulo" => "Plan Maestro"
        	);
        	$this->load->view('includes/header' , $dataHeader);
        	 
        
        	$this->load->view('planMaestro/DiarioSemanal',$data);
        	
        	
        	$this->load->view('includes/footer');
        }
        
        
        
        public function EditTurno() {
        
        
        
        	
        	
        	$id_plan = $this->input->post('id');
$gerencia = $this->input->post('gerencia');
        	$supervisor = $this->input->post('supervisor');
$turno = $this->input->post('turno');
        	$fecha = $this->input->post('datepickerFecha');
$gestiones_p1 = $this->input->post('gestiones_p1');
        	$gestiones_p2 = $this->input->post('gestiones_p2');
$gestiones_p3 = $this->input->post('gestiones_p3');
        	$gestiones_p4 = $this->input->post('gestiones_p4');
$gestiones_ptot = $this->input->post('gestiones_ptot');
        	$gestiones_r1 = $this->input->post('gestiones_r1');
$gestiones_r2 = $this->input->post('gestiones_r2');
        	$gestiones_r3 = $this->input->post('gestiones_r3');
$gestiones_r4 = $this->input->post('gestiones_r4');
        	$gestiones_rtot = $this->input->post('gestiones_rtot');
$gest_cum1 = $this->input->post('gest_cum1');
        	$gest_cum2 = $this->input->post('gest_cum2');
$gest_cum3 = $this->input->post('gest_cum3');
        	$gest_cum4 = $this->input->post('gest_cum4');
$gest_tot = $this->input->post('gest_tot');
        	$minutos_p1 = $this->input->post('minutos_p1');
$minutos_p2 = $this->input->post('minutos_p2');
        	$minutos_p3 = $this->input->post('minutos_p3');
$minutos_p4 = $this->input->post('minutos_p4');
        	$minutos_ptot = $this->input->post('minutos_ptot');
$minutos_r1 = $this->input->post('minutos_r1');
        	$minutos_r2 = $this->input->post('minutos_r2');
$minutos_r3 = $this->input->post('minutos_r3');
        	$minutos_r4 = $this->input->post('minutos_r4');
$minutos_rtot = $this->input->post('minutos_rtot');
        	$min_cum1 = $this->input->post('min_cum1');
$min_cum2 = $this->input->post('min_cum2');
        	$min_cum3 = $this->input->post('min_cum3');
$min_cum4 = $this->input->post('min_cum4');
        	$min_tot = $this->input->post('min_tot');
$promesa_p1 = $this->input->post('promesa_p1');
        	$promesa_p2 = $this->input->post('promesa_p2');
$promesa_p3 = $this->input->post('promesa_p3');
        	$promesa_p4 = $this->input->post('promesa_p4');
$promesa_ptot = $this->input->post('promesa_ptot');
        	$promesa_r1 = $this->input->post('promesa_r1');
$promesa_r2 = $this->input->post('promesa_r2');
        	$promesa_r3 = $this->input->post('promesa_r3');
$promesa_r4 = $this->input->post('promesa_r4');
        	$promesa_rtot = $this->input->post('promesa_rtot');
$promesa_cum1 = $this->input->post('promesa_cum1');
        	$promesa_cum2 = $this->input->post('promesa_cum2');
$promesa_cum3 = $this->input->post('promesa_cum3');
        	$promesa_cum4 = $this->input->post('promesa_cum4');
$promesa_tot = $this->input->post('promesa_tot');
        	$gestores_p1 = $this->input->post('gestores_p1');
$gestores_p2 = $this->input->post('gestores_p2');
        	$gestores_p3 = $this->input->post('gestores_p3');
$gestores_p4 = $this->input->post('gestores_p4');
        	$gestores_ptot = $this->input->post('gestores_ptot');
$gestores_r1 = $this->input->post('gestores_r1');
        	$gestores_r2 = $this->input->post('gestores_r2');
$gestores_r3 = $this->input->post('gestores_r3');
        	$gestores_r4 = $this->input->post('gestores_r4');
$gestores_rtot = $this->input->post('gestores_rtot');
        	$gestores_cum1 = $this->input->post('gestores_cum1');
$gestores_cum2 = $this->input->post('gestores_cum2');
        	$gestores_cum3 = $this->input->post('gestores_cum3');
$gestores_cum4 = $this->input->post('gestores_cum4');
        	$gestores_tot = $this->input->post('gestores_tot');
$horas_p1 = $this->input->post('horas_p1');
        	$horas_p2 = $this->input->post('horas_p2');
$horas_p3 = $this->input->post('horas_p3');
        	$horas_p4 = $this->input->post('horas_p4');
$horas_ptot = $this->input->post('horas_ptot');
        	$horas_r1 = $this->input->post('horas_r1');
$horas_r2 = $this->input->post('horas_r2');
        	$horas_r3 = $this->input->post('horas_r3');
$horas_r4 = $this->input->post('horas_r4');
        	$horas_rtot = $this->input->post('horas_rtot');
$horas_cum1 = $this->input->post('horas_cum1');
        	$horas_cum2 = $this->input->post('horas_cum2');
$horas_cum3 = $this->input->post('horas_cum3');
        	$horas_cum4 = $this->input->post('horas_cum4');
$horas_tot = $this->input->post('horas_tot');
        	$Problema1 = $this->input->post('Problema1');
$Problema2 = $this->input->post('Problema2');
        	$Problema3 = $this->input->post('Problema3');
$Problema4 = $this->input->post('Problema4');
        	$Problema5 = $this->input->post('Problema5');
        	 
        	
        	
        
        
        	
        	$res2 =  $this->Maestro->UpdateControlTurno($id_plan,
$gerencia,
$supervisor,
$turno,
$fecha,
$gestiones_p1,
$gestiones_p2,
$gestiones_p3,
$gestiones_p4,
$gestiones_ptot,
$gestiones_r1,
$gestiones_r2,
$gestiones_r3,
$gestiones_r4,
$gestiones_rtot,
$gest_cum1,
$gest_cum2,
$gest_cum3,
$gest_cum4,
$gest_tot,
$minutos_p1,
$minutos_p2,
$minutos_p3,
$minutos_p4,
$minutos_ptot,
$minutos_r1,
$minutos_r2,
$minutos_r3,
$minutos_r4,
$minutos_rtot,
$min_cum1,
$min_cum2,
$min_cum3,
$min_cum4,
$min_tot,
$promesa_p1,
$promesa_p2,
$promesa_p3,
$promesa_p4,
$promesa_ptot,
$promesa_r1,
$promesa_r2,
$promesa_r3,
$promesa_r4,
$promesa_rtot,
$promesa_cum1,
$promesa_cum2,
$promesa_cum3,
$promesa_cum4,
$promesa_tot,
$gestores_p1,
$gestores_p2,
$gestores_p3,
$gestores_p4,
$gestores_ptot,
$gestores_r1,
$gestores_r2,
$gestores_r3,
$gestores_r4,
$gestores_rtot,
$gestores_cum1,
$gestores_cum2,
$gestores_cum3,
$gestores_cum4,
$gestores_tot,
$horas_p1,
$horas_p2,
$horas_p3,
$horas_p4,
$horas_ptot,
$horas_r1,
$horas_r2,
$horas_r3,
$horas_r4,
$horas_rtot,
$horas_cum1,
$horas_cum2,
$horas_cum3,
$horas_cum4,
$horas_tot,
$Problema1,
$Problema2,
$Problema3,
$Problema4,
$Problema5
        	);
        	
        	 
        	
            									 		 
    	
        
        
    	if($res2) {
   
    		$resultado = array(
            		"codigo" => 200,
            		"exito" => true,
            		"mensaje" => "Control por Turno guardado correctamente."
            		);
            									 		} else {
    		DB::rollback();
            		$resultado = array(
            		"codigo" => 400,
            		"exito" => false,
            				"mensaje" => "Error, intente m�s tarde."
            		);
            	}
        
        
        
            	//ob_clean();
            	echo json_encode($resultado);
            	exit;
        
            }
            
            
            public function EditSemanal() {
            
            
           
            	 
            	 
            	$id_plan = $this->input->post('id');
$fecha = $this->input->post('datepickerFecha');
            	$gestiones_p1 = $this->input->post('gestiones_p1');
$gestiones_p2 = $this->input->post('gestiones_p2');
            	$gestiones_p3 = $this->input->post('gestiones_p3');
$gestiones_p4 = $this->input->post('gestiones_p4');
            	$gestiones_p5 = $this->input->post('gestiones_p5');
$gestiones_ptot = $this->input->post('gestiones_ptot');
            	$gestiones_r1 = $this->input->post('gestiones_r1');
$gestiones_r2 = $this->input->post('gestiones_r2');
            	$gestiones_r3 = $this->input->post('gestiones_r3');
$gestiones_r4 = $this->input->post('gestiones_r4');
            	$gestiones_r5 = $this->input->post('gestiones_r5');
$gestiones_rtot = $this->input->post('gestiones_rtot');
            	$gest_cum1 = $this->input->post('gest_cum1');
$gest_cum2 = $this->input->post('gest_cum2');
            	$gest_cum3 = $this->input->post('gest_cum3');
$gest_cum4 = $this->input->post('gest_cum4');
            	$gest_cum5 = $this->input->post('gest_cum5');
$gest_tot = $this->input->post('gest_tot');
            	$recuperacion_p1 = $this->input->post('recuperacion_p1');
$recuperacion_p2 = $this->input->post('recuperacion_p2');
            	$recuperacion_p3 = $this->input->post('recuperacion_p3');
$recuperacion_p4 = $this->input->post('recuperacion_p4');
            	$recuperacion_p5 = $this->input->post('recuperacion_p5');
$recuperacion_ptot = $this->input->post('recuperacion_ptot');
            	$recuperacion_r1 = $this->input->post('recuperacion_r1');
$recuperacion_r2 = $this->input->post('recuperacion_r2');
            	$recuperacion_r3 = $this->input->post('recuperacion_r3');
$recuperacion_r4 = $this->input->post('recuperacion_r4');
            	$recuperacion_r5 = $this->input->post('recuperacion_r5');
$recuperacion_rtot = $this->input->post('recuperacion_rtot');
            	$recuperacion_cum1 = $this->input->post('recuperacion_cum1');
$recuperacion_cum2 = $this->input->post('recuperacion_cum2');
            	$recuperacion_cum3 = $this->input->post('recuperacion_cum3');
$recuperacion_cum4 = $this->input->post('recuperacion_cum4');
            	$recuperacion_cum5 = $this->input->post('recuperacion_cum5');
$recuperacion_tot = $this->input->post('recuperacion_tot');
            	$minutos_p1 = $this->input->post('minutos_p1');
$minutos_p2 = $this->input->post('minutos_p2');
            	$minutos_p3 = $this->input->post('minutos_p3');
$minutos_p4 = $this->input->post('minutos_p4');
            	$minutos_p5 = $this->input->post('minutos_p5');
$minutos_ptot = $this->input->post('minutos_ptot');
            	$minutos_r1 = $this->input->post('minutos_r1');
$minutos_r2 = $this->input->post('minutos_r2');
            	$minutos_r3 = $this->input->post('minutos_r3');
$minutos_r4 = $this->input->post('minutos_r4');
            	$minutos_r5 = $this->input->post('minutos_r5');
$minutos_rtot = $this->input->post('minutos_rtot');
            	$min_cum1 = $this->input->post('min_cum1');
$min_cum2 = $this->input->post('min_cum2');
            	$min_cum3 = $this->input->post('min_cum3');
$min_cum4 = $this->input->post('min_cum4');
            	$min_cum5 = $this->input->post('min_cum5');
$min_tot = $this->input->post('min_tot');
            	$costoaire_p1 = $this->input->post('costoaire_p1');
$costoaire_p2 = $this->input->post('costoaire_p2');
            	$costoaire_p3 = $this->input->post('costoaire_p3');
$costoaire_p4 = $this->input->post('costoaire_p4');
            	$costoaire_p5 = $this->input->post('costoaire_p5');
$costoaire_ptot = $this->input->post('costoaire_ptot');
            	$costoaire_r1 = $this->input->post('costoaire_r1');
$costoaire_r2 = $this->input->post('costoaire_r2');
            	$costoaire_r3 = $this->input->post('costoaire_r3');
$costoaire_r4 = $this->input->post('costoaire_r4');
            	$costoaire_r5 = $this->input->post('costoaire_r5');
$costoaire_rtot = $this->input->post('costoaire_rtot');
            	$costoaire_cum1 = $this->input->post('costoaire_cum1');
$costoaire_cum2 = $this->input->post('costoaire_cum2');
            	$costoaire_cum3 = $this->input->post('costoaire_cum3');
$costoaire_cum4 = $this->input->post('costoaire_cum4');
            	$costoaire_cum5 = $this->input->post('costoaire_cum5');
$costoaire_tot = $this->input->post('costoaire_tot');
            	$carteo_p1 = $this->input->post('carteo_p1');
$carteo_p2 = $this->input->post('carteo_p2');
            	$carteo_p3 = $this->input->post('carteo_p3');
$carteo_p4 = $this->input->post('carteo_p4');
            	$carteo_p5 = $this->input->post('carteo_p5');
$carteo_ptot = $this->input->post('carteo_ptot');
            	$carteo_r1 = $this->input->post('carteo_r1');
$carteo_r2 = $this->input->post('carteo_r2');
            	$carteo_r3 = $this->input->post('carteo_r3');
$carteo_r4 = $this->input->post('carteo_r4');
            	$carteo_r5 = $this->input->post('carteo_r5');
$carteo_rtot = $this->input->post('carteo_rtot');
            	$carteo_cum1 = $this->input->post('carteo_cum1');
$carteo_cum2 = $this->input->post('carteo_cum2');
            	$carteo_cum3 = $this->input->post('carteo_cum3');
$carteo_cum4 = $this->input->post('carteo_cum4');
            	$carteo_cum5 = $this->input->post('carteo_cum5');
$carteo_tot = $this->input->post('carteo_tot');
            	$costocarteo_p1 = $this->input->post('costocarteo_p1');
$costocarteo_p2 = $this->input->post('costocarteo_p2');
            	$costocarteo_p3 = $this->input->post('costocarteo_p3');
$costocarteo_p4 = $this->input->post('costocarteo_p4');
            	$costocarteo_p5 = $this->input->post('costocarteo_p5');
$costocarteo_ptot = $this->input->post('costocarteo_ptot');
            	$costocarteo_r1 = $this->input->post('costocarteo_r1');
$costocarteo_r2 = $this->input->post('costocarteo_r2');
            	$costocarteo_r3 = $this->input->post('costocarteo_r3');
$costocarteo_r4 = $this->input->post('costocarteo_r4');
            	$costocarteo_r5 = $this->input->post('costocarteo_r5');
$costocarteo_rtot = $this->input->post('costocarteo_rtot');
            	$costocarteo_cum1 = $this->input->post('costocarteo_cum1');
$costocarteo_cum2 = $this->input->post('costocarteo_cum2');
            	$costocarteo_cum3 = $this->input->post('costocarteo_cum3');
$costocarteo_cum4 = $this->input->post('costocarteo_cum4');
            	$costocarteo_cum5 = $this->input->post('costocarteo_cum5');
$costocarteo_tot = $this->input->post('costocarteo_tot');
            	$cobranza_p1 = $this->input->post('cobranza_p1');
$cobranza_p2 = $this->input->post('cobranza_p2');
            	$cobranza_p3 = $this->input->post('cobranza_p3');
$cobranza_p4 = $this->input->post('cobranza_p4');
            	$cobranza_p5 = $this->input->post('cobranza_p5');
$cobranza_ptot = $this->input->post('cobranza_ptot');
            	$cobranza_r1 = $this->input->post('cobranza_r1');
$cobranza_r2 = $this->input->post('cobranza_r2');
            	$cobranza_r3 = $this->input->post('cobranza_r3');
$cobranza_r4 = $this->input->post('cobranza_r4');
            	$cobranza_r5 = $this->input->post('cobranza_r5');
$cobranza_rtot = $this->input->post('cobranza_rtot');
            	$cobranza_cum1 = $this->input->post('cobranza_cum1');
$cobranza_cum2 = $this->input->post('cobranza_cum2');
            	$cobranza_cum3 = $this->input->post('cobranza_cum3');
$cobranza_cum4 = $this->input->post('cobranza_cum4');
            	$cobranza_cum5 = $this->input->post('cobranza_cum5');
$cobranza_tot = $this->input->post('cobranza_tot');
            	$costocofi_p1 = $this->input->post('costocofi_p1');
$costocofi_p2 = $this->input->post('costocofi_p2');
            	$costocofi_p3 = $this->input->post('costocofi_p3');
$costocofi_p4 = $this->input->post('costocofi_p4');
            	$costocofi_p5 = $this->input->post('costocofi_p5');
$costocofi_ptot = $this->input->post('costocofi_ptot');
            	$costocofi_r1 = $this->input->post('costocofi_r1');
$costocofi_r2 = $this->input->post('costocofi_r2');
            	$costocofi_r3 = $this->input->post('costocofi_r3');
$costocofi_r4 = $this->input->post('costocofi_r4');
            	$costocofi_r5 = $this->input->post('costocofi_r5');
$costocofi_rtot = $this->input->post('costocofi_rtot');
            	$costocofi_cum1 = $this->input->post('costocofi_cum1');
$costocofi_cum2 = $this->input->post('costocofi_cum2');
            	$costocofi_cum3 = $this->input->post('costocofi_cum3');
$costocofi_cum4 = $this->input->post('costocofi_cum4');
            	$costocofi_cum5 = $this->input->post('costocofi_cum5');
$costocofi_tot = $this->input->post('costocofi_tot');
            	$gestores_p1 = $this->input->post('gestores_p1');
$gestores_p2 = $this->input->post('gestores_p2');
            	$gestores_p3 = $this->input->post('gestores_p3');
$gestores_p4 = $this->input->post('gestores_p4');
            	$gestores_p5 = $this->input->post('gestores_p5');
$gestores_ptot = $this->input->post('gestores_ptot');
            	$gestores_r1 = $this->input->post('gestores_r1');
$gestores_r2 = $this->input->post('gestores_r2');
            	$gestores_r3 = $this->input->post('gestores_r3');
$gestores_r4 = $this->input->post('gestores_r4');
            	$gestores_r5 = $this->input->post('gestores_r5');
$gestores_rtot = $this->input->post('gestores_rtot');
            	$gestores_cum1 = $this->input->post('gestores_cum1');
$gestores_cum2 = $this->input->post('gestores_cum2');
            	$gestores_cum3 = $this->input->post('gestores_cum3');
$gestores_cum4 = $this->input->post('gestores_cum4');
            	$gestores_cum5 = $this->input->post('gestores_cum5');
$gestores_tot = $this->input->post('gestores_tot');
            	$costogestores_p1 = $this->input->post('costogestores_p1');
$costogestores_p2 = $this->input->post('costogestores_p2');
            	$costogestores_p3 = $this->input->post('costogestores_p3');
$costogestores_p4 = $this->input->post('costogestores_p4');
            	$costogestores_p5 = $this->input->post('costogestores_p5');
$costogestores_ptot = $this->input->post('costogestores_ptot');
            	$costogestores_r1 = $this->input->post('costogestores_r1');
$costogestores_r2 = $this->input->post('costogestores_r2');
            	$costogestores_r3 = $this->input->post('costogestores_r3');
$costogestores_r4 = $this->input->post('costogestores_r4');
            	$costogestores_r5 = $this->input->post('costogestores_r5');
$costogestores_rtot = $this->input->post('costogestores_rtot');
            	$costogestores_cum1 = $this->input->post('costogestores_cum1');
$costogestores_cum2 = $this->input->post('costogestores_cum2');
            	$costogestores_cum3 = $this->input->post('costogestores_cum3');
$costogestores_cum4 = $this->input->post('costogestores_cum4');
            	$costogestores_cum5 = $this->input->post('costogestores_cum5');
$costogestores_tot = $this->input->post('costogestores_tot');
            	$totalcosto_p1 = $this->input->post('totalcosto_p1');
$totalcosto_p2 = $this->input->post('totalcosto_p2');
            	$totalcosto_p3 = $this->input->post('totalcosto_p3');
$totalcosto_p4 = $this->input->post('totalcosto_p4');
            	$totalcosto_p5 = $this->input->post('totalcosto_p5');
$totalcosto_ptot = $this->input->post('totalcosto_ptot');
            	$totalcosto_r1 = $this->input->post('totalcosto_r1');
$totalcosto_r2 = $this->input->post('totalcosto_r2');
            	$totalcosto_r3 = $this->input->post('totalcosto_r3');
$totalcosto_r4 = $this->input->post('totalcosto_r4');
            	$totalcosto_r5 = $this->input->post('totalcosto_r5');
$totalcosto_rtot = $this->input->post('totalcosto_rtot');
            	$totalcosto_cum1 = $this->input->post('totalcosto_cum1');
$totalcosto_cum2 = $this->input->post('totalcosto_cum2');
            	$totalcosto_cum3 = $this->input->post('totalcosto_cum3');
$totalcosto_cum4 = $this->input->post('totalcosto_cum4');
            	$totalcosto_cum5 = $this->input->post('totalcosto_cum5');
$totalcosto_tot = $this->input->post('totalcosto_tot');
            	 
            
            	 
            	 
            
            
            	 
            	$res2 =  $this->Maestro->UpdateMensual($id_plan,
$fecha,
$gestiones_p1,
$gestiones_p2,
$gestiones_p3,
$gestiones_p4,
$gestiones_p5,
$gestiones_ptot,
$gestiones_r1,
$gestiones_r2,
$gestiones_r3,
$gestiones_r4,
$gestiones_r5,
$gestiones_rtot,
$gest_cum1,
$gest_cum2,
$gest_cum3,
$gest_cum4,
$gest_cum5,
$gest_tot,
$recuperacion_p1,
$recuperacion_p2,
$recuperacion_p3,
$recuperacion_p4,
$recuperacion_p5,
$recuperacion_ptot,
$recuperacion_r1,
$recuperacion_r2,
$recuperacion_r3,
$recuperacion_r4,
$recuperacion_r5,
$recuperacion_rtot,
$recuperacion_cum1,
$recuperacion_cum2,
$recuperacion_cum3,
$recuperacion_cum4,
$recuperacion_cum5,
$recuperacion_tot,
$minutos_p1,
$minutos_p2,
$minutos_p3,
$minutos_p4,
$minutos_p5,
$minutos_ptot,
$minutos_r1,
$minutos_r2,
$minutos_r3,
$minutos_r4,
$minutos_r5,
$minutos_rtot,
$min_cum1,
$min_cum2,
$min_cum3,
$min_cum4,
$min_cum5,
$min_tot,
$costoaire_p1,
$costoaire_p2,
$costoaire_p3,
$costoaire_p4,
$costoaire_p5,
$costoaire_ptot,
$costoaire_r1,
$costoaire_r2,
$costoaire_r3,
$costoaire_r4,
$costoaire_r5,
$costoaire_rtot,
$costoaire_cum1,
$costoaire_cum2,
$costoaire_cum3,
$costoaire_cum4,
$costoaire_cum5,
$costoaire_tot,
$carteo_p1,
$carteo_p2,
$carteo_p3,
$carteo_p4,
$carteo_p5,
$carteo_ptot,
$carteo_r1,
$carteo_r2,
$carteo_r3,
$carteo_r4,
$carteo_r5,
$carteo_rtot,
$carteo_cum1,
$carteo_cum2,
$carteo_cum3,
$carteo_cum4,
$carteo_cum5,
$carteo_tot,
$costocarteo_p1,
$costocarteo_p2,
$costocarteo_p3,
$costocarteo_p4,
$costocarteo_p5,
$costocarteo_ptot,
$costocarteo_r1,
$costocarteo_r2,
$costocarteo_r3,
$costocarteo_r4,
$costocarteo_r5,
$costocarteo_rtot,
$costocarteo_cum1,
$costocarteo_cum2,
$costocarteo_cum3,
$costocarteo_cum4,
$costocarteo_cum5,
$costocarteo_tot,
$cobranza_p1,
$cobranza_p2,
$cobranza_p3,
$cobranza_p4,
$cobranza_p5,
$cobranza_ptot,
$cobranza_r1,
$cobranza_r2,
$cobranza_r3,
$cobranza_r4,
$cobranza_r5,
$cobranza_rtot,
$cobranza_cum1,
$cobranza_cum2,
$cobranza_cum3,
$cobranza_cum4,
$cobranza_cum5,
$cobranza_tot,
$costocofi_p1,
$costocofi_p2,
$costocofi_p3,
$costocofi_p4,
$costocofi_p5,
$costocofi_ptot,
$costocofi_r1,
$costocofi_r2,
$costocofi_r3,
$costocofi_r4,
$costocofi_r5,
$costocofi_rtot,
$costocofi_cum1,
$costocofi_cum2,
$costocofi_cum3,
$costocofi_cum4,
$costocofi_cum5,
$costocofi_tot,
$gestores_p1,
$gestores_p2,
$gestores_p3,
$gestores_p4,
$gestores_p5,
$gestores_ptot,
$gestores_r1,
$gestores_r2,
$gestores_r3,
$gestores_r4,
$gestores_r5,
$gestores_rtot,
$gestores_cum1,
$gestores_cum2,
$gestores_cum3,
$gestores_cum4,
$gestores_cum5,
$gestores_tot,
$costogestores_p1,
$costogestores_p2,
$costogestores_p3,
$costogestores_p4,
$costogestores_p5,
$costogestores_ptot,
$costogestores_r1,
$costogestores_r2,
$costogestores_r3,
$costogestores_r4,
$costogestores_r5,
$costogestores_rtot,
$costogestores_cum1,
$costogestores_cum2,
$costogestores_cum3,
$costogestores_cum4,
$costogestores_cum5,
$costogestores_tot,
$totalcosto_p1,
$totalcosto_p2,
$totalcosto_p3,
$totalcosto_p4,
$totalcosto_p5,
$totalcosto_ptot,
$totalcosto_r1,
$totalcosto_r2,
$totalcosto_r3,
$totalcosto_r4,
$totalcosto_r5,
$totalcosto_rtot,
$totalcosto_cum1,
$totalcosto_cum2,
$totalcosto_cum3,
$totalcosto_cum4,
$totalcosto_cum5,
$totalcosto_tot
            	);
            	 
            
            	 
            		
            	 
            
            
            	if($res2) {
            		 
            		$resultado = array(
            				"codigo" => 200,
            				"exito" => true,
            				"mensaje" => "Control Mensual-Semanal guardado correctamente."
            		);
            	} else {
            		DB::rollback();
            		$resultado = array(
            				"codigo" => 400,
            				"exito" => false,
            				"mensaje" => "Error, intente m�s tarde."
            		);
            	}
            
            
            
            	//ob_clean();
            	echo json_encode($resultado);
            	exit;
            
            }
            
            
            public function EditDiario() {
            
            
            	
            
            	$id_plan = $this->input->post('id');;
$fecha = $this->input->post('datepickerFecha');
            	$gestiones_p1 = $this->input->post('gestiones_p1');
$gestiones_p2 = $this->input->post('gestiones_p2');
            	$gestiones_p3 = $this->input->post('gestiones_p3');
$gestiones_p4 = $this->input->post('gestiones_p4');
            	$gestiones_p5 = $this->input->post('gestiones_p5');
$gestiones_p6 = $this->input->post('gestiones_p6');
            	$gestiones_p7 = $this->input->post('gestiones_p7');
$gestiones_ptot = $this->input->post('gestiones_ptot');
            	$gestiones_pprom = $this->input->post('gestiones_pprom');
$gestiones_r1 = $this->input->post('gestiones_r1');
            	$gestiones_r2 = $this->input->post('gestiones_r2');
$gestiones_r3 = $this->input->post('gestiones_r3');
            	$gestiones_r4 = $this->input->post('gestiones_r4');
$gestiones_r5 = $this->input->post('gestiones_r5');
            	$gestiones_r6 = $this->input->post('gestiones_r6');
$gestiones_r7 = $this->input->post('gestiones_r7');
            	$gestiones_rtot = $this->input->post('gestiones_rtot');
$gestiones_rprom = $this->input->post('gestiones_rprom');
            	$gest_cum1 = $this->input->post('gest_cum1');
$gest_cum2 = $this->input->post('gest_cum2');
            	$gest_cum3 = $this->input->post('gest_cum3');
$gest_cum4 = $this->input->post('gest_cum4');
            	$gest_cum5 = $this->input->post('gest_cum5');
$gest_cum6 = $this->input->post('gest_cum6');
            	$gest_cum7 = $this->input->post('gest_cum7');
$gest_tot = $this->input->post('gest_tot');
            	$gest_prom = $this->input->post('gest_prom');
$gestionesHora_p1 = $this->input->post('gestionesHora_p1');
            	$gestionesHora_p2 = $this->input->post('gestionesHora_p2');
$gestionesHora_p3 = $this->input->post('gestionesHora_p3');
            	$gestionesHora_p4 = $this->input->post('gestionesHora_p4');
$gestionesHora_p5 = $this->input->post('gestionesHora_p5');
            	$gestionesHora_p6 = $this->input->post('gestionesHora_p6');
$gestionesHora_p7 = $this->input->post('gestionesHora_p7');
            	$gestionesHora_ptot = $this->input->post('gestionesHora_ptot');
$gestionesHora_pprom = $this->input->post('gestionesHora_pprom');
            	$gestionesHora_r1 = $this->input->post('gestionesHora_r1');
$gestionesHora_r2 = $this->input->post('gestionesHora_r2');
            	$gestionesHora_r3 = $this->input->post('gestionesHora_r3');
$gestionesHora_r4 = $this->input->post('gestionesHora_r4');
            	$gestionesHora_r5 = $this->input->post('gestionesHora_r5');
$gestionesHora_r6 = $this->input->post('gestionesHora_r6');
            	$gestionesHora_r7 = $this->input->post('gestionesHora_r7');
$gestionesHora_rtot = $this->input->post('gestionesHora_rtot');
            	$gestionesHora_rprom = $this->input->post('gestionesHora_rprom');
$gestionesHora_cum1 = $this->input->post('gestionesHora_cum1');
            	$gestionesHora_cum2 = $this->input->post('gestionesHora_cum2');
$gestionesHora_cum3 = $this->input->post('gestionesHora_cum3');
            	$gestionesHora_cum4 = $this->input->post('gestionesHora_cum4');
$gestionesHora_cum5 = $this->input->post('gestionesHora_cum5');
            	$gestionesHora_cum6 = $this->input->post('gestionesHora_cum6');
$gestionesHora_cum7 = $this->input->post('gestionesHora_cum7');
            	$gestionesHora_tot = $this->input->post('gestionesHora_tot');
$gestionesHora_prom = $this->input->post('gestionesHora_prom');
            	$gphg_p1 = $this->input->post('gphg_p1');
$gphg_p2 = $this->input->post('gphg_p2');
            	$gphg_p3 = $this->input->post('gphg_p3');
$gphg_p4 = $this->input->post('gphg_p4');
            	$gphg_p5 = $this->input->post('gphg_p5');
$gphg_p6 = $this->input->post('gphg_p6');
            	$gphg_p7 = $this->input->post('gphg_p7');
$gphg_ptot = $this->input->post('gphg_ptot');
            	$gphg_pprom = $this->input->post('gphg_pprom');
$gphg_r1 = $this->input->post('gphg_r1');
            	$gphg_r2 = $this->input->post('gphg_r2');
$gphg_r3 = $this->input->post('gphg_r3');
            	$gphg_r4 = $this->input->post('gphg_r4');
$gphg_r5 = $this->input->post('gphg_r5');
            	$gphg_r6 = $this->input->post('gphg_r6');
$gphg_r7 = $this->input->post('gphg_r7');
            	$gphg_rtot = $this->input->post('gphg_rtot');
$gphg_rprom = $this->input->post('gphg_rprom');
            	$gphg_cum1 = $this->input->post('gphg_cum1');
$gphg_cum2 = $this->input->post('gphg_cum2');
            	$gphg_cum3 = $this->input->post('gphg_cum3');
$gphg_cum4 = $this->input->post('gphg_cum4');
            	$gphg_cum5 = $this->input->post('gphg_cum5');
$gphg_cum6 = $this->input->post('gphg_cum6');
            	$gphg_cum7 = $this->input->post('gphg_cum7');
$gphg_tot = $this->input->post('gphg_tot');
            	$gphg_prom = $this->input->post('gphg_prom');
$promeReali_p1 = $this->input->post('promeReali_p1');
            	$promeReali_p2 = $this->input->post('promeReali_p2');
$promeReali_p3 = $this->input->post('promeReali_p3');
            	$promeReali_p4 = $this->input->post('promeReali_p4');
$promeReali_p5 = $this->input->post('promeReali_p5');
            	$promeReali_p6 = $this->input->post('promeReali_p6');
$promeReali_p7 = $this->input->post('promeReali_p7');
            	$promeReali_ptot = $this->input->post('promeReali_ptot');
$promeReali_pprom = $this->input->post('promeReali_pprom');
            	$promeReali_r1 = $this->input->post('promeReali_r1');
$promeReali_r2 = $this->input->post('promeReali_r2');
            	$promeReali_r3 = $this->input->post('promeReali_r3');
$promeReali_r4 = $this->input->post('promeReali_r4');
            	$promeReali_r5 = $this->input->post('promeReali_r5');
$promeReali_r6 = $this->input->post('promeReali_r6');
            	$promeReali_r7 = $this->input->post('promeReali_r7');
$promeReali_rtot = $this->input->post('promeReali_rtot');
            	$promeReali_rprom = $this->input->post('promeReali_rprom');
$promeReali_cum1 = $this->input->post('promeReali_cum1');
            	$promeReali_cum2 = $this->input->post('promeReali_cum2');
$promeReali_cum3 = $this->input->post('promeReali_cum3');
            	$promeReali_cum4 = $this->input->post('promeReali_cum4');
$promeReali_cum5 = $this->input->post('promeReali_cum5');
            	$promeReali_cum6 = $this->input->post('promeReali_cum6');
$promeReali_cum7 = $this->input->post('promeReali_cum7');
            	$promeReali_tot = $this->input->post('promeReali_tot');
$promeReali_prom = $this->input->post('promeReali_prom');
            	$promeCum_p1 = $this->input->post('promeCum_p1');
$promeCum_p2 = $this->input->post('promeCum_p2');
            	$promeCum_p3 = $this->input->post('promeCum_p3');
$promeCum_p4 = $this->input->post('promeCum_p4');
            	$promeCum_p5 = $this->input->post('promeCum_p5');
$promeCum_p6 = $this->input->post('promeCum_p6');
            	$promeCum_p7 = $this->input->post('promeCum_p7');
$promeCum_ptot = $this->input->post('promeCum_ptot');
            	$promeCum_pprom = $this->input->post('promeCum_pprom');
$promeCum_r1 = $this->input->post('promeCum_r1');
            	$promeCum_r2 = $this->input->post('promeCum_r2');
$promeCum_r3 = $this->input->post('promeCum_r3');
            	$promeCum_r4 = $this->input->post('promeCum_r4');
$promeCum_r5 = $this->input->post('promeCum_r5');
            	$promeCum_r6 = $this->input->post('promeCum_r6');
$promeCum_r7 = $this->input->post('promeCum_r7');
            	$promeCum_rtot = $this->input->post('promeCum_rtot');
$promeCum_rprom = $this->input->post('promeCum_rprom');
            	$promeCum_cum1 = $this->input->post('promeCum_cum1');
$promeCum_cum2 = $this->input->post('promeCum_cum2');
            	$promeCum_cum3 = $this->input->post('promeCum_cum3');
$promeCum_cum4 = $this->input->post('promeCum_cum4');
            	$promeCum_cum5 = $this->input->post('promeCum_cum5');
$promeCum_cum6 = $this->input->post('promeCum_cum6');
            	$promeCum_cum7 = $this->input->post('promeCum_cum7');
$promeCum_tot = $this->input->post('promeCum_tot');
            	$promeCum_prom = $this->input->post('promeCum_prom');
$recuperacion_p1 = $this->input->post('recuperacion_p1');
            	$recuperacion_p2 = $this->input->post('recuperacion_p2');
$recuperacion_p3 = $this->input->post('recuperacion_p3');
            	$recuperacion_p4 = $this->input->post('recuperacion_p4');
$recuperacion_p5 = $this->input->post('recuperacion_p5');
            	$recuperacion_p6 = $this->input->post('recuperacion_p6');
$recuperacion_p7 = $this->input->post('recuperacion_p7');
            	$recuperacion_ptot = $this->input->post('recuperacion_ptot');
$recuperacion_pprom = $this->input->post('recuperacion_pprom');
            	$recuperacion_r1 = $this->input->post('recuperacion_r1');
$recuperacion_r2 = $this->input->post('recuperacion_r2');
            	$recuperacion_r3 = $this->input->post('recuperacion_r3');
$recuperacion_r4 = $this->input->post('recuperacion_r4');
            	$recuperacion_r5 = $this->input->post('recuperacion_r5');
$recuperacion_r6 = $this->input->post('recuperacion_r6');
            	$recuperacion_r7 = $this->input->post('recuperacion_r7');
$recuperacion_rtot = $this->input->post('recuperacion_rtot');
            	$recuperacion_rprom = $this->input->post('recuperacion_rprom');
$recuperacion_cum1 = $this->input->post('recuperacion_cum1');
            	$recuperacion_cum2 = $this->input->post('recuperacion_cum2');
$recuperacion_cum3 = $this->input->post('recuperacion_cum3');
            	$recuperacion_cum4 = $this->input->post('recuperacion_cum4');
$recuperacion_cum5 = $this->input->post('recuperacion_cum5');
            	$recuperacion_cum6 = $this->input->post('recuperacion_cum6');
$recuperacion_cum7 = $this->input->post('recuperacion_cum7');
            	$recuperacion_tot = $this->input->post('recuperacion_tot');
$recuperacion_prom = $this->input->post('recuperacion_prom');
            	 
            
            
$minutos_p1 = $this->input->post('minutos_p1');
$minutos_p2 = $this->input->post('minutos_p2');
$minutos_p3 = $this->input->post('minutos_p3');
$minutos_p4 = $this->input->post('minutos_p4');
$minutos_p5 = $this->input->post('minutos_p5');
$minutos_p6 = $this->input->post('minutos_p6');
$minutos_p7 = $this->input->post('minutos_p7');
$minutos_ptot = $this->input->post('minutos_ptot');
$minutos_pprom = $this->input->post('minutos_pprom');
$minutos_r1 = $this->input->post('minutos_r1');
$minutos_r2 = $this->input->post('minutos_r2');
$minutos_r3 = $this->input->post('minutos_r3');
$minutos_r4 = $this->input->post('minutos_r4');
$minutos_r5 = $this->input->post('minutos_r5');
$minutos_r6 = $this->input->post('minutos_r6');
$minutos_r7 = $this->input->post('minutos_r7');
$minutos_rtot = $this->input->post('minutos_rtot');
$minutos_rprom = $this->input->post('minutos_rprom');
$minutos_cum1 = $this->input->post('minutos_cum1');
$minutos_cum2 = $this->input->post('minutos_cum2');
$minutos_cum3 = $this->input->post('minutos_cum3');
$minutos_cum4 = $this->input->post('minutos_cum4');
$minutos_cum5 = $this->input->post('minutos_cum5');
$minutos_cum6 = $this->input->post('minutos_cum6');
$minutos_cum7 = $this->input->post('minutos_cum7');
$minutos_tot = $this->input->post('minutos_tot');
$minutos_prom = $this->input->post('minutos_prom');
$tAire_p1 = $this->input->post('tAire_p1');
$tAire_p2 = $this->input->post('tAire_p2');
$tAire_p3 = $this->input->post('tAire_p3');
$tAire_p4 = $this->input->post('tAire_p4');
$tAire_p5 = $this->input->post('tAire_p5');
$tAire_p6 = $this->input->post('tAire_p6');
$tAire_p7 = $this->input->post('tAire_p7');
$tAire_ptot = $this->input->post('tAire_ptot');
$tAire_pprom = $this->input->post('tAire_pprom');
$tAire_r1 = $this->input->post('tAire_r1');
$tAire_r2 = $this->input->post('tAire_r2');
$tAire_r3 = $this->input->post('tAire_r3');
$tAire_r4 = $this->input->post('tAire_r4');
$tAire_r5 = $this->input->post('tAire_r5');
$tAire_r6 = $this->input->post('tAire_r6');
$tAire_r7 = $this->input->post('tAire_r7');
$tAire_rtot = $this->input->post('tAire_rtot');
$tAire_rprom = $this->input->post('tAire_rprom');
$tAire_cum1 = $this->input->post('tAire_cum1');
$tAire_cum2 = $this->input->post('tAire_cum2');
$tAire_cum3 = $this->input->post('tAire_cum3');
$tAire_cum4 = $this->input->post('tAire_cum4');
$tAire_cum5 = $this->input->post('tAire_cum5');
$tAire_cum6 = $this->input->post('tAire_cum6');
$tAire_cum7 = $this->input->post('tAire_cum7');
$tAire_tot = $this->input->post('tAire_tot');
$tAire_prom = $this->input->post('tAire_prom');
$costoTel_p1 = $this->input->post('costoTel_p1');
$costoTel_p2 = $this->input->post('costoTel_p2');
$costoTel_p3 = $this->input->post('costoTel_p3');
$costoTel_p4 = $this->input->post('costoTel_p4');
$costoTel_p5 = $this->input->post('costoTel_p5');
$costoTel_p6 = $this->input->post('costoTel_p6');
$costoTel_p7 = $this->input->post('costoTel_p7');
$costoTel_ptot = $this->input->post('costoTel_ptot');
$costoTel_pprom = $this->input->post('costoTel_pprom');
$costoTel_r1 = $this->input->post('costoTel_r1');
$costoTel_r2 = $this->input->post('costoTel_r2');
$costoTel_r3 = $this->input->post('costoTel_r3');
$costoTel_r4 = $this->input->post('costoTel_r4');
$costoTel_r5 = $this->input->post('costoTel_r5');
$costoTel_r6 = $this->input->post('costoTel_r6');
$costoTel_r7 = $this->input->post('costoTel_r7');
$costoTel_rtot = $this->input->post('costoTel_rtot');
$costoTel_rprom = $this->input->post('costoTel_rprom');
$costoTel_cum1 = $this->input->post('costoTel_cum1');
$costoTel_cum2 = $this->input->post('costoTel_cum2');
$costoTel_cum3 = $this->input->post('costoTel_cum3');
$costoTel_cum4 = $this->input->post('costoTel_cum4');
$costoTel_cum5 = $this->input->post('costoTel_cum5');
$costoTel_cum6 = $this->input->post('costoTel_cum6');
$costoTel_cum7 = $this->input->post('costoTel_cum7');
$costoTel_tot = $this->input->post('costoTel_tot');
$costoTel_prom = $this->input->post('costoTel_prom');
$carteo_p1 = $this->input->post('carteo_p1');
$carteo_p2 = $this->input->post('carteo_p2');
$carteo_p3 = $this->input->post('carteo_p3');
$carteo_p4 = $this->input->post('carteo_p4');
$carteo_p5 = $this->input->post('carteo_p5');
$carteo_p6 = $this->input->post('carteo_p6');
$carteo_p7 = $this->input->post('carteo_p7');
$carteo_ptot = $this->input->post('carteo_ptot');
$carteo_pprom = $this->input->post('carteo_pprom');
$carteo_r1 = $this->input->post('carteo_r1');
$carteo_r2 = $this->input->post('carteo_r2');
$carteo_r3 = $this->input->post('carteo_r3');
$carteo_r4 = $this->input->post('carteo_r4');
$carteo_r5 = $this->input->post('carteo_r5');
$carteo_r6 = $this->input->post('carteo_r6');
$carteo_r7 = $this->input->post('carteo_r7');
$carteo_rtot = $this->input->post('carteo_rtot');
$carteo_rprom = $this->input->post('carteo_rprom');
$carteo_cum1 = $this->input->post('carteo_cum1');
$carteo_cum2 = $this->input->post('carteo_cum2');
$carteo_cum3 = $this->input->post('carteo_cum3');
$carteo_cum4 = $this->input->post('carteo_cum4');
$carteo_cum5 = $this->input->post('carteo_cum5');
$carteo_cum6 = $this->input->post('carteo_cum6');
$carteo_cum7 = $this->input->post('carteo_cum7');
$carteo_tot = $this->input->post('carteo_tot');
$carteo_prom = $this->input->post('carteo_prom');
$carteoCos_p1 = $this->input->post('carteoCos_p1');
$carteoCos_p2 = $this->input->post('carteoCos_p2');
$carteoCos_p3 = $this->input->post('carteoCos_p3');
$carteoCos_p4 = $this->input->post('carteoCos_p4');
$carteoCos_p5 = $this->input->post('carteoCos_p5');
$carteoCos_p6 = $this->input->post('carteoCos_p6');
$carteoCos_p7 = $this->input->post('carteoCos_p7');
$carteoCos_ptot = $this->input->post('carteoCos_ptot');
$carteoCos_pprom = $this->input->post('carteoCos_pprom');
$carteoCos_r1 = $this->input->post('carteoCos_r1');
$carteoCos_r2 = $this->input->post('carteoCos_r2');
$carteoCos_r3 = $this->input->post('carteoCos_r3');
$carteoCos_r4 = $this->input->post('carteoCos_r4');
$carteoCos_r5 = $this->input->post('carteoCos_r5');
$carteoCos_r6 = $this->input->post('carteoCos_r6');
$carteoCos_r7 = $this->input->post('carteoCos_r7');
$carteoCos_rtot = $this->input->post('carteoCos_rtot');
$carteoCos_rprom = $this->input->post('carteoCos_rprom');
$carteoCos_cum1 = $this->input->post('carteoCos_cum1');
$carteoCos_cum2 = $this->input->post('carteoCos_cum2');
$carteoCos_cum3 = $this->input->post('carteoCos_cum3');
$carteoCos_cum4 = $this->input->post('carteoCos_cum4');
$carteoCos_cum5 = $this->input->post('carteoCos_cum5');
$carteoCos_cum6 = $this->input->post('carteoCos_cum6');
$carteoCos_cum7 = $this->input->post('carteoCos_cum7');
$carteoCos_tot = $this->input->post('carteoCos_tot');
$carteoCos_prom = $this->input->post('carteoCos_prom');
$visitas_p1 = $this->input->post('visitas_p1');
$visitas_p2 = $this->input->post('visitas_p2');
$visitas_p3 = $this->input->post('visitas_p3');
$visitas_p4 = $this->input->post('visitas_p4');
$visitas_p5 = $this->input->post('visitas_p5');
$visitas_p6 = $this->input->post('visitas_p6');
$visitas_p7 = $this->input->post('visitas_p7');
$visitas_ptot = $this->input->post('visitas_ptot');
$visitas_pprom = $this->input->post('visitas_pprom');
$visitas_r1 = $this->input->post('visitas_r1');
$visitas_r2 = $this->input->post('visitas_r2');
$visitas_r3 = $this->input->post('visitas_r3');
$visitas_r4 = $this->input->post('visitas_r4');
$visitas_r5 = $this->input->post('visitas_r5');
$visitas_r6 = $this->input->post('visitas_r6');
$visitas_r7 = $this->input->post('visitas_r7');
$visitas_rtot = $this->input->post('visitas_rtot');
$visitas_rprom = $this->input->post('visitas_rprom');
$visitas_cum1 = $this->input->post('visitas_cum1');
$visitas_cum2 = $this->input->post('visitas_cum2');
$visitas_cum3 = $this->input->post('visitas_cum3');
$visitas_cum4 = $this->input->post('visitas_cum4');
$visitas_cum5 = $this->input->post('visitas_cum5');
$visitas_cum6 = $this->input->post('visitas_cum6');
$visitas_cum7 = $this->input->post('visitas_cum7');
$visitas_tot = $this->input->post('visitas_tot');
$visitas_prom = $this->input->post('visitas_prom');
$visitasCos_p1 = $this->input->post('visitasCos_p1');
$visitasCos_p2 = $this->input->post('visitasCos_p2');
$visitasCos_p3 = $this->input->post('visitasCos_p3');
$visitasCos_p4 = $this->input->post('visitasCos_p4');
$visitasCos_p5 = $this->input->post('visitasCos_p5');
$visitasCos_p6 = $this->input->post('visitasCos_p6');
$visitasCos_p7 = $this->input->post('visitasCos_p7');
$visitasCos_ptot = $this->input->post('visitasCos_ptot');
$visitasCos_pprom = $this->input->post('visitasCos_pprom');
$visitasCos_r1 = $this->input->post('visitasCos_r1');
$visitasCos_r2 = $this->input->post('visitasCos_r2');
$visitasCos_r3 = $this->input->post('visitasCos_r3');
$visitasCos_r4 = $this->input->post('visitasCos_r4');
$visitasCos_r5 = $this->input->post('visitasCos_r5');
$visitasCos_r6 = $this->input->post('visitasCos_r6');
$visitasCos_r7 = $this->input->post('visitasCos_r7');
$visitasCos_rtot = $this->input->post('visitasCos_rtot');
$visitasCos_rprom = $this->input->post('visitasCos_rprom');
$visitasCos_cum1 = $this->input->post('visitasCos_cum1');
$visitasCos_cum2 = $this->input->post('visitasCos_cum2');
$visitasCos_cum3 = $this->input->post('visitasCos_cum3');
$visitasCos_cum4 = $this->input->post('visitasCos_cum4');
$visitasCos_cum5 = $this->input->post('visitasCos_cum5');
$visitasCos_cum6 = $this->input->post('visitasCos_cum6');
$visitasCos_cum7 = $this->input->post('visitasCos_cum7');
$visitasCos_tot = $this->input->post('visitasCos_tot');
$visitasCos_prom = $this->input->post('visitasCos_prom');
$conPositivo_p1 = $this->input->post('conPositivo_p1');
$conPositivo_p2 = $this->input->post('conPositivo_p2');
$conPositivo_p3 = $this->input->post('conPositivo_p3');
$conPositivo_p4 = $this->input->post('conPositivo_p4');
$conPositivo_p5 = $this->input->post('conPositivo_p5');
$conPositivo_p6 = $this->input->post('conPositivo_p6');
$conPositivo_p7 = $this->input->post('conPositivo_p7');
$conPositivo_ptot = $this->input->post('conPositivo_ptot');
$conPositivo_pprom = $this->input->post('conPositivo_pprom');
$conPositivo_r1 = $this->input->post('conPositivo_r1');
$conPositivo_r2 = $this->input->post('conPositivo_r2');
$conPositivo_r3 = $this->input->post('conPositivo_r3');
$conPositivo_r4 = $this->input->post('conPositivo_r4');
$conPositivo_r5 = $this->input->post('conPositivo_r5');
$conPositivo_r6 = $this->input->post('conPositivo_r6');
$conPositivo_r7 = $this->input->post('conPositivo_r7');
$conPositivo_rtot = $this->input->post('conPositivo_rtot');
$conPositivo_rprom = $this->input->post('conPositivo_rprom');
$conPositivo_cum1 = $this->input->post('conPositivo_cum1');
$conPositivo_cum2 = $this->input->post('conPositivo_cum2');
$conPositivo_cum3 = $this->input->post('conPositivo_cum3');
$conPositivo_cum4 = $this->input->post('conPositivo_cum4');
$conPositivo_cum5 = $this->input->post('conPositivo_cum5');
$conPositivo_cum6 = $this->input->post('conPositivo_cum6');
$conPositivo_cum7 = $this->input->post('conPositivo_cum7');
$conPositivo_tot = $this->input->post('conPositivo_tot');
$conPositivo_prom = $this->input->post('conPositivo_prom');
$conNegativo_p1 = $this->input->post('conNegativo_p1');
$conNegativo_p2 = $this->input->post('conNegativo_p2');
$conNegativo_p3 = $this->input->post('conNegativo_p3');
$conNegativo_p4 = $this->input->post('conNegativo_p4');
$conNegativo_p5 = $this->input->post('conNegativo_p5');
$conNegativo_p6 = $this->input->post('conNegativo_p6');
$conNegativo_p7 = $this->input->post('conNegativo_p7');
$conNegativo_ptot = $this->input->post('conNegativo_ptot');
$conNegativo_pprom = $this->input->post('conNegativo_pprom');
$conNegativo_r1 = $this->input->post('conNegativo_r1');
$conNegativo_r2 = $this->input->post('conNegativo_r2');
$conNegativo_r3 = $this->input->post('conNegativo_r3');
$conNegativo_r4 = $this->input->post('conNegativo_r4');
$conNegativo_r5 = $this->input->post('conNegativo_r5');
$conNegativo_r6 = $this->input->post('conNegativo_r6');
$conNegativo_r7 = $this->input->post('conNegativo_r7');
$conNegativo_rtot = $this->input->post('conNegativo_rtot');
$conNegativo_rprom = $this->input->post('conNegativo_rprom');
$conNegativo_cum1 = $this->input->post('conNegativo_cum1');
$conNegativo_cum2 = $this->input->post('conNegativo_cum2');
$conNegativo_cum3 = $this->input->post('conNegativo_cum3');
$conNegativo_cum4 = $this->input->post('conNegativo_cum4');
$conNegativo_cum5 = $this->input->post('conNegativo_cum5');
$conNegativo_cum6 = $this->input->post('conNegativo_cum6');
$conNegativo_cum7 = $this->input->post('conNegativo_cum7');
$conNegativo_tot = $this->input->post('conNegativo_tot');
$conNegativo_prom = $this->input->post('conNegativo_prom');
$datos_p1 = $this->input->post('datos_p1');
$datos_p2 = $this->input->post('datos_p2');
$datos_p3 = $this->input->post('datos_p3');
$datos_p4 = $this->input->post('datos_p4');
$datos_p5 = $this->input->post('datos_p5');
$datos_p6 = $this->input->post('datos_p6');
$datos_p7 = $this->input->post('datos_p7');
$datos_ptot = $this->input->post('datos_ptot');
$datos_pprom = $this->input->post('datos_pprom');
$datos_r1 = $this->input->post('datos_r1');
$datos_r2 = $this->input->post('datos_r2');
$datos_r3 = $this->input->post('datos_r3');
$datos_r4 = $this->input->post('datos_r4');
$datos_r5 = $this->input->post('datos_r5');
$datos_r6 = $this->input->post('datos_r6');
$datos_r7 = $this->input->post('datos_r7');
$datos_rtot = $this->input->post('datos_rtot');
$datos_rprom = $this->input->post('datos_rprom');
$datos_cum1 = $this->input->post('datos_cum1');
$datos_cum2 = $this->input->post('datos_cum2');
$datos_cum3 = $this->input->post('datos_cum3');
$datos_cum4 = $this->input->post('datos_cum4');
$datos_cum5 = $this->input->post('datos_cum5');
$datos_cum6 = $this->input->post('datos_cum6');
$datos_cum7 = $this->input->post('datos_cum7');
$datos_tot = $this->input->post('datos_tot');
$datos_prom = $this->input->post('datos_prom');
$contactabili_p1 = $this->input->post('contactabili_p1');
$contactabili_p2 = $this->input->post('contactabili_p2');
$contactabili_p3 = $this->input->post('contactabili_p3');
$contactabili_p4 = $this->input->post('contactabili_p4');
$contactabili_p5 = $this->input->post('contactabili_p5');
$contactabili_p6 = $this->input->post('contactabili_p6');
$contactabili_p7 = $this->input->post('contactabili_p7');
$contactabili_ptot = $this->input->post('contactabili_ptot');
$contactabili_pprom = $this->input->post('contactabili_pprom');


$perGestores_p1 = $this->input->post('perGestores_p1');
$perGestores_p2 = $this->input->post('perGestores_p2');
$perGestores_p3 = $this->input->post('perGestores_p3');
$perGestores_p4 = $this->input->post('perGestores_p4');
$perGestores_p5 = $this->input->post('perGestores_p5');
$perGestores_p6 = $this->input->post('perGestores_p6');
$perGestores_p7 = $this->input->post('perGestores_p7');
$perGestores_ptot = $this->input->post('perGestores_ptot');
$perGestores_pprom = $this->input->post('perGestores_pprom');
$perGestores_r1 = $this->input->post('perGestores_r1');
$perGestores_r2 = $this->input->post('perGestores_r2');
$perGestores_r3 = $this->input->post('perGestores_r3');
$perGestores_r4 = $this->input->post('perGestores_r4');
$perGestores_r5 = $this->input->post('perGestores_r5');
$perGestores_r6 = $this->input->post('perGestores_r6');
$perGestores_r7 = $this->input->post('perGestores_r7');
$perGestores_rtot = $this->input->post('perGestores_rtot');
$perGestores_rprom = $this->input->post('perGestores_rprom');
$perGestores_cum1 = $this->input->post('perGestores_cum1');
$perGestores_cum2 = $this->input->post('perGestores_cum2');
$perGestores_cum3 = $this->input->post('perGestores_cum3');
$perGestores_cum4 = $this->input->post('perGestores_cum4');
$perGestores_cum5 = $this->input->post('perGestores_cum5');
$perGestores_cum6 = $this->input->post('perGestores_cum6');
$perGestores_cum7 = $this->input->post('perGestores_cum7');
$perGestores_tot = $this->input->post('perGestores_tot');
$perGestores_prom = $this->input->post('perGestores_prom');
$horasGest_p1 = $this->input->post('horasGest_p1');
$horasGest_p2 = $this->input->post('horasGest_p2');
$horasGest_p3 = $this->input->post('horasGest_p3');
$horasGest_p4 = $this->input->post('horasGest_p4');
$horasGest_p5 = $this->input->post('horasGest_p5');
$horasGest_p6 = $this->input->post('horasGest_p6');
$horasGest_p7 = $this->input->post('horasGest_p7');
$horasGest_ptot = $this->input->post('horasGest_ptot');
$horasGest_pprom = $this->input->post('horasGest_pprom');
$horasGest_r1 = $this->input->post('horasGest_r1');
$horasGest_r2 = $this->input->post('horasGest_r2');
$horasGest_r3 = $this->input->post('horasGest_r3');
$horasGest_r4 = $this->input->post('horasGest_r4');
$horasGest_r5 = $this->input->post('horasGest_r5');
$horasGest_r6 = $this->input->post('horasGest_r6');
$horasGest_r7 = $this->input->post('horasGest_r7');
$horasGest_rtot = $this->input->post('horasGest_rtot');
$horasGest_rprom = $this->input->post('horasGest_rprom');
$horasGest_cum1 = $this->input->post('horasGest_cum1');
$horasGest_cum2 = $this->input->post('horasGest_cum2');
$horasGest_cum3 = $this->input->post('horasGest_cum3');
$horasGest_cum4 = $this->input->post('horasGest_cum4');
$horasGest_cum5 = $this->input->post('horasGest_cum5');
$horasGest_cum6 = $this->input->post('horasGest_cum6');
$horasGest_cum7 = $this->input->post('horasGest_cum7');
$horasGest_tot = $this->input->post('horasGest_tot');
$horasGest_prom = $this->input->post('horasGest_prom');
$pagoNom_p1 = $this->input->post('pagoNom_p1');
$pagoNom_p2 = $this->input->post('pagoNom_p2');
$pagoNom_p3 = $this->input->post('pagoNom_p3');
$pagoNom_p4 = $this->input->post('pagoNom_p4');
$pagoNom_p5 = $this->input->post('pagoNom_p5');
$pagoNom_p6 = $this->input->post('pagoNom_p6');
$pagoNom_p7 = $this->input->post('pagoNom_p7');
$pagoNom_ptot = $this->input->post('pagoNom_ptot');
$pagoNom_pprom = $this->input->post('pagoNom_pprom');
$pagoNom_r1 = $this->input->post('pagoNom_r1');
$pagoNom_r2 = $this->input->post('pagoNom_r2');
$pagoNom_r3 = $this->input->post('pagoNom_r3');
$pagoNom_r4 = $this->input->post('pagoNom_r4');
$pagoNom_r5 = $this->input->post('pagoNom_r5');
$pagoNom_r6 = $this->input->post('pagoNom_r6');
$pagoNom_r7 = $this->input->post('pagoNom_r7');
$pagoNom_rtot = $this->input->post('pagoNom_rtot');
$pagoNom_rprom = $this->input->post('pagoNom_rprom');
$pagoNom_cum1 = $this->input->post('pagoNom_cum1');
$pagoNom_cum2 = $this->input->post('pagoNom_cum2');
$pagoNom_cum3 = $this->input->post('pagoNom_cum3');
$pagoNom_cum4 = $this->input->post('pagoNom_cum4');
$pagoNom_cum5 = $this->input->post('pagoNom_cum5');
$pagoNom_cum6 = $this->input->post('pagoNom_cum6');
$pagoNom_cum7 = $this->input->post('pagoNom_cum7');
$pagoNom_tot = $this->input->post('pagoNom_tot');
$pagoNom_prom = $this->input->post('pagoNom_prom');
$ausent_p1 = $this->input->post('ausent_p1');
$ausent_p2 = $this->input->post('ausent_p2');
$ausent_p3 = $this->input->post('ausent_p3');
$ausent_p4 = $this->input->post('ausent_p4');
$ausent_p5 = $this->input->post('ausent_p5');
$ausent_p6 = $this->input->post('ausent_p6');
$ausent_p7 = $this->input->post('ausent_p7');
$ausent_ptot = $this->input->post('ausent_ptot');
$ausent_pprom = $this->input->post('ausent_pprom');
$equipos_p1 = $this->input->post('equipos_p1');
$equipos_p2 = $this->input->post('equipos_p2');
$equipos_p3 = $this->input->post('equipos_p3');
$equipos_p4 = $this->input->post('equipos_p4');
$equipos_p5 = $this->input->post('equipos_p5');
$equipos_p6 = $this->input->post('equipos_p6');
$equipos_p7 = $this->input->post('equipos_p7');
$equipos_ptot = $this->input->post('equipos_ptot');
$equipos_pprom = $this->input->post('equipos_pprom');

            
            
           
            
            	$res2 =  $this->Maestro->UpdateOperaciones($id_plan,
            			$fecha,
$gestiones_p1,
$gestiones_p2,
$gestiones_p3,
$gestiones_p4,
$gestiones_p5,
$gestiones_p6,
$gestiones_p7,
$gestiones_ptot,
$gestiones_pprom,
$gestiones_r1,
$gestiones_r2,
$gestiones_r3,
$gestiones_r4,
$gestiones_r5,
$gestiones_r6,
$gestiones_r7,
$gestiones_rtot,
$gestiones_rprom,
$gest_cum1,
$gest_cum2,
$gest_cum3,
$gest_cum4,
$gest_cum5,
$gest_cum6,
$gest_cum7,
$gest_tot,
$gest_prom,
$gestionesHora_p1,
$gestionesHora_p2,
$gestionesHora_p3,
$gestionesHora_p4,
$gestionesHora_p5,
$gestionesHora_p6,
$gestionesHora_p7,
$gestionesHora_ptot,
$gestionesHora_pprom,
$gestionesHora_r1,
$gestionesHora_r2,
$gestionesHora_r3,
$gestionesHora_r4,
$gestionesHora_r5,
$gestionesHora_r6,
$gestionesHora_r7,
$gestionesHora_rtot,
$gestionesHora_rprom,
$gestionesHora_cum1,
$gestionesHora_cum2,
$gestionesHora_cum3,
$gestionesHora_cum4,
$gestionesHora_cum5,
$gestionesHora_cum6,
$gestionesHora_cum7,
$gestionesHora_tot,
$gestionesHora_prom,
$gphg_p1,
$gphg_p2,
$gphg_p3,
$gphg_p4,
$gphg_p5,
$gphg_p6,
$gphg_p7,
$gphg_ptot,
$gphg_pprom,
$gphg_r1,
$gphg_r2,
$gphg_r3,
$gphg_r4,
$gphg_r5,
$gphg_r6,
$gphg_r7,
$gphg_rtot,
$gphg_rprom,
$gphg_cum1,
$gphg_cum2,
$gphg_cum3,
$gphg_cum4,
$gphg_cum5,
$gphg_cum6,
$gphg_cum7,
$gphg_tot,
$gphg_prom,
$promeReali_p1,
$promeReali_p2,
$promeReali_p3,
$promeReali_p4,
$promeReali_p5,
$promeReali_p6,
$promeReali_p7,
$promeReali_ptot,
$promeReali_pprom,
$promeReali_r1,
$promeReali_r2,
$promeReali_r3,
$promeReali_r4,
$promeReali_r5,
$promeReali_r6,
$promeReali_r7,
$promeReali_rtot,
$promeReali_rprom,
$promeReali_cum1,
$promeReali_cum2,
$promeReali_cum3,
$promeReali_cum4,
$promeReali_cum5,
$promeReali_cum6,
$promeReali_cum7,
$promeReali_tot,
$promeReali_prom,
$promeCum_p1,
$promeCum_p2,
$promeCum_p3,
$promeCum_p4,
$promeCum_p5,
$promeCum_p6,
$promeCum_p7,
$promeCum_ptot,
$promeCum_pprom,
$promeCum_r1,
$promeCum_r2,
$promeCum_r3,
$promeCum_r4,
$promeCum_r5,
$promeCum_r6,
$promeCum_r7,
$promeCum_rtot,
$promeCum_rprom,
$promeCum_cum1,
$promeCum_cum2,
$promeCum_cum3,
$promeCum_cum4,
$promeCum_cum5,
$promeCum_cum6,
$promeCum_cum7,
$promeCum_tot,
$promeCum_prom,
$recuperacion_p1,
$recuperacion_p2,
$recuperacion_p3,
$recuperacion_p4,
$recuperacion_p5,
$recuperacion_p6,
$recuperacion_p7,
$recuperacion_ptot,
$recuperacion_pprom,
$recuperacion_r1,
$recuperacion_r2,
$recuperacion_r3,
$recuperacion_r4,
$recuperacion_r5,
$recuperacion_r6,
$recuperacion_r7,
$recuperacion_rtot,
$recuperacion_rprom,
$recuperacion_cum1,
$recuperacion_cum2,
$recuperacion_cum3,
$recuperacion_cum4,
$recuperacion_cum5,
$recuperacion_cum6,
$recuperacion_cum7,
$recuperacion_tot,
$recuperacion_prom

            	);
            
            
            
if($res2) {
	 
$res3 =  $this->Maestro->UpdateProcesos($id_plan,
		$minutos_p1,
$minutos_p2,
$minutos_p3,
$minutos_p4,
$minutos_p5,
$minutos_p6,
$minutos_p7,
$minutos_ptot,
$minutos_pprom,
$minutos_r1,
$minutos_r2,
$minutos_r3,
$minutos_r4,
$minutos_r5,
$minutos_r6,
$minutos_r7,
$minutos_rtot,
$minutos_rprom,
$minutos_cum1,
$minutos_cum2,
$minutos_cum3,
$minutos_cum4,
$minutos_cum5,
$minutos_cum6,
$minutos_cum7,
$minutos_tot,
$minutos_prom,
$tAire_p1,
$tAire_p2,
$tAire_p3,
$tAire_p4,
$tAire_p5,
$tAire_p6,
$tAire_p7,
$tAire_ptot,
$tAire_pprom,
$tAire_r1,
$tAire_r2,
$tAire_r3,
$tAire_r4,
$tAire_r5,
$tAire_r6,
$tAire_r7,
$tAire_rtot,
$tAire_rprom,
$tAire_cum1,
$tAire_cum2,
$tAire_cum3,
$tAire_cum4,
$tAire_cum5,
$tAire_cum6,
$tAire_cum7,
$tAire_tot,
$tAire_prom,
$costoTel_p1,
$costoTel_p2,
$costoTel_p3,
$costoTel_p4,
$costoTel_p5,
$costoTel_p6,
$costoTel_p7,
$costoTel_ptot,
$costoTel_pprom,
$costoTel_r1,
$costoTel_r2,
$costoTel_r3,
$costoTel_r4,
$costoTel_r5,
$costoTel_r6,
$costoTel_r7,
$costoTel_rtot,
$costoTel_rprom,
$costoTel_cum1,
$costoTel_cum2,
$costoTel_cum3,
$costoTel_cum4,
$costoTel_cum5,
$costoTel_cum6,
$costoTel_cum7,
$costoTel_tot,
$costoTel_prom,
$carteo_p1,
$carteo_p2,
$carteo_p3,
$carteo_p4,
$carteo_p5,
$carteo_p6,
$carteo_p7,
$carteo_ptot,
$carteo_pprom,
$carteo_r1,
$carteo_r2,
$carteo_r3,
$carteo_r4,
$carteo_r5,
$carteo_r6,
$carteo_r7,
$carteo_rtot,
$carteo_rprom,
$carteo_cum1,
$carteo_cum2,
$carteo_cum3,
$carteo_cum4,
$carteo_cum5,
$carteo_cum6,
$carteo_cum7,
$carteo_tot,
$carteo_prom,
$carteoCos_p1,
$carteoCos_p2,
$carteoCos_p3,
$carteoCos_p4,
$carteoCos_p5,
$carteoCos_p6,
$carteoCos_p7,
$carteoCos_ptot,
$carteoCos_pprom,
$carteoCos_r1,
$carteoCos_r2,
$carteoCos_r3,
$carteoCos_r4,
$carteoCos_r5,
$carteoCos_r6,
$carteoCos_r7,
$carteoCos_rtot,
$carteoCos_rprom,
$carteoCos_cum1,
$carteoCos_cum2,
$carteoCos_cum3,
$carteoCos_cum4,
$carteoCos_cum5,
$carteoCos_cum6,
$carteoCos_cum7,
$carteoCos_tot,
$carteoCos_prom,
$visitas_p1,
$visitas_p2,
$visitas_p3,
$visitas_p4,
$visitas_p5,
$visitas_p6,
$visitas_p7,
$visitas_ptot,
$visitas_pprom,
$visitas_r1,
$visitas_r2,
$visitas_r3,
$visitas_r4,
$visitas_r5,
$visitas_r6,
$visitas_r7,
$visitas_rtot,
$visitas_rprom,
$visitas_cum1,
$visitas_cum2,
$visitas_cum3,
$visitas_cum4,
$visitas_cum5,
$visitas_cum6,
$visitas_cum7,
$visitas_tot,
$visitas_prom,
$visitasCos_p1,
$visitasCos_p2,
$visitasCos_p3,
$visitasCos_p4,
$visitasCos_p5,
$visitasCos_p6,
$visitasCos_p7,
$visitasCos_ptot,
$visitasCos_pprom,
$visitasCos_r1,
$visitasCos_r2,
$visitasCos_r3,
$visitasCos_r4,
$visitasCos_r5,
$visitasCos_r6,
$visitasCos_r7,
$visitasCos_rtot,
$visitasCos_rprom,
$visitasCos_cum1,
$visitasCos_cum2,
$visitasCos_cum3,
$visitasCos_cum4,
$visitasCos_cum5,
$visitasCos_cum6,
$visitasCos_cum7,
$visitasCos_tot,
$visitasCos_prom,
$conPositivo_p1,
$conPositivo_p2,
$conPositivo_p3,
$conPositivo_p4,
$conPositivo_p5,
$conPositivo_p6,
$conPositivo_p7,
$conPositivo_ptot,
$conPositivo_pprom,
$conPositivo_r1,
$conPositivo_r2,
$conPositivo_r3,
$conPositivo_r4,
$conPositivo_r5,
$conPositivo_r6,
$conPositivo_r7,
$conPositivo_rtot,
$conPositivo_rprom,
$conPositivo_cum1,
$conPositivo_cum2,
$conPositivo_cum3,
$conPositivo_cum4,
$conPositivo_cum5,
$conPositivo_cum6,
$conPositivo_cum7,
$conPositivo_tot,
$conPositivo_prom,
$conNegativo_p1,
$conNegativo_p2,
$conNegativo_p3,
$conNegativo_p4,
$conNegativo_p5,
$conNegativo_p6,
$conNegativo_p7,
$conNegativo_ptot,
$conNegativo_pprom,
$conNegativo_r1,
$conNegativo_r2,
$conNegativo_r3,
$conNegativo_r4,
$conNegativo_r5,
$conNegativo_r6,
$conNegativo_r7,
$conNegativo_rtot,
$conNegativo_rprom,
$conNegativo_cum1,
$conNegativo_cum2,
$conNegativo_cum3,
$conNegativo_cum4,
$conNegativo_cum5,
$conNegativo_cum6,
$conNegativo_cum7,
$conNegativo_tot,
$conNegativo_prom,
$datos_p1,
$datos_p2,
$datos_p3,
$datos_p4,
$datos_p5,
$datos_p6,
$datos_p7,
$datos_ptot,
$datos_pprom,
$datos_r1,
$datos_r2,
$datos_r3,
$datos_r4,
$datos_r5,
$datos_r6,
$datos_r7,
$datos_rtot,
$datos_rprom,
$datos_cum1,
$datos_cum2,
$datos_cum3,
$datos_cum4,
$datos_cum5,
$datos_cum6,
$datos_cum7,
$datos_tot,
$datos_prom,
$contactabili_p1,
$contactabili_p2,
$contactabili_p3,
$contactabili_p4,
$contactabili_p5,
$contactabili_p6,
$contactabili_p7,
$contactabili_ptot,
$contactabili_pprom


);	




} else {
	DB::rollback();
	
}            




if($res3) {



$res4 =  $this->Maestro->UpdateNomina($id_plan,
		$perGestores_p1,
$perGestores_p2,
$perGestores_p3,
$perGestores_p4,
$perGestores_p5,
$perGestores_p6,
$perGestores_p7,
$perGestores_ptot,
$perGestores_pprom,
$perGestores_r1,
$perGestores_r2,
$perGestores_r3,
$perGestores_r4,
$perGestores_r5,
$perGestores_r6,
$perGestores_r7,
$perGestores_rtot,
$perGestores_rprom,
$perGestores_cum1,
$perGestores_cum2,
$perGestores_cum3,
$perGestores_cum4,
$perGestores_cum5,
$perGestores_cum6,
$perGestores_cum7,
$perGestores_tot,
$perGestores_prom,
$horasGest_p1,
$horasGest_p2,
$horasGest_p3,
$horasGest_p4,
$horasGest_p5,
$horasGest_p6,
$horasGest_p7,
$horasGest_ptot,
$horasGest_pprom,
$horasGest_r1,
$horasGest_r2,
$horasGest_r3,
$horasGest_r4,
$horasGest_r5,
$horasGest_r6,
$horasGest_r7,
$horasGest_rtot,
$horasGest_rprom,
$horasGest_cum1,
$horasGest_cum2,
$horasGest_cum3,
$horasGest_cum4,
$horasGest_cum5,
$horasGest_cum6,
$horasGest_cum7,
$horasGest_tot,
$horasGest_prom,
$pagoNom_p1,
$pagoNom_p2,
$pagoNom_p3,
$pagoNom_p4,
$pagoNom_p5,
$pagoNom_p6,
$pagoNom_p7,
$pagoNom_ptot,
$pagoNom_pprom,
$pagoNom_r1,
$pagoNom_r2,
$pagoNom_r3,
$pagoNom_r4,
$pagoNom_r5,
$pagoNom_r6,
$pagoNom_r7,
$pagoNom_rtot,
$pagoNom_rprom,
$pagoNom_cum1,
$pagoNom_cum2,
$pagoNom_cum3,
$pagoNom_cum4,
$pagoNom_cum5,
$pagoNom_cum6,
$pagoNom_cum7,
$pagoNom_tot,
$pagoNom_prom,
$ausent_p1,
$ausent_p2,
$ausent_p3,
$ausent_p4,
$ausent_p5,
$ausent_p6,
$ausent_p7,
$ausent_ptot,
$ausent_pprom,
$equipos_p1,
$equipos_p2,
$equipos_p3,
$equipos_p4,
$equipos_p5,
$equipos_p6,
$equipos_p7,
$equipos_ptot,
$equipos_pprom


);
	 
	
} else {
	DB::rollback();
	
}

          
            
            
            	if($res4) {
            		 
            		$resultado = array(
            				"codigo" => 200,
            				"exito" => true,
            				"mensaje" => "Control Diario Semanal guardado correctamente."
            		);
            	} else {
            		DB::rollback();
            		$resultado = array(
            				"codigo" => 400,
            				"exito" => false,
            				"mensaje" => "Error, intente m�s tarde."
            		);
            	}
            
            
            
            	//ob_clean();
            	echo json_encode($resultado);
            	exit;
            
            }
            
            
            public function consultaHistoria($id) {
            
            	
            	 
            	$data['Portafolio']=$this->Maestro->Portafolio();
            	$data['Producto']=$this->Maestro->Producto();
            	$data['Periodo']=$this->Maestro->Periodo();
            	$data['Responsable']=$this->Maestro->Responsable();
            	$data['DiasLaborales']=$this->Maestro->DiasLaborales();
            	$data['Parametros']=$this->Maestro->Parametros();
            	 
            	//$data['PlanMaestro']=$this->Maestro->PlanMaestro($id);
            	$data['PlanDetalleHistoria']=$this->Maestro->PlanDetalleHistoria($id);
            	 
            	 
            	//print_r($data['PlanDetalleHistoria']);
            
            	$dataHeader = array(
            			"titulo" => "Plan Maestro"
            	);
            	$this->load->view('includes/header' , $dataHeader);
            	 
            	 
            	$this->load->view('planMaestro/ConsultarPlanMaestroHistoria',$data);
            	 
            	$this->load->view('includes/footer');
            }
            
            
            public function HistoriaBaja($id) {
            
            	 
            
            	$data['Portafolio']=$this->Maestro->Portafolio();
            	$data['Producto']=$this->Maestro->Producto();
            	$data['Periodo']=$this->Maestro->Periodo();
            	$data['Responsable']=$this->Maestro->Responsable();
            	$data['DiasLaborales']=$this->Maestro->DiasLaborales();
            	$data['Parametros']=$this->Maestro->Parametros();
            
            	//$data['PlanMaestro']=$this->Maestro->PlanMaestro($id);
            	$data['PlanDetalleHistoria']=$this->Maestro->PlanDetalleHistoriaBaja($id);
            
            
            	//print_r($data['PlanDetalleHistoria']);
            
            	$dataHeader = array(
            			"titulo" => "Plan Maestro"
            	);
            	$this->load->view('includes/header' , $dataHeader);
            
            
            	$this->load->view('planMaestro/ConsultarPlanMaestroHistoria',$data);
            
            	$this->load->view('includes/footer');
            }
            
    
            public function AddCatalogo(){
            
            	
            
            	$valor = $this->input->post('CatValor');
            	$id_cat = $this->input->post('clabe');
            	$parametro = $this->input->post('CatParametro');
            	$agrupacion = $this->input->post('CatAgrupa');
            		
            	$resultado = array();
            		
            	if ($this->Maestro->guardaritem($valor,$id_cat,$parametro,$agrupacion))
            	{
            		$resultado = array(
            				"codigo" => 200,
            				"unique" => true,
            				"mensaje" => "Guardado correctamente."
            		);
            	}
            	else
            	{
            			
            			
            		$resultado = array(
            				"codigo" => 400,
            				"unique" => false,
            				"mensaje" => "No se logro guardar la informaci�n."
            		);
            			
            	}
            		
            	echo json_encode($resultado);
            
            
            
            }
            
            public function AddProducto(){
            
            	 
            
            	$valor = $this->input->post('CatValor');
            	$id_cat = $this->input->post('cliente');
            	
            	$agrupacion = $this->input->post('CatAgrupa');
            	
            
            	$resultado = array();
            
            	if ($this->Maestro->guardarProducto($valor,$id_cat,$agrupacion))
            	{
            		$resultado = array(
            				"codigo" => 200,
            				"unique" => true,
            				"mensaje" => "Guardado correctamente."
            		);
            	}
            	else
            	{
            		 
            		 
            		$resultado = array(
            				"codigo" => 400,
            				"unique" => false,
            				"mensaje" => "No se logro guardar la informaci�n."
            		);
            		 
            	}
            
            	echo json_encode($resultado);
            
            
            
            }
            
            
            public function AddDias(){
            
            
            
            	$valor = $this->input->post('CatValor');
            	$mes = $this->input->post('mes');
            	 
            
            	
            	       
            	
            	$resultado = array();
            
            	if ($this->Maestro->guardarDias($valor,$mes))
            	{
            		$resultado = array(
            				"codigo" => 200,
            				"unique" => true,
            				"mensaje" => "Guardado correctamente."
            		);
            	}
            	else
            	{
            		 
            		 
            		$resultado = array(
            				"codigo" => 400,
            				"unique" => false,
            				"mensaje" => "No se logro guardar la informaci�n."
            		);
            		 
            	}
            
            	echo json_encode($resultado);
            
            
            
            }
            
            public function AddFActura(){
            
            	 
            
            	$cliente = $this->input->post('cliente');
            	$producto = $this->input->post('Addproducto');
            	$datepickerFecha = $this->input->post('datepickerFecha');
            	$CatParametro = $this->input->post('CatParametro');
            	
            	
            	
            
            	$resultado = array();
            
            	if ($this->Maestro->guardarFactura($cliente,$producto,$datepickerFecha,$CatParametro))
            	{
            		$resultado = array(
            				"codigo" => 200,
            				"unique" => true,
            				"mensaje" => "Guardado correctamente."
            		);
            	}
            	else
            	{
            		 
            		 
            		$resultado = array(
            				"codigo" => 400,
            				"unique" => false,
            				"mensaje" => "No se logro guardar la informaci�n."
            		);
            		 
            	}
            
            	echo json_encode($resultado);
            
            
            
            }
            
            
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */