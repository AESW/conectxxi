<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Maestro extends CI_Model {

var $variables;


public function AnalistaBussiness() {
	parent::__construct();
}

function metodoSet( $variables ){
	$this->variables = $variables;
	return $this;
}

	
	public function AddPlan($portafolio,$periodo,$responsable,$datepickerFecha,$AccionesRealizar ){
	
		
				
	
			$data = array(
					"portafolio" => $portafolio,
					"periodo" => $periodo,
					"responsable" => $responsable,
					"fecha" => $datepickerFecha,
					"AccionesRealizar" => $AccionesRealizar);
			
			
			$res=$this->db->insert('plan_maestro', $data);
			
			$lastID = $this->db->insert_id();
			//$lastID = DB::insertId();
			
			if($res) {
			
			return $lastID;
	
		}else{
			DB::rollback();
			return false;
		}
	
	
	
	
	
	}
	
		
		
		public function EditPlan($id,$portafolio,$periodo,$responsable,$datepickerFecha,$AccionesRealizar  ){
		
		
		
		
				$data= array(
							"portafolio" => $portafolio,
							"periodo" => $periodo,
							"responsable" => $responsable,
							"Fecha" => $datepickerFecha,
							"AccionesRealizar" => $AccionesRealizar);
				
				
				 
						
						
						$this->db->where('id', $id);
				$res =		$this->db->update('plan_maestro', $data);
				
		
					if ($res)
					{
						return true;
					}
					else
					{
						return false;
					}
		}
		
		public function Planes(){
			
			
			$select = "SELECT plan_maestro.id,cat_detalle.valor as portafolio,periodo,responsable,Fecha FROM plan_maestro
					left outer join cat_detalle
					on plan_maestro.portafolio=cat_detalle.id order by Fecha desc ";
			 
			
			$selectSQL = $this->db->query( $select );
			
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
			
			return $result;
			else:
			return false;
			endif;
			
			
			
			
			
		}
		
		
		public function Portafolio(){
			
			
			$select = "SELECT * FROM cat_detalle where id_catalogo=1";
			
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
			
			
			
		}
		
		public function Producto(){
		
			
			$select = "SELECT * FROM cat_detalle where id_catalogo=2";
				
			
			$selectSQL = $this->db->query( $select );
			
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
			
			return $result;
			else:
			return false;
			endif;
			
			
		}
		
		public function Periodo(){
			
			
			$select = "SELECT * FROM cat_detalle where id_catalogo=3";
			
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
			
		}
		
		public function Responsable(){
		
			
			$select = "SELECT * FROM cat_detalle where id_catalogo=4";
				
			
			$selectSQL = $this->db->query( $select );
			
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
			
			return $result;
			else:
			return false;
			endif;
			
			
		}
		
		
		public function DiasLaborales(){
			
			
			$mes=date("m");
			
			
			$select = "SELECT * FROM cat_detalle where id_catalogo=5 and valor='$mes'";
			
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
			
			
			
		}
		
		public function PlanMaestro($id){
		
			
			$select = "SELECT plan_maestro.id,portafolio,cat_detalle.valor as portdesc,periodo,responsable,fecha,AccionesRealizar FROM plan_maestro
					left outer join cat_detalle
					on plan_maestro.portafolio=cat_detalle.id where plan_maestro.id=$id";
				
			
			$selectSQL = $this->db->query( $select );
			
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
			
			return $result;
			else:
			return false;
			endif;
			
			
		}
	
	
		public function Gerencia(){
			
			
			$select = "SELECT * FROM cat_detalle where id_catalogo=6";
				
			
			$selectSQL = $this->db->query( $select );
			
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
			
			return $result;
			else:
			return false;
			endif;
			
			
			
		}
		
		public function Supervisor(){
			
			
			$select = "SELECT * FROM cat_detalle where id_catalogo=7";
			
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
			
			
		}
		
		public function Turno(){
	
			
			

			$select = "SELECT * FROM cat_detalle where id_catalogo=8";
				
			
			$selectSQL = $this->db->query( $select );
			
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
			
			return $result;
			else:
			return false;
			endif;
			
			
		}
		
		
		function Combo_producto($id)
		{
		
				
				$select = "SELECT * FROM cat_detalle where parametro='$id'";
					
				
				$selectSQL = $this->db->query( $select );
				
				if( $selectSQL ):
				$result = $selectSQL->result();//Obtener registro de la consulta
				
				return $result;
				else:
				return false;
				endif;
				
				
			
		
		}
		
		public function PlanDetalle($id){
			
			
			$select = "SELECT * FROM plan_detalle where id_plan=$id";
			
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
			
			
		}
		
		
		public function ControlTurno($id){
		
			
			$select = "SELECT * FROM control_turno where id_plan=$id";
			
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
			
		}
		
		public function AddTurno($res){
		
		
		
		
			$data = array(
					"id_plan" => $res,
					"gestiones_p1"=> 0,
					"gestiones_p2"=> 0,
					"gestiones_p3"=> 0,
					"gestiones_p4"=> 0,
					"gestiones_ptot"=> 0,
					"gestiones_r1"=> 0,
					"gestiones_r2"=> 0,
					"gestiones_r3"=> 0,
					"gestiones_r4"=> 0,
					"gestiones_rtot"=> 0,
					"gest_cum1"=> 0,
					"gest_cum2"=> 0,
					"gest_cum3"=> 0,
					"gest_cum4"=> 0,
					"gest_tot"=> 0,
					"minutos_p1"=> 0,
					"minutos_p2"=> 0,
					"minutos_p3"=> 0,
					"minutos_p4"=> 0,
					"minutos_ptot"=> 0,
					"minutos_r1"=> 0,
					"minutos_r2"=> 0,
					"minutos_r3"=> 0,
					"minutos_r4"=> 0,
					"minutos_rtot"=> 0,
					"min_cum1"=> 0,
					"min_cum2"=> 0,
					"min_cum3"=> 0,
					"min_cum4"=> 0,
					"min_tot"=> 0,
					"promesa_p1"=> 0,
					"promesa_p2"=> 0,
					"promesa_p3"=> 0,
					"promesa_p4"=> 0,
					"promesa_ptot"=> 0,
					"promesa_r1"=> 0,
					"promesa_r2"=> 0,
					"promesa_r3"=> 0,
					"promesa_r4"=> 0,
					"promesa_rtot"=> 0,
					"promesa_cum1"=> 0,
					"promesa_cum2"=> 0,
					"promesa_cum3"=> 0,
					"promesa_cum4"=> 0,
					"promesa_tot"=> 0,
					"gestores_p1"=> 0,
					"gestores_p2"=> 0,
					"gestores_p3"=> 0,
					"gestores_p4"=> 0,
					"gestores_ptot"=> 0,
					"gestores_r1"=> 0,
					"gestores_r2"=> 0,
					"gestores_r3"=> 0,
					"gestores_r4"=> 0,
					"gestores_rtot"=> 0,
					"gestores_cum1"=> 0,
					"gestores_cum2"=> 0,
					"gestores_cum3"=> 0,
					"gestores_cum4"=> 0,
					"gestores_tot"=> 0,
					"horas_p1"=> 0,
					"horas_p2"=> 0,
					"horas_p3"=> 0,
					"horas_p4"=> 0,
					"horas_ptot"=> 0,
					"horas_r1"=> 0,
					"horas_r2"=> 0,
					"horas_r3"=> 0,
					"horas_r4"=> 0,
					"horas_rtot"=> 0,
					"horas_cum1"=> 0,
					"horas_cum2"=> 0,
					"horas_cum3"=> 0,
					"horas_cum4"=> 0,
					"horas_tot"=> 0);
			
			
			
			$res=$this->db->insert('control_turno', $data);
				
			
				
			if($res) {
					
				return true;
		
			}else{
				DB::rollback();
				return false;
			}
		
		
		
		
		
		}
		
		public function AddMensual($res){
		
		
		
		
			$data= array(
					"id_plan" => $res,
					"gestiones_p1"=> 0,
					"gestiones_p2"=> 0,
					"gestiones_p3"=> 0,
					"gestiones_p4"=> 0,
					"gestiones_p5"=> 0,
					"gestiones_ptot"=> 0,
					"gestiones_r1"=> 0,
					"gestiones_r2"=> 0,
					"gestiones_r3"=> 0,
					"gestiones_r4"=> 0,
					"gestiones_r5"=> 0,
					"gestiones_rtot"=> 0,
					"gest_cum1"=> 0,
					"gest_cum2"=> 0,
					"gest_cum3"=> 0,
					"gest_cum4"=> 0,
					"gest_cum5"=> 0,
					"gest_tot"=> 0,
					"recuperacion_p1"=> 0,
					"recuperacion_p2"=> 0,
					"recuperacion_p3"=> 0,
					"recuperacion_p4"=> 0,
					"recuperacion_p5"=> 0,
					"recuperacion_ptot"=> 0,
					"recuperacion_r1"=> 0,
					"recuperacion_r2"=> 0,
					"recuperacion_r3"=> 0,
					"recuperacion_r4"=> 0,
					"recuperacion_r5"=> 0,
					"recuperacion_rtot"=> 0,
					"recuperacion_cum1"=> 0,
					"recuperacion_cum2"=> 0,
					"recuperacion_cum3"=> 0,
					"recuperacion_cum4"=> 0,
					"recuperacion_cum5"=> 0,
					"recuperacion_tot"=> 0,
					"minutos_p1"=> 0,
					"minutos_p2"=> 0,
					"minutos_p3"=> 0,
					"minutos_p4"=> 0,
					"minutos_p5"=> 0,
					"minutos_ptot"=> 0,
					"minutos_r1"=> 0,
					"minutos_r2"=> 0,
					"minutos_r3"=> 0,
					"minutos_r4"=> 0,
					"minutos_r5"=> 0,
					"minutos_rtot"=> 0,
					"min_cum1"=> 0,
					"min_cum2"=> 0,
					"min_cum3"=> 0,
					"min_cum4"=> 0,
					"min_cum5"=> 0,
					"min_tot"=> 0,
					"costoaire_p1"=> 0,
					"costoaire_p2"=> 0,
					"costoaire_p3"=> 0,
					"costoaire_p4"=> 0,
					"costoaire_p5"=> 0,
					"costoaire_ptot"=> 0,
					"costoaire_r1"=> 0,
					"costoaire_r2"=> 0,
					"costoaire_r3"=> 0,
					"costoaire_r4"=> 0,
					"costoaire_r5"=> 0,
					"costoaire_rtot"=> 0,
					"costoaire_cum1"=> 0,
					"costoaire_cum2"=> 0,
					"costoaire_cum3"=> 0,
					"costoaire_cum4"=> 0,
					"costoaire_cum5"=> 0,
					"costoaire_tot"=> 0,
					"carteo_p1"=> 0,
					"carteo_p2"=> 0,
					"carteo_p3"=> 0,
					"carteo_p4"=> 0,
					"carteo_p5"=> 0,
					"carteo_ptot"=> 0,
					"carteo_r1"=> 0,
					"carteo_r2"=> 0,
					"carteo_r3"=> 0,
					"carteo_r4"=> 0,
					"carteo_r5"=> 0,
					"carteo_rtot"=> 0,
					"carteo_cum1"=> 0,
					"carteo_cum2"=> 0,
					"carteo_cum3"=> 0,
					"carteo_cum4"=> 0,
					"carteo_cum5"=> 0,
					"carteo_tot"=> 0,
					"costocarteo_p1"=> 0,
					"costocarteo_p2"=> 0,
					"costocarteo_p3"=> 0,
					"costocarteo_p4"=> 0,
					"costocarteo_p5"=> 0,
					"costocarteo_ptot"=> 0,
					"costocarteo_r1"=> 0,
					"costocarteo_r2"=> 0,
					"costocarteo_r3"=> 0,
					"costocarteo_r4"=> 0,
					"costocarteo_r5"=> 0,
					"costocarteo_rtot"=> 0,
					"costocarteo_cum1"=> 0,
					"costocarteo_cum2"=> 0,
					"costocarteo_cum3"=> 0,
					"costocarteo_cum4"=> 0,
					"costocarteo_cum5"=> 0,
					"costocarteo_tot"=> 0,
					"cobranza_p1"=> 0,
					"cobranza_p2"=> 0,
					"cobranza_p3"=> 0,
					"cobranza_p4"=> 0,
					"cobranza_p5"=> 0,
					"cobranza_ptot"=> 0,
					"cobranza_r1"=> 0,
					"cobranza_r2"=> 0,
					"cobranza_r3"=> 0,
					"cobranza_r4"=> 0,
					"cobranza_r5"=> 0,
					"cobranza_rtot"=> 0,
					"cobranza_cum1"=> 0,
					"cobranza_cum2"=> 0,
					"cobranza_cum3"=> 0,
					"cobranza_cum4"=> 0,
					"cobranza_cum5"=> 0,
					"cobranza_tot"=> 0,
					"costocofi_p1"=> 0,
					"costocofi_p2"=> 0,
					"costocofi_p3"=> 0,
					"costocofi_p4"=> 0,
					"costocofi_p5"=> 0,
					"costocofi_ptot"=> 0,
					"costocofi_r1"=> 0,
					"costocofi_r2"=> 0,
					"costocofi_r3"=> 0,
					"costocofi_r4"=> 0,
					"costocofi_r5"=> 0,
					"costocofi_rtot"=> 0,
					"costocofi_cum1"=> 0,
					"costocofi_cum2"=> 0,
					"costocofi_cum3"=> 0,
					"costocofi_cum4"=> 0,
					"costocofi_cum5"=> 0,
					"costocofi_tot"=> 0,
					"gestores_p1"=> 0,
					"gestores_p2"=> 0,
					"gestores_p3"=> 0,
					"gestores_p4"=> 0,
					"gestores_p5"=> 0,
					"gestores_ptot"=> 0,
					"gestores_r1"=> 0,
					"gestores_r2"=> 0,
					"gestores_r3"=> 0,
					"gestores_r4"=> 0,
					"gestores_r5"=> 0,
					"gestores_rtot"=> 0,
					"gestores_cum1"=> 0,
					"gestores_cum2"=> 0,
					"gestores_cum3"=> 0,
					"gestores_cum4"=> 0,
					"gestores_cum5"=> 0,
					"gestores_tot"=> 0,
					"costogestores_p1"=> 0,
					"costogestores_p2"=> 0,
					"costogestores_p3"=> 0,
					"costogestores_p4"=> 0,
					"costogestores_p5"=> 0,
					"costogestores_ptot"=> 0,
					"costogestores_r1"=> 0,
					"costogestores_r2"=> 0,
					"costogestores_r3"=> 0,
					"costogestores_r4"=> 0,
					"costogestores_r5"=> 0,
					"costogestores_rtot"=> 0,
					"costogestores_cum1"=> 0,
					"costogestores_cum2"=> 0,
					"costogestores_cum3"=> 0,
					"costogestores_cum4"=> 0,
					"costogestores_cum5"=> 0,
					"costogestores_tot"=> 0,
					"totalcosto_p1"=> 0,
					"totalcosto_p2"=> 0,
					"totalcosto_p3"=> 0,
					"totalcosto_p4"=> 0,
					"totalcosto_p5"=> 0,
					"totalcosto_ptot"=> 0,
					"totalcosto_r1"=> 0,
					"totalcosto_r2"=> 0,
					"totalcosto_r3"=> 0,
					"totalcosto_r4"=> 0,
					"totalcosto_r5"=> 0,
					"totalcosto_rtot"=> 0,
					"totalcosto_cum1"=> 0,
					"totalcosto_cum2"=> 0,
					"totalcosto_cum3"=> 0,
					"totalcosto_cum4"=> 0,
					"totalcosto_cum5"=> 0,
					"totalcosto_tot"=> 0);
		
			
			
			$res=$this->db->insert('control_mensual', $data); 
				
		
			if($res) {
					
				return true;
		
			}else{
				DB::rollback();
				return false;
			}
		
		
		
		
		
		}
		
		
		public function ControlMensual($id){
		
			
			
			$select = "SELECT * FROM control_mensual where id_plan=$id";
			
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
			
			
		}
		
		
		public function Catalogos(){
				
				
			
			
			
			$select = "SELECT * FROM catalogos";
			
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
			
		}
		
		
		public function CatalogosDetalle($id){
		
		
			$select = "SELECT cat_detalle.*,catalogos.catalogo FROM cat_detalle inner join catalogos on cat_detalle.id_catalogo=catalogos.id   where id_catalogo=$id";
				
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
		
			return $result;
			else:
			return false;
			endif;
				
		}
		
		public function CatFac($id){
		
		
			$select = "SELECT * from catalogos  where id=$id";
		
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
		
			return $result;
			else:
			return false;
			endif;
		
		}
		
		public function Clientes(){
		
		
			$select = "SELECT * from cat_detalle   where id_catalogo=1";
		
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
		
			return $result;
			else:
			return false;
			endif;
		
		}
		
		
		public function Productos(){
		
		
			$select = "SELECT cat_detalle.id,a.valor as cliente, cat_detalle.valor as producto,cat_detalle.agrupacion FROM `cat_detalle` left outer join cat_detalle a on cat_detalle.parametro=a.id  WHERE cat_detalle.id_catalogo=0";
		
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
		
			return $result;
			else:
			return false;
			endif;
		
		}
		
		
		
		public function guardaritem($valor,$id_cat,$parametro,$agrupacion){
		
		
			$select = "insert into cat_detalle (id_catalogo,valor,parametro,agrupacion) values($id_cat,'$valor','$parametro','$agrupacion')";
		
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			//$result = $selectSQL->result();//Obtener registro de la consulta
		
			return true;
			else:
			return false;
			endif;
		
		}
		
		public function guardarDias($valor,$mes){
		
		
			$select = "update  cat_detalle set parametro='$valor' where valor='$mes'";
		
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			//$result = $selectSQL->result();//Obtener registro de la consulta
		
			return true;
			else:
			return false;
			endif;
		
		}
		
		
		public function guardarProducto($valor,$id_cat,$agrupacion){
		
		
			$select = "insert into cat_detalle (id_catalogo,valor,parametro,agrupacion) values(0,'$valor','$id_cat','$agrupacion')";
		
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			//$result = $selectSQL->result();//Obtener registro de la consulta
		
			return true;
			else:
			return false;
			endif;
		
		}
		
		
		public function Facturacion(){
		
		
			$select = "SELECT * FROM FACTURACION";
		
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
		
			return $result;
			else:
			return false;
			endif;
		
		}
		
		public function DiarioOperaciones($id){
		
			
			$select = "SELECT * FROM diario_operaciones where id_plan=$id";
				
			
			$selectSQL = $this->db->query( $select );
			
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
			
			return $result;
			else:
			return false;
			endif;
			
			
			
		}
		
		
		public function DiarioProcesos($id){
	
			
			$select = "SELECT * FROM diario_procesos where id_plan=$id";
			
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
			
			
			
		}
		
		public function DiarioNomina($id){
			
			
			$select = "SELECT * FROM diario_nomina where id_plan=$id";
				
			
			$selectSQL = $this->db->query( $select );
			
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
			
			return $result;
			else:
			return false;
			endif;
			
			
		}
		
		
		
		public function AddOperaciones($res){
		
		
		
		
			$data= array(
					"id_plan" => $res);
		
		
		$res=	$this->db->insert('diario_operaciones', $data);
			
		
		
			if($res) {
					
				return true;
		
			}else{
				DB::rollback();
				return false;
			}
		
		
		
		
		
		}
		
		public function AddProcesos($res){
		
		
		
		
		$data = array(
					"id_plan" => $res);
		
		
		$res=$this->db->insert('diario_procesos', $data);
		
		
	
		
		
			if($res) {
					
				return true;
		
			}else{
				DB::rollback();
				return false;
			}
		
		
		
		
		
		}
		
		public function AddNomina($res){
		
		
		
		
			$data=  array(
					"id_plan" => $res);
		
	
			
					$res = 	$this->db->insert('diario_nomina', $data);
		
			if($res) {
					
				return true;
		
			}else{
				DB::rollback();
				return false;
			}
		
		
		
		
		
		}
		
		
		
		
		public function UpdateControlTurno($id_plan,
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
$Problema5){
		
		
		
		
			$data= array(
					
					"gerencia"=> $gerencia,
					"supervisor"=> $supervisor,
					"turno"=> $turno,
					"fecha"=> $fecha,
					"gestiones_p1"=> $gestiones_p1,
					"gestiones_p2"=> $gestiones_p2,
					"gestiones_p3"=> $gestiones_p3,
					"gestiones_p4"=> $gestiones_p4,
					"gestiones_ptot"=> $gestiones_ptot,
					"gestiones_r1"=> $gestiones_r1,
					"gestiones_r2"=> $gestiones_r2,
					"gestiones_r3"=> $gestiones_r3,
					"gestiones_r4"=> $gestiones_r4,
					"gestiones_rtot"=> $gestiones_rtot,
					"gest_cum1"=> $gest_cum1,
					"gest_cum2"=> $gest_cum2,
					"gest_cum3"=> $gest_cum3,
					"gest_cum4"=> $gest_cum4,
					"gest_tot"=> $gest_tot,
					"minutos_p1"=> $minutos_p1,
					"minutos_p2"=> $minutos_p2,
					"minutos_p3"=> $minutos_p3,
					"minutos_p4"=> $minutos_p4,
					"minutos_ptot"=> $minutos_ptot,
					"minutos_r1"=> $minutos_r1,
					"minutos_r2"=> $minutos_r2,
					"minutos_r3"=> $minutos_r3,
					"minutos_r4"=> $minutos_r4,
					"minutos_rtot"=> $minutos_rtot,
					"min_cum1"=> $min_cum1,
					"min_cum2"=> $min_cum2,
					"min_cum3"=> $min_cum3,
					"min_cum4"=> $min_cum4,
					"min_tot"=> $min_tot,
					"promesa_p1"=> $promesa_p1,
					"promesa_p2"=> $promesa_p2,
					"promesa_p3"=> $promesa_p3,
					"promesa_p4"=> $promesa_p4,
					"promesa_ptot"=> $promesa_ptot,
					"promesa_r1"=> $promesa_r1,
					"promesa_r2"=> $promesa_r2,
					"promesa_r3"=> $promesa_r3,
					"promesa_r4"=> $promesa_r4,
					"promesa_rtot"=> $promesa_rtot,
					"promesa_cum1"=> $promesa_cum1,
					"promesa_cum2"=> $promesa_cum2,
					"promesa_cum3"=> $promesa_cum3,
					"promesa_cum4"=> $promesa_cum4,
					"promesa_tot"=> $promesa_tot,
					"gestores_p1"=> $gestores_p1,
					"gestores_p2"=> $gestores_p2,
					"gestores_p3"=> $gestores_p3,
					"gestores_p4"=> $gestores_p4,
					"gestores_ptot"=> $gestores_ptot,
					"gestores_r1"=> $gestores_r1,
					"gestores_r2"=> $gestores_r2,
					"gestores_r3"=> $gestores_r3,
					"gestores_r4"=> $gestores_r4,
					"gestores_rtot"=> $gestores_rtot,
					"gestores_cum1"=> $gestores_cum1,
					"gestores_cum2"=> $gestores_cum2,
					"gestores_cum3"=> $gestores_cum3,
					"gestores_cum4"=> $gestores_cum4,
					"gestores_tot"=> $gestores_tot,
					"horas_p1"=> $horas_p1,
					"horas_p2"=> $horas_p2,
					"horas_p3"=> $horas_p3,
					"horas_p4"=> $horas_p4,
					"horas_ptot"=> $horas_ptot,
					"horas_r1"=> $horas_r1,
					"horas_r2"=> $horas_r2,
					"horas_r3"=> $horas_r3,
					"horas_r4"=> $horas_r4,
					"horas_rtot"=> $horas_rtot,
					"horas_cum1"=> $horas_cum1,
					"horas_cum2"=> $horas_cum2,
					"horas_cum3"=> $horas_cum3,
					"horas_cum4"=> $horas_cum4,
					"horas_tot"=> $horas_tot,
					"Problema1"=> $Problema1,
					"Problema2"=> $Problema2,
					"Problema3"=> $Problema3,
					"Problema4"=> $Problema4,
					"Problema5"=> $Problema5 );
			
			
			$this->db->where('id_plan', $id_plan);
			$res= $this->db->update('control_turno', $data);
			
			
			
		
			if ($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		
		
		public function UpdateMensual($id_plan,
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
$totalcosto_tot){
		
		
		
		
			$data = array(
						
					"fecha"=> $fecha,
					"gestiones_p1"=> $gestiones_p1,
					"gestiones_p2"=> $gestiones_p2,
					"gestiones_p3"=> $gestiones_p3,
					"gestiones_p4"=> $gestiones_p4,
					"gestiones_p5"=> $gestiones_p5,
					"gestiones_ptot"=> $gestiones_ptot,
					"gestiones_r1"=> $gestiones_r1,
					"gestiones_r2"=> $gestiones_r2,
					"gestiones_r3"=> $gestiones_r3,
					"gestiones_r4"=> $gestiones_r4,
					"gestiones_r5"=> $gestiones_r5,
					"gestiones_rtot"=> $gestiones_rtot,
					"gest_cum1"=> $gest_cum1,
					"gest_cum2"=> $gest_cum2,
					"gest_cum3"=> $gest_cum3,
					"gest_cum4"=> $gest_cum4,
					"gest_cum5"=> $gest_cum5,
					"gest_tot"=> $gest_tot,
					"recuperacion_p1"=> $recuperacion_p1,
					"recuperacion_p2"=> $recuperacion_p2,
					"recuperacion_p3"=> $recuperacion_p3,
					"recuperacion_p4"=> $recuperacion_p4,
					"recuperacion_p5"=> $recuperacion_p5,
					"recuperacion_ptot"=> $recuperacion_ptot,
					"recuperacion_r1"=> $recuperacion_r1,
					"recuperacion_r2"=> $recuperacion_r2,
					"recuperacion_r3"=> $recuperacion_r3,
					"recuperacion_r4"=> $recuperacion_r4,
					"recuperacion_r5"=> $recuperacion_r5,
					"recuperacion_rtot"=> $recuperacion_rtot,
					"recuperacion_cum1"=> $recuperacion_cum1,
					"recuperacion_cum2"=> $recuperacion_cum2,
					"recuperacion_cum3"=> $recuperacion_cum3,
					"recuperacion_cum4"=> $recuperacion_cum4,
					"recuperacion_cum5"=> $recuperacion_cum5,
					"recuperacion_tot"=> $recuperacion_tot,
					"minutos_p1"=> $minutos_p1,
					"minutos_p2"=> $minutos_p2,
					"minutos_p3"=> $minutos_p3,
					"minutos_p4"=> $minutos_p4,
					"minutos_p5"=> $minutos_p5,
					"minutos_ptot"=> $minutos_ptot,
					"minutos_r1"=> $minutos_r1,
					"minutos_r2"=> $minutos_r2,
					"minutos_r3"=> $minutos_r3,
					"minutos_r4"=> $minutos_r4,
					"minutos_r5"=> $minutos_r5,
					"minutos_rtot"=> $minutos_rtot,
					"min_cum1"=> $min_cum1,
					"min_cum2"=> $min_cum2,
					"min_cum3"=> $min_cum3,
					"min_cum4"=> $min_cum4,
					"min_cum5"=> $min_cum5,
					"min_tot"=> $min_tot,
					"costoaire_p1"=> $costoaire_p1,
					"costoaire_p2"=> $costoaire_p2,
					"costoaire_p3"=> $costoaire_p3,
					"costoaire_p4"=> $costoaire_p4,
					"costoaire_p5"=> $costoaire_p5,
					"costoaire_ptot"=> $costoaire_ptot,
					"costoaire_r1"=> $costoaire_r1,
					"costoaire_r2"=> $costoaire_r2,
					"costoaire_r3"=> $costoaire_r3,
					"costoaire_r4"=> $costoaire_r4,
					"costoaire_r5"=> $costoaire_r5,
					"costoaire_rtot"=> $costoaire_rtot,
					"costoaire_cum1"=> $costoaire_cum1,
					"costoaire_cum2"=> $costoaire_cum2,
					"costoaire_cum3"=> $costoaire_cum3,
					"costoaire_cum4"=> $costoaire_cum4,
					"costoaire_cum5"=> $costoaire_cum5,
					"costoaire_tot"=> $costoaire_tot,
					"carteo_p1"=> $carteo_p1,
					"carteo_p2"=> $carteo_p2,
					"carteo_p3"=> $carteo_p3,
					"carteo_p4"=> $carteo_p4,
					"carteo_p5"=> $carteo_p5,
					"carteo_ptot"=> $carteo_ptot,
					"carteo_r1"=> $carteo_r1,
					"carteo_r2"=> $carteo_r2,
					"carteo_r3"=> $carteo_r3,
					"carteo_r4"=> $carteo_r4,
					"carteo_r5"=> $carteo_r5,
					"carteo_rtot"=> $carteo_rtot,
					"carteo_cum1"=> $carteo_cum1,
					"carteo_cum2"=> $carteo_cum2,
					"carteo_cum3"=> $carteo_cum3,
					"carteo_cum4"=> $carteo_cum4,
					"carteo_cum5"=> $carteo_cum5,
					"carteo_tot"=> $carteo_tot,
					"costocarteo_p1"=> $costocarteo_p1,
					"costocarteo_p2"=> $costocarteo_p2,
					"costocarteo_p3"=> $costocarteo_p3,
					"costocarteo_p4"=> $costocarteo_p4,
					"costocarteo_p5"=> $costocarteo_p5,
					"costocarteo_ptot"=> $costocarteo_ptot,
					"costocarteo_r1"=> $costocarteo_r1,
					"costocarteo_r2"=> $costocarteo_r2,
					"costocarteo_r3"=> $costocarteo_r3,
					"costocarteo_r4"=> $costocarteo_r4,
					"costocarteo_r5"=> $costocarteo_r5,
					"costocarteo_rtot"=> $costocarteo_rtot,
					"costocarteo_cum1"=> $costocarteo_cum1,
					"costocarteo_cum2"=> $costocarteo_cum2,
					"costocarteo_cum3"=> $costocarteo_cum3,
					"costocarteo_cum4"=> $costocarteo_cum4,
					"costocarteo_cum5"=> $costocarteo_cum5,
					"costocarteo_tot"=> $costocarteo_tot,
					"cobranza_p1"=> $cobranza_p1,
					"cobranza_p2"=> $cobranza_p2,
					"cobranza_p3"=> $cobranza_p3,
					"cobranza_p4"=> $cobranza_p4,
					"cobranza_p5"=> $cobranza_p5,
					"cobranza_ptot"=> $cobranza_ptot,
					"cobranza_r1"=> $cobranza_r1,
					"cobranza_r2"=> $cobranza_r2,
					"cobranza_r3"=> $cobranza_r3,
					"cobranza_r4"=> $cobranza_r4,
					"cobranza_r5"=> $cobranza_r5,
					"cobranza_rtot"=> $cobranza_rtot,
					"cobranza_cum1"=> $cobranza_cum1,
					"cobranza_cum2"=> $cobranza_cum2,
					"cobranza_cum3"=> $cobranza_cum3,
					"cobranza_cum4"=> $cobranza_cum4,
					"cobranza_cum5"=> $cobranza_cum5,
					"cobranza_tot"=> $cobranza_tot,
					"costocofi_p1"=> $costocofi_p1,
					"costocofi_p2"=> $costocofi_p2,
					"costocofi_p3"=> $costocofi_p3,
					"costocofi_p4"=> $costocofi_p4,
					"costocofi_p5"=> $costocofi_p5,
					"costocofi_ptot"=> $costocofi_ptot,
					"costocofi_r1"=> $costocofi_r1,
					"costocofi_r2"=> $costocofi_r2,
					"costocofi_r3"=> $costocofi_r3,
					"costocofi_r4"=> $costocofi_r4,
					"costocofi_r5"=> $costocofi_r5,
					"costocofi_rtot"=> $costocofi_rtot,
					"costocofi_cum1"=> $costocofi_cum1,
					"costocofi_cum2"=> $costocofi_cum2,
					"costocofi_cum3"=> $costocofi_cum3,
					"costocofi_cum4"=> $costocofi_cum4,
					"costocofi_cum5"=> $costocofi_cum5,
					"costocofi_tot"=> $costocofi_tot,
					"gestores_p1"=> $gestores_p1,
					"gestores_p2"=> $gestores_p2,
					"gestores_p3"=> $gestores_p3,
					"gestores_p4"=> $gestores_p4,
					"gestores_p5"=> $gestores_p5,
					"gestores_ptot"=> $gestores_ptot,
					"gestores_r1"=> $gestores_r1,
					"gestores_r2"=> $gestores_r2,
					"gestores_r3"=> $gestores_r3,
					"gestores_r4"=> $gestores_r4,
					"gestores_r5"=> $gestores_r5,
					"gestores_rtot"=> $gestores_rtot,
					"gestores_cum1"=> $gestores_cum1,
					"gestores_cum2"=> $gestores_cum2,
					"gestores_cum3"=> $gestores_cum3,
					"gestores_cum4"=> $gestores_cum4,
					"gestores_cum5"=> $gestores_cum5,
					"gestores_tot"=> $gestores_tot,
					"costogestores_p1"=> $costogestores_p1,
					"costogestores_p2"=> $costogestores_p2,
					"costogestores_p3"=> $costogestores_p3,
					"costogestores_p4"=> $costogestores_p4,
					"costogestores_p5"=> $costogestores_p5,
					"costogestores_ptot"=> $costogestores_ptot,
					"costogestores_r1"=> $costogestores_r1,
					"costogestores_r2"=> $costogestores_r2,
					"costogestores_r3"=> $costogestores_r3,
					"costogestores_r4"=> $costogestores_r4,
					"costogestores_r5"=> $costogestores_r5,
					"costogestores_rtot"=> $costogestores_rtot,
					"costogestores_cum1"=> $costogestores_cum1,
					"costogestores_cum2"=> $costogestores_cum2,
					"costogestores_cum3"=> $costogestores_cum3,
					"costogestores_cum4"=> $costogestores_cum4,
					"costogestores_cum5"=> $costogestores_cum5,
					"costogestores_tot"=> $costogestores_tot,
					"totalcosto_p1"=> $totalcosto_p1,
					"totalcosto_p2"=> $totalcosto_p2,
					"totalcosto_p3"=> $totalcosto_p3,
					"totalcosto_p4"=> $totalcosto_p4,
					"totalcosto_p5"=> $totalcosto_p5,
					"totalcosto_ptot"=> $totalcosto_ptot,
					"totalcosto_r1"=> $totalcosto_r1,
					"totalcosto_r2"=> $totalcosto_r2,
					"totalcosto_r3"=> $totalcosto_r3,
					"totalcosto_r4"=> $totalcosto_r4,
					"totalcosto_r5"=> $totalcosto_r5,
					"totalcosto_rtot"=> $totalcosto_rtot,
					"totalcosto_cum1"=> $totalcosto_cum1,
					"totalcosto_cum2"=> $totalcosto_cum2,
					"totalcosto_cum3"=> $totalcosto_cum3,
					"totalcosto_cum4"=> $totalcosto_cum4,
					"totalcosto_cum5"=> $totalcosto_cum5,
					"totalcosto_tot"=> $totalcosto_tot);
			
			
			
			$this->db->where('id_plan', $id_plan);
			$res=$this->db->update('control_mensual', $data);
			
		
			if ($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		
		
		public function UpdateOperaciones($id_plan,
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
$recuperacion_prom){
		
		
		
		
			$data=  array(
		
					'fecha'=> $fecha,
					'gestiones_p1'=> $gestiones_p1,
					'gestiones_p2'=> $gestiones_p2,
					'gestiones_p3'=> $gestiones_p3,
					'gestiones_p4'=> $gestiones_p4,
					'gestiones_p5'=> $gestiones_p5,
					'gestiones_p6'=> $gestiones_p6,
					'gestiones_p7'=> $gestiones_p7,
					'gestiones_ptot'=> $gestiones_ptot,
					'gestiones_pprom'=> $gestiones_pprom,
					'gestiones_r1'=> $gestiones_r1,
					'gestiones_r2'=> $gestiones_r2,
					'gestiones_r3'=> $gestiones_r3,
					'gestiones_r4'=> $gestiones_r4,
					'gestiones_r5'=> $gestiones_r5,
					'gestiones_r6'=> $gestiones_r6,
					'gestiones_r7'=> $gestiones_r7,
					'gestiones_rtot'=> $gestiones_rtot,
					'gestiones_rprom'=> $gestiones_rprom,
					'gest_cum1'=> $gest_cum1,
					'gest_cum2'=> $gest_cum2,
					'gest_cum3'=> $gest_cum3,
					'gest_cum4'=> $gest_cum4,
					'gest_cum5'=> $gest_cum5,
					'gest_cum6'=> $gest_cum6,
					'gest_cum7'=> $gest_cum7,
					'gest_tot'=> $gest_tot,
					'gest_prom'=> $gest_prom,
					'gestionesHora_p1'=> $gestionesHora_p1,
					'gestionesHora_p2'=> $gestionesHora_p2,
					'gestionesHora_p3'=> $gestionesHora_p3,
					'gestionesHora_p4'=> $gestionesHora_p4,
					'gestionesHora_p5'=> $gestionesHora_p5,
					'gestionesHora_p6'=> $gestionesHora_p6,
					'gestionesHora_p7'=> $gestionesHora_p7,
					'gestionesHora_ptot'=> $gestionesHora_ptot,
					'gestionesHora_pprom'=> $gestionesHora_pprom,
					'gestionesHora_r1'=> $gestionesHora_r1,
					'gestionesHora_r2'=> $gestionesHora_r2,
					'gestionesHora_r3'=> $gestionesHora_r3,
					'gestionesHora_r4'=> $gestionesHora_r4,
					'gestionesHora_r5'=> $gestionesHora_r5,
					'gestionesHora_r6'=> $gestionesHora_r6,
					'gestionesHora_r7'=> $gestionesHora_r7,
					'gestionesHora_rtot'=> $gestionesHora_rtot,
					'gestionesHora_rprom'=> $gestionesHora_rprom,
					'gestionesHora_cum1'=> $gestionesHora_cum1,
					'gestionesHora_cum2'=> $gestionesHora_cum2,
					'gestionesHora_cum3'=> $gestionesHora_cum3,
					'gestionesHora_cum4'=> $gestionesHora_cum4,
					'gestionesHora_cum5'=> $gestionesHora_cum5,
					'gestionesHora_cum6'=> $gestionesHora_cum6,
					'gestionesHora_cum7'=> $gestionesHora_cum7,
					'gestionesHora_tot'=> $gestionesHora_tot,
					'gestionesHora_prom'=> $gestionesHora_prom,
					'gphg_p1'=> $gphg_p1,
					'gphg_p2'=> $gphg_p2,
					'gphg_p3'=> $gphg_p3,
					'gphg_p4'=> $gphg_p4,
					'gphg_p5'=> $gphg_p5,
					'gphg_p6'=> $gphg_p6,
					'gphg_p7'=> $gphg_p7,
					'gphg_ptot'=> $gphg_ptot,
					'gphg_pprom'=> $gphg_pprom,
					'gphg_r1'=> $gphg_r1,
					'gphg_r2'=> $gphg_r2,
					'gphg_r3'=> $gphg_r3,
					'gphg_r4'=> $gphg_r4,
					'gphg_r5'=> $gphg_r5,
					'gphg_r6'=> $gphg_r6,
					'gphg_r7'=> $gphg_r7,
					'gphg_rtot'=> $gphg_rtot,
					'gphg_rprom'=> $gphg_rprom,
					'gphg_cum1'=> $gphg_cum1,
					'gphg_cum2'=> $gphg_cum2,
					'gphg_cum3'=> $gphg_cum3,
					'gphg_cum4'=> $gphg_cum4,
					'gphg_cum5'=> $gphg_cum5,
					'gphg_cum6'=> $gphg_cum6,
					'gphg_cum7'=> $gphg_cum7,
					'gphg_tot'=> $gphg_tot,
					'gphg_prom'=> $gphg_prom,
					'promeReali_p1'=> $promeReali_p1,
					'promeReali_p2'=> $promeReali_p2,
					'promeReali_p3'=> $promeReali_p3,
					'promeReali_p4'=> $promeReali_p4,
					'promeReali_p5'=> $promeReali_p5,
					'promeReali_p6'=> $promeReali_p6,
					'promeReali_p7'=> $promeReali_p7,
					'promeReali_ptot'=> $promeReali_ptot,
					'promeReali_pprom'=> $promeReali_pprom,
					'promeReali_r1'=> $promeReali_r1,
					'promeReali_r2'=> $promeReali_r2,
					'promeReali_r3'=> $promeReali_r3,
					'promeReali_r4'=> $promeReali_r4,
					'promeReali_r5'=> $promeReali_r5,
					'promeReali_r6'=> $promeReali_r6,
					'promeReali_r7'=> $promeReali_r7,
					'promeReali_rtot'=> $promeReali_rtot,
					'promeReali_rprom'=> $promeReali_rprom,
					'promeReali_cum1'=> $promeReali_cum1,
					'promeReali_cum2'=> $promeReali_cum2,
					'promeReali_cum3'=> $promeReali_cum3,
					'promeReali_cum4'=> $promeReali_cum4,
					'promeReali_cum5'=> $promeReali_cum5,
					'promeReali_cum6'=> $promeReali_cum6,
					'promeReali_cum7'=> $promeReali_cum7,
					'promeReali_tot'=> $promeReali_tot,
					'promeReali_prom'=> $promeReali_prom,
					'promeCum_p1'=> $promeCum_p1,
					'promeCum_p2'=> $promeCum_p2,
					'promeCum_p3'=> $promeCum_p3,
					'promeCum_p4'=> $promeCum_p4,
					'promeCum_p5'=> $promeCum_p5,
					'promeCum_p6'=> $promeCum_p6,
					'promeCum_p7'=> $promeCum_p7,
					'promeCum_ptot'=> $promeCum_ptot,
					'promeCum_pprom'=> $promeCum_pprom,
					'promeCum_r1'=> $promeCum_r1,
					'promeCum_r2'=> $promeCum_r2,
					'promeCum_r3'=> $promeCum_r3,
					'promeCum_r4'=> $promeCum_r4,
					'promeCum_r5'=> $promeCum_r5,
					'promeCum_r6'=> $promeCum_r6,
					'promeCum_r7'=> $promeCum_r7,
					'promeCum_rtot'=> $promeCum_rtot,
					'promeCum_rprom'=> $promeCum_rprom,
					'promeCum_cum1'=> $promeCum_cum1,
					'promeCum_cum2'=> $promeCum_cum2,
					'promeCum_cum3'=> $promeCum_cum3,
					'promeCum_cum4'=> $promeCum_cum4,
					'promeCum_cum5'=> $promeCum_cum5,
					'promeCum_cum6'=> $promeCum_cum6,
					'promeCum_cum7'=> $promeCum_cum7,
					'promeCum_tot'=> $promeCum_tot,
					'promeCum_prom'=> $promeCum_prom,
					'recuperacion_p1'=> $recuperacion_p1,
					'recuperacion_p2'=> $recuperacion_p2,
					'recuperacion_p3'=> $recuperacion_p3,
					'recuperacion_p4'=> $recuperacion_p4,
					'recuperacion_p5'=> $recuperacion_p5,
					'recuperacion_p6'=> $recuperacion_p6,
					'recuperacion_p7'=> $recuperacion_p7,
					'recuperacion_ptot'=> $recuperacion_ptot,
					'recuperacion_pprom'=> $recuperacion_pprom,
					'recuperacion_r1'=> $recuperacion_r1,
					'recuperacion_r2'=> $recuperacion_r2,
					'recuperacion_r3'=> $recuperacion_r3,
					'recuperacion_r4'=> $recuperacion_r4,
					'recuperacion_r5'=> $recuperacion_r5,
					'recuperacion_r6'=> $recuperacion_r6,
					'recuperacion_r7'=> $recuperacion_r7,
					'recuperacion_rtot'=> $recuperacion_rtot,
					'recuperacion_rprom'=> $recuperacion_rprom,
					'recuperacion_cum1'=> $recuperacion_cum1,
					'recuperacion_cum2'=> $recuperacion_cum2,
					'recuperacion_cum3'=> $recuperacion_cum3,
					'recuperacion_cum4'=> $recuperacion_cum4,
					'recuperacion_cum5'=> $recuperacion_cum5,
					'recuperacion_cum6'=> $recuperacion_cum6,
					'recuperacion_cum7'=> $recuperacion_cum7,
					'recuperacion_tot'=> $recuperacion_tot,
					'recuperacion_prom'=> $recuperacion_prom);
			
			
			$this->db->where('id_plan', $id_plan);
		$res =	$this->db->update('diario_operaciones', $data);
			
		
		
			if ($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		
		public function UpdateProcesos($id_plan,
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
$contactabili_pprom){
		
		
		
		
			$data = array(
		
					'minutos_p1'=> $minutos_p1,
					'minutos_p2'=> $minutos_p2,
					'minutos_p3'=> $minutos_p3,
					'minutos_p4'=> $minutos_p4,
					'minutos_p5'=> $minutos_p5,
					'minutos_p6'=> $minutos_p6,
					'minutos_p7'=> $minutos_p7,
					'minutos_ptot'=> $minutos_ptot,
					'minutos_pprom'=> $minutos_pprom,
					'minutos_r1'=> $minutos_r1,
					'minutos_r2'=> $minutos_r2,
					'minutos_r3'=> $minutos_r3,
					'minutos_r4'=> $minutos_r4,
					'minutos_r5'=> $minutos_r5,
					'minutos_r6'=> $minutos_r6,
					'minutos_r7'=> $minutos_r7,
					'minutos_rtot'=> $minutos_rtot,
					'minutos_rprom'=> $minutos_rprom,
					'minutos_cum1'=> $minutos_cum1,
					'minutos_cum2'=> $minutos_cum2,
					'minutos_cum3'=> $minutos_cum3,
					'minutos_cum4'=> $minutos_cum4,
					'minutos_cum5'=> $minutos_cum5,
					'minutos_cum6'=> $minutos_cum6,
					'minutos_cum7'=> $minutos_cum7,
					'minutos_tot'=> $minutos_tot,
					'minutos_prom'=> $minutos_prom,
					'tAire_p1'=> $tAire_p1,
					'tAire_p2'=> $tAire_p2,
					'tAire_p3'=> $tAire_p3,
					'tAire_p4'=> $tAire_p4,
					'tAire_p5'=> $tAire_p5,
					'tAire_p6'=> $tAire_p6,
					'tAire_p7'=> $tAire_p7,
					'tAire_ptot'=> $tAire_ptot,
					'tAire_pprom'=> $tAire_pprom,
					'tAire_r1'=> $tAire_r1,
					'tAire_r2'=> $tAire_r2,
					'tAire_r3'=> $tAire_r3,
					'tAire_r4'=> $tAire_r4,
					'tAire_r5'=> $tAire_r5,
					'tAire_r6'=> $tAire_r6,
					'tAire_r7'=> $tAire_r7,
					'tAire_rtot'=> $tAire_rtot,
					'tAire_rprom'=> $tAire_rprom,
					'tAire_cum1'=> $tAire_cum1,
					'tAire_cum2'=> $tAire_cum2,
					'tAire_cum3'=> $tAire_cum3,
					'tAire_cum4'=> $tAire_cum4,
					'tAire_cum5'=> $tAire_cum5,
					'tAire_cum6'=> $tAire_cum6,
					'tAire_cum7'=> $tAire_cum7,
					'tAire_tot'=> $tAire_tot,
					'tAire_prom'=> $tAire_prom,
					'costoTel_p1'=> $costoTel_p1,
					'costoTel_p2'=> $costoTel_p2,
					'costoTel_p3'=> $costoTel_p3,
					'costoTel_p4'=> $costoTel_p4,
					'costoTel_p5'=> $costoTel_p5,
					'costoTel_p6'=> $costoTel_p6,
					'costoTel_p7'=> $costoTel_p7,
					'costoTel_ptot'=> $costoTel_ptot,
					'costoTel_pprom'=> $costoTel_pprom,
					'costoTel_r1'=> $costoTel_r1,
					'costoTel_r2'=> $costoTel_r2,
					'costoTel_r3'=> $costoTel_r3,
					'costoTel_r4'=> $costoTel_r4,
					'costoTel_r5'=> $costoTel_r5,
					'costoTel_r6'=> $costoTel_r6,
					'costoTel_r7'=> $costoTel_r7,
					'costoTel_rtot'=> $costoTel_rtot,
					'costoTel_rprom'=> $costoTel_rprom,
					'costoTel_cum1'=> $costoTel_cum1,
					'costoTel_cum2'=> $costoTel_cum2,
					'costoTel_cum3'=> $costoTel_cum3,
					'costoTel_cum4'=> $costoTel_cum4,
					'costoTel_cum5'=> $costoTel_cum5,
					'costoTel_cum6'=> $costoTel_cum6,
					'costoTel_cum7'=> $costoTel_cum7,
					'costoTel_tot'=> $costoTel_tot,
					'costoTel_prom'=> $costoTel_prom,
					'carteo_p1'=> $carteo_p1,
					'carteo_p2'=> $carteo_p2,
					'carteo_p3'=> $carteo_p3,
					'carteo_p4'=> $carteo_p4,
					'carteo_p5'=> $carteo_p5,
					'carteo_p6'=> $carteo_p6,
					'carteo_p7'=> $carteo_p7,
					'carteo_ptot'=> $carteo_ptot,
					'carteo_pprom'=> $carteo_pprom,
					'carteo_r1'=> $carteo_r1,
					'carteo_r2'=> $carteo_r2,
					'carteo_r3'=> $carteo_r3,
					'carteo_r4'=> $carteo_r4,
					'carteo_r5'=> $carteo_r5,
					'carteo_r6'=> $carteo_r6,
					'carteo_r7'=> $carteo_r7,
					'carteo_rtot'=> $carteo_rtot,
					'carteo_rprom'=> $carteo_rprom,
					'carteo_cum1'=> $carteo_cum1,
					'carteo_cum2'=> $carteo_cum2,
					'carteo_cum3'=> $carteo_cum3,
					'carteo_cum4'=> $carteo_cum4,
					'carteo_cum5'=> $carteo_cum5,
					'carteo_cum6'=> $carteo_cum6,
					'carteo_cum7'=> $carteo_cum7,
					'carteo_tot'=> $carteo_tot,
					'carteo_prom'=> $carteo_prom,
					'carteoCos_p1'=> $carteoCos_p1,
					'carteoCos_p2'=> $carteoCos_p2,
					'carteoCos_p3'=> $carteoCos_p3,
					'carteoCos_p4'=> $carteoCos_p4,
					'carteoCos_p5'=> $carteoCos_p5,
					'carteoCos_p6'=> $carteoCos_p6,
					'carteoCos_p7'=> $carteoCos_p7,
					'carteoCos_ptot'=> $carteoCos_ptot,
					'carteoCos_pprom'=> $carteoCos_pprom,
					'carteoCos_r1'=> $carteoCos_r1,
					'carteoCos_r2'=> $carteoCos_r2,
					'carteoCos_r3'=> $carteoCos_r3,
					'carteoCos_r4'=> $carteoCos_r4,
					'carteoCos_r5'=> $carteoCos_r5,
					'carteoCos_r6'=> $carteoCos_r6,
					'carteoCos_r7'=> $carteoCos_r7,
					'carteoCos_rtot'=> $carteoCos_rtot,
					'carteoCos_rprom'=> $carteoCos_rprom,
					'carteoCos_cum1'=> $carteoCos_cum1,
					'carteoCos_cum2'=> $carteoCos_cum2,
					'carteoCos_cum3'=> $carteoCos_cum3,
					'carteoCos_cum4'=> $carteoCos_cum4,
					'carteoCos_cum5'=> $carteoCos_cum5,
					'carteoCos_cum6'=> $carteoCos_cum6,
					'carteoCos_cum7'=> $carteoCos_cum7,
					'carteoCos_tot'=> $carteoCos_tot,
					'carteoCos_prom'=> $carteoCos_prom,
					'visitas_p1'=> $visitas_p1,
					'visitas_p2'=> $visitas_p2,
					'visitas_p3'=> $visitas_p3,
					'visitas_p4'=> $visitas_p4,
					'visitas_p5'=> $visitas_p5,
					'visitas_p6'=> $visitas_p6,
					'visitas_p7'=> $visitas_p7,
					'visitas_ptot'=> $visitas_ptot,
					'visitas_pprom'=> $visitas_pprom,
					'visitas_r1'=> $visitas_r1,
					'visitas_r2'=> $visitas_r2,
					'visitas_r3'=> $visitas_r3,
					'visitas_r4'=> $visitas_r4,
					'visitas_r5'=> $visitas_r5,
					'visitas_r6'=> $visitas_r6,
					'visitas_r7'=> $visitas_r7,
					'visitas_rtot'=> $visitas_rtot,
					'visitas_rprom'=> $visitas_rprom,
					'visitas_cum1'=> $visitas_cum1,
					'visitas_cum2'=> $visitas_cum2,
					'visitas_cum3'=> $visitas_cum3,
					'visitas_cum4'=> $visitas_cum4,
					'visitas_cum5'=> $visitas_cum5,
					'visitas_cum6'=> $visitas_cum6,
					'visitas_cum7'=> $visitas_cum7,
					'visitas_tot'=> $visitas_tot,
					'visitas_prom'=> $visitas_prom,
					'visitasCos_p1'=> $visitasCos_p1,
					'visitasCos_p2'=> $visitasCos_p2,
					'visitasCos_p3'=> $visitasCos_p3,
					'visitasCos_p4'=> $visitasCos_p4,
					'visitasCos_p5'=> $visitasCos_p5,
					'visitasCos_p6'=> $visitasCos_p6,
					'visitasCos_p7'=> $visitasCos_p7,
					'visitasCos_ptot'=> $visitasCos_ptot,
					'visitasCos_pprom'=> $visitasCos_pprom,
					'visitasCos_r1'=> $visitasCos_r1,
					'visitasCos_r2'=> $visitasCos_r2,
					'visitasCos_r3'=> $visitasCos_r3,
					'visitasCos_r4'=> $visitasCos_r4,
					'visitasCos_r5'=> $visitasCos_r5,
					'visitasCos_r6'=> $visitasCos_r6,
					'visitasCos_r7'=> $visitasCos_r7,
					'visitasCos_rtot'=> $visitasCos_rtot,
					'visitasCos_rprom'=> $visitasCos_rprom,
					'visitasCos_cum1'=> $visitasCos_cum1,
					'visitasCos_cum2'=> $visitasCos_cum2,
					'visitasCos_cum3'=> $visitasCos_cum3,
					'visitasCos_cum4'=> $visitasCos_cum4,
					'visitasCos_cum5'=> $visitasCos_cum5,
					'visitasCos_cum6'=> $visitasCos_cum6,
					'visitasCos_cum7'=> $visitasCos_cum7,
					'visitasCos_tot'=> $visitasCos_tot,
					'visitasCos_prom'=> $visitasCos_prom,
					'conPositivo_p1'=> $conPositivo_p1,
					'conPositivo_p2'=> $conPositivo_p2,
					'conPositivo_p3'=> $conPositivo_p3,
					'conPositivo_p4'=> $conPositivo_p4,
					'conPositivo_p5'=> $conPositivo_p5,
					'conPositivo_p6'=> $conPositivo_p6,
					'conPositivo_p7'=> $conPositivo_p7,
					'conPositivo_ptot'=> $conPositivo_ptot,
					'conPositivo_pprom'=> $conPositivo_pprom,
					'conPositivo_r1'=> $conPositivo_r1,
					'conPositivo_r2'=> $conPositivo_r2,
					'conPositivo_r3'=> $conPositivo_r3,
					'conPositivo_r4'=> $conPositivo_r4,
					'conPositivo_r5'=> $conPositivo_r5,
					'conPositivo_r6'=> $conPositivo_r6,
					'conPositivo_r7'=> $conPositivo_r7,
					'conPositivo_rtot'=> $conPositivo_rtot,
					'conPositivo_rprom'=> $conPositivo_rprom,
					'conPositivo_cum1'=> $conPositivo_cum1,
					'conPositivo_cum2'=> $conPositivo_cum2,
					'conPositivo_cum3'=> $conPositivo_cum3,
					'conPositivo_cum4'=> $conPositivo_cum4,
					'conPositivo_cum5'=> $conPositivo_cum5,
					'conPositivo_cum6'=> $conPositivo_cum6,
					'conPositivo_cum7'=> $conPositivo_cum7,
					'conPositivo_tot'=> $conPositivo_tot,
					'conPositivo_prom'=> $conPositivo_prom,
					'conNegativo_p1'=> $conNegativo_p1,
					'conNegativo_p2'=> $conNegativo_p2,
					'conNegativo_p3'=> $conNegativo_p3,
					'conNegativo_p4'=> $conNegativo_p4,
					'conNegativo_p5'=> $conNegativo_p5,
					'conNegativo_p6'=> $conNegativo_p6,
					'conNegativo_p7'=> $conNegativo_p7,
					'conNegativo_ptot'=> $conNegativo_ptot,
					'conNegativo_pprom'=> $conNegativo_pprom,
					'conNegativo_r1'=> $conNegativo_r1,
					'conNegativo_r2'=> $conNegativo_r2,
					'conNegativo_r3'=> $conNegativo_r3,
					'conNegativo_r4'=> $conNegativo_r4,
					'conNegativo_r5'=> $conNegativo_r5,
					'conNegativo_r6'=> $conNegativo_r6,
					'conNegativo_r7'=> $conNegativo_r7,
					'conNegativo_rtot'=> $conNegativo_rtot,
					'conNegativo_rprom'=> $conNegativo_rprom,
					'conNegativo_cum1'=> $conNegativo_cum1,
					'conNegativo_cum2'=> $conNegativo_cum2,
					'conNegativo_cum3'=> $conNegativo_cum3,
					'conNegativo_cum4'=> $conNegativo_cum4,
					'conNegativo_cum5'=> $conNegativo_cum5,
					'conNegativo_cum6'=> $conNegativo_cum6,
					'conNegativo_cum7'=> $conNegativo_cum7,
					'conNegativo_tot'=> $conNegativo_tot,
					'conNegativo_prom'=> $conNegativo_prom,
					'datos_p1'=> $datos_p1,
					'datos_p2'=> $datos_p2,
					'datos_p3'=> $datos_p3,
					'datos_p4'=> $datos_p4,
					'datos_p5'=> $datos_p5,
					'datos_p6'=> $datos_p6,
					'datos_p7'=> $datos_p7,
					'datos_ptot'=> $datos_ptot,
					'datos_pprom'=> $datos_pprom,
					'datos_r1'=> $datos_r1,
					'datos_r2'=> $datos_r2,
					'datos_r3'=> $datos_r3,
					'datos_r4'=> $datos_r4,
					'datos_r5'=> $datos_r5,
					'datos_r6'=> $datos_r6,
					'datos_r7'=> $datos_r7,
					'datos_rtot'=> $datos_rtot,
					'datos_rprom'=> $datos_rprom,
					'datos_cum1'=> $datos_cum1,
					'datos_cum2'=> $datos_cum2,
					'datos_cum3'=> $datos_cum3,
					'datos_cum4'=> $datos_cum4,
					'datos_cum5'=> $datos_cum5,
					'datos_cum6'=> $datos_cum6,
					'datos_cum7'=> $datos_cum7,
					'datos_tot'=> $datos_tot,
					'datos_prom'=> $datos_prom,
					'contactabili_p1'=> $contactabili_p1,
					'contactabili_p2'=> $contactabili_p2,
					'contactabili_p3'=> $contactabili_p3,
					'contactabili_p4'=> $contactabili_p4,
					'contactabili_p5'=> $contactabili_p5,
					'contactabili_p6'=> $contactabili_p6,
					'contactabili_p7'=> $contactabili_p7,
					'contactabili_ptot'=> $contactabili_ptot,
					'contactabili_pprom'=> $contactabili_pprom);
			
			
			
			
			
			$this->db->where('id_plan', $id_plan);
		$res = 	$this->db->update('diario_procesos', $data);
		
			if ($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		
		public function UpdateNomina($id_plan,
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
$equipos_pprom){
		
		
		
		
			$data = array(
		
					'perGestores_p1'=> $perGestores_p1,
					'perGestores_p2'=> $perGestores_p2,
					'perGestores_p3'=> $perGestores_p3,
					'perGestores_p4'=> $perGestores_p4,
					'perGestores_p5'=> $perGestores_p5,
					'perGestores_p6'=> $perGestores_p6,
					'perGestores_p7'=> $perGestores_p7,
					'perGestores_ptot'=> $perGestores_ptot,
					'perGestores_pprom'=> $perGestores_pprom,
					'perGestores_r1'=> $perGestores_r1,
					'perGestores_r2'=> $perGestores_r2,
					'perGestores_r3'=> $perGestores_r3,
					'perGestores_r4'=> $perGestores_r4,
					'perGestores_r5'=> $perGestores_r5,
					'perGestores_r6'=> $perGestores_r6,
					'perGestores_r7'=> $perGestores_r7,
					'perGestores_rtot'=> $perGestores_rtot,
					'perGestores_rprom'=> $perGestores_rprom,
					'perGestores_cum1'=> $perGestores_cum1,
					'perGestores_cum2'=> $perGestores_cum2,
					'perGestores_cum3'=> $perGestores_cum3,
					'perGestores_cum4'=> $perGestores_cum4,
					'perGestores_cum5'=> $perGestores_cum5,
					'perGestores_cum6'=> $perGestores_cum6,
					'perGestores_cum7'=> $perGestores_cum7,
					'perGestores_tot'=> $perGestores_tot,
					'perGestores_prom'=> $perGestores_prom,
					'horasGest_p1'=> $horasGest_p1,
					'horasGest_p2'=> $horasGest_p2,
					'horasGest_p3'=> $horasGest_p3,
					'horasGest_p4'=> $horasGest_p4,
					'horasGest_p5'=> $horasGest_p5,
					'horasGest_p6'=> $horasGest_p6,
					'horasGest_p7'=> $horasGest_p7,
					'horasGest_ptot'=> $horasGest_ptot,
					'horasGest_pprom'=> $horasGest_pprom,
					'horasGest_r1'=> $horasGest_r1,
					'horasGest_r2'=> $horasGest_r2,
					'horasGest_r3'=> $horasGest_r3,
					'horasGest_r4'=> $horasGest_r4,
					'horasGest_r5'=> $horasGest_r5,
					'horasGest_r6'=> $horasGest_r6,
					'horasGest_r7'=> $horasGest_r7,
					'horasGest_rtot'=> $horasGest_rtot,
					'horasGest_rprom'=> $horasGest_rprom,
					'horasGest_cum1'=> $horasGest_cum1,
					'horasGest_cum2'=> $horasGest_cum2,
					'horasGest_cum3'=> $horasGest_cum3,
					'horasGest_cum4'=> $horasGest_cum4,
					'horasGest_cum5'=> $horasGest_cum5,
					'horasGest_cum6'=> $horasGest_cum6,
					'horasGest_cum7'=> $horasGest_cum7,
					'horasGest_tot'=> $horasGest_tot,
					'horasGest_prom'=> $horasGest_prom,
					'pagoNom_p1'=> $pagoNom_p1,
					'pagoNom_p2'=> $pagoNom_p2,
					'pagoNom_p3'=> $pagoNom_p3,
					'pagoNom_p4'=> $pagoNom_p4,
					'pagoNom_p5'=> $pagoNom_p5,
					'pagoNom_p6'=> $pagoNom_p6,
					'pagoNom_p7'=> $pagoNom_p7,
					'pagoNom_ptot'=> $pagoNom_ptot,
					'pagoNom_pprom'=> $pagoNom_pprom,
					'pagoNom_r1'=> $pagoNom_r1,
					'pagoNom_r2'=> $pagoNom_r2,
					'pagoNom_r3'=> $pagoNom_r3,
					'pagoNom_r4'=> $pagoNom_r4,
					'pagoNom_r5'=> $pagoNom_r5,
					'pagoNom_r6'=> $pagoNom_r6,
					'pagoNom_r7'=> $pagoNom_r7,
					'pagoNom_rtot'=> $pagoNom_rtot,
					'pagoNom_rprom'=> $pagoNom_rprom,
					'pagoNom_cum1'=> $pagoNom_cum1,
					'pagoNom_cum2'=> $pagoNom_cum2,
					'pagoNom_cum3'=> $pagoNom_cum3,
					'pagoNom_cum4'=> $pagoNom_cum4,
					'pagoNom_cum5'=> $pagoNom_cum5,
					'pagoNom_cum6'=> $pagoNom_cum6,
					'pagoNom_cum7'=> $pagoNom_cum7,
					'pagoNom_tot'=> $pagoNom_tot,
					'pagoNom_prom'=> $pagoNom_prom,
					'ausent_p1'=> $ausent_p1,
					'ausent_p2'=> $ausent_p2,
					'ausent_p3'=> $ausent_p3,
					'ausent_p4'=> $ausent_p4,
					'ausent_p5'=> $ausent_p5,
					'ausent_p6'=> $ausent_p6,
					'ausent_p7'=> $ausent_p7,
					'ausent_ptot'=> $ausent_ptot,
					'ausent_pprom'=> $ausent_pprom,
					'equipos_p1'=> $equipos_p1,
					'equipos_p2'=> $equipos_p2,
					'equipos_p3'=> $equipos_p3,
					'equipos_p4'=> $equipos_p4,
					'equipos_p5'=> $equipos_p5,
					'equipos_p6'=> $equipos_p6,
					'equipos_p7'=> $equipos_p7,
					'equipos_ptot'=> $equipos_ptot,
					'equipos_pprom'=> $equipos_pprom);
			
			$this->db->where('id_plan', $id_plan);
			$res = $this->db->update('diario_nomina', $data);
			
		
			if ($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function Parametros(){
		
				
			$select = "SELECT * FROM cat_detalle where id_catalogo=9";
		
				
			$selectSQL = $this->db->query( $select );
				
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
				
			return $result;
			else:
			return false;
			endif;
				
				
		}
		
		
		public function PlanDetalleHistoria($id){
				
				
			
			$select = "SELECT  mes,sum(recuperacion) as recupera FROM pm_aeropuerto WHERE agr_cliente='$id' group by mes  order by recupera desc limit 1";
				
			$selectSQL = $this->db->query( $select );
			
			
			foreach ($selectSQL->result() as $fila)
			{
				$fecha = $fila->mes;
					
					
				
					
					
			}
			
			
			$select = "SELECT agr_cliente,agr_producto,sum(cuentas) as cuentas ,sum(saldo) as saldo,sum(gestores) as gestores,sum(gestiones) as gestiones,sum(tiempo_llamada) as tiempo_llamada,sum(visitas) as visitas,sum(carteo) as carteo,sum(sms) as sms,sum(robot_fijo) as robot_fijo,sum(robot_movil) as robot_movil,IF(ISNULL(facturacion.importe),0,facturacion.importe) as importe,cat_detalle.id as idportafolio FROM `pm_aeropuerto` left outer join facturacion on pm_aeropuerto.agr_cliente=facturacion.cliente and pm_aeropuerto.agr_producto=facturacion.producto and pm_aeropuerto.mes=facturacion.fecha left outer join cat_detalle on pm_aeropuerto.agr_cliente=cat_detalle.valor and cat_detalle.id_catalogo = 1 WHERE agr_cliente='$id' and mes='$fecha' group by agr_producto";
				
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
		
			return $result;
			else:
			return false;
			endif;
				
				
		}
		
		
		public function PlanDetalleHistoriaBaja($id){
		
		
				
			$select = "SELECT  mes,min(recuperacion) as recupera FROM pm_aeropuerto WHERE agr_cliente='$id' group by mes  order by recupera  limit 1";
		
			$selectSQL = $this->db->query( $select );
				
				
			foreach ($selectSQL->result() as $fila)
			{
				$fecha = $fila->mes;
					
					
		
					
					
			}
				
				
			$select = "SELECT agr_cliente,agr_producto,sum(cuentas) as cuentas ,sum(saldo) as saldo,sum(gestores) as gestores,sum(gestiones) as gestiones,sum(tiempo_llamada) as tiempo_llamada,sum(visitas) as visitas,sum(carteo) as carteo,sum(sms) as sms,sum(robot_fijo) as robot_fijo,sum(robot_movil) as robot_movil,IF(ISNULL(facturacion.importe),0,facturacion.importe) as importe,cat_detalle.id as idportafolio FROM `pm_aeropuerto` left outer join facturacion on pm_aeropuerto.agr_cliente=facturacion.cliente and pm_aeropuerto.agr_producto=facturacion.producto and pm_aeropuerto.mes=facturacion.fecha left outer join cat_detalle on pm_aeropuerto.agr_cliente=cat_detalle.valor and cat_detalle.id_catalogo = 1 WHERE agr_cliente='$id' and mes='$fecha' group by agr_producto";
		
		
			$selectSQL = $this->db->query( $select );
		
			if( $selectSQL ):
			$result = $selectSQL->result();//Obtener registro de la consulta
		
			return $result;
			else:
			return false;
			endif;
		
		
		}
		
		
		public function guardarFactura($cliente,$producto,$datepickerFecha,$CatParametro){
		
		
		
		
			$data = array(
					"cliente" => $cliente,
					"producto" => $producto,
					"importe" => $CatParametro,
					"fecha" => $datepickerFecha);
		
		
			$res=$this->db->insert('facturacion', $data);
		
		
		
		
		
			if($res) {
					
				return true;
		
			}else{
				DB::rollback();
				return false;
			}
		
		
		
		
		
		}
		
}

?>
