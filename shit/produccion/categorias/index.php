<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();
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
                  <form class="form-horizontal form-label-left" id="formCategoria" name="formCategoria" enctype="multipart/form-data" >

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                      <input type="text" name="nombreCat" class="form-control has-feedback-left" id="nombreCat" placeholder="Nombre de la Categoría">
                      
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                     <span class="fa fa-file-text-o form-control-feedback right" aria-hidden="true"></span>
                     <textarea class="resizable_textarea form-control" name="descripcionCat" id="descripcionCat" placeholder="Descripción de la categoría" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 74px;"></textarea>                
                   </div>






                 </div>

                 <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Ícono :</label>
                    <div class="radio" id="EstatusRadio">
                      <input id="fileIcono" name="fileIcono" class="file" type="file" />

                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Estatus Categoría :</label>
                    <div class="radio" id="EstatusRadio">

                     <input type="checkbox" class="js-switch" id="estatus" name="estatus" value="1"/>  
                     <label id="estatusText" for="estatus">Inactiva</label>
                   </div>
                 </div>
                 
               </div>


               <div class="ln_solid"></div>
               <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
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
      fileIcono: {
        required: true,
        accept: "image/jpeg, image/pjpeg, image/png, image/gif"
      }
    },

    messages: {
      nombreCat: "Debe especificar un nombre para la categoría",
      descripcionCat: "Debe especificar una descrición de la categoría",
      fileIcono: {
        required: "Debe seleccionar un ícono",
        accept: "Solo se permiten imagenes JGP, GIF Y PNG",
      },
    },

    submitHandler: function(form) {

     var formData = new FormData($("#formCategoria")[0]);
     var file = $('#fileIcono').get(0).files[0];
     console.log(file);
     formData.append('file', file);



     $.ajax({
      url: "addCategoria.php",
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
<script>
$('#file-fr').fileinput({
  language: 'fr',
  uploadUrl: '#',
  allowedFileExtensions : ['jpg', 'png','gif'],
});
$('#file-es').fileinput({
  language: 'es',
  uploadUrl: '#',
  allowedFileExtensions : ['jpg', 'png','gif'],
});
$("#file-0").fileinput({
  'allowedFileExtensions' : ['jpg', 'png','gif'],
});
$("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
          return filename.replace('(', '_').replace(']', '_');
        }
      });
    /*
    $(".file").on('fileselect', function(event, n, l) {
        alert('File Selected. Name: ' + l + ', Num: ' + n);
    });
*/
$("#file-3").fileinput({
  showUpload: false,
  showCaption: false,
  browseClass: "btn btn-primary btn-lg",
  fileType: "any",
  previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
});
$("#file-4").fileinput({
  uploadExtraData: {kvId: '10'}
});
$(".btn-warning").on('click', function() {
  if ($('#file-4').attr('disabled')) {
    $('#file-4').fileinput('enable');
  } else {
    $('#file-4').fileinput('disable');
  }
});    
$(".btn-info").on('click', function() {
  $('#file-4').fileinput('refresh', {previewClass:'bg-info'});
});
    /*
    $('#file-4').on('fileselectnone', function() {
        alert('Huh! You selected no files.');
    });
    $('#file-4').on('filebrowse', function() {
        alert('File browse clicked for #file-4');
    });
*/
$(document).ready(function() {
  $("#test-upload").fileinput({
    'showPreview' : false,
    'allowedFileExtensions' : ['jpg', 'png','gif'],
    'elErrorContainer': '#errorBlock'
  });
        /*
        $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
            alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        });
*/
});
</script>

</body>
</html>