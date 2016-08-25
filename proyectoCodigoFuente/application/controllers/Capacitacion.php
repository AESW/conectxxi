<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Capacitacion extends CI_Controller {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        /*Necesario para validaciones de formulario, sanitizar variables $_POST y $_GET*/
        $this->load->helper('email');
        $this->load->library('form_validation');
        $this->Sanitize = new Sanitize();
        $this->load->model('CapacitacionModel');
		        /*Mandar llamar modelos que requieran de actividades de BD*/
		        $this->load->model('User');
        $this->SessionL->validarSesion();
    }
    
	public function index()
	{
		$dataHeader = array(
			"titulo" => "Capacitaci&oacute;n"
		);
		
			
		$usuariosActivos = $this->CapacitacionModel->obtenerUsuariosActivos();
		$obtenerCursos = $this->CapacitacionModel->obtenerCursos();
		
		
		$dataContent = array(
				"usuariosActivos" => $usuariosActivos,
				"obtenerCursos" => $obtenerCursos
		);
		
		
		
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/index' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	public function programarCurso()
	{
		$dataHeader = array(
			"titulo" => "Capacitaci&oacute;n"
		);
		
		$Cursos = $this->CapacitacionModel->Cursos();
		
		
		$dataContent = array(
				"Cursos" => $Cursos
		);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/programarCurso' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
        public function programacionCursos($id)
	{
		$dataHeader = array(
			"titulo" => "Capacitaci&oacute;n"
		);
		
		
		$Curso = $this->CapacitacionModel->Curso($id);
		$FechaCurso = $this->CapacitacionModel->FechaCurso($id);
		$Duracion = $this->CapacitacionModel->Duracion($id);
		$Lugar = $this->CapacitacionModel->Lugar($id);
		$facilitador = $this->CapacitacionModel->facilitador();
		
		$dataContent = array(
				"Curso" => $Curso,
				"FechaCurso" => $FechaCurso,
				"Lugar" => $Lugar,
				"Duracion" => $Duracion,
				"facilitador" => $facilitador
		);
		
		
		
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/programacionCursos' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
        public function cursosPorEvaluar($id)
	{
		$dataHeader = array(
			"titulo" => "Evaluacion de cursos"
		);
		
			
		$Curso = $this->CapacitacionModel->Curso($id);
		$obtenerGrupo=$this->CapacitacionModel->obtenerGrupo($id);
		
		$dataContent = array(
				"Curso" => $Curso,
				"obtenerGrupo" => $obtenerGrupo
			
		);
		
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/cursosPorEvaluar' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
        
  	
         public function evaluarCursos()
	{
		$dataHeader = array(
			"titulo" => "Evaluacion de cursos"
		);
		
			
		$idUsuario = $this->input->get ( 'Personal' );
		$idCurso = $this->input->get ( 'Curso' );
		
		
		
		$usuarios = $this->CapacitacionModel->Usuario($idUsuario);
		$Curso = $this->CapacitacionModel->Curso($idCurso);
		$temas = $this->CapacitacionModel->temas($idCurso);
		
		
		
		$dataContent = array(
		
				"usuarios" => $usuarios,
				"Curso" => $Curso,
				"temas" => $temas,
				"idUsuario" => $idUsuario,
				"idCurso" => $idCurso
		);
		
		
		//print_r($dataContent);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/evaluarCursos' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	

	function GuardaGrupo() {
	
	
	
	
		$idCurso=$this->input->post('idCurso');
		$idFecha=$this->input->post('FechaCurso');
		$idCapacitador=$this->input->post('Capacitador');
		$idLugar=$this->input->post('Lugar');
		$idduracion=$this->input->post('Duracion');
		$Grupo=$this->input->post('nombreGrupo');
	
		
	
			$sqlGrupo = "Insert into CatalogoGrupos (NombreGrupo,CatalogoCursos_idCursos,CatalogoFechas_idFechas,CatalogoDuracion_idDuracion,CatalogoUbicaciones_idUbicacion,Usuarios_idUsuarios) values ('$Grupo',$idCurso,$idFecha,$idduracion,$idLugar,$idCapacitador)" ;
	
				
	
			$queryGrupo = $this->db->query($sqlGrupo);
			
	if ($queryGrupo)
	{
		$resultado = array (
					"codigo" => 200,
					"exito" => true,
					"mensaje" => "Grupo guardado correctamente." 
			);
	}
		else {
			$resultado = array (
					"codigo" => 400,
					"exito" => false,
					"mensaje" => "Error, vuelva a intentarlo." 
			);
		}
		
		ob_clean ();
		echo json_encode ( $resultado );
		exit ();
	}

	public function AsignarCurso()
	{
		$dataHeader = array(
				"titulo" => "Asignar Curso"
		);
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$sessionUser = $this->session->userdata('logged_in');
	
		$isReclutamiento = 0;
		$accionesReclutamiento = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
		foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
		if( $permisos["prefijoModulos"] == "capacitacion"):
		$isReclutamiento = 1;
		$accionesReclutamiento[] = $permisos["accionPermisos"];
		endif;
		endforeach;
		else:
		redirect("panel");
		endif;
			
		if( $isReclutamiento == 0 ):
		redirect("panel");
		endif;
			
	
		
	//    $usuariosActivos = $this->CapacitacionModel->obtenerUsuariosActivos();
		$obtenerCursos = $this->CapacitacionModel->obtenerCursos();
		
		
		$dataContent = array(
				
				"obtenerCursos" => $obtenerCursos
		);
		
		
	
	
	//	print_r($dataContent);
	
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/asignarCurso' , $dataContent);
		$this->load->view('includes/footer');
	}
	

	public function Grupo()
	{
	
	
	
	
		if($this->input->post('curso'))
		{
			$id = $this->input->post('curso');
	
				
			$obtenerGrupo=$this->CapacitacionModel->obtenerGrupo($id);
			?>
					  <option value="">Selecciona Grupo</option>
		 <?php		
							foreach($obtenerGrupo as $fila)
							{
								?>
								
					               <option value="<?php echo $fila->idGrupo; ?>"><?php echo $fila->NombreGrupo; ?></option>
		            
					            <?php
					            }
					        	 
					        }
				
			}
			
			public function DetalleGrupo()
			{
			
			
			
			
				if($this->input->post('grupo'))
				{
					$id = $this->input->post('grupo');
			
					$usuariosActivos = $this->CapacitacionModel->obtenerUsuariosActivosGrupo($id);
					$obtenerGrupo=$this->CapacitacionModel->obtenerGrupoDetalle($id);
					?>
								 
					 <?php		
										foreach($obtenerGrupo as $fila)
										{
											?><tr>
											
										<td colspan="3">Fecha: <?php echo $fila->FechaInicial; ?> Al <?php echo $fila->FechaFinal; ?>, Duración: <?php echo $fila->Duracion; ?> <?php echo $fila->Horario; ?>, Capacitador: <?php echo $fila->nombreUsuario; ?>,
										
										 Lugar: <?php echo $fila->Direccion; ?>, Sala: <?php echo $fila->Sala; ?></td>
											
											</tr>
											
									
								            <?php
								            }
								            ?>
								            
								            <tr>
								            <th style="text-align:right;" >ASIGNADO</th>
								            <th style="text-align:left;width:5px" >ASIGNAR</th>
								            <th style="text-align:left;">NOMBRE</th>
								             
								            <?php
								            if(!empty( $usuariosActivos ) ):
								            foreach($usuariosActivos as $fila)
								            {
								            	?>
								            							
								            				                 <tr> 			  	           
								            	              <?php 
								            	              if( $fila["Asignado"]==1)
								            	              {
								            	              ?>
								            	              <td style="text-align:right;"> <input style="margin-right:10px;" type="checkbox" name="AsignadoUsuario[]" value="<?php echo $fila["idUsuarios"]; ?>" disabled="disabled" checked></td>
								            	              <?php 	
								            	              }
								            	              else {
								            	              	?>
								            	              	<td style="text-align:right;"> <input style="margin-right:10px;" type="checkbox" name="AsignadoUsuario[]" value="<?php echo $fila["idUsuarios"]; ?>" disabled="disabled" ></td>
								            	              	
								            	              	<?php 
								            	              }
								            	              ?>
								            	                <td style="text-align:left;"> <input style="margin-right:10px;" type="checkbox" name="AltaUsuario[]" value="<?php echo $fila["idUsuarios"]; ?>" checked></td>
								            	                  <td style="text-align:left;"><?php echo $fila["nombreUsuario"]; ?></td>
								            	                  </tr>  
								            				            <?php
								            				            }
								            				            endif;
								                           ?>
								                              
								            </tr>
								            
								        	 <?php 
								        }
							
						}
	
						
						function AsignarGrupo() {
						
							$dataHeader = array(
									"titulo" => "Asignar Curso"
							);
						
						
							$Usuarios=$this->input->post('AltaUsuario');
							$idgrupo=$this->input->post('grupo');
						
							
							if( $idgrupo == "" ) {
								$idgrupo=0;
								$mensaje = 0;
							}
							 else 
							 {
							
						
							$verificarGrupo=$this->CapacitacionModel->verificarGrupo($idgrupo);
								
							
							foreach($verificarGrupo as $fila)
							{
							$cerrado=$fila->cerrado;
															            }
															            
															            
							if($cerrado==1)
							{
								$mensaje = 1;
							}
							else 
							{
							
						
								$verificarCupo=$this->CapacitacionModel->verificarCupo($idgrupo);
								
								
								foreach($verificarCupo as $fila)
								{
									$cupo=$fila->Capacidad;
								}
								
								
								$resultado = count($Usuarios);
								
								if($resultado>$cupo)
								{
									$mensaje = 2;
									
								}
								else 
								{
								
									
									$sqlElimiar = "delete from  CursosUsuarios where CatalogoGrupos_idGrupo=$idgrupo" ;
									
										
									
									$queryEliminar = $this->db->query($sqlElimiar);
									
								
							foreach ($Usuarios as $record)
							{
									
						
						
								$sqlAsignar = "Insert into CursosUsuarios (Asignado,CatalogoGrupos_idGrupo,idUsuarios) values (1,$idgrupo,$record)" ;
						
									
						
								$queryAsignar = $this->db->query($sqlAsignar);
						
						
							}
							
							$mensaje = 3;
							
								}
							}
							 }	
							
							$usuariosActivos = $this->CapacitacionModel->obtenerUsuariosActivosGrupo($idgrupo);
							$obtenerCursos = $this->CapacitacionModel->obtenerCursos();
							
							$dataContent = array(
									"usuariosActivos" => $usuariosActivos,
									"obtenerCursos" => $obtenerCursos,
									"mensaje" => $mensaje,
									"usuarios" => $record
							);
							
							
						//	print_r($dataContent);
							
							$this->load->view('includes/header' , $dataHeader);
							$this->load->view('capacitacion/asignarCurso', $dataContent);
							$this->load->view('includes/footer');
						
						
							//$this->load->view("Reportes");
						
						}
						
						public function asistenciaCurso()
						{
							$dataHeader = array(
									"titulo" => "Asistencia Curso"
							);
							/*Obtener datos de usuario, roles, modulos , permisos*/
							$sessionUser = $this->session->userdata('logged_in');
						
							$isReclutamiento = 0;
							$accionesReclutamiento = array();
							if( isset( $sessionUser["puesto"]["permisos"] ) ):
							foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
							if( $permisos["prefijoModulos"] == "capacitacion"):
							$isReclutamiento = 1;
							$accionesReclutamiento[] = $permisos["accionPermisos"];
							endif;
							endforeach;
							else:
							redirect("panel");
							endif;
								
							if( $isReclutamiento == 0 ):
							redirect("panel");
							endif;
								
						
						
						//	$usuariosActivos = $this->CapacitacionModel->obtenerUsuariosActivos();
							$obtenerCursos = $this->CapacitacionModel->obtenerCursos();
						
						
							$dataContent = array(
									
									"obtenerCursos" => $obtenerCursos
							);
						
						
						
						
							//	print_r($dataContent);
						
							$this->load->view('includes/header' , $dataHeader);
							$this->load->view('capacitacion/asistenciaCurso' , $dataContent);
							$this->load->view('includes/footer');
						}
						
						function CerrarGrupo() {
						
						
						
						
						
							$Grupo=$this->input->post('grupo');
						
						
						
							$sqlGrupo = "Update CatalogoGrupos set cerrado =1 where idGrupo = $Grupo" ;
						
						
						
							$queryGrupo = $this->db->query($sqlGrupo);
								
							if ($queryGrupo)
							{
								$resultado = array (
										"codigo" => 200,
										"exito" => true,
										"mensaje" => "Grupo cerrado correctamente."
								);
							}
							else {
								$resultado = array (
										"codigo" => 400,
										"exito" => false,
										"mensaje" => "Error, vuelva a intentarlo."
								);
							}
						
							ob_clean ();
							echo json_encode ( $resultado );
							exit ();
						}
						
						
						public function DetalleGrupoAsistencia()
						{
								
								
								
								
							if($this->input->post('grupo'))
							{
								$id = $this->input->post('grupo');
									
								$usuariosActivos = $this->CapacitacionModel->obtenerUsuariosActivosGrupoAsistencia($id);
								$obtenerGrupo=$this->CapacitacionModel->obtenerGrupoDetalle($id);
								?>
														 
											 <?php		
																foreach($obtenerGrupo as $fila)
																{
																	?><tr>
																	
																<td colspan="3">Fecha: <?php echo $fila->FechaInicial; ?> Al <?php echo $fila->FechaFinal; ?>, Duración: <?php echo $fila->Duracion; ?> <?php echo $fila->Horario; ?>, Capacitador: <?php echo $fila->nombreUsuario; ?>,
																
																 Lugar: <?php echo $fila->Direccion; ?>, Sala: <?php echo $fila->Sala; ?></td>
																	
																	</tr>
																	
															
														            <?php
														            }
														            ?>
														            
														            <tr>
														            <th style="text-align:right;width	:5px" >CONTROL</th>  
                                                                    <th style="text-align:left;">NOMBRE</th>
														             
														            <?php
														            if(!empty( $usuariosActivos ) ):
														            foreach($usuariosActivos as $fila)
														            {
														            	?>
														            							
														            				                 <tr> 			  	           
														            	             
														            	                       <td style="text-align:right;"> <input style="margin-right:10px;" type="checkbox" name="AsignadoUsuario[]" value="<?php echo $fila["idUsuarios"]; ?>" checked></td>
	             
	                                                                                           <td style="text-align:left;"><?php echo $fila["nombreUsuario"]; ?></td>
														            	                  </tr>  
														            				            <?php
														            				            }
														            				            endif;
														                           ?>
														                              
														            </tr>
														            
														        	 <?php 
														        }
													
												}
												
												
												function RegistroAsistenciaCurso() {
												
													$dataHeader = array(
															"titulo" => "Asistencia Curso"
													);
												
												
													$Usuarios=$this->input->post('AsignadoUsuario');
													$idgrupo=$this->input->post('grupo');
												
														
													if( $idgrupo == "" ) {
														$idgrupo=0;
														$mensaje = 0;
													}
													else
													{
																			
																$sqlElimiar = "delete from  AsistenciaCapacitacion where idGrupo=$idgrupo and fechaAsistencia = date(now())" ;
																	
												
																	
																$queryEliminar = $this->db->query($sqlElimiar);
																	
												
																foreach ($Usuarios as $record)
																{
																		
												
												
																	$sqlAsignar = "Insert into AsistenciaCapacitacion (fechaAsistencia,idGrupo,idUsuarios) values (now(),$idgrupo,$record)" ;
												
																		
												
																	$queryAsignar = $this->db->query($sqlAsignar);
												
												
																}
																	
																$mensaje = 1;
																	
															}
														
														
													$usuariosActivos = $this->CapacitacionModel->obtenerUsuariosActivosGrupo($idgrupo);
													$obtenerCursos = $this->CapacitacionModel->obtenerCursos();
														
													$dataContent = array(
															"usuariosActivos" => $usuariosActivos,
															"obtenerCursos" => $obtenerCursos,
															"mensaje" => $mensaje,
															"usuarios" => $record
													);
														
														
													//	print_r($dataContent);
														
													$this->load->view('includes/header' , $dataHeader);
													$this->load->view('capacitacion/asistenciaCurso' , $dataContent);
													$this->load->view('includes/footer');
												
													//$this->load->view("Reportes");
												
												}
												
												public function PersonalGrupo()
												{
												
												
												
												
													if($this->input->post('grupo'))
													{
														$id = $this->input->post('grupo');
															
														$usuariosActivos = $this->CapacitacionModel->obtenerUsuariosActivosGrupoAsistencia($id);
													
																										            ?>
																										            
																										            <option value="">Seleccione Personal</option>
																										             
																										            <?php
																										            if(!empty( $usuariosActivos ) ):
																										            foreach($usuariosActivos as $fila)
																										            {
																										            	?>
																										            							
																										            				            <option value="<?php echo $fila["idUsuarios"]; ?>"><?php echo $fila["nombreUsuario"]; ?></option>
													                                                                                          
																										            				            <?php
																										            				            }
																										            				            endif;
																										                           ?>
																										                              
																										            </tr>
																										            
																										        	 <?php 
																										        }
																									
																								}
																								
																								
		function GuardaEvaluacionCurso() {
																								
																								
	$cursoAprob=$this->input->post('cursoAprob');
   $nomEmp=$this->input->post('nomEmp');
  $observaciones=$this->input->post('observaciones');
  $idcurso=$this->input->post('idcurso');
  $idusuario=$this->input->post('idusuario');

  $calificacion=$this->input->post('calificacion');
  $tema=$this->input->post('tema');
		
  $resultado = array_merge($calificacion,$tema);
																								
																								
$sqlAlta = "insert into CursoEvaluacion (nombreUsuario,observaciones,calificacion,idUsuarios,idCursos) values ('$nomEmp','$observaciones',$cursoAprob,$idusuario,$idcurso)" ;
																								
																								
																								
$queryGrupo = $this->db->query($sqlAlta);
$evaluacionInsertID = $this->db->insert_id();

$a=0;

foreach( $calificacion as $key => $res ):

$sqlInsertMetaDatos = 'INSERT INTO MetaDatosCursosEvaluacion ( prefijoMetaDatos , valorMetaDatos , idCursoEvaluacion ) VALUES( \''.$tema[$key].'\' , \''.$res.'\' , '.$evaluacionInsertID.' );';
$sqlInsert=$this->db->query( $sqlInsertMetaDatos );

$a++;

endforeach;

if ($sqlInsert)
{
	$resultado = array (
			"codigo" => 200,
			"exito" => true,
			"mensaje" => "Evaluacion guardada correctamente."
	);
}
else {
	$resultado = array (
			"codigo" => 400,
			"exito" => false,
			"mensaje" => "Error, vuelva a intentarlo."
	);
}

ob_clean ();
echo json_encode ( $resultado );
exit ();


																								}
}


