<?php 
function home_page_content_callback(){
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
				<h1 class="text-center sh-title">إعدادات الصفحة الرئيسية</h1>
				<br>
			</header>
		</div>

		<div class="col-sm-3 pr-0">

			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

				<a class="nav-link active" id="v-pills-firstsection-tab" data-toggle="pill" href="#v-pills-firstsection" role="tab" aria-controls="v-pills-firstsection" aria-selected="true">محتوى السكشن الاول </a>

				<a class="nav-link" id="v-pills-secondsection-tab" data-toggle="pill" href="#v-pills-secondsection" role="tab" aria-controls="v-pills-secondsection" aria-selected="true">محتوى السكشن الثانى</a>

				<a class="nav-link" id="v-pills-thirdsection-tab" data-toggle="pill" href="#v-pills-thirdsection" role="tab" aria-controls="v-pills-thirdsection" aria-selected="true">محتوى السكشن الثالث</a>
				
				<a class="nav-link" id="v-pills-fourthsection-tab" data-toggle="pill" href="#v-pills-fourthsection" role="tab" aria-controls="v-pills-fouthsection" aria-selected="true">محتوى السكشن الرابع</a>

				<a class="nav-link" id="v-pills-fifthsection-tab" data-toggle="pill" href="#v-pills-fifthsection" role="tab" aria-controls="v-pills-fifthsection" aria-selected="true">محتوى السكشن الخامس</a>

				<a class="nav-link" id="v-pills-sixthsection-tab" data-toggle="pill" href="#v-pills-sixthsection" role="tab" aria-controls="v-pills-sixthsection" aria-selected="true">محتوى السكشن السادس</a>

				<a class="nav-link" id="v-pills-seventhsection-tab" data-toggle="pill" href="#v-pills-seventhsection" role="tab" aria-controls="v-pills-seventhsection" aria-selected="true">محتوى السكشن السابع </a>

			</div>

		</div>

		<div class="col-sm-9 gray_back">

	  		<form class="form-horizontal" method="post" action="#">

			    <div class="tab-content" id="v-pills-tabContent">

			        <div class="tab-pane fade show active" id="v-pills-firstsection" role="tabpanel" aria-labelledby="v-pills-firstsection-tab">			        
			        	<div class="form-group">
							<label for="home_sec_one_title" class="col-sm-6 control-label">عنوان السكشن الاول </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="home_sec_one_title" name="home_sec_one_title" value="<?php echo get_option('home_sec_one_title'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="home_sec_one_content" class="col-sm-6 control-label">محتوى السكن الاول</label>
							<div class="col-sm-12">
                                <?php wp_editor( get_option('home_sec_one_content'), 'home_sec_one_content',  array('textarea_rows'=>5,'textarea_name'=> 'home_sec_one_content', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'home_sec_one_content','class'=>'form-control',) );  ?>
							</div>
						</div>

                        <div class="form-group">
							<label for="home_sec_one_number" class="col-sm-6 control-label">عدد الخدمات التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">

								<input type="number" class="form-control" id="home_sec_one_number" name="home_sec_one_number" value="<?php echo get_option('home_sec_one_number'); ?>">
							</div>
						</div>
                        
					</div>

					<!-- ======================================================= -->

					<div class="tab-pane fade show" id="v-pills-secondsection" role="tabpanel" aria-labelledby="v-pills-secondsection-tab">			        
			        	<div class="form-group">
							<label for="home_sec_two_title" class="col-sm-6 control-label">عنوان السكشن الثاني</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="home_sec_two_title" name="home_sec_two_title" value="<?php echo get_option('home_sec_two_title'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="home_sec_two_number" class="col-sm-6 control-label">عدد المنتجات التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">

								<input type="number" class="form-control" id="home_sec_two_number" name="home_sec_two_number" value="<?php echo get_option('home_sec_two_number'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="home_sec_two_products" class="col-sm-6 control-label">إختر تصنيف المنتجات : </label>
							<div class="col-sm-12">
								<select class="form-control" id="home_sec_two_products" name="home_sec_two_products" >

									<?php $product_cat = get_terms( array('taxonomy' => 'product_cat','exclude' => array('15'),'hide_empty' => false) ); ?>

									<option value="array();">كل التصنيفات </option>

									<?php foreach($product_cat as $product) : ?>

									<option value="<?= $product->term_id; ?>" <?php echo $product->term_id == get_option('home_sec_two_products') ? 'selected' : ''; ?> > <?= $product->name; ?></option>

									<?php endforeach; ?>

								</select>
							</div>
						</div>                        
					</div>

					<!-- ======================================================== -->

					<div class="tab-pane fade show" id="v-pills-thirdsection" role="tabpanel" aria-labelledby="v-pills-thirdsection-tab">			        
			        	<div class="form-group">
							<label for="home_sec_three_title" class="col-sm-6 control-label">عنوان السكشن الثالث</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="home_sec_three_title" name="home_sec_three_title" value="<?php echo get_option('home_sec_three_title'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="home_sec_three_content" class="col-sm-6 control-label">محتوى السكن الثاث</label>
							<div class="col-sm-12">
                                <?php wp_editor( get_option('home_sec_three_content'), 'home_sec_three_content',  array('textarea_rows'=>5,'textarea_name'=> 'home_sec_three_content', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'home_sec_three_content','class'=>'form-control',) );  ?>
							</div>
						</div>
                        
					</div>

					<!-- ======================================================== -->

					<div class="tab-pane fade show" id="v-pills-fourthsection" role="tabpanel" aria-labelledby="v-pills-fourthsection-tab">			        
			        	<div class="form-group">
							<label for="home_sec_four_title" class="col-sm-6 control-label">عنوان السكشن الرابع </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="home_sec_four_title" name="home_sec_four_title" value="<?php echo get_option('home_sec_four_title'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="home_sec_four_content" class="col-sm-6 control-label">محتوى السكن الرابع</label>
							<div class="col-sm-12">
                                <?php wp_editor( get_option('home_sec_four_content'), 'home_sec_four_content',  array('textarea_rows'=>5,'textarea_name'=> 'home_sec_four_content', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'home_sec_four_content','class'=>'form-control',) );  ?>
							</div>
						</div>
                        
					</div>

					<!-- ======================================================== -->

					<div class="tab-pane fade show" id="v-pills-fifthsection" role="tabpanel" aria-labelledby="v-pills-fifthsection-tab">			        
			        	<div class="form-group">
							<label for="home_sec_five_title" class="col-sm-6 control-label">عنوان السكشن الخامس  </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="home_sec_five_title" name="home_sec_five_title" value="<?php echo get_option('home_sec_five_title'); ?>">
							</div>
						</div>
                        <div class="form-group">
							<label for="home_sec_five_number" class="col-sm-6 control-label">عدد المنتجات التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">

								<input type="number" class="form-control" id="home_sec_five_number" name="home_sec_five_number" value="<?php echo get_option('home_sec_five_number'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="home_sec_five_products" class="col-sm-6 control-label">إختر تصنيف المنتجات : </label>
							<div class="col-sm-12">
								<select class="form-control" id="home_sec_five_products" name="home_sec_five_products" >

									<?php $product_cat = get_terms( array('taxonomy' => 'product_cat','exclude' => array('15'),'hide_empty' => false) ); ?>

									<option value="array();">كل التصنيفات </option>

									<?php foreach($product_cat as $product) : ?>

									<option value="<?= $product->term_id; ?>" <?php echo $product->term_id == get_option('home_sec_five_products') ? 'selected' : ''; ?> > <?= $product->name; ?></option>

									<?php endforeach; ?>

								</select>
							</div>
						</div> 
					</div>

					<!-- ======================================================== -->

					<div class="tab-pane fade show" id="v-pills-sixthsection" role="tabpanel" aria-labelledby="v-pills-sixthsection-tab">			        
			        	<div class="form-group">
							<label for="home_sec_six_title" class="col-sm-6 control-label">عنوان السكشن السادس</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="home_sec_six_title" name="home_sec_six_title" value="<?php echo get_option('home_sec_six_title'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="home_sec_six_content" class="col-sm-6 control-label">محتوى السكن السادس</label>
							<div class="col-sm-12">
                                <?php wp_editor( get_option('home_sec_six_content'), 'home_sec_six_content',  array('textarea_rows'=>5,'textarea_name'=> 'home_sec_six_content', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'home_sec_six_content','class'=>'form-control',) );  ?>
							</div>
						</div>

						<div class="form-group">
							<label for="home_sec_six_number" class="col-sm-6 control-label">عدد الاخبار التى تظهر فى الصفحة الرئيسية </label>
							<div class="col-sm-12">

								<input type="number" class="form-control" id="home_sec_six_number" name="home_sec_six_number" value="<?php echo get_option('home_sec_six_number'); ?>">
							</div>
						</div>
                        
					</div>

<!-- ======================================================== -->

					<div class="tab-pane fade show" id="v-pills-seventhsection" role="tabpanel" aria-labelledby="v-pills-seventhsection-tab">			        
			        	<div class="form-group">
							<label for="home_sec_seven_title" class="col-sm-6 control-label">عنوان السكشن السابع </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="home_sec_seven_title" name="home_sec_seven_title" value="<?php echo get_option('home_sec_seven_title'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="home_sec_seven_content" class="col-sm-6 control-label">محتوى السكن السابع</label>
							<div class="col-sm-12">
                                <?php wp_editor( get_option('home_sec_seven_content'), 'home_sec_seven_content',  array('textarea_rows'=>5,'textarea_name'=> 'home_sec_seven_content', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'home_sec_seven_content','class'=>'form-control',) );  ?>
							</div>
						</div>

						<div class="form-group">
							<label for="home_sec_seven_number" class="col-sm-6 control-label">عدد العملاء التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">

								<input type="number" class="form-control" id="home_sec_seven_number" name="home_sec_seven_number" value="<?php echo get_option('home_sec_seven_number'); ?>">
							</div>
						</div>
                        
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