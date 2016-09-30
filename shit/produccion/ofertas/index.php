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
  <!-- Select2 -->
  <link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="../css/custom.css" rel="stylesheet">
  <!--DATE TIME CSS-->
  <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css" />
  <!-- bootstrap-wysiwyg -->
  <link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  
  <link href="../css/fileinput.css" rel="stylesheet">

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
              <h3>Registro de Ofertas</h3>
            </div>
            
          </div>
          <div class="clearfix"></div>


          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Datos del producto a ofertar</h2>
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
                  <form class="form-horizontal form-label-left" data-parsley-validate id="formOfertas" name="formOfertas" enctype="multipart/form-data">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <span class="fa fa-text-height form-control-feedback left" aria-hidden="true"></span>
                      <input type="text" name="tituloOferta" class="form-control has-feedback-left" id="tituloOferta" placeholder="Titulo de la Oferta">
                      
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <select name="categoriaOferta" class="select2_single form-control has-feedback-right" tabindex="-1">
                        <option></option>
                        <?php
                        $SQLCat="SELECT * FROM m_categorias WHERE m_categoria_estatus='1' ORDER BY m_categoria_nombre ASC";
                        $queryCat=mysqli_query($link, $SQLCat);
                        while ($rowCat=mysqli_fetch_array($queryCat)) {
                          $m_categoria_id=$rowCat["m_categoria_id"];
                          $m_categoria_nombre=$rowCat["m_categoria_nombre"];

                          ?>
                          <option value="<?=$m_categoria_id?>"><?=$m_categoria_nombre?></option>

                          <?php } ?>


                        </select>

                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <span class="fa fa-subscript form-control-feedback left" aria-hidden="true"></span>
                        <input type="text" class="form-control has-feedback-left numeric" name="cantidadCupones" id="cantidadCupones" placeholder="Cantidad de Cupones Disponibles">

                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <select name="clienteVendedor" class="select2_single cliente form-control has-feedback-right" tabindex="-1">
                          <option></option>
                          <?php
                          $SQLCliente="SELECT * FROM m_clientes WHERE m_cliente_verificado  ='1'  AND m_cliente_tipoCliente='1' AND m_cliente_estatus='1' ORDER BY m_cliente_razonSocial ASC";
                          $queryCliente=mysqli_query($link, $SQLCliente);
                          while ($rowCliente=mysqli_fetch_array($queryCliente)) {
                            $m_cliente_id=$rowCliente["m_cliente_id"];
                            $m_cliente_razonSocial=$rowCliente["m_cliente_razonSocial"];

                            ?>
                            <option value="<?=$m_cliente_id?>"><?=$m_cliente_razonSocial?></option>

                            <?php } ?>


                          </select>

                        </div>




                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <span class="fa fa-calculator form-control-feedback left" aria-hidden="true"></span>
                          <input type="text" class="form-control has-feedback-left" name="porcentajeAhorro" id="porcentajeAhorro" placeholder="Porcentaje del Ahorro (Sin el %)">

                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                          <input type="text" class="form-control has-feedback-left" name="valorCupon" id="valorCupon" placeholder="Valor de cada cupón">

                        </div>




                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                          <input type="text" class="form-control has-feedback-left" name="validoDesde" id="validoDesde" placeholder="Válido Desde">

                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <input type="text" class="form-control has-feedback-left" name="validoHasta" id="validoHasta" placeholder="Válido Hasta">

                        </div>



                      </div>

                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Descripción de la Oferta</h2>
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


                            <div id="alerts"></div>
                            <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                              <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                </ul>
                              </div>
                              <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                  <li>
                                    <a data-edit="fontSize 5">
                                      <p style="font-size:17px">Huge</p>
                                    </a>
                                  </li>
                                  <li>
                                    <a data-edit="fontSize 3">
                                      <p style="font-size:14px">Normal</p>
                                    </a>
                                  </li>
                                  <li>
                                    <a data-edit="fontSize 1">
                                      <p style="font-size:11px">Small</p>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                              <div class="btn-group">
                                <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                              </div>
                              <div class="btn-group">
                                <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                              </div>
                              <div class="btn-group">
                                <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                              </div>
                              <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                <div class="dropdown-menu input-append">
                                  <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                  <button class="btn" type="button">Add</button>
                                </div>
                                <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>

                              </div>


                              <div class="btn-group">
                                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                              </div>
                            </div>

                            <div id="editor">

                            </div>
                            <textarea name="descripcionOferta" id="descripcionOferta" style="display:none;"></textarea>
                            <br />

                            <div class="ln_solid"></div>

                            <input type="hidden" id="descripcion" name="descripcion" value="">
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-6 col-xs-12" style="margin-bottom:30px;">
                       <h2>Fotos de la Oferta</h2>
                       <input type="hidden" name="idsImagenes" id="idsImagenes" value="">
                       <input id="archivos" name="archivos[]" class="file" type="file" multiple data-min-file-count="1" data-upload-url="uploadMedia.php">
                       <div id="errorBlock" class="help-block"></div>

                     </div>




                   </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Estatus Oferta :</label>
                    <div class="radio" id="EstatusRadio">

                     <input type="checkbox" class="js-switch" id="estatus" name="estatus" value="1"/>  
                     <label id="estatusText" for="estatus">Inactivo</label>
                   </div>
                 </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                  <label for="message">Verificación de la Oferta</label>
                  <div class="" id="Estatusverificado">

                    <input type="checkbox" id="verificacion" class="js-switch" name="verificacion" value="1"/> 
                    <label id="verificadoText" for="verificacion">Sin verificar</label>
                  </div>
                </div>
              </div>



              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                  <button type="submit" class="btn btn-success" id="btn_enviar">Guardar</button>
                  <button type="button" onClick="document.location.href='listar.php'" class="btn btn-warning" >Cancelar</button>
                </div>
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

<!-- jQuery -->
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<!--UPLOAD FILES Lib-->
<script src="../js/fileinput.min.js"></script>
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- iCheck -->
<script src="../../vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../js/moment/moment.min.js"></script>

<!-- Switchery -->
<script src="../../vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="../../vendors/select2/dist/js/select2.full.min.js"></script>

<!-- jQuery autocomplete -->
<script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="../js/validate/jquery.validate.js"></script>
<script type="text/javascript" src="../js/jquery.numeric.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../js/custom.js"></script>
<script src="../js/bootstrap-datetimepicker.min.js"></script>
<!--JQuery Price Format -->
<script src="../js/jquery.price_format.2.0.js"></script>

<!-- bootstrap-wysiwyg -->
<script src="../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="../../vendors/google-code-prettify/src/prettify.js"></script>


<script>

$("#archivos").fileinput({
  'showPreview' : true,
  'allowedFileExtensions' : ['jpg', 'png','gif'],

});
$('#archivos').on('fileuploaded', function(event, data, previewId, index) {
  var form = data.form, files = data.files, extra = data.extra,
  response = data.response, reader = data.reader;

  $.each(response, function(index, val) {
    var input = $( "#idsImagenes" );
    input.val( input.val() +","+ val );
  });
})


</script>


<!--FECHAS DESDE Y HASTA -->
<script type="text/javascript">
$(function () {
  $('#validoHasta').datetimepicker();
  $('#validoDesde').datetimepicker();
});
</script>
<!--/FECHAS DESDE Y HASTA -->


<!-- Select2 -->
<script>
$(document).ready(function() {
  $(".select2_single").select2({
    placeholder: "Categoría de la Oferta",
    allowClear: true
  });

  $(".cliente").select2({
    placeholder: "Cliente Ofertante",
    allowClear: true
  });


});
</script>
<!-- /Select2 -->

<!--CAMPO DE PRECIOS-->
<script type="text/javascript">
$('#valorCupon').priceFormat();
</script>
<!--/CAMPO PRECIOS-->






<script type="text/javascript">


$("#EstatusRadio").click(function() {
  if ($('#estatus').prop('checked')) {
   $("#estatusText").html("<b>Activa</b>");
 }
 else{
  $("#estatusText").html("<b>Inactiva</b>");
}
});

$("#Estatusverificado").click(function() {
  if ($('#verificacion').prop('checked')) {
   $("#verificadoText").html("<b>Verificada</b>");
 }
 else{
  $("#verificadoText").html("<b>Sin verificar</b>");
}
});



</script>




<script>
$(function() {

  $("#formOfertas").validate({

    rules: {
      tituloOferta: "required",
      cantidadCupones: "required",
      categoriaOferta: "required",
      porcentajeAhorro: "required",
      valorCupon: "required",
      validoDesde: "required",
      validoHasta: "required",
      descripcionOferta: "required",
      archivos: {
        required: true,
        extension: "jpg|jpeg|png|giv"
      },
      clienteVendedor: "required",
    },

    messages: {
      tituloOferta: "Debe Colocarle un titulo a su oferta",
      cantidadCupones: "Debe especificar la cantidad de cupones a ofertar",
      categoriaOferta: "Debe selecionar una categoría",
      porcentajeAhorro:"DDebe indicar el porentaje de ahorro",
      validoDesde: "Debe especificar desde que fecha es válida su oferta",
      validoHasta: "Debe especificar hasta que fecha es válida su oferta",
      descripcionOferta: "Debe introduccir la descripción de su oferta",
      archivos: {
        required: "Debe agregar las fotos de la oferta",
        extension: "Extensión de archivo no permitida",
      },
      clienteVendedor: "Debe indicar a que cliente pertenece esta oferta",
      valorCupon: "Debe indicar el precio de esta oferta"

    },

    submitHandler: function(form) {
      document.getElementById('descripcion').value = document.getElementById("editor").innerHTML;
      var formData = new FormData($("#formOfertas")[0]);
      $.ajax({
        url: "addOfertas.php",
        type: 'POST',
        enctype: 'multipart/form-data',
        data: formData,
        async: false,
        contentType: "application/json",
        dataType: "json",
        success: function (data) {
         if (data['success']) {
          $("#mensajes").css("z-index", "777");
          $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
          $('#dataMessage').append(data['data']['message']);
          setTimeout(function() { window.location.href = 'listar.php';}, 1000);
        } else{
          $("#mensajes").css("z-index", "888");
          $.each(data['data']['message'], function(index, val) {
            $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
            $('#dataMessage').append(val+ '<br>');
          });
          setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);


        };

      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
      },
      cache: false,
      contentType: false,
      processData: false
    });

}
});

});


</script>

<script type="text/javascript">
$(".numeric").numeric();
$("#remove").click(
  function(e)
  {
    e.preventDefault();
    $(".numeric").removeNumeric();
  }
  );

</script>




<!-- bootstrap-wysiwyg -->
<script>
$(document).ready(function() {
  function initToolbarBootstrapBindings() {
    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
    'Times New Roman', 'Verdana'
    ],
    fontTarget = $('[title=Font]').siblings('.dropdown-menu');
    $.each(fonts, function(idx, fontName) {
      fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
    });
    $('a[title]').tooltip({
      container: 'body'
    });
    $('.dropdown-menu input').click(function() {
      return false;
    })
    .change(function() {
      $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
    })
    .keydown('esc', function() {
      this.value = '';
      $(this).change();
    });

    $('[data-role=magic-overlay]').each(function() {
      var overlay = $(this),
      target = $(overlay.data('target'));
      overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
    });

    if ("onwebkitspeechchange" in document.createElement("input")) {
      var editorOffset = $('#editor').offset();

      $('.voiceBtn').css('position', 'absolute').offset({
        top: editorOffset.top,
        left: editorOffset.left + $('#editor').innerWidth() - 35
      });
    } else {
      $('.voiceBtn').hide();
    }
  }

  function showErrorAlert(reason, detail) {
    var msg = '';
    if (reason === 'unsupported-file-type') {
      msg = "Unsupported format " + detail;
    } else {
      console.log("error uploading file", reason, detail);
    }
    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
      '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
  }

  initToolbarBootstrapBindings();

  $('#editor').wysiwyg({
    fileUploadError: showErrorAlert
  });

  window.prettyPrint;
  prettyPrint();
});
</script>
<!-- /bootstrap-wysiwyg -->
</body>
</html>

