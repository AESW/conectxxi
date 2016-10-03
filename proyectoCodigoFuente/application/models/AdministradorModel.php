<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministradorModel extends CI_Model {
	
	
	
	
	public function MovimientosModel() {
        parent::__construct();
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
    
    public function CatDepartamentos(){
    
    
    	$select = "SELECT departamentos.*,Empresas.* from departamentos left outer join Empresas
    			on departamentos.idEmpresas=Empresas.idEmpresas";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    
    public function Productos(){
    
    
    	$select = "SELECT productos.*,Cartera.Cartera from productos left outer join Cartera
    			on productos.Cartera_IdCartera=Cartera.IdCartera";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    public function CatCartera(){
    
    
    	$select = "SELECT * FROM Cartera";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
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
	
    public function eliminaItem($id_item,$estatus){
    
    
    	$select = "update  cat_detalle set estatus=$estatus where id=$id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardaritem($valor,$id_cat,$parametro){
    
    
    	$select = "insert into cat_detalle (id_catalogo,valor,parametro,estatus) values($id_cat,'$valor','$parametro',1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function actualizarItem($valor,$id_cat,$parametro){
    
    
    	$select = "update  cat_detalle  set valor='$valor',parametro='$parametro' where id= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function CatalogosPuesto(){
    
    
    	$select = "SELECT Puestos.*,Empresas.* FROM Puestos left outer join Empresas
    			on Puestos.idEmpresas=Empresas.idEmpresas";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    
    public function CatTemasCurso(){
    
    
    	$select = "SELECT CatalogoTemas.*,Empresas.nombreEmpresas,CatalogoCursos.NombreDelCurso FROM CatalogoTemas left outer join Empresas
    			on CatalogoTemas.Empresas_idEmpresas=Empresas.idEmpresas
    			left outer join CatalogoCursos
    			on CatalogoTemas.CatalogoDeCursos_idCursos=CatalogoCursos.idCursos";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    public function CatEmpresas(){
    
    
    	$select = "SELECT * FROM Empresas";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    public function CatOficinas(){
    
    
    	$select = "SELECT * FROM Oficinas";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardarPuesto($valor,$idEmpresa){
    
    
    	$select = "insert into puestos (nombrePuesto,idEmpresas,estatusPuesto) values('$valor',$idEmpresa,1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    
    public function CatCursos(){
    
    
    	$select = "SELECT * FROM CatalogoCursos";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    public function CatSueldos(){
    
    
    	$select = "SELECT * FROM Sueldos";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    
    public function CatSalas(){
    
    
    	$select = "SELECT Oficinas.*, CatalogoSalas.* FROM CatalogoSalas left outer join Oficinas
    			on CatalogoSalas.Oficinas_idOficinas=Oficinas.idOficinas";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    public function CatPlazas(){
    
    
    	$select = "SELECT * FROM Plazas";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardarCurso($valor){
    
    
    	$select = "insert into CatalogoCursos (NombreDelCurso,estatus) values('$valor',1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function actualizarCatCursos($valor,$id_cat){
    
    
    	$select = "update  catalogoCursos  set NombreDelCurso='$valor' where idCursos= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function CatConceptosFiniquito(){
    
    
    	$select = "SELECT * FROM ConceptosFiniquito";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return $result;
    	else:
    	return false;
    	endif;
    
    }
    
    
    public function guardarCatConceptos($valor,$id_cat,$parametro){
    
    
    	$select = "insert into ConceptosFiniquito (Concepto,tipo,estatus) values('$valor',$parametro,1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function actualizarItemPuesto($valor,$id_cat,$parametro){
    
    
    	$select = "update  puestos  set nombrePuesto='$valor',idEmpresas=$parametro where idPuestos= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    
    public function estatusCursos($id_item,$estatus){
    
    
    	$select = "update  CatalogoCursos  set estatus=$estatus where idCursos= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    

    public function estatusPuestos($id_item,$estatus){
    
    
    	$select = "update  puestos  set estatusPuesto=$estatus where idPuestos= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    public function actualizarItemConceptos($valor,$id_cat,$parametro){
    
    
    	$select = "update  ConceptosFiniquito  set Concepto='$valor',tipo=$parametro where idConcepto= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function estatusConceptos($id_item,$estatus){
    
    
    	$select = "update  ConceptosFiniquito  set estatus=$estatus where idConcepto= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardarSueldo($sueldo,$año,$sdi){
    
    
    	$select = "insert into Sueldos (año,sueldo,sdi,estatus) values($año,'$sueldo','$sdi',1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function estatusSueldos($id_item,$estatus){
    
    
    	$select = "update  Sueldos  set estatus=$estatus where idSueldos= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function actualizarItemSueldos($id_cat,$sueldo,$año,$sdi){
    
    
    	$select = "update  Sueldos  set año=$año,sueldo='$sueldo',sdi='$sdi' where idSueldos= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardarCartera($valor){
    
    
    	$select = "insert into Cartera (Cartera,estatus) values('$valor',1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    
    public function estatusCarteras($id_item,$estatus){
    
    
    	$select = "update  Cartera  set estatus=$estatus where idCartera= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    
    public function actualizarItemCartera($valor,$id_cat){
    
    
    	$select = "update  Cartera  set Cartera='$valor' where IdCartera= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardarProducto($valor,$cartera){
    
    
    	$select = "insert into Productos (nombreProducto,Cartera_IdCartera,estatus) values('$valor',$cartera,1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function estatusProductos($id_item,$estatus){
    
    
    	$select = "update  Productos  set estatus=$estatus where idProductos= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function actualizarItemProductos($valor,$id_cat,$cartera){
    
    
    	$select = "update  Productos  set nombreProducto='$valor', Cartera_IdCartera=$cartera where idProductos= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardarEmpresa($valor,$corto){
    
    
    	$select = "insert into Empresas (nombreEmpresas,nombreCorto,estatus) values('$valor','$corto',1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function estatusEmpresa($id_item,$estatus){
    
    
    	$select = "update  Empresas  set estatus=$estatus where idEmpresas= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function actualizarItemEmpresa($valor,$id_cat,$corto){
    
    
    	$select = "update  Empresas  set nombreEmpresas='$valor', nombreCorto='$corto' where idEmpresas= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardarOficina($valor,$idOficina){
    
    
    	$select = "insert into Oficinas (nombreOficina,abreviatura,estatus) values('$valor','$idOficina',1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function estatusOficina($id_item,$estatus){
    
    
    	$select = "update  Oficinas  set estatus=$estatus where idOficinas= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    

    public function actualizarItemOficinas($valor,$id_cat,$corto){
    
    
    	$select = "update  Oficinas  set nombreOficina='$valor', abreviatura='$corto' where idOficinas= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    
    public function guardarPlaza($valor){
    
    
    	$select = "insert into Plazas  (nombrePlaza,estatus) values('$valor',1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function estatusPlaza($id_item,$estatus){
    
    
    	$select = "update  Plazas  set estatus=$estatus where idPlazas= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function actualizarItemPlaza($valor,$id_cat){
    
    
    	$select = "update  Plazas  set nombrePlaza='$valor' where idPlazas= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardarDepartamento($valor,$empresa){
    
    
    	$select = "insert into Departamentos (nombreDepartamento,idEmpresas,estatusDepartamento) values('$valor',$empresa,'activo')";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function estatusDepartamento($id_item,$estatus){
    
    
    	$select = "update  Departamentos  set estatusDepartamento='$estatus' where idDepartamentos= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function actualizarItemDepartamento($valor,$id_cat,$empresa){
    
    
    	$select = "update  Departamentos  set nombreDepartamento='$valor',idEmpresas=$empresa where idDepartamentos= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function guardarSala($valor,$direccion,$capacidad,$oficina){
    
    
    	$select = "insert into CatalogoSalas (Direccion,Sala,Capacidad,Oficinas_idOficinas,estatus) values('$direccion','$valor','$capacidad',$oficina,1)";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function actualizarItemSala($id_cat,$valor,$direccion,$capacidad,$oficina){
    
    
    	$select = "update  CatalogoSalas  set Direccion='$direccion',Sala='$valor',Capacidad=$capacidad,Oficinas_idOficinas=$oficina where idSalas= $id_cat";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
    
    public function estatusSala($id_item,$estatus){
    
    
    	$select = "update  CatalogoSalas  set estatus='$estatus' where idSalas= $id_item";
    
    
    	$selectSQL = $this->db->query( $select );
    
    	if( $selectSQL ):
    	//$result = $selectSQL->result();//Obtener registro de la consulta
    
    	return true;
    	else:
    	return false;
    	endif;
    
    }
}
