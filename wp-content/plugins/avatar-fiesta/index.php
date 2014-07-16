<?php

$valid = false;
if( isset($_FILES['imguser'] ) )
{
    if (!isset($_FILES['imguser']['error']) ||
        is_array($_FILES['imguser']['error']) ) 
    {
        throw new RuntimeException('Invalid parameters.');
    }
    else
    {
        $ext = $this->getExt($_FILES['imguser']['type']);  
        if( $ext === null )
        {
            echo 'Formato de imagen no valido';
        }
        else
        {
            $token      = $this->tokenUser();
            $path       = 'C:/xampp/htdocs/ff2014/wp-content/uploads/temporales';
            $name_token = $token.'.'.$ext;
            $url_img    = $path.'/'.$token.'.'.$ext;

            if (move_uploaded_file($_FILES['imguser']['tmp_name'],$url_img )) {
                echo "Imagen Cargada con Exito.\n";

                //$this->marca($url_img,'C:\xampp\htdocs\ff2014\wp-content\themes\feria\images\222.png',$token,$ext);
                $valid = true;
            } else {
                echo "Lo sentimos su imagen no fue cargada, vuelva a intentarlo.\n";
            }
        } 
    }
}
?>
<script>
      
</script>
<div class="clearfix row-fluid">
    <div class="selfie-infobox span12" >
       <span>¡Publica tu selfie de la Feria en solo tres sencillos pasos !</span>
    </div>
    <div class="span12">
        <span><h1>1. Sube tu Selfie </h1></span>
        <div class="selfie-info span11">
            <p>Recuerda que tu selfie debe cumplir con normas minimas para ser subido
                Tu selfie no podra tener contenidos explicitos de sexo y/o violencia
                Tu selfie no podra hacer alusion a compañias, marcas y/o movimientos politicos. Aunque 
                paradojicamente te llenaremos el marco hasta el cuello, en publicidad de la alcaldia
                y la gobernacion .
                Los sefies que incumplan con estas reglas seran borrados del sitio oficial de la feria.</p>
                todo billete falso se rompe</p>
        </div>
    </div>
    <div id="avatar" class="span11">
        <div class="img-user"> 
            <img id="target3" class="crop_me" alt=""  src="<?php echo WP_CONTENT_URL.'/uploads/temporales/'.$name_token ?>" >
        </div>
        <?php if($valid) { ?>
    <!--    <div class="img-marco">
            <img width="400" height="400" src="<?php echo WP_CONTENT_URL.'/themes/feria/images/222.png' ?> " > 
        </div>-->
        <?php } ?>
    </div>
    <div id="selfie-form" class="span11">
        <?php
           if ( $valid ) :
        ?>
<!--
       <div class="selfie-confirm" class="span12">
           <form id="form-selfie" enctype="multipart/form-data" action="" method="POST">
                <input type="file" name="imguser" >
                <input type="hidden" name="crop_x" value="<? echo $_POST['crop_x'] ?>">
                <input type="hidden" name="crop_y" value="<? echo $_POST['crop_y'] ?>">
                <input type="hidden" name="crop_w" value="<? echo $_POST['crop_w'] ?>">
                <input type="hidden" name="crop_h" value="<? echo $_POST['crop_h'] ?>">
                <input type="submit" name="acept"  value="Cargar">
           </form> 
        </div> -->
        <?php endif ; ?>
        <div class="sube" class="span11">
            <h2><?php if(!$valid) 
                        { 
                            echo 'Tomar Sefie';
                         } 
                        else 
                        { 
                           echo 'Utilizar Otro Selfie' ;
                         } 
            ?></h2>


            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Select files...</span>
                <!-- The file input field used as target for the file upload widget -->
                <input id="fileupload" type="file" name="files[]" multiple>
            </span>
            <br>
            <br>
            <!-- The global progress bar -->
            <div id="progress" class="progress">
                <div class="bar"></div>
            </div>
            <!-- The container for the uploaded files -->
            <div id="files" class="files"></div>

        <!--
            <form id="form-selfie" enctype="multipart/form-data" action="" method="POST">
                <input type="file" name="imguser" >
                <input type="hidden" name="crop_x" value="<? //echo $_POST['crop_x'] ?>">
                <input type="hidden" name="crop_y" value="<? //echo $_POST['crop_y'] ?>">
                <input type="hidden" name="crop_w" value="<? //echo $_POST['crop_w'] ?>">
                <input type="hidden" name="crop_h" value="<? //echo $_POST['crop_h'] ?>">
                <input type="submit" name="acept" value="Cargar">
            </form> -->
        </div>
    </div>
</div>          