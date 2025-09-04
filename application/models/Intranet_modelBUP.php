<?php
class Intranet_model extends CI_Model
{
  public function login_admin($email, $password){
    $q= $this
        ->db
        ->select('*')
				->from('usuarios')
        ->where('email_usuarios', $email)
        ->where('password_usuarios', $password)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function login_intranet($email, $password){
    $q= $this
        ->db
        ->select('*')
				->from('intranet_usuarios')
        ->where('email', $email)
        ->where('password', $password)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

	public function check_exist_superadmin($email)
  {
    $q= $this
        ->db
        ->select('*')
				->from('usuarios')
				->where('email_usuarios', $email)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function check_exist_intranet($email)
  {
    $q= $this
        ->db
        ->select('*')
				->from('intranet_usuarios')
				->where('email', $email)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_usuarios()
  {
    $q= $this
        ->db
        ->select('*')
				->from('usuarios')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function single_usuario($idu)
  {
    $q= $this
        ->db
        ->select('*')
        ->from('usuarios')
        ->where('id_usuarios', $idu)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function check_pass_admin($pass)
  {
    $q = $this
      ->db
      ->select('*')
      ->from('usuarios')
      ->where('password_usuarios', $pass)
      ->count_all();
    return $q;
  }

  public function get_intranet_usuarios()
  {
    $str = 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.status_oficina, ';
    $str .= 'intranet_usuarios.id, intranet_usuarios.nombres, intranet_usuarios.apellidos, intranet_usuarios.id_oficina usuidof, intranet_usuarios.email, intranet_usuarios.status';
    $q= $this
        ->db
        ->select('*')
        ->from('intranet_usuarios')
        ->join('oficinas', 'oficinas.id_oficina = intranet_usuarios.id_oficina')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function single_intranet_usuarios($idu)
  {
    $str = 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.status_oficina, ';
    $str .= 'intranet_usuarios.id, intranet_usuarios.nombres, intranet_usuarios.apellidos, intranet_usuarios.id_oficina usuidof, intranet_usuarios.email, intranet_usuarios.status';
    $q= $this
        ->db
        ->select('*')
        ->from('intranet_usuarios')
        ->join('oficinas', 'oficinas.id_oficina = intranet_usuarios.id_oficina')
        ->where('intranet_usuarios.id', $idu)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_oficina_empresas()
  {

    $str = 'oficinas.id_oficina, oficinas.id_torre, oficinas.id_nivel, oficinas.id_cat, oficinas.numero_oficina, oficinas.nombre_oficina, oficinas.status_oficina, ';

    $q= $this
        ->db
        ->select($str)
        ->from('oficinas')
        ->order_by('oficinas.nombre_oficina', 'asc')
        ->where('oficinas.status_oficina', 1)
        ->group_by('nombre_oficina')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_oficina_single($id)
  {

    $str = 'oficinas.id_oficina, oficinas.id_torre, oficinas.id_nivel, oficinas.id_cat, oficinas.numero_oficina, oficinas.nombre_oficina, oficinas.status_oficina, ';
    $str .= 'oficinas.email1, oficinas.email2, oficinas.telefono1, oficinas.telefono2, oficinas.website_oficina, oficinas.descripcion_oficina, oficinas.imagen_oficina, ';
    $str .= 'torres.id_torres, torres.torre, ';
    $str .= 'niveles.id_niveles, niveles.nivel, ';
    $str .= 'categorias.id_categorias, categorias.categoria';

    $q= $this
        ->db
        ->select($str)
        ->from('oficinas')
        ->where('oficinas.id_oficina', $id)
        ->join('torres', 'torres.id_torres = oficinas.id_torre')
        ->join('niveles', 'niveles.id_niveles = oficinas.id_nivel')
        ->join('categorias', 'categorias.id_categorias = oficinas.id_cat')
        // ->where('oficinas.status_oficina', 1)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_categorias_empleos()
  {
    $q= $this
        ->db
        ->select('*')
        ->from('categoria_empleos')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_empleos_oficina($idempresa)
  {
    $str = 'plazas.id_plaza, plazas.titulo, plazas.descripcion, plazas.id_empresa idempresa, plazas.fecha_solicitud, plazas.fecha_publicacion, plazas.dias_publicacion, plazas.salario, plazas.moneda, plazas.tipo_contratacion, plazas.nivel_academico, plazas.experiencia_laboral, plazas.id_categoria idc, plazas.conteo_solicitudes conteo, plazas.oferta, plazas.status_plaza, ';
    $str .= 'categoria_empleos.id_ce idcategoria, categoria_empleos.nombre_ce categoria, ';
    $str .= 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.imagen_oficina';

    $q= $this
        ->db
        ->select($str)
        ->from('plazas')
        ->join('categoria_empleos', 'categoria_empleos.id_ce = plazas.id_categoria')
        ->join('oficinas', 'oficinas.id_oficina = plazas.id_empresa')
        ->where('plazas.id_empresa', $idempresa)
        ->order_by('plazas.fecha_solicitud', 'asc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_empleos()
  {
    $str = 'plazas.id_plaza, plazas.titulo, plazas.descripcion, plazas.id_empresa idempresa, plazas.fecha_solicitud, plazas.fecha_publicacion, plazas.dias_publicacion, plazas.salario, plazas.moneda, plazas.tipo_contratacion, plazas.nivel_academico, plazas.experiencia_laboral, plazas.id_categoria idc, plazas.conteo_solicitudes conteo, plazas.oferta, plazas.status_plaza, ';
    $str .= 'categoria_empleos.id_ce idcategoria, categoria_empleos.nombre_ce categoria, ';
    $str .= 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.imagen_oficina';

    $q= $this
        ->db
        ->select($str)
        ->from('plazas')
        ->join('categoria_empleos', 'categoria_empleos.id_ce = plazas.id_categoria')
        ->join('oficinas', 'oficinas.id_oficina = plazas.id_empresa')
        ->order_by('plazas.fecha_solicitud', 'asc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_empleo_single($idempleo)
  {
    $str = 'plazas.id_plaza, plazas.titulo, plazas.descripcion, plazas.id_empresa idempresa, plazas.fecha_solicitud, plazas.fecha_publicacion, plazas.dias_publicacion, plazas.salario, plazas.moneda, plazas.tipo_contratacion, plazas.nivel_academico, plazas.experiencia_laboral, plazas.id_categoria idc, plazas.conteo_solicitudes conteo, plazas.oferta, plazas.status_plaza, plazas.email_envio, ';
    $str .= 'categoria_empleos.id_ce idcategoria, categoria_empleos.nombre_ce categoria, ';
    $str .= 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.imagen_oficina, oficinas.email1';

    $q= $this
        ->db
        ->select($str)
        ->from('plazas')
        ->where('plazas.id_plaza', $idempleo)
        ->join('categoria_empleos', 'categoria_empleos.id_ce = plazas.id_categoria')
        ->join('oficinas', 'oficinas.id_oficina = plazas.id_empresa')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_torres()
  {
    $q= $this
        ->db
        ->select('*')
        ->from('torres')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_noticias()
  {
    $q= $this
        ->db
        ->select('*')
        ->from('noticias')
        ->order_by('id', 'desc')
        ->limit(15)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_inmuebles()
  {
    $q = $this
      ->db
      ->select('*')
      ->from('inmuebles')
      ->order_by('id', 'desc')
      ->limit(15)
      ->get();
    if ($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_inmueble($id)
  {
    $q = $this
      ->db
      ->select('*')
      ->from('inmuebles')
      ->where('id', $id)
      ->get();
    if ($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_noticias_home()
  {
    $q = $this
      ->db
      ->select('*')
      ->from('noticias')
      ->order_by('id', 'desc')
      ->limit(3)
      ->get();
    if ($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_noticia($id)
  {
    $q= $this
        ->db
        ->select('*')
        ->from('noticias')
        ->where('id', $id)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_solicitudes_elevadores($empresaid)
  {
    // $str = 'elevadores.id, elevadores.form, elevadores.empresaid, elevadores.tipo';
    // $str .= 'torres.id_torres, torres.torre';

    $q= $this
        ->db
        ->select('*')
        ->from('elevadores')
        // ->join('torres', 'torres.id_torres = elevadores.torre_id')
        ->where('empresaid', $empresaid)
        ->order_by('id', 'asc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_solicitudes_elevadores_all()
  {
    $str = 'elevadores.id, elevadores.titulo, elevadores.empresaid, elevadores.torre_id, elevadores.oficina, elevadores.fechahora, elevadores.descripcion, elevadores.status_elevador, ';
    $str .= 'torres.id_torres, torres.torre, ';
    $str .= 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.imagen_oficina, oficinas.email1';

    $q= $this
        ->db
        ->select('*')
        ->from('elevadores')
        // ->join('torres', 'torres.id_torres = elevadores.torre_id')
        ->join('oficinas', 'oficinas.id_oficina = elevadores.empresaid')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_solicitudes_mudanzas($idoficina)
  {
    $str = 'mudanzas.id, mudanzas.titulo, mudanzas.empresaid, mudanzas.torre_id, mudanzas.oficina, mudanzas.fechahora, mudanzas.descripcion, mudanzas.status_mudanza, ';
    $str .= 'torres.id_torres, torres.torre';

    $q= $this
        ->db
        ->select('*')
        ->from('mudanzas')
        // ->join('torres', 'torres.id_torres = mudanzas.torre_id')
        ->where('empresaid', $idoficina)
        ->order_by('id', 'asc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_solicitudes_mudanzas_all()
  {
    $str = 'mudanzas.id, mudazas.empresaid, mudanzas.fecha, mudanzas.status_mudanza, ';
    $str .= 'torres.id_torres, torres.torre, ';
    $str .= 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.imagen_oficina, oficinas.email1';

    $q= $this
        ->db
        ->select('*')
        ->from('mudanzas')
        ->join('oficinas', 'oficinas.id_oficina = mudanzas.empresaid')
        ->join('torres', 'torres.id_torres = oficinas.id_torre')
        ->order_by('id', 'asc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_solicitudes_remodelaciones($idoficina)
  {
    $str = 'remodelaciones.id, remodelaciones.titulo, remodelaciones.empresaid, remodelaciones.torre_id, remodelaciones.oficina, remodelaciones.fechahora, remodelaciones.descripcion, remodelaciones.status_remodelacion, ';
    $str .= 'torres.id_torres, torres.torre';

    $q= $this
        ->db
        ->select('*')
        ->from('remodelaciones')
        ->join('torres', 'torres.id_torres = remodelaciones.torre_id')
        ->where('empresaid', $idoficina)
        ->order_by('id', 'desc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_solicitudes_remodelaciones_id($ids)
  {
    $str = 'remodelaciones.id, remodelaciones.titulo, remodelaciones.empresaid, remodelaciones.torre_id, remodelaciones.oficina, remodelaciones.fechahora, remodelaciones.descripcion, remodelaciones.status_remodelacion, ';
    $str .= 'torres.id_torres, torres.torre';
    $str .= 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.imagen_oficina, oficinas.email1';

    $q= $this
        ->db
        ->select('*')
        ->from('remodelaciones')
        ->join('torres', 'torres.id_torres = remodelaciones.torre_id')
        ->join('oficinas', 'oficinas.id_oficina = remodelaciones.empresaid')
        ->where('id', $ids)
        ->order_by('id', 'desc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_solicitudes_mudanzas_id($ids)
  {
    $str = 'mudanzas.id, mudanzas.titulo, mudanzas.empresaid, mudanzas.torre_id, mudanzas.oficina, mudanzas.fechahora, mudanzas.descripcion, mudanzas.status_mudanza, ';
    $str .= 'torres.id_torres, torres.torre';
    $str .= 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.imagen_oficina, oficinas.email1';

    $q= $this
        ->db
        ->select('*')
        ->from('mudanzas')
        ->join('torres', 'torres.id_torres = mudanzas.torre_id')
        ->join('oficinas', 'oficinas.id_oficina = mudanzas.empresaid')
        ->where('mudanzas.id', $ids)
        ->order_by('mudanzas.id', 'desc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }


  public function get_solicitudes_remodelaciones_all()
  {
    $str = 'remodelaciones.id, remodelaciones.titulo, remodelaciones.empresaid, remodelaciones.torre_id, remodelaciones.oficina, remodelaciones.fechahora, remodelaciones.descripcion, remodelaciones.status_remodelacion, ';
    $str .= 'torres.id_torres, torres.torre, ';
    $str .= 'oficinas.id_oficina, oficinas.nombre_oficina, oficinas.imagen_oficina, oficinas.email1';

    $q= $this
        ->db
        ->select('*')
        ->from('remodelaciones')
        ->join('torres', 'torres.id_torres = remodelaciones.torre_id')
        ->join('oficinas', 'oficinas.id_oficina = remodelaciones.empresaid')
        ->order_by('id', 'asc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function all_archivos_pdf()
  {
    $q= $this
        ->db
        ->select('*')
        ->from('pdf')
        ->order_by('id', 'desc')
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }

  public function get_configuracion($id)
  {
    $q= $this
        ->db
        ->select('*')
        ->from('configuracion')
        ->order_by('id_usuario', $id)
        ->get();
    if($q->num_rows() > 0) {
      return $q->result_array();
    }
    return array();
  }
}