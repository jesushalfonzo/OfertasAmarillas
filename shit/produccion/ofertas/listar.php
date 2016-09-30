<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();


//DATOS PARA EL BUSCADOR
$cantidadResultados=$_POST["cantidadMostrar"];
$titulo=$_POST["titulo"];
$categoriaId=$_POST["categoriaId"];
$clienteId=$_POST["clienteId"];
$estatus=$_POST["estatus"];


if ($cantidadResultados=="") {
  $SQL="SELECT * FROM m_ofertas, m_clientes WHERE m_ofertas.m_oferta_idCliente = m_clientes.m_cliente_id ORDER BY m_oferta_estusActivado ASC LIMIT 0,20";
}
else{
  $SQL="SELECT * FROM m_ofertas, m_clientes WHERE m_ofertas.m_oferta_idCliente = m_clientes.m_cliente_id ";
  if ($titulo!="") {
   $SQL.=" AND CONCAT( m_oferta_titulo, '', m_oferta_descripcion)LIKE '%$titulo%'";
 }
 if ($categoriaId!="") {
   $SQL.=" AND m_oferta_idCategoria='$categoriaId'";
 }
 if ($clienteId!="") {
   $SQL.=" AND m_oferta_idCliente='$clienteId'";
 }
 if ($estatus!='x') {
   $SQL.=" AND m_oferta_estusActivado='$estatus'";
 }
 if ($cantidadResultados!="") {
   $SQL.=" LIMIT 0,$cantidadResultados";
 }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../common_head.php"); ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <?php include("../common_menu.php");?>
      </div>

      <!-- top navigation -->
      <?php include("../common_topNavigation.php"); ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left" style="width:20%;">
              <h3>Ofertas <small>En Orden de Estatus</small></h3>
            </div>
            <div id="mensajes"></div>
            <div class="title_right" style="width:80%;">
              <div class="col-md-12 col-sm-5 col-xs-12 form-group  top_search">

                <div class="container">
                  <div class="row">
                    <div id="filter-panel" class="collapse filter-panel">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <form class="form-inline" role="form" action="listar.php"  method="post">
                            <div class="form-group">
                              <label class="filter-col" style="margin-right:0;" for="pref-perpage">Mostrar:</label>
                              <select id="pref-perpage" class="form-control" name="cantidadMostrar">
                                <option value="10" <?php if($cantidadResultados==10){ echo "selected='selected'";}?> >10</option>
                                <option value="20" <?php if($cantidadResultados==20){ echo "selected='selected'";}?> >20</option>
                                <option value="30" <?php if($cantidadResultados==30){ echo "selected='selected'";}?> >30</option>
                                <option value="40" <?php if($cantidadResultados==40){ echo "selected='selected'";}?> >40</option>
                                <option value="50" <?php if($cantidadResultados==50){ echo "selected='selected'";}?> >50</option>
                                <option value="60" <?php if($cantidadResultados==60){ echo "selected='selected'";}?> >60</option>
                                <option value="70" <?php if($cantidadResultados==70){ echo "selected='selected'";}?> >70</option>
                                <option value="80" <?php if($cantidadResultados==80){ echo "selected='selected'";}?> >80</option>
                                <option value="90" <?php if($cantidadResultados==90){ echo "selected='selected'";}?> >90</option>
                                <option value="100" <?php if($cantidadResultados==100){ echo "selected='selected'";}?> >100</option>
                                <option value="200" <?php if($cantidadResultados==200){ echo "selected='selected'";}?> >200</option>
                                <option value="300" <?php if($cantidadResultados==300){ echo "selected='selected'";}?> >300</option>
                                <option value="400" <?php if($cantidadResultados==400){ echo "selected='selected'";}?> >400</option>
                              </select>                                
                            </div> <!-- form group [rows] -->
                            <div class="form-group">
                              <label class="filter-col" style="margin-right:0;" for="pref-search">titulo:</label>
                              <input type="text" class="form-control input-sm" id="pref-search" name="titulo" value="<?=$titulo?>">
                            </div><!-- form group [search] -->
                            <div class="form-group">
                              <label class="filter-col" style="margin-right:0;" for="pref-orderby">Categoría:</label>
                              <select id="pref-orderby" class="form-control" name="categoriaId">
                               <option value="">Todas</option>
                               <?php
                               $SQLCat="SELECT * FROM m_categorias WHERE m_categoria_estatus='1' ORDER BY m_categoria_nombre ASC";
                               $queryCat=mysqli_query($link, $SQLCat);
                               while ($rowCat=mysqli_fetch_array($queryCat)) {
                                $m_categoria_id=$rowCat["m_categoria_id"];
                                $m_categoria_nombre=$rowCat["m_categoria_nombre"];

                                ?>
                                <option value="<?=$m_categoria_id?>" <?php if($m_categoria_id==$categoriaId){echo "selected";}?>><?=$m_categoria_nombre?></option>

                                <?php } ?>
                              </select>                                
                            </div> <!-- form group [order by] --> 
                            <div class="form-group">
                              <label class="filter-col" style="margin-right:0;" for="pref-orderby">Cliente:</label>
                              <select id="pref-orderby" class="form-control" name="clienteId">
                                <option value="">Todos</option>
                                <?php
                                $SQLCliente="SELECT * FROM m_clientes WHERE m_cliente_verificado  ='1'  AND m_cliente_tipoCliente='1' AND m_cliente_estatus='1' ORDER BY m_cliente_razonSocial ASC";
                                $queryCliente=mysqli_query($link, $SQLCliente);
                                while ($rowCliente=mysqli_fetch_array($queryCliente)) {
                                  $m_cliente_id=$rowCliente["m_cliente_id"];
                                  $m_cliente_razonSocial=$rowCliente["m_cliente_razonSocial"];

                                  ?>
                                  <option value="<?=$m_cliente_id?>" <?php if($m_cliente_id==$clienteId){ echo "selected";} ?>><?=$m_cliente_razonSocial?></option>

                                  <?php } ?>
                                </select>                                
                              </div> <!-- form group [order by] --> 
                              <div class="form-group">
                                <label class="filter-col" style="margin-right:0;" for="pref-orderby">Estatus:</label>
                                <select id="pref-orderby" class="form-control" name="estatus">
                                  <option value="x"<?php if($estatus=='x'){ echo "selected";} ?>>Todos</option>
                                  <option value="1" <?php if($estatus=='1'){  echo "selected"; } ?> >Activo</option>
                                  <option value="0"  <?php if($estatus=='0'){  echo "selected"; } ?> >Inactivo</option>

                                </select>                                
                              </div> <!-- form group [order by] --> 
                              <div class="form-group">    

                                <button type="submit" class="btn btn-default filter-col">
                                  <span class="glyphicon glyphicon-search"></span> Buscar
                                </button>  
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>    
                      <button type="button" style="display:none;" class="btn btn-primary" id="buscador" data-toggle="collapse" data-target="#filter-panel">
                        <span class="glyphicon glyphicon-cog"></span> Buscador Avanzado
                      </button>
                    </div>
                  </div>

                </div> 
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Mostrando todas las ofertas </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <!-- start project list -->
                  <table class="table table-striped projects">
                   <thead>
                    <tr>
                      <th style="width: 1%">#</th>
                      <th style="width: 20%">Titulo Oferta</th>
                      <th>Cliente</th>
                      <th>Porcentaje de Cupones vendidos</th>
                      <th>Estatus</th>
                      <th style="width: 20%">#Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //$SQL="SELECT * FROM m_ofertas, m_clientes WHERE m_ofertas.m_oferta_idCliente = m_clientes.m_cliente_id ORDER BY m_oferta_estusActivado ASC LIMIT 0,20";
                    $query=mysqli_query($link, $SQL);
                    while ($row=mysqli_fetch_array($query)) {
                      $m_oferta_id=$row["m_oferta_id"];
                      $m_oferta_titulo=$row["m_oferta_titulo"];
                      $m_oferta_cantidad=$row["m_oferta_cantidad"];
                      $m_oferta_fechaInicio=$row["m_oferta_fechaInicio"];
                      $m_oferta_fechaFin=$row["m_oferta_fechaFin"];
                      $fechaInicioMostar=date("d/m/Y h:i A", strtotime($m_oferta_fechaInicio));
                      $fechaFinMostrar=date("d/m/Y h:i A", strtotime($m_oferta_fechaFin));
                      $m_oferta_estusActivado=$row["m_oferta_estusActivado"];
                      $m_oferta_estatusVerificado=$row["m_oferta_estatusVerificado"];
                      $m_cliente_razonSocial=$row["m_cliente_razonSocial"];


                      $vendidosSQL="SELECT COUNT(*) AS vendidos FROM m_ventas WHERE m_venta_idOferta='$m_oferta_id'";
                      $queryCount=mysqli_query($link, $vendidosSQL);
                      $rowventas=mysqli_fetch_array($queryCount);
                      $cantidadVendidos=$rowventas["vendidos"];
                      $porcentaje=round(($cantidadVendidos/$m_oferta_cantidad)*100); //porcentaje 

                      $fechaHoy=date('Y-m-d H:i:s');


                      if ($m_oferta_estusActivado AND $m_oferta_estatusVerificado) {
                        if ($m_oferta_fechaInicio <= $fechaHoy AND $m_oferta_fechaFin > $fechaHoy) {
                          $status="Activa";
                          $clase="success";
                        }
                        elseif ($m_oferta_fechaInicio > $fechaHoy AND $m_oferta_fechaFin > $fechaHoy) {
                         $status="Por Iniciar";
                         $clase="info";
                       }
                       elseif ($m_oferta_fechaInicio < $fechaHoy AND $m_oferta_fechaFin < $fechaHoy) {
                        $status="Vencida";
                        $clase="default";
                      }
                    }
                    elseif (!$m_oferta_estusActivado) {
                      $status="Desactivada";
                      $clase="warning";
                    }
                    elseif (!$m_oferta_estatusVerificado) {
                     $status="Sin Verificar";
                     $clase="danger";
                   }



                  ?>
                  <tr id="Oferta<?=$m_oferta_id?>">
                    <td>#</td>
                    <td>
                      <a><?=$m_oferta_titulo?></a>
                      <br />
                      <small>Activa desde <?=$fechaInicioMostar?></a></small>
                      <br>
                      <small>Activa Hasta <?=$fechaFinMostrar?></a></small>
                    </td>
                    <td>
                      <ul class="list-inline">
                        <li>
                          <img src="../images/user.png" class="avatar" alt="Avatar">
                        </li>
                        <li>
                          <?=$m_cliente_razonSocial?>
                        </li>

                      </ul>
                    </td>
                    <td class="project_progress">
                      <div class="progress progress_sm">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$porcentaje?>"></div>
                      </div>
                      <small><?=$porcentaje?>% Vendidos</small>
                    </td>
                    <td>
                      <button type="button" class="btn btn-<?=$clase?> btn-xs"><?=$status?></button>
                    </td>
                    <td>
                      <a href="../ventas/index.php?id=<?=$m_oferta_id?>" class="btn btn-primary btn-xs"><i class="fa fa-tag"></i> Ventas </a>
                      <a href="editOferta.php?id=<?=$m_oferta_id?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>


                      <?php if (control_access("OFERTAS", 'ELIMINAR')) { ?>
                      <button type="button" class="btn btn-danger btn-xs" data-id="<?=$m_oferta_id?>" data-accion="Eliminar" data-title="Seguro que desea Eliminar?" data-trigger="focus" data-on-confirm="deleteOferta" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-cancel-label="Cancelar!" data-placement="top" title="Seguro que desea Eliminar?">  <i class="fa fa-trash-o"> </i> Eliminar</button>
                      <?php } ?>

                      
                    </td>
                  </tr>

                  <?php } ?>
                </tbody>
              </table>
              <!-- end project list -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

  <!-- footer content -->
  <?php include("../common_footer.php"); ?>
  <!-- /footer content -->
</div>
</div>

<!--LIBRERIAS COMUNES-->
<!-- jQuery -->
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- NProgress -->
<script src="../../vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../js/custom.js"></script>

<script src="../js/bootstrap-confirmation.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
  $( "#buscador" ).click();
});
</script>

<script>

$('[data-toggle=confirmation]').confirmation();

function deleteOferta(){

  var id = $(this).data('id');

  $.ajax({
    url: "deleteOferta.php",
    type: 'GET',
    enctype: 'multipart/form-data',
    data: "idOferta="+id,
    async: false,
    contentType: "application/json",
    dataType: "json",
    success: function (data) {
      if (data['success']) {
        $( "#Oferta"+id  ).slideUp();
        $("#mensajes").css("z-index", "999");
        $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
        $('#dataMessage').append(data['data']['message']);
        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
      }
      else{
        $("#mensajes").css("z-index", "999");
        $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
        $.each(data['data']['message'], function(index, val) {
          $('#dataMessage').append(val+ '<br>');
        });
        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 4000);
      }
    },
    error: function(data) {
     $("#mensajes").css("z-index", "777");
     $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
     $.each(data['data']['message'], function(index, val) {
      $('#dataMessage').append(val+ '<br>');
    });
     setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
   },
   cache: false,
   contentType: false,
   processData: false

 });


};

$(".editando").click(function (e) {
  var idEditar=$(this).data('id');

  window.location.href = 'editCliente.php?idCliente='+idEditar;
});

$(".viendo").click(function (e) {
  var idVer=$(this).data('id');
  window.location.href = 'verCliente.php?idCliente='+idVer;
});


</script>
</body>
</html>

