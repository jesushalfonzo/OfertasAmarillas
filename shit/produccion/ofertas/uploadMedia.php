<?php
include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("OFERTAS", 'AGREGAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION";  echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }


// upload.php
// 'images' refers to your file input name attribute


$idOferta = empty($_POST['idOferta']) ? '0' : $_POST['idOferta'];

if (empty($_FILES['archivos']) AND $idOferta==0) {
    echo json_encode(['error'=>'No hay archivos para cargar']); 
    // or you can throw an exception 
    return; // terminate
}

// get the files posted
$images = $_FILES['archivos'];


$success = null;

// file paths to store
$paths= [];

// get file names
$filenames = $images['name'];

// loop and process files
for($i=0; $i < count($filenames); $i++){
    $ext = explode('.', basename($filenames[$i]));
    $target = "uploads" . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);
    if(move_uploaded_file($images['tmp_name'][$i], $target)) {
        $success = true;
        $nameFile = str_replace("uploads/", "", $target);

        $SQL="INSERT INTO r_medias (r_media_id, r_media_idOferta, r_media_path) VALUES (Null, '$idOferta', '$nameFile')";
        $query=mysqli_query($link, $SQL);
        $lasid=mysqli_insert_id($link);

        $paths[] = $lasid;
    } else {
        $success = false;
        break;
    }
}

// check and process based on successful status 
if ($success === true) {
    // call the function to save all data to database
    // code for the following function `save_data` is not 
    // mentioned in this example
    //save_data($userid, $username, $paths);

//$output = ['SHIT'=>'JODETE'];
    // store a successful response (default at least an empty array). You
    // could return any additional response info you need to the plugin for
    // advanced implementations.
    //$output = [];
    // for example you can get the list of files uploaded this way
     $output = ['uploaded' => $paths];


} elseif ($success === false) {
    $output = ['error'=>'Error while uploading images. Contact the system administrator'];
    // delete any uploaded files
    foreach ($paths as $file) {
        unlink($file);
    }
} else {
    //$output = ['error'=>'No files were processed.'];
}

// return a json encoded response for plugin to process successfully
echo json_encode($output);

?>