<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NominaModel extends CI_Model {
	
	
	
	
	public function MovimientosModel() {
        parent::__construct();
    }
		
	public function CatPuestos(){
		
		
		$sqlCatPuestos = "SELECT idPuestos,nombrePuesto FROM Puestos order by nombrePuesto asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
		
	return $queryCatPuestos->result();
		
		
	}
	
	
	public function AltaUsuarios($id){
	
	
		$sqlAltaUsuarios = "SELECT RecursosHumanosFDP.*,CandidatoFDP.nombre,CandidatoFDP.apeliidoPaterno,CandidatoFDP.apellidoMaterno,CandidatoFDP.fechaNacimiento,
				 (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='Sdi') as sdi,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='puesto') as puesto,
				(SELECT Patronales.registroPatronal FROM Oficinas_has_Empresas
left outer join Patronales on Patronales.idPatronales = Oficinas_has_Empresas.Patronales_idPatronales
where Empresas_idEmpresas = $id and Oficinas_idOficinas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='oficina')) as patronal,
				(SELECT Oficinas.nombreOficina FROM Oficinas_has_Empresas
left outer join Oficinas on Oficinas.idOficinas = Oficinas_has_Empresas.Oficinas_idOficinas
where Empresas_idEmpresas = $id and Oficinas_idOficinas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='oficina')) as oficina
				FROM RecursosHumanosFDP
				left outer join CandidatoFDP on CandidatoFDP.idCandidatoFDP= RecursosHumanosFDP.idCandidatoFDP
				where altaUsuario =1 and altaUsuarioNOI = 0 and (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='empresa_contrata') = $id";
	    
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
	
		
		$arrayAltaUsuarios = array();
		if(  $queryAltaUsuarios->num_rows() > 0 ):
		
		
		$arrayAltaUsuarios = $queryAltaUsuarios->result();
		
		
		endif;
			
		
		return $arrayAltaUsuarios;
	}

	public function obtenerEmpresas(){
	
	
		$sqlObtenerEmpresas = 'SELECT * FROM Empresas where estatus = 1'  ;
			
		$resultObtenerEmpresas = array();
			
		$queryObtenerEmpresas = $this->db->query($sqlObtenerEmpresas);
			
		if( $queryObtenerEmpresas->num_rows() > 0 ):
		$resultObtenerEmpresas = $queryObtenerEmpresas->result();
	
	
		endif;
			
	
		return $resultObtenerEmpresas;
	
	
	}
	
	function query($Usuarios)   //en el modelo my_model
	{
		//datos a seleccionar
		 
	
		//encabezados de las columnas
		$headers = array('CLAVE',
				'APELLIDO PATERNO',
				'APELLIDO MATERNO',
				'NOMBRE (S)',
				'SALARIO',
				'SEXO',
				'NACIMIENTO',
				'FECHA ALTA',
				'IMSS',
				'CURP',
				'RFC',
				'CALLE Y NUMERO',
				'COLONIA',
				'POBLACION',
				'CODIGO POSTAL',
				'ENTIDAD FEDERATIVA',
				'TELEFONO 1',
				'TELEFONO CEL',
				'CORREO ELECTRONICO',
				'GRADO DE ESTUDIOS',
				'PROFESION',
				'ESTADO CIVIL',
				'TIPO DE SANGRE',
				'FORMA DE PAGO',
				'BANCO OPERADOR',
				'LOCALIDAD / SUCURSAL',
				'CONTROL DE BANCO',
				'CUENTA DEPOSITO',
				'TIPO DE EMPLEADO',
				'TIPO DE JORNADA',
				'TURNO',
				'UMF',
				'DESCUENTO PENSION',
				'REGISTRO PATRONAL',
				'CLASIFICACION',
				'DEPARTAMENTO',
				'PUESTO',
				'TIPO DE CONTRATO',
				'TIPO DE INGRESO',
				'PAIS',
				'CLAVE REGIMEN DE CONTRATO',
				'BASE DE COTIZACION',
				'DIAS DE DURACION');
		
		$table[] = $headers;
		$i = 3271;
		foreach ($Usuarios as $key => $value) {
	
				$consulta="SELECT RecursosHumanosFDP.*,CandidatoFDP.*,
				 (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='Sdi') as sdi,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='idPuesto') as puesto,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='fechaAlta') as fechaAlta,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='banco') as banco,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='cuentaNomina') as cuentaNomina,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='clabeInterbancaria') as clabeInterbancaria,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='turno') as turno,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='idDepartamento') as idDepartamento,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='tokenVacante') as tokenVacante,
				(SELECT valorMetaDatos FROM MetaDatosCandidatoFDP WHERE MetaDatosCandidatoFDP.idCandidatoFDP = $value and prefijoMetaDatos='profesion') as profesion,
						(SELECT valorMetaDatos FROM MetaDatosCandidatoFDP WHERE MetaDatosCandidatoFDP.idCandidatoFDP = $value and prefijoMetaDatos='calle_no_candidato') as calle_no_candidato,
						(SELECT valorMetaDatos FROM MetaDatosCandidatoFDP WHERE MetaDatosCandidatoFDP.idCandidatoFDP = $value and prefijoMetaDatos='colonia_domicilio_candidato') as colonia_domicilio_candidato,
						(SELECT valorMetaDatos FROM MetaDatosCandidatoFDP WHERE MetaDatosCandidatoFDP.idCandidatoFDP = $value and prefijoMetaDatos='delegacion_domicilio_candidato') as delegacion_domicilio_candidato,
						(SELECT valorMetaDatos FROM MetaDatosCandidatoFDP WHERE MetaDatosCandidatoFDP.idCandidatoFDP = $value and prefijoMetaDatos='cp_candidato') as cp_candidato,
						(SELECT valorMetaDatos FROM MetaDatosCandidatoFDP WHERE MetaDatosCandidatoFDP.idCandidatoFDP = $value and prefijoMetaDatos='telefono_casa_candidato') as telefono_casa_candidato,
						(SELECT valorMetaDatos FROM MetaDatosCandidatoFDP WHERE MetaDatosCandidatoFDP.idCandidatoFDP = $value and prefijoMetaDatos='telefono_movil_candidato') as telefono_movil_candidato,
						(SELECT valorMetaDatos FROM MetaDatosCandidatoFDP WHERE MetaDatosCandidatoFDP.idCandidatoFDP = $value and prefijoMetaDatos='estado_domicilio_candidato') as estado_domicilio_candidato,
				(SELECT Patronales.registroPatronal FROM Oficinas_has_Empresas
left outer join Patronales on Patronales.idPatronales = Oficinas_has_Empresas.Patronales_idPatronales
where Empresas_idEmpresas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='empresa_contrata') and Oficinas_idOficinas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='oficina')) as patronal,
				          (SELECT Oficinas.abreviatura FROM Oficinas_has_Empresas
left outer join Oficinas on Oficinas.idOficinas = Oficinas_has_Empresas.Oficinas_idOficinas
where Empresas_idEmpresas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='empresa_contrata') and Oficinas_idOficinas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='oficina')) as abreviatura,
				(SELECT Oficinas.nombreOficina FROM Oficinas_has_Empresas
left outer join Oficinas on Oficinas.idOficinas = Oficinas_has_Empresas.Oficinas_idOficinas
where Empresas_idEmpresas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='empresa_contrata') and Oficinas_idOficinas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='oficina')) as oficina
				FROM RecursosHumanosFDP
				left outer join CandidatoFDP on CandidatoFDP.idCandidatoFDP= $value
				where altaUsuario =1 and altaUsuarioNOI = 0 and RecursosHumanosFDP.idCandidatoFDP= $value";
			
			
		
	
		$query = $this->db->query($consulta);
		
			
			
			foreach ($query->result() as $row)
			{
				
				
				if($row->genero=='Hombre')
				{
					
					$sexo='M';
				}
				
				if($row->genero=='Mujer')
				{
						
					$sexo='F';
				}
				
				
				if($row->estadoCivil=='Casado')
				{
						
					$civil='C';
				}
				
				if($row->estadoCivil=='Soltero')
				{
				
					$civil='S';
				}
				
				if($row->cuentaNomina=='')
				{
				
					$tipoPago='C';
				}
				else 
				{
					$tipoPago='T';
				}
				
				if($row->turno=='Vespertino')
				{
				
					$turno='V';
				}
				
				if($row->turno=='Matutino')
				{
				
					$turno='M';
				}
				
				if($row->estado_domicilio_candidato=="AGUASCALIENTES")
				{
					$Estado=1;
				}
				elseif($row->estado_domicilio_candidato=="BAJA CALIFORNIA")
				{
					$Estado=2;
				}
				elseif($row->estado_domicilio_candidato=="BAJA CALIFORNIA SUR")
				{
					$Estado=3;
				}
				elseif($row->estado_domicilio_candidato=="CAMPECHE")
				{
					$Estado=4;
				}
				elseif($row->estado_domicilio_candidato=="CHIAPAS")
				{
					$Estado=5;
				}
				elseif($row->estado_domicilio_candidato=="CHIHUAHUA")
				{
					$Estado=6;
				}
				elseif($row->estado_domicilio_candidato=="COAHUILA DE ZARAGOZA")
				{
					$Estado=7;
				}
				elseif($row->estado_domicilio_candidato=="COLIMA")
				{
					$Estado=8;
				}
				elseif($row->estado_domicilio_candidato=="DISTRITO FEDERAL")
				{
					$Estado=9;
				}
				elseif($row->estado_domicilio_candidato=="DURANGO")
				{
					$Estado=10;
				}
				elseif($row->estado_domicilio_candidato=="MEXICO")
				{
					$Estado=15;
				}
				elseif($row->estado_domicilio_candidato=="GUANAJUATO")
				{
					$Estado=11;
				}
				elseif($row->estado_domicilio_candidato=="GUERRERO")
				{
					$Estado=12;
				}
				elseif($row->estado_domicilio_candidato=="HIDALGO")
				{
					$Estado=13;
				}
				elseif($row->estado_domicilio_candidato=="JALISCO")
				{
					$Estado=14;
				}
				elseif($row->estado_domicilio_candidato=="MICHOACAN DE OCAMPO")
				{
					$Estado=16;
				}
				elseif($row->estado_domicilio_candidato=="MORELOS")
				{
					$Estado=17;
				}
				elseif($row->estado_domicilio_candidato=="NAYARIT")
				{
					$Estado=18;
				}
				elseif($row->estado_domicilio_candidato=="NUEVO LEON")
				{
					$Estado=19;
				}
				elseif($row->estado_domicilio_candidato=="OAXACA")
				{
					$Estado=20;
				}
				elseif($row->estado_domicilio_candidato=="PUEBLA")
				{
					$Estado=21;
				}
				elseif($row->estado_domicilio_candidato=="QUERETARO")
				{
					$Estado=22;
				}
				elseif($row->estado_domicilio_candidato=="QUINTANA ROO")
				{
					$Estado=23;
				}
				elseif($row->estado_domicilio_candidato=="SAN LUIS POTOSI")
				{
					$Estado=24;
				}
				elseif($row->estado_domicilio_candidato=="SINALOA")
				{
					$Estado=25;
				}
				elseif($row->estado_domicilio_candidato=="SONORA")
				{
					$Estado=26;
				}
				elseif($row->estado_domicilio_candidato=="TABASCO")
				{
					$Estado=27;
				}
				elseif($row->estado_domicilio_candidato=="TAMAULIPAS")
				{
					$Estado=28;
				}
				elseif($row->estado_domicilio_candidato=="TLAXCALA")
				{
					$Estado=29;
				}
				elseif($row->estado_domicilio_candidato=="VERACRUZ DE IGNACIO DE LA LLAVE")
				{
					$Estado=30;
				}
				elseif($row->estado_domicilio_candidato=="YUCATAN")
				{
					$Estado=31;
				}
				elseif($row->estado_domicilio_candidato=="ZACATECAS")
				{
					$Estado=32;
				}
				
				
				if($row->nivelEducativo=="Primaria")
				{
					$GradoEstudio=1;
				}
				elseif($row->nivelEducativo=="Secundaria")
				{
					$GradoEstudio=2;
				}
				elseif($row->nivelEducativo=="Tecnico")
				{
					$GradoEstudio=3;
				}
				elseif($row->nivelEducativo=="Bachillerato")
				{
					$GradoEstudio=4;
				}
				elseif($row->nivelEducativo=="Licenciatura")
				{
					$GradoEstudio=5;
				}
				elseif($row->nivelEducativo=="PosGrado")
				{
					$GradoEstudio=6;
				}
				
				//  $row->ID = $i;
				$table[$i]['clave'] = $i;
				$table[$i]['apeliidoPaterno'] = $row->apeliidoPaterno;
				$table[$i]['apellidoMaterno'] = $row->apellidoMaterno;
				$table[$i]['nombre'] = $row->nombre;
				$table[$i]['sdi'] = $row->sdi;
				$table[$i]['sexo'] = $sexo;
				$table[$i]['fechaNacimiento'] = $row->fechaNacimiento;
				$table[$i]['fechaAlta'] = $row->fechaAlta;
				$table[$i]['imss'] = $row->numeroSeguroSocial;
				$table[$i]['curp'] = $row->curpCandidato;
				$table[$i]['rfc'] = $row->rfcCandidato;
				$table[$i]['calle'] = $row->calle_no_candidato;
				$table[$i]['colonia'] = $row->colonia_domicilio_candidato;
				$table[$i]['poblacion'] = $row->delegacion_domicilio_candidato;
				$table[$i]['cp'] = $row->cp_candidato;
				$table[$i]['entidad'] = $Estado;
				$table[$i]['telefono'] = $row->telefono_casa_candidato;
				$table[$i]['celular'] =$row->telefono_movil_candidato;
				$table[$i]['correo'] = $row->correoElectronico;
				$table[$i]['gradoEstudio'] = $GradoEstudio;
				$table[$i]['profesion'] = $row->profesion;
				$table[$i]['edoCivil'] = $civil;
				$table[$i]['tipo_sangre'] = "";
				$table[$i]['formaPago'] = $tipoPago;
				$table[$i]['banco'] = $row->banco;
				$table[$i]['sucursal'] = "$row->clabeInterbancaria";
				$table[$i]['controlBanco'] = "";
				$table[$i]['cuentaNomina'] = $row->cuentaNomina;
				$table[$i]['tipo_empleado'] = "c";
				$table[$i]['tipo_jornada'] ="";
				$table[$i]['turno'] = $turno;
				$table[$i]['umf'] = "";
				$table[$i]['pension'] = "NO";
				$table[$i]['patronal'] = $row->patronal;
				$table[$i]['clasificacion'] = $row->abreviatura;
				$table[$i]['idDepartamento'] = $row->idDepartamento;
				$table[$i]['puesto'] = $row->puesto;
				$table[$i]['tipo_contrato'] = "P";
				$table[$i]['tipo_ingreso'] = "";
				$table[$i]['pais'] = "MEXICO";
				$table[$i]['regimen'] = 2;
				$table[$i]['base_cot'] = "MIXTA";
				$table[$i]['dias_duracion'] = "";
				
				$i++;
				
				
				
				$sqlActualiza = "Update RecursosHumanosFDP set altaUsuarioNOI=1 where idCandidatoFDP= $value " ;
					
				$queryActualiza = $this->db->query($sqlActualiza);
				
				if($queryActualiza)
				{
					
					$tokenV= $row->tokenVacante;
					
					
					$sqlActualiza = "Update VacantesPeticiones set vacantesContratados=(vacantesContratados+1) where tokenFDPVacantesPendientes= '$tokenV' " ;
						
					$queryActualiza = $this->db->query($sqlActualiza);
					
				}
				
				
			}
			
			
		
			
		
		$i++;
		}
		
		return $table;
	}
	
	
	public function obtenerAltasUsuario(){
	
	
		$sqlAltaUsuarios = "SELECT count(*) as cuenta FROM RecursosHumanosFDP
				where altaUsuario =1 and altaUsuarioNOI = 0";
		
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
		if( $queryAltaUsuarios->num_rows() > 0 ):
		$resultadoAltaUsuarios = $queryAltaUsuarios->result();
		$altas = array();
			
		foreach( $resultadoAltaUsuarios as $entre):
		$altas[] = array(
				"cuenta" => $entre->cuenta
				
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
	public function obtenerBajasUsuario(){
	
	
		$sqlBajasUsuarios = "SELECT count(*) as cuenta FROM SolBajasPersonal
				where bajaUsuario =1 and finiquito = 1 and cheque = 1 and bajaUsuarioNOI = 0";
	
		$queryBajasUsuarios = $this->db->query( $sqlBajasUsuarios );
		if( $queryBajasUsuarios->num_rows() > 0 ):
		$resultadoBajasUsuarios = $queryBajasUsuarios->result();
		$altas = array();
			
		foreach( $resultadoBajasUsuarios as $entre):
		$altas[] = array(
				"cuenta" => $entre->cuenta
	
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
	public function BajaUsuarios($id){
	
	
		$sqlBajaUsuarios = "SELECT SolBajasPersonal.*,Usuarios.nombreUsuario,
		(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = SolBajasPersonal.idUsuarios and prefijoMetaDatos='puesto') as puesto,
		(SELECT Patronales.registroPatronal FROM Oficinas_has_Empresas
		left outer join Patronales on Patronales.idPatronales = Oficinas_has_Empresas.Patronales_idPatronales
		where Empresas_idEmpresas = $id and Oficinas_idOficinas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = SolBajasPersonal.idUsuarios and prefijoMetaDatos='oficina')) as patronal,
		(SELECT Oficinas.nombreOficina FROM Oficinas_has_Empresas
		left outer join Oficinas on Oficinas.idOficinas = Oficinas_has_Empresas.Oficinas_idOficinas
		where Empresas_idEmpresas = $id and Oficinas_idOficinas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = SolBajasPersonal.idUsuarios and prefijoMetaDatos='oficina')) as oficina
		FROM SolBajasPersonal
		left outer join Usuarios on Usuarios.idUsuarios= SolBajasPersonal.idUsuarios
		where bajaUsuario =1 and finiquito = 1 and cheque = 1 and bajaUsuarioNOI = 0 and (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = SolBajasPersonal.idUsuarios and prefijoMetaDatos='empresa_contrata') = $id";
		 
		$queryBajaUsuarios = $this->db->query( $sqlBajaUsuarios );
	
	
		$arrayBajaUsuarios = array();
		if(  $queryBajaUsuarios->num_rows() > 0 ):
	
	
		$arrayBajaUsuarios = $queryBajaUsuarios->result();
	
	
		endif;
			
	
		return $arrayBajaUsuarios;
	}
	
	function queryBajaUsuario($Usuarios)   //en el modelo my_model
	{
		//datos a seleccionar
			
	
		//encabezados de las columnas
		$headers = array('# DE EMPL',
				'NOMBRE',
				'OFICINA',
				'RAZON SOCIAL',
				'FECHA DE INGRESO',
				'AREA',
				'PUESTO',
				'TURNO',
				'LOGIN',
				'FECHA DE BAJA',
				'MOTIVO',
                'FIRMA DE CARTA DE RENUNCIA',
				'VACACIONES PENDIENTES',
				'BONO O COMISION PENDIENTE A LA FECHA DE BAJA',
				'OBSERVACION',
				);
	
		$table[] = $headers;
		
		foreach ($Usuarios as $key => $value) {
	
			$consulta="SELECT Usuarios.*,SolBajasPersonal.*,
		
			(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='idPuesto') as puesto,
			(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='fechaAlta') as fechaAlta,
			(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='turno') as turno,
			(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='descripcionDepartamento') as Departamento,
			(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='noEmpleado') as NumEmpleado
		    FROM SolBajasPersonal
			left outer join Usuarios on SolBajasPersonal.idUsuarios= $value
			where bajaUsuario =1 and finiquito = 1 and cheque = 1 and bajaUsuarioNOI = 0 and Usuarios.idUsuarios = $value";
				
				
	
	
			$query = $this->db->query($consulta);
	
				
				
			foreach ($query->result() as $row)
			{
	
	
	
				//  $row->ID = $i;
				$table[$i]['NumEmpleado'] = $row->NumEmpleado;
				$table[$i]['nombreUsuario'] = $row->nombreUsuario;
				$table[$i]['Oficina'] = $row->Oficina;
				$table[$i]['Empresa'] = $row->Empresa;
				$table[$i]['fechaIngreso'] = $row->fechaIngreso;
				$table[$i]['Departamento'] = $row->Departamento;
				$table[$i]['Puesto'] = $row->Puesto;
				$table[$i]['turno'] = $row->turno;
				$table[$i]['RFC'] = $row->RFC;
				$table[$i]['fechaEfectiva'] = $row->fechaEfectiva;
				$table[$i]['motivoBaja'] = $row->motivoBaja;
				$table[$i]['firma'] = $row->observaciones;
				$table[$i]['vacaciones'] = $row->observaciones;
				$table[$i]['bono'] = $row->observaciones;
				$table[$i]['observaciones'] = $row->observaciones;
				
	
			
				$sqlActualiza = "Update SolBajasPersonal set bajaUsuarioNOI=1 where idUsuarios = $value " ;
					
				$queryActualiza = $this->db->query($sqlActualiza);
	
			
	
	
			}
				
				
	
				
	
			$i++;
		}
	
		return $table;
	}
	
	public function obtenerBajasDatos(){
	
	
		$sqlBajaUsuarios = "SELECT SolBajasPersonal.*,Usuarios.nombreUsuario
     	FROM SolBajasPersonal
		left outer join Usuarios on Usuarios.idUsuarios= SolBajasPersonal.idUsuarios
		where bajaUsuario =1 and finiquito = 0 and bajaUsuarioNOI = 0 ";
			
		$queryBajaUsuarios = $this->db->query( $sqlBajaUsuarios );
	
	
		$arrayBajaUsuarios = array();
		if(  $queryBajaUsuarios->num_rows() > 0 ):
	
	
		$arrayBajaUsuarios = $queryBajaUsuarios->result();
	
	
		endif;
			
	
		return $arrayBajaUsuarios;
	}
	
	public function Datosusuarios($idCandidatoFDP){
	
	
		$sqlObtenerDatos = "SELECT SolBajasPersonal.*,Usuarios.*,
		(select nombreUsuario from Usuarios where idUsuarios = SolBajasPersonal.idUsuariosSolicita) as solicita
		FROM SolBajasPersonal left outer join Usuarios
		on SolBajasPersonal.idUsuarios=Usuarios.idUsuarios where SolBajasPersonal.idSolBajal= $idCandidatoFDP" ;
			
		$resultObtenerDatos = array();
			
		$queryObtenerDatos = $this->db->query($sqlObtenerDatos);
			
		if( $queryObtenerDatos->num_rows() > 0 ):
		$resultObtenerDatos = $queryObtenerDatos->result();
	
	
		endif;
			
	
		return $resultObtenerDatos;
	
	
	}
	
	public function ConceptosFiniquito(){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		select * from ConceptosFiniquito where estatus=1
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
				"idConcepto" => $pet->idConcepto,
				"Concepto" => $pet->Concepto,
				"tipo" => $pet->tipo
	
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	
	}
	
	public function SelDescuentos(){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		select * from DescuentosAbono where movimiento=1
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
				"numeroEmpleado" => $pet->numeroEmpleado,
				"nombreEmpleado" => $pet->nombreEmpleado,
				"concepto" => $pet->concepto,
				"Importe" => $pet->Importe,
				"movimiento" => $pet->movimiento,
				"movimientoFecha" => $pet->movimientoFecha
	
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	
	}
	

	public function BuscarDescuentos($id,$fecha){
	
	
		if(!empty($fecha))
		{
		$fechafin = str_replace("/","-", $fecha);
		}
		else
		{
			$fechafin='';
		
		}
		
		
		$sqlDescuentos = "SELECT * from DescuentosAbono WHERE nombreEmpleado LIKE '%$id%' and movimientoFecha LIKE '%$fechafin%' and movimiento=1;";
		 
		$queryDescuentos = $this->db->query( $sqlDescuentos );
	
	
		$arrayDescuentos = array();
		if(  $queryDescuentos->num_rows() > 0 ):
	
	
		$arrayDescuentos = $queryDescuentos->result();
	
	
		endif;
			
	
		return $arrayDescuentos;
	}
	
	public function SelAbonos(){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		select * from DescuentosAbono where movimiento=2
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
				"numeroEmpleado" => $pet->numeroEmpleado,
				"nombreEmpleado" => $pet->nombreEmpleado,
				"concepto" => $pet->concepto,
				"Importe" => $pet->Importe,
				"movimiento" => $pet->movimiento,
				"movimientoFecha" => $pet->movimientoFecha
	
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	
	}
	
	
	public function BuscarAbonos($id,$fecha){
	
	
		if(!empty($fecha))
		{
			$fechafin = str_replace("/","-", $fecha);
		}
		else
		{
			$fechafin='';
	
		}
	
	
		$sqlAbonos = "SELECT * from DescuentosAbono WHERE nombreEmpleado LIKE '%$id%' and movimientoFecha LIKE '%$fechafin%' and movimiento=2;";
			
		$queryAbonos = $this->db->query( $sqlAbonos );
	
	
		$arrayAbonos = array();
		if(  $queryAbonos->num_rows() > 0 ):
	
	
		$arrayAbonos = $queryAbonos->result();
	
	
		endif;
			
	
		return $arrayAbonos;
	}
	
	
	public function CambioSueldos(){
	
	
		$sqlAltaUsuarios = "SELECT count(*) as cuenta FROM SolCambioSalario
				where aprobadoDireccion =1 and aprobadoRH = 1 and altaNoi= 0";
	
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
		if( $queryAltaUsuarios->num_rows() > 0 ):
		$resultadoAltaUsuarios = $queryAltaUsuarios->result();
		$altas = array();
			
		foreach( $resultadoAltaUsuarios as $entre):
		$altas[] = array(
				"cuenta" => $entre->cuenta
	
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
	public function Vacaciones(){
	
	
		$sqlAltaUsuarios = "SELECT count(*) as cuenta FROM SolVacaciones
				where estatus =1 and aprobadoRH = 1 and altaNoi= 0";
	
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
		if( $queryAltaUsuarios->num_rows() > 0 ):
		$resultadoAltaUsuarios = $queryAltaUsuarios->result();
		$altas = array();
			
		foreach( $resultadoAltaUsuarios as $entre):
		$altas[] = array(
				"cuenta" => $entre->cuenta
	
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
	
	function queryNomina($fecha_inicio,$fecha_final,$idEmpres)   //en el modelo my_model
	{
		//datos a seleccionar
			
		date_default_timezone_set('America/Mexico_City');
		//encabezados de las columnas
		$headers = array('CORPORATIVO',
'PAGO EXTERNO',
'ESTATUS',
'NUM TRAB',
'NOMBRE DEL TRABAJADOR',
'RAZON SOCIAL',
'OFICINA',
'PLAZA',
'FECHA DE INGRESO',
'FECHA DE ALTA',
'MES DE INGRESO',
'REPORTA A',
'PUESTO REPORTA',
'NOMBRE DE GERENTE DE NEGOCIO',
'CURP',
'RFC',
'LOGIN',
'AGENTE',
'CUENTA DE CORREO ELECTRONICO',
'CUENTA NOMINA',
'CUENTA INTERBANCARIA',
'PUESTO',
'# PUESTO',
'DESCRIPCION DEPARTAMENTO',
'# DEPARTAMENTO',
'TURNO',
'HORA ENTRADA',
'HORA SALIDA',
'DESCANSO',
'DIAS  MES',
'SUELDO MENSUAL NOI',
'CUOTA DIARIA NOI',
'DIAS TRAB NOI',
'FALTAS',
'INC',
'VAC',
'PAGO DIAS TRAB NOI',
'COMISION',
'CAJA DE AHORRO',
'INFONAVIT / FONACOT',
'OTROS DESCUENTOS',
'TOTAL PAGADO QUINCENA NOI',
'SUELDO SINERGIA',
'CUOTA DIARIA SINERGIA',
'DIAS TRAB SINERGIA',
'PAGO DIAS TRAB SINERGIA',
'SUELDO NOI + SINERGIA',
'PAGO QUIN NOI + SINERGIA',
'OBSERVACIONES',
'FECHA DE BAJA',
'MES DE BAJA',
'VAC PENDIENTES POR TOMAR',
'FINIQUITO PAGADO',
'PAGO',
'AJUTE');
		
		$fechaItem=$fecha_inicio;
		
		while ( $fechaItem <= date ( 'd-m-Y',strtotime($fecha_final))  )
			
			{
			
				array_push($headers, $fechaItem);
				
			$fechaPaso = date($fechaItem);
			$nuevafecha = strtotime ( '+1 day' , strtotime ( $fechaPaso ) ) ;
			$fechaItem = date ( 'd-m-Y' , $nuevafecha );
			
			
			
		}
		
		
				
		
		$i=1;
		$table[] = $headers;
		
		
		$consultaUsuarios="Select * from Usuarios ";
		
		$queryUsuarios = $this->db->query($consultaUsuarios);
		
		
		
		foreach ($queryUsuarios->result() as $rowUsuarios)
		{
		
			$idUser=$rowUsuarios->idUsuarios;
		
	
				$consulta="SELECT RecursosHumanosFDP.*,Usuarios.*,Empresas.nombreEmpresas,Oficinas.nombreOficina,Plazas.nombrePlaza,Sueldos.sueldo,Incapacidades.inicio,Incapacidades.fin,SolVacaciones.fechaSalida,SolVacaciones.fechaEntrada,SolBajasPersonal.fechaBaja,SolBajasPersonal.finiquitoTotal, 
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='corporativo') as corporativo ,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='despagoExterno') as despagoExterno,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='noEmpleado') as noEmpleado,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='fechaAlta') as fechaAlta,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='fechaIngreso') as fechaIngreso,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='curp') as curp,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='rfc') as rfc,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='cuentaNomina') as cuentaNomina,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='clabeInterbancaria') as clabeInterbancaria,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='puesto') as puesto,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='idPuesto') as idPuesto,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='idDepartamento') as idDepartamento,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='descripcionDepartamento') as descripcionDepartamento,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='turno') as turno,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='descanso') as descanso,
			    (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='horario') as horario,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='pagoExterno') as pagoExterno,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='estatus') as estatus,
				(SELECT Usuarios.nombreUsuario FROM Usuarios WHERE Usuarios.idUsuarios =  (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='idPadre')) as reporta,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='idPadre') and prefijoMetaDatos='puesto') as puestoReporta,
                (SELECT Usuarios.nombreUsuario FROM Usuarios WHERE Usuarios.idUsuarios =  (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = (SELECT Usuarios.idUsuarios FROM Usuarios WHERE Usuarios.idUsuarios =  (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='idPadre')) and prefijoMetaDatos='idPadre')) as gerente,
				(SELECT sum(Importe)  FROM DescuentosAbono WHERE movimiento=1 and numeroEmpleado=(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='noEmpleado')) as abono,
				(SELECT sum(Importe)  FROM DescuentosAbono WHERE movimiento=2 and numeroEmpleado=(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='noEmpleado')) as otrosDescuentos,
				(SELECT sum(Importe)  FROM DescuentosAbono WHERE movimiento=2 and idConcepto=1 and numeroEmpleado=(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='noEmpleado')) as CajaAhorro,
				(SELECT sum(Importe)  FROM DescuentosAbono WHERE movimiento=2 and idConcepto=2 and numeroEmpleado=(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='noEmpleado')) as infonavitFonacot
				FROM Usuarios
				left outer join Empresas on Empresas.idEmpresas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='empresa_contrata') 
				left outer join Oficinas on Oficinas.idOficinas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='oficina') 
				left outer join Plazas on Plazas.idPlazas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='plaza')
				left outer join Sueldos on Sueldos.idSueldos = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='sueldoNOI') 
				left outer join RecursosHumanosFDP on $idUser =  	RecursosHumanosFDP.idUsuarios  
				left outer join Incapacidades on Incapacidades.idUsuarios  = $idUser
				left outer join SolBajasPersonal on SolBajasPersonal.idUsuarios  = $idUser 
				left outer join SolVacaciones on SolVacaciones.idUsuarios  = $idUser  where Usuarios.idUsuarios=$idUser and (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = $idUser and prefijoMetaDatos='empresa_contrata') =$idEmpres   group by Usuarios.idUsuarios";
				
				
	//
	
			$query = $this->db->query($consulta);
	
				
				
			foreach ($query->result() as $row)
			{
	
	
				
				$fechaIngreso=$row->fechaIngreso;
				
				$añoIngreso=date('Y',strtotime($fechaIngreso));
				$mesIngreso=date('m',strtotime($fechaIngreso));
				
				$pos = strpos($row->horario, 'a'); // 
				
				$entrada=substr($row->horario,0,$pos);
				$salida=substr($row->horario,($pos+1),10);
				
				
				
				if($row->inicio!='')
				{
				
				$fecha = date($row->inicio);
				$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
				$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
				
				$datetime1 = new DateTime($nuevafecha);
				$datetime2 = new DateTime($row->fin);
				
				$inc = $datetime2->diff($datetime1)->d;
				}
				else 
				{
					$inc=0;
				}
				
				
				
				$fechaSalida = new DateTime($row->fechaSalida);
				$fechaEntrada = new DateTime($row->fechaEntrada);
				
				$vac = $fechaEntrada->diff($fechaSalida)->d;
				
				$faltas=0;
				
		        $sueldo=$row->sueldo;
				
				$cuotaDiaria=( $row->sueldo/30);
				
				$diasTrabajados=(16-$faltas-$inc);
				
				$pagosDiasTrab=($cuotaDiaria*$diasTrabajados);
				
				$sueldoSinergia=$row->pagoExterno;
				
				$cuotaDiariaSinergia=$sueldoSinergia/30;
				
				$pagosDiasTrabSinergia=($cuotaDiariaSinergia*$diasTrabajados);
				
				$noiMasSiergia=$sueldo+$sueldoSinergia;
				
				$totalPagadoQuincenaNoi=($pagosDiasTrab+$row->abono-$row->CajaAhorro-$row->infonavitFonacot-$row->otrosDescuentos);
				
				$sueldoNoiMasSinergia=$totalPagadoQuincenaNoi+$pagosDiasTrabSinergia;
				
				$fechaBaja=$row->fechaBaja;
				
				$añoBaja=date('Y',strtotime($fechaBaja));
				$mesBaja=date('m',strtotime($fechaBaja));
				
				//  $row->ID = $i;
				$table[$i]['corporativo'] = $row->corporativo;
				$table[$i]['despagoExterno'] = $row->despagoExterno;
				$table[$i]['estatus'] = $row->estatus;
				$table[$i]['noEmpleado'] = $row->noEmpleado;
				$table[$i]['nombreUsuario'] = $row->nombreUsuario;
				$table[$i]['nombreEmpresas'] = $row->nombreEmpresas;
				$table[$i]['nombreOficina'] = $row->nombreOficina;
				$table[$i]['nombrePlaza'] = $row->nombrePlaza;
				$table[$i]['fechaIngreso'] = $row->fechaIngreso;
				$table[$i]['fechaAlta'] = $row->fechaAlta;
				$table[$i]['mesIngreso'] = $mesIngreso."-".$añoIngreso;
				$table[$i]['reporta'] = $row->reporta;
				$table[$i]['puestoReporta'] = $row->puestoReporta;
				$table[$i]['Gerente'] = $row->gerente;
				$table[$i]['curp'] = $row->curp;
				$table[$i]['rfc'] = $row->rfc;
				$table[$i]['login'] = $row->RFC;
				$table[$i]['agente'] = $row->RFC;
				$table[$i]['correo'] = $row->correoUsuario;
				$table[$i]['cuentaNomina'] = $row->cuentaNomina;
				$table[$i]['clabeInterbancaria'] =  $row->clabeInterbancaria;
				$table[$i]['puesto'] = $row->puesto;
				$table[$i]['idPuesto'] =$row->idPuesto;
				$table[$i]['descripcionDepartamento'] = $row->descripcionDepartamento;
				$table[$i]['idDepartamento'] = $row->idDepartamento;
				$table[$i]['turno'] = $row->turno;
				$table[$i]['horaEntrada'] = $entrada;
				$table[$i]['horaSalida'] = $salida;
				$table[$i]['descanso'] = $row->descanso;
				$table[$i]['diasMes'] = 30;
				$table[$i]['sueldo'] = $sueldo;
				$table[$i]['cuotaDiaria'] = $cuotaDiaria;
				$table[$i]['diasTrabajados'] = $diasTrabajados;
				$table[$i]['faltas'] = $faltas;
				$table[$i]['inc'] = $inc;
				$table[$i]['vac'] =$vac;
				$table[$i]['pagosDiasTrab'] = $pagosDiasTrab;
				$table[$i]['comision'] = $row->abono;
				$table[$i]['cajaAhorro'] = $row->CajaAhorro;
				$table[$i]['infonavit'] = $row->infonavitFonacot;
				$table[$i]['otrosDescuentos'] = $row->otrosDescuentos;
				$table[$i]['totalQuincena'] = $totalPagadoQuincenaNoi;
				$table[$i]['sueldoSinergia'] = $sueldoSinergia;
				$table[$i]['cuotaDiariaSinergia'] =$cuotaDiariaSinergia;
				$table[$i]['diasTrabSinergia'] = $diasTrabajados;
				$table[$i]['pagosDiasTrabSinergia'] = $pagosDiasTrabSinergia;
				$table[$i]['noiMasSiergia'] = $noiMasSiergia;
				$table[$i]['quincenaNoiMasSiergia'] = $sueldoNoiMasSinergia;
				$table[$i]['observaciones'] = "";
				$table[$i]['fechaBAja'] = $row->fechaBaja;
				$table[$i]['mesBAja'] =  $mesBaja."-".$añoBaja;
				$table[$i]['vacPen'] = "";
				$table[$i]['finiquitp'] = $row->finiquitoTotal;
				$table[$i]['pagado'] = "";
				$table[$i]['ajustes'] = "";
				
				
				
				$fechaItem=$fecha_inicio;
				
					while ( $fechaItem <= date ( 'Y-m-d',strtotime($fecha_final))  )
					{
						
					
						
						
						
						
					$consultaVacaciones= "SELECT * FROM SolVacaciones WHERE idUsuarios= $idUser and  fechaSalida<='$fechaItem'  And  fechaEntrada>='$fechaItem'" ;
							
					$queryVacaciones = $this->db->query($consultaVacaciones);
					
					if($queryVacaciones->num_rows() > 0)
					{
						array_push($table[$i], "V");
					}
					else
					{
					$consultaIncapacidades= "SELECT * FROM Incapacidades WHERE idUsuarios= $idUser and  inicio<='$fechaItem'   And  fin>='$fechaItem' ";
						
					$queryIncapacidad = $this->db->query($consultaIncapacidades);
						
					if($queryIncapacidad->num_rows() > 0)
					{
						array_push($table[$i], "I");
					}
					else{
					
					$consultaPermiso= "SELECT * FROM SolPermisos WHERE idUsuarios= $idUser and fecha_inicio<='$fechaItem' and fecha_fin>='$fechaItem'";
					
					$queryPermiso = $this->db->query($consultaPermiso);
					
					if($queryPermiso->num_rows() > 0)
					{
						array_push($table[$i], "P");
					}
					else{
						
						array_push($table[$i], "A");
					}
					}}
					
					
					$fechaPaso = date($fechaItem);
					$nuevafecha = strtotime ( '+1 day' , strtotime ( $fechaPaso ) ) ;
					$fechaItem = date ( 'Y-m-d' , $nuevafecha );
					
				}
				
				
	
				$i++;
	
	
	
			}
		}	
			
		return $table;
	}
	
}