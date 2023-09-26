<?php 
function contact_page_content_callback(){
	$wp_editor_settings = array( 
		'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), // note that spaces in this list seem to cause an issue
		'textarea_rows'=> 2
	);    
	if( isset( $_POST['sh_save'] ) && !empty( $_POST['sh_save']) ){
		foreach ($_POST as $key => $value) {
			if(in_array($key,['home_sec_one_content','home_sec_three_content','home_sec_four_content','home_sec_seven_content','home_sec_eight_content'])){
				$value = stripcslashes($value);
			}			
			update_option( $key, $value);
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 bg-col12">
			<!-- Top Navigation -->
			<header class="codrops-header">
				<br>
				<h1 class="text-center sh-title">إعدادات صفحة تواصل معنا </h1>
				<br>
			</header>
		</div>

		<div class="col-sm-12 gray_back">
	  		<form class="form-horizontal" method="post" action="#">
	  			
	        	<div class="form-group">
					<label for="contact_title" class="col-sm-6 control-label">العنوان </label>
					<div class="col-sm-12">
						<input type="text" class="form-control" id="contact_title" name="contact_title" value="<?php echo get_option('contact_title'); ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="contact_content" class="col-sm-6 control-label">المحتوي </label>
					<div class="col-sm-12">
                        <?php wp_editor( get_option('contact_content'), 'contact_content',  array('textarea_rows'=>5,'textarea_name'=> 'contact_content', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'contact_content','class'=>'form-control',) );  ?>
					</div>
				</div>
        
	        	<div class="form-group">
					<label for="company_name" class="col-sm-6 control-label">اسم الشركة </label>
					<div class="col-sm-12">
						<input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo get_option('company_name'); ?>">
					</div>
				</div>                        
	        
	        	<div class="form-group">
					<label for="company_address" class="col-sm-6 control-label">عنوان الشركة </label>
					<div class="col-sm-12">
						<input type="text" class="form-control" id="company_address" name="company_address" value="<?php echo get_option('company_address'); ?>">
					</div>
				</div>
						
				<div class="form-group">

					<div class="col-sm-12">

					<input type="submit" class="btn btn-default btn-block btn-lg sh_save_route" name="sh_save" value="حفظ الإعدادات">

					</div>

				</div>

			</form>

	 	</div>

	</div>
</div><!-- /container -->
<?php
}