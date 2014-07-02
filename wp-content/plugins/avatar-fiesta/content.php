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
			$token 		= $this->tokenUser();
			$path  		= 'C:/xampp/htdocs/ff2014/wp-content/uploads/temporales';
			$name_token	= $token.'.'.$ext;
			$url_img	= $path.'/'.$token.'.'.$ext;

			if (move_uploaded_file($_FILES['imguser']['tmp_name'],$url_img )) {
				echo "Imagen Cargada con Exito.\n";

				$this->marca($url_img,'C:\xampp\htdocs\ff2014\wp-content\themes\feria\images\222.png',$token,$ext);
				$valid = true;
			} else {
				echo "Lo sentimos su imagen no fue cargada, vuelva a intentarlo.\n";
			}
		} 
	}
}
?>
<div>
	<div id="avatar">
				<div class="img-user"> 
					<img id="target3" class="crop_me" alt=""  src="<?php echo WP_CONTENT_URL.'/uploads/temporales/'.$name_token ?>" >
				</div>
				<?php if($valid) { ?>
				<div class="img-marco">
					<img width="400" height="400" src="<?php echo WP_CONTENT_URL.'/themes/feria/images/222.png' ?> " >
				</div>
				<?php } ?>
	</div>
	<div> 
		<form enctype="multipart/form-data" action="" method="POST">
			<input type="file" name="imguser" >
			<input type="submit" value="Cargar">
		</form>
	</div>			
		<!-- <article>
			<header></header>
			<section>
				<div class="img-user">
					<img id="target3" class="crop_me" alt=""  src="<?php echo WP_CONTENT_URL.'/uploads/temporales/'.$name_token ?>" >
				</div>
				<?php if($valid) { ?>
					<div class="img-marco">
					<img src="<?php echo WP_CONTENT_URL.'/themes/feria/images/margen-default.png' ?> " >
				</div>
				<?php } ?>
			</section>
			<footer>
				<div class="ctrs"> controles </div>
				<div> 
					<form enctype="multipart/form-data" action="" method="POST">
						<input type="file" name="imguser" >
						<input type="submit" value="Cargar">
					</form>
				</div>
			</footer>
		</article> -->
	</div>
</div> 
	<!-- <img id="target3" class="crop_me" alt=""  src="<?php echo WP_CONTENT_URL.'/uploads/temporales/111.jpg' ?>" />
		<div id="results">
		<b>X</b>: <span id="crop_x"></span><br />
		<b>Y</b>: <span id="crop_y"></span><br />
		<b>W</b>: <span id="crop_w"></span><br />
		<b>H</b>: <span id="crop_h"></span><br />
	</div> -->