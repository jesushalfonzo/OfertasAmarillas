<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("CATEGORIAS", 'EDITAR')){ echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }


if((isset($_GET["idCategory"]))&&($_GET["idCategory"]!="")){ $idCategory=strip_tags(htmlentities($_GET["idCategory"])); } else {echo "<script language='JavaScript'>document.location.href='../index.php';</script>";}




$SQL="SELECT * FROM m_categorias WHERE m_categoria_id='$idCategory'";
$queryCategory=mysqli_query($link, $SQL);
$row=mysqli_fetch_array($queryCategory);
$m_categoria_nombre=$row["m_categoria_nombre"];
$m_categoria_descripcion=$row["m_categoria_descripcion"];
$m_categoria_estatus=$row["m_categoria_estatus"];
$m_categoria_icono=$row["m_categoria_icono"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../common_head.php"); ?>

  <!-- Switchery -->
  <link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../js/fileinput.js" type="text/javascript"></script>
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
            <div class="title_left">
              <h3>Agregar Categoría</h3>
            </div>
            
          </div>
          <div class="clearfix"></div>


          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Categorías para disponible para publicaciones</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div id="mensajes">

                </div>
                <div class="x_content">


                  <br />
                  <form class="form-horizontal form-label-left" id="formCategoria" name="formCategoria">
                    <input type="hidden" name="idCategory" id="idCategory" value="<?=$idCategory?>" />
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                      <input type="text" name="nombreCat" class="form-control has-feedback-left" id="nombreCat" placeholder="Nombre de la Categoría" value="<?=$m_categoria_nombre?>">
                      
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                     <span class="fa fa-file-text-o form-control-feedback right" aria-hidden="true"></span>
                     <textarea class="resizable_textarea form-control" name="descripcionCat" id="descripcionCat" placeholder="Descripción de la categoría" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 74px;"><?=$m_categoria_descripcion?></textarea>                
                   </div>

                 </div>

                 <div class="form-group">



                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Ícono : <img src="../../../multimedia/iconos/<?=$m_categoria_icono?>" style="background-color:#5F5F5F; width: 25%; height: 25%"></label>
                    <div class="radio" id="EstatusRadio">

                      <input id="fileIcono" name="fileIcono" class="file" type="file" />

                    </div>
                  </div>


                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Estatus Categoría :</label>
                    <div class="radio" id="EstatusRadio">

                     <input type="checkbox" class="js-switch" id="estatus" name="estatus" value="1"  <?php if($m_categoria_estatus){ echo "checked='checked'"; } ?>/>  
                     <label id="estatusText" for="estatus"><?php if($m_categoria_estatus){ echo "Activo"; } else{ echo "Inactivo"; }?></label>
                   </div>
                 </div>
                 
               </div>


               <div class="ln_solid"></div>
               <div class="form-group" >
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" style="margin-top:20px;">
                  <button type="button" class="btn btn-primary" onClick="document.location.href='listar.php'">Cancelar</button>
                  <button type="submit" class="btn btn-success" id="btn_enviar">Guardar</button>
                </div>
              </div>

            </form>
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
<?php include("../common_libraries.php"); ?>

<!--LIBRERIAS INDIVIDUALES NO COMUNES-->

<!-- Switchery -->
<script src="../../vendors/switchery/dist/switchery.min.js"></script>

<script src="../js/validate/jquery.validate.js"></script>
<!-- Autosize -->
<script src="../../vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->  <script>
autosize($('.resizable_textarea'));
</script>

<script type="text/javascript">


$("#EstatusRadio").click(function() {
  if ($('#estatus').prop('checked')) {
   $("#estatusText").html("<b>Activa</b>");
 }
 else{
  $("#estatusText").html("<b>Inactiva</b>");
}
});


</script>


<script>
$(function() {

  $("#formCategoria").validate({

    rules: {
      nombreCat: "required",
      descripcionCat: "required",
    },

    messages: {
      nombreCat: "Debe especificar un nombre para la categoría",
      descripcionCat: "Debe especificar una descrición de la categoría",
    },

    submitHandler: function(form) {

     var formData = new FormData($("#formCategoria")[0]);
     var file = $('#fileIcono').get(0).files[0];
     console.log(file);
     formData.append('file', file);
     $.ajax({
      url: "updateCategory.php",
      type: 'POST',
      enctype: 'multipart/form-data',
      data: formData,
      async: false,
      contentType: "application/json",
      dataType: "json",
      success: function (data) {
       if (data['success']) {
        $("#mensajes").css("z-index", "999");
        $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
        $('#dataMessage').append(data['data']['message']);
        setTimeout(function() { window.location.href = 'listar.php';}, 1000);
      } else{
        alert("ss");
        $("#mensajes").css("z-index", "999");
        $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
        $.each(data['data']['message'], function(index, val) {
          $('#dataMessage').append(val+ '<br>');
        });
        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
        

      };

    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    } ,
    cache: false,
    contentType: false,
    processData: false
  });

}
});

});


</script>

</body>
</html>