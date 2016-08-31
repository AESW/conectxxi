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
	
	
		$sqlObtenerEmpresas = 'SELECT * FROM Empresas' ;
			
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
		on SolBajasPersonal.idUsuarios=Usuarios.idUsuarios where SolBajasPersonal.idUsuarios= $idCandidatoFDP" ;
			
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
		select * from ConceptosFiniquito 
	
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
}