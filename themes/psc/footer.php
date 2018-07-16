<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

    </div>
    <div class="footer">
    	<div class="container">
        	<div class="row">
            	
                <div class="col-xs-12 col-sm-4 pull-right">
                	<ul class="social-media">
                    	<li><a href="<?php echo get_field('facebook_link','option')?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo get_field('instagram_link','option')?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?php echo get_field('linkedin_link','option')?>"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-8 pull-left">
                	<div class="copyright"><?php echo get_field('copyright_text','option')?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->
    
    
    <div class="modal fade modal-vcenter" tabindex="-1" role="dialog" id="confirmGuess">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            	<div class="modal-header">
                    <a href="<?php echo bloginfo('home')?>"><img src="<?php echo get_field('logo','option'); ?>" alt="Logo"></a>
                </div>
                <div class="modal-body">
                    <p>Thank you for guessing your friend's personality. We will send an email to your friend regarding your invitation to Personality Central.</p>
                    <a href="<?php echo bloginfo('home')?>/my-account/" class="primary-button">Back to Dashboard</a>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade modal-vcenter" tabindex="-1" role="dialog" id="loginModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="<?php echo bloginfo('home')?>"><img src="<?php echo get_field('logo','option'); ?>" alt="Logo"></a>
                </div>
                <div class="modal-body">
                    <h2>Great to have you back !</h2>
                    <div class="loginForm">
                    	<div style="color:#ff4b15;" id="loginerror"></div>
                    	<form action="" method="post" id="loginForm" onsubmit="return checkLogin();">
                        	<div class="remember">
                            	<input type="checkbox" id="remind" name="rememberme" value="remind">
                                <label for="remind">Remind me</label>
                            </div>
                        	<div class="form-group">
                            	<label>Username</label>
                                <input type="text" class="form-control" name="username" id="userName">
                            </div>
                            <div class="form-group">
                            	<label>Password</label>
                                <input type="password" class="form-control" name="password" id="Password">
                            </div>
                            <div class="submit_block">
                            	<?php wp_nonce_field( 'woocommerce-login' ); ?>
                            	<input type="submit" value="Login">
                            </div>
                            <div class="reset">
                            	<button type="reset" id="reset">reset</button>
                            </div>
                        </form>
                        <div class="login-bottom">
                        	<div class="new-account">New here? <a href="#" data-toggle="modal" data-target="#signupModal" data-dismiss="modal">Create an account</a></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    
    <div class="modal fade modal-vcenter" tabindex="-1" role="dialog" id="signupModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="<?php echo bloginfo('home')?>"><img src="<?php echo get_field('logo','option'); ?>" alt="Logo"></a>
                </div>
                <div class="modal-body">
                    <h2>Sign Up</h2>
                    <div class="loginForm">
                    	<p style="color:#ff4b15;" id="signuperror"></p>
                    	<form action="" method="post" id="pro_signup_form" onsubmit="return pro_checkReg();">
                        	<div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="fname" id="spfname"> 
                            </div><!--form-group-->
                            
                              <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" name="email" id="spemail">
                              </div>
                              <!--form-group-->
                              
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="sppassword">
                              </div>
                            <div class="submit_block">
                            	<?php wp_nonce_field( 'woocommerce-register' ); ?>
                            	<input type="submit" value="Sign Up">
                            </div>
                            
                        </form>
                        <div class="login-bottom">
                        	<div class="new-account">Already have an account? <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Sign In</a></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    
    <div class="modal fade modal-vcenter" tabindex="-1" role="dialog" id="guess-type">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                    	<div class="list-right">
                            <h3>Guess your friend <br/>personality type</h3>
                            <p id='exist' class="hidden" style="color:#f00;">Email address already exist.</p>
                            <form action="" id="guess_personality" method="post" onsubmit="return personalityValidation()">
                                <div class="form-group">
                                    <input type="email" name="email" id="fr_email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="row row10">
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="fr_first_name" name="first_name" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="last_name" id="fr_last_name" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h4>I guess your personality type is</h4>
                                    <div class="personality_type">
                                        <span>
                                            <input type="text" id="per_1" name="per_1" maxlength="1" class="text-center" placeholder="i">
                                            <p style="color: #E18432; font-family: inherit; font-style: inherit;" >E/I</p>
                                        </span>
                                        <span>
                                            <input type="text" id="per_2" name="per_2" maxlength="1" class="text-center" placeholder="s">
                                            <p style="color: #E18432; font-family: inherit; font-style: inherit;" >S/N</p>
                                        </span>
                                        <span>
                                            <input type="text" id="per_3" name="per_3" maxlength="1" class="text-center" placeholder="f">
                                            <p style="color: #E18432; font-family: inherit; font-style: inherit;" >T/F</p>
                                        </span>
                                        <span>
                                            <input type="text" id="per_4" name="per_4" maxlength="1" class="text-center" placeholder="j">
                                            <p style="color: #E18432; font-family: inherit; font-style: inherit;" >J/P</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="submit-block">
                                    <input type="submit" value="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
    
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/grids.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/chosen.jquery.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/custom.js"></script>
    
    <script type="text/javascript">
		function personalityValidation(){
	    	var error=0;
	        var fr_email = jQuery("#fr_email").val();
	        var fr_first_name = jQuery("#fr_first_name").val();
			var fr_last_name = jQuery("#fr_last_name").val();
			var per_1 = jQuery("#per_1").val();
			var per_2 = jQuery("#per_2").val();
			var per_3 = jQuery("#per_3").val();
			var per_4 = jQuery("#per_4").val();
			
			//alert(per_1);
			//alert(per_3);
			
			if(fr_email == ''){ 
				jQuery("#fr_email").css('border-color', '#ff0000'); error+=1;
			}else{ 
				jQuery("#fr_email").css('border-color', '#afafaf');
			}
			
			if(fr_first_name == ''){ 
				jQuery("#fr_first_name").css('border-color', '#ff0000'); error+=1;
			}else{ 
				jQuery("#fr_first_name").css('border-color', '#afafaf');
			}
			
			if(fr_last_name == ''){ 
				jQuery("#fr_last_name").css('border-color', '#ff0000'); error+=1;
			}else{ 
				jQuery("#fr_last_name").css('border-color', '#afafaf');
			}
			
			if( ( per_1 == '') || ((per_1 != 'i') && (per_1 !='e') && (per_1 != 'I') && (per_1 !='E'))){
				jQuery("#per_1").css('border-color', '#ff0000'); error+=1;
				//alert('dfd');
			}
			else{ 
				jQuery("#per_1").css('border-color', '#afafaf');
			}
			
			if( ( per_2 == '') || ((per_2 != 's') && (per_2 !='n') && (per_2 != 'S') && (per_2 !='N') )){
				jQuery("#per_2").css('border-color', '#ff0000'); error+=1;
				//alert('dfd');
			}
			else{ 
				jQuery("#per_2").css('border-color', '#afafaf');
			}
			
			if( ( per_3 == '') || ((per_3 != 't') && (per_3 !='f') && (per_3 != 'F') && (per_3 !='T'))){
				jQuery("#per_3").css('border-color', '#ff0000'); error+=1;
				//alert('dfd');
			}
			else{ 
				jQuery("#per_3").css('border-color', '#afafaf');
			}
			
			if( ( per_4 == '') || ((per_4 !='j') && (per_4 !='p') && (per_4 !='J') && (per_4 !='P'))){
				jQuery("#per_4").css('border-color', '#ff0000'); error+=1;
				//alert('dfd');
			}
			else{ 
				jQuery("#per_4").css('border-color', '#afafaf');
			}
			
			var type = per_1 + per_2 + per_3 + per_4;
			//alert(type);
			
			if(error==0){
				jQuery.ajax({
					type: "POST",
					url: "<?php echo get_bloginfo('template_directory');?>/guess_personality_type.php",
					data: {fr_email:fr_email,fr_first_name:fr_first_name,fr_last_name:fr_last_name,type:type}
				}).done(function( msg ) {
					console.log(msg);
					if(msg==1){
						jQuery('#guess-type').modal('hide');
						jQuery('#confirmGuess').modal('show');
						jQuery('#guess_personality')[0].reset();
						//alert('ok');
					}else{
						//jQuery('#exist').removeClass('hidden');
						location.reload();
					}
				});
                
            }

            return false;
    	}
	</script>
    
    <script type="text/javascript">
		function checkLogin() {
			var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
			//alert(ajax_url);
			var data = {
				'action': 'pro_login',
				'whatever': jQuery( '#loginForm' ).serialize(),
			};
	
			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			jQuery.post(ajaxurl, data, function(response) {
				//alert(response);
				if(response == 'ok'){
					location.reload();
				}else{
					jQuery("#loginerror").html( response );
				}
				//alert('Got this from the server: ' + response);
			});
			return false;
		}
		
		
		function checkLogin2() {
			var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
			//alert(ajax_url);
			var data = {
				'action': 'pro_login',
				'whatever': jQuery( '#loginForm2' ).serialize(),
			};
	
			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			jQuery.post(ajaxurl, data, function(response) {
				//alert(response);
				if(response == 'ok'){
					showResults();
				}else{
					jQuery("#loginerror2").html( response );
				}
				//alert('Got this from the server: ' + response);
			});
			return false;
		}
		
		// Sign Up Modal
		
		function pro_checkReg(){
			var ajaxurl1 = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
			//alert(jQuery( '#signupForm2' ).serialize());
			var spvalid = true;
			var spmsg = '';
			var spfname = jQuery("#spfname").val();
			var spemail = jQuery("#spemail").val();
			var sppassword = jQuery("#sppassword").val();
			 
			if(spfname == ''){ jQuery("#spfname").css('border-color', '#ff0000'); spvalid = false; }else{ jQuery("#spfname").css('border-color', '#cccccc'); }
			if(spemail == ''){ jQuery("#spemail").css('border-color', '#ff0000'); spvalid = false; }else{ jQuery("#spemail").css('border-color', '#cccccc'); }
			if(sppassword == ''){ jQuery("#sppassword").css('border-color', '#ff0000'); spvalid = false;}else{ jQuery("#sppassword").css('border-color', '#cccccc'); }
			
			if(spvalid){
				var data1 = {
					'action': 'pro_signup_2',
					'whatever2': jQuery( '#pro_signup_form' ).serialize(),
				}
				jQuery.post(ajaxurl1, data1, function(response) {
					//alert(response);
					if(response == 'ok'){
						location.reload();
					}else{
						jQuery("#signuperror").html( response );
					}
					//alert('Got this from the server: ' + response);
				});
			}else{
				jQuery("#signuperror").html( spmsg );
			}
			return false;
		}
		
		function pro_checkReg2(){
			var ajaxurl1 = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
			//alert(jQuery( '#signupForm2' ).serialize());
			var spvalid = true;
			var spmsg = '';
			var spfname = jQuery("#spfname2").val();
			var spemail = jQuery("#spemail2").val();
			var sppassword = jQuery("#sppassword2").val();
			 
			if(spfname == ''){ jQuery("#spfname2").css('border-color', '#ff0000'); spvalid = false; }else{ jQuery("#spfname2").css('border-color', '#cccccc'); }
			if(spemail == ''){ jQuery("#spemail2").css('border-color', '#ff0000'); spvalid = false; }else{ jQuery("#spemail2").css('border-color', '#cccccc'); }
			if(sppassword == ''){ jQuery("#sppassword2").css('border-color', '#ff0000'); spvalid = false;}else{ jQuery("#sppassword2").css('border-color', '#cccccc'); }
			
			if(spvalid){
				var data1 = {
					'action': 'pro_signup_2',
					'whatever2': jQuery( '#pro_signup_form2' ).serialize(),
				}
				jQuery.post(ajaxurl1, data1, function(response) {
					//alert(response);
					if(response == 'ok'){
						showResults();
					}else{
						jQuery("#signuperror2").html( response );
						var res_mess = response.trim();
						//console.log(res_mess);
						if((res_mess!='Please provide a valid email address.')&&(res_mess!='An account is already registered with your email address. Please log in.')){
							showResults2();
							
							var getType = jQuery('#get_type').val();
							jQuery.ajax({
								type: "POST",
								url: "<?php echo get_bloginfo('template_directory');?>/add_personality_type.php",
								data: {getType:getType}
							}).done(function( msg ) {
								console.log(msg);
								
							});
							
							
						}
					}
					//alert('Got this from the server: ' + response);
				});
			}else{
				jQuery("#signuperror2").html( spmsg );
			}
			return false;
		}
		
		function goStageOne(){
			jQuery('#nav1').addClass('active');
			jQuery('#nav2').removeClass('active');
			jQuery('#nav3').removeClass('active');
			jQuery('#nav4').removeClass('active');
			jQuery('#nav5').removeClass('active');
			jQuery('#stage1').addClass('active');
			jQuery('#stage2').removeClass('active');
			jQuery('#stage3').removeClass('active');
			jQuery('#stage4').removeClass('active');
			jQuery('#stage5').removeClass('active');
		}
		
		function goStageTwo(){
			var $answers = jQuery('#test input[type="radio"]:checked');
			//alert($answers);
			if ($answers.size() < 15) {
				alert('Please complete all questions!');
				return false;
			}else{
				jQuery('#nav1').addClass('active');
				jQuery('#nav2').addClass('active');
				jQuery('#nav3').removeClass('active');
				jQuery('#nav4').removeClass('active');
				jQuery('#nav5').removeClass('active');
				jQuery('#stage1').removeClass('active');
				jQuery('#stage2').addClass('active');
				jQuery('#stage3').removeClass('active');
				jQuery('#stage4').removeClass('active');
				jQuery('#stage5').removeClass('active');
				
				jQuery('html, body').stop().animate({
					scrollTop: jQuery('#test_contents').offset().top
				}, 600);
				
			}
		}
		function goStageThree(){
			var $answers = jQuery('#test input[type="radio"]:checked');
			//alert($answers);
			if ($answers.size() < 30) {
				alert('Please complete all questions!');
				return false;
			}else{
				jQuery('#nav1').addClass('active');
				jQuery('#nav2').addClass('active');
				jQuery('#nav3').addClass('active');
				jQuery('#nav4').removeClass('active');
				jQuery('#nav5').removeClass('active');
				jQuery('#stage1').removeClass('active');
				jQuery('#stage2').removeClass('active');
				jQuery('#stage3').addClass('active');
				jQuery('#stage4').removeClass('active');
				jQuery('#stage5').removeClass('active');
				
				jQuery('html, body').stop().animate({
					scrollTop: jQuery('#test_contents').offset().top
				}, 600);
			}
		}
		function goStageFour(){
			
			var $answers = jQuery('#test input[type="radio"]:checked');
			//alert($answers);
			if ($answers.size() < 45) {
				alert('Please complete all questions!');
				return false;
			}else{
				jQuery('#nav1').addClass('active');
				jQuery('#nav2').addClass('active');
				jQuery('#nav3').addClass('active');
				jQuery('#nav4').addClass('active');
				jQuery('#nav5').removeClass('active');
				jQuery('#stage1').removeClass('active');
				jQuery('#stage2').removeClass('active');
				jQuery('#stage3').removeClass('active');
				jQuery('#stage4').addClass('active');
				jQuery('#stage5').removeClass('active');
				
				jQuery('html, body').stop().animate({
					scrollTop: jQuery('#test_contents').offset().top
				}, 600);
			}
		}
		function goStageFive(){
			var $answers = jQuery('#test input[type="radio"]:checked');
			//alert($answers);
			if ($answers.size() < 60) {
				alert('Please complete all questions!');
				return false;
			}else{
				jQuery('#nav1').addClass('active');
				jQuery('#nav2').addClass('active');
				jQuery('#nav3').addClass('active');
				jQuery('#nav4').addClass('active');
				jQuery('#nav5').addClass('active');
				jQuery('#stage1').removeClass('active');
				jQuery('#stage2').removeClass('active');
				jQuery('#stage3').removeClass('active');
				jQuery('#stage4').removeClass('active');
				jQuery('#stage5').addClass('active');
			}
		}
		
		
		
		jQuery(function() {
			
			jQuery('#test input[type="radio"]').on('change', function() {
				var $answers = jQuery('#test input[type="radio"]:checked');
				console.log($answers.size());
				if($answers.size() == 15){
					jQuery('#nav1').addClass('active');
					jQuery('#nav2').addClass('active');
					jQuery('#nav3').removeClass('active');
					jQuery('#nav4').removeClass('active');
					jQuery('#nav5').removeClass('active');
					jQuery('#stage1').removeClass('active');
					jQuery('#stage2').addClass('active');
					jQuery('#stage3').removeClass('active');
					jQuery('#stage4').removeClass('active');
					jQuery('#stage5').removeClass('active');
					
					jQuery('html, body').stop().animate({
						scrollTop: jQuery('#test_contents').offset().top
					}, 600);
					
				}if($answers.size() == 30){
					jQuery('#nav1').addClass('active');
					jQuery('#nav2').addClass('active');
					jQuery('#nav3').addClass('active');
					jQuery('#nav4').removeClass('active');
					jQuery('#nav5').removeClass('active');
					jQuery('#stage1').removeClass('active');
					jQuery('#stage2').removeClass('active');
					jQuery('#stage3').addClass('active');
					jQuery('#stage4').removeClass('active');
					jQuery('#stage5').removeClass('active');
					
					jQuery('html, body').stop().animate({
						scrollTop: jQuery('#test_contents').offset().top
					}, 600);
					
				}if($answers.size() == 45){
					jQuery('#nav1').addClass('active');
					jQuery('#nav2').addClass('active');
					jQuery('#nav3').addClass('active');
					jQuery('#nav4').addClass('active');
					jQuery('#nav5').removeClass('active');
					jQuery('#stage1').removeClass('active');
					jQuery('#stage2').removeClass('active');
					jQuery('#stage3').removeClass('active');
					jQuery('#stage4').addClass('active');
					jQuery('#stage5').removeClass('active');
					
					jQuery('html, body').stop().animate({
						scrollTop: jQuery('#test_contents').offset().top
					}, 600);
				}if($answers.size() == 60){
					jQuery('#nav1').addClass('active');
					jQuery('#nav2').addClass('active');
					jQuery('#nav3').addClass('active');
					jQuery('#nav4').addClass('active');
					jQuery('#nav5').addClass('active');
					jQuery('#stage1').removeClass('active');
					jQuery('#stage2').removeClass('active');
					jQuery('#stage3').removeClass('active');
					jQuery('#stage4').removeClass('active');
					jQuery('#stage5').addClass('active');
				}
			});
			
			
			
			jQuery('#btn_submit').click(function() {
				showResults();
			});
			
			
			
			var personality = '<?php echo $_GET['personality'];?>';
			jQuery('#personality-descriptions').find('div.' + personality.charAt(0)).show().end().find('div.' + personality.charAt(1)).show().end().find('div.' + personality.charAt(2)).show().end().find('div.' + personality.charAt(3)).show();
			
		});
		
		function showResults(){
			var result = "";
			var score = [0, 0, 0, 0, 0, 0, 0, 0];
			var $answers = jQuery('#test input:checked');
			if ($answers.size() != 60) {
				alert('Please complete all questions!');
				return false;
			}
			$answers.each(function() {
				switch (jQuery(this).val()) {
					case 'e':
						score[0]++;
						break;
					case 'i':
						score[1]++;
						break;
					case 's':
						score[2]++;
						break;
					case 'n':
						score[3]++;
						break;
					case 't':
						score[4]++;
						break;
					case 'f':
						score[5]++;
						break;
					case 'j':
						score[6]++;
						break;
					case 'p':
						score[7]++;
						break;
				}
			});
			result += (score[0] > score[1]) ? "E" : "I";
			result += (score[2] > score[3]) ? "S" : "N";
			result += (score[4] > score[5]) ? "T" : "F";
			result += (score[6] > score[7]) ? "J" : "P";
			var resultText = result;
			
			jQuery('#get_type').val(resultText);
			
			window.location="<?php echo get_bloginfo('url')?>/result?personality="+resultText;
		}
		
		
		function showResults2(){
			var result = "";
			var score = [0, 0, 0, 0, 0, 0, 0, 0];
			var $answers = jQuery('#test input:checked');
			if ($answers.size() != 60) {
				alert('Please complete all questions!');
				return false;
			}
			$answers.each(function() {
				switch (jQuery(this).val()) {
					case 'e':
						score[0]++;
						break;
					case 'i':
						score[1]++;
						break;
					case 's':
						score[2]++;
						break;
					case 'n':
						score[3]++;
						break;
					case 't':
						score[4]++;
						break;
					case 'f':
						score[5]++;
						break;
					case 'j':
						score[6]++;
						break;
					case 'p':
						score[7]++;
						break;
				}
			});
			result += (score[0] > score[1]) ? "E" : "I";
			result += (score[2] > score[3]) ? "S" : "N";
			result += (score[4] > score[5]) ? "T" : "F";
			result += (score[6] > score[7]) ? "J" : "P";
			var resultText = result;
			
			jQuery('#get_type').val(resultText);
		}
		
		
		function combine() {
			var a = document.getElementById("value1").value;
			var b = document.getElementById("value2").value;
			var type = a + b;
			if (type === 'ISTJISTJ' || type === 'ISTJISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-istj-relationship/";
			} else if (type === 'ISTJISFJ' || type === 'ISFJISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-isfj-relationship/";
			} else if (type === 'ISTJINFJ' || type === 'INFJISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-infj-relationship/";
			} else if (type === 'ISTJINTJ' || type === 'INTJISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-intj-relationship/";
			} else if (type === 'ISTJISTP' || type === 'ISTPISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-istp-relationship/";
			} else if (type === 'ISTJISFP' || type === 'ISFPISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-isfp-relationship/";
			} else if (type === 'ISTJINFP' || type === 'INFPISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-infp-relationship/";
			} else if (type === 'ISTJINTP' || type === 'INTPISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-intp-relationship/";
			} else if (type === 'ISTJESTP' || type === 'ESTPISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-estp-relationship/";
			} else if (type === 'ISTJESFP' || type === 'ESFPISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-esfp-relationship/";
			} else if (type === 'ISTJENFP' || type === 'ENFPISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-enfp-relationship/";
			} else if (type === 'ISTJENTP' || type === 'ENTPISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-entp-relationship/";
			} else if (type === 'ISTJESTJ' || type === 'ESTJISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-estj-relationship/";
			} else if (type === 'ISTJESFJ' || type === 'ESFJISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-esfj-relationship/";
			} else if (type === 'ISTJENFJ' || type === 'ENFJISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-enfj-relationship/";
			} else if (type === 'ISTJENTJ' || type === 'ENTJISTJ') {
				window.location="<?php echo get_bloginfo('url')?>/istj-entj-relationship/";
			} else if (type === 'ISFJISFJ' || type === 'ISFJISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-isfj-relationship/";
			} else if (type === 'ISFJINFJ' || type === 'INFJISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-infj-relationship/";
			} else if (type === 'ISFJINTJ' || type === 'INTJISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-infj-relationship/";
			} else if (type === 'ISFJISTP' || type === 'ISTPISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-istp-relationship/";
			} else if (type === 'ISFJISFP' || type === 'ISFPISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-isfp-relationship/";
			} else if (type === 'ISFJINFP' || type === 'INFPISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-infp-relationship/";
			} else if (type === 'ISFJINTP' || type === 'INTPISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-intp-relationship/";
			} else if (type === 'ISFJESTP' || type === 'ESTPISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-estp-relationship/";
			} else if (type === 'ISFJESFP' || type === 'ESFPISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-esfp-relationship/";
			} else if (type === 'ISFJENFP' || type === 'ENFPISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-enfp-relationship/";
			} else if (type === 'ISFJENTP' || type === 'ENTPISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-entp-relationship/";
			} else if (type === 'ISFJESTJ' || type === 'ESTJISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-estj-relationship/";
			} else if (type === 'ISFJESFJ' || type === 'ESFJISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-esfj-relationship/";
			} else if (type === 'ISFJENFJ' || type === 'ENFJISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-enfj-relationship/";
			} else if (type === 'ISFJENTJ' || type === 'ENTJISFJ') {
				window.location="<?php echo get_bloginfo('url')?>/isfj-entj-relationship/";
			} else if (type === 'INFJINFJ' || type === 'INFJINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-infj-relationship/";
			} else if (type === 'INFJINTJ' || type === 'INTJINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-intj-relationship/";
			} else if (type === 'INFJISTP' || type === 'ISTPINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-istp-relationship/";
			} else if (type === 'INFJISFP' || type === 'ISFPINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-isfp-relationship/";
			} else if (type === 'INFJINFP' || type === 'INFPINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-infp-relationship/";
			} else if (type === 'INFJINTP' || type === 'INTPINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-intp-relationship/";
			} else if (type === 'INFJESTP' || type === 'ESTPINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-estp-relationship/";
			} else if (type === 'INFJESFP' || type === 'ESFPINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-esfp-relationship/";
			} else if (type === 'INFJENFP' || type === 'ENFPINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-enfp-relationship/";
			} else if (type === 'INFJENTP' || type === 'ENTPINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-entp-relationship/";
			} else if (type === 'INFJESTJ' || type === 'ESTJINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-estj-relationship/";
			} else if (type === 'INFJESFJ' || type === 'ESFJINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-esfj-relationship/";
			} else if (type === 'INFJENFJ' || type === 'ENFJINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-enfj-relationship/";
			} else if (type === 'INFJENTJ' || type === 'ENTJINFJ') {
				window.location="<?php echo get_bloginfo('url')?>/infj-entj-relationship/";
			} else if (type === 'INTJINTJ' || type === 'INTJINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-intj-relationship/";
			} else if (type === 'INTJISTP' || type === 'ISTPINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-istp-relationship/";
			} else if (type === 'INTJISFP' || type === 'ISFPINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-isfp-relationship/";
			} else if (type === 'INTJINFP' || type === 'INFPINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-infp-relationship/";
			} else if (type === 'INTJINTP' || type === 'INTPINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-intp-relationship/";
			} else if (type === 'INTJESTP' || type === 'ESTPINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-estp-relationship/";
			} else if (type === 'INTJESFP' || type === 'ESFPINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-esfp-relationship/";
			} else if (type === 'INTJENFP' || type === 'ENFPINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-enfp-relationship/";
			} else if (type === 'INTJENTP' || type === 'ENTPINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-entp-relationship/";
			} else if (type === 'INTJESTJ' || type === 'ESTJINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-estj-relationship/";
			} else if (type === 'INTJESFJ' || type === 'ESFJINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-esfj-relationship/";
			} else if (type === 'INTJENFJ' || type === 'ENFJINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-enfj-relationship/";
			} else if (type === 'INTJENTJ' || type === 'ENTJINTJ') {
				window.location="<?php echo get_bloginfo('url')?>/intj-entj-relationship/";
			} else if (type === 'ISTPISTP' || type === 'ISTPISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-istp-relationship/";
			} else if (type === 'ISTPISFP' || type === 'ISFPISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-isfp-relationship/";
			} else if (type === 'ISTPINFP' || type === 'INFPISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-infp-relationship/";
			} else if (type === 'ISTPINTP' || type === 'INTPISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-intp-relationship/";
			} else if (type === 'ISTPESTP' || type === 'ESTPISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-estp-relationship/";
			} else if (type === 'ISTPESFP' || type === 'ESFPISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-esfp-relationship/";
			} else if (type === 'ISTPENFP' || type === 'ENFPISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-enfp-relationship/";
			} else if (type === 'ISTPENTP' || type === 'ENTPISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-entp-relationship/";
			} else if (type === 'ISTPESTJ' || type === 'ESTJISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-estj-relationship/";
			} else if (type === 'ISTPESFJ' || type === 'ESFJISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-esfj-relationship/";
			} else if (type === 'ISTPENFJ' || type === 'ENFJISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-enfj-relationship/";
			} else if (type === 'ISTPENTJ' || type === 'ENTJISTP') {
				window.location="<?php echo get_bloginfo('url')?>/istp-entj-relationship/";
			} else if (type === 'ISFPISFP' || type === 'ISFPISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-isfp-relationship/";
			} else if (type === 'ISFPINFP' || type === 'INFPISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-infp-relationship/";
			} else if (type === 'ISFPINTP' || type === 'INTPISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-intp-relationship/";
			} else if (type === 'ISFPESTP' || type === 'ESTPISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-estp-relationship/";
			} else if (type === 'ISFPESFP' || type === 'ESFPISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-esfp-relationship/";
			} else if (type === 'ISFPENFP' || type === 'ENFPISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-enfp-relationship/";
			} else if (type === 'ISFPENTP' || type === 'ENTPISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-entp-relationship/";
			} else if (type === 'ISFPESTJ' || type === 'ESTJISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-estj-relationship/";
			} else if (type === 'ISFPESFJ' || type === 'ESFJISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-esfj-relationship/";
			} else if (type === 'ISFPENFJ' || type === 'ENFJISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-enfj-relationship/";
			} else if (type === 'ISFPENTJ' || type === 'ENTJISFP') {
				window.location="<?php echo get_bloginfo('url')?>/isfp-entj-relationship/";
			} else if (type === 'INFPINFP' || type === 'INFPINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-infp-relationship/";
			} else if (type === 'INFPINTP' || type === 'INTPINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-intp-relationship/";
			} else if (type === 'INFPESTP' || type === 'ESTPINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-estp-relationship/";
			} else if (type === 'INFPESFP' || type === 'ESFPINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-esfp-relationship/";
			} else if (type === 'INFPENFP' || type === 'ENFPINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-enfp-relationship/";
			} else if (type === 'INFPENTP' || type === 'ENTPINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-entp-relationship/";
			} else if (type === 'INFPESTJ' || type === 'ESTJINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-estj-relationship/";
			} else if (type === 'INFPESFJ' || type === 'ESFJINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-esfj-relationship/";
			} else if (type === 'INFPENFJ' || type === 'ENFJINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-enfj-relationship/";
			} else if (type === 'INFPENTJ' || type === 'ENTJINFP') {
				window.location="<?php echo get_bloginfo('url')?>/infp-entj-relationship/";
			} else if (type === 'INTPINTP' || type === 'INTPINTP') {
				window.location="<?php echo get_bloginfo('url')?>/intp-intp-relationship/";
			} else if (type === 'INTPESTP' || type === 'ESTPINTP') {
				window.location="<?php echo get_bloginfo('url')?>/intp-estp-relationship/";
			} else if (type === 'INTPESFP' || type === 'ESFPINTP') {
				window.location="<?php echo get_bloginfo('url')?>/intp-esfp-relationship/";
			} else if (type === 'INTPENFP' || type === 'ENFPINTP') {
				window.location="<?php echo get_bloginfo('url')?>/intp-enfp-relationship/";
			} else if (type === 'INTPENTP' || type === 'ENTPINTP') {
				window.location="<?php echo get_bloginfo('url')?>/intp-entp-relationship/";
			} else if (type === 'INTPESTJ' || type === 'ESTJINTP') {
				window.location="<?php echo get_bloginfo('url')?>/intp-estj-relationship/";
			} else if (type === 'INTPESFJ' || type === 'ESFJINTP') {
				window.location="<?php echo get_bloginfo('url')?>/intp-esfj-relationship/";
			} else if (type === 'INTPENFJ' || type === 'ENFJINTP') {
				window.location="<?php echo get_bloginfo('url')?>/intp-enfj-relationship/";
			} else if (type === 'INTPENTJ' || type === 'ENTJINTP') {
				window.location="<?php echo get_bloginfo('url')?>/intp-entj-relationship/";
			} else if (type === 'ESTPESTP' || type === 'ESTPESTP') {
				window.location="<?php echo get_bloginfo('url')?>/estp-estp-relationship/";
			} else if (type === 'ESTPESFP' || type === 'ESFPESTP') {
				window.location="<?php echo get_bloginfo('url')?>/estp-esfp-relationship/";
			} else if (type === 'ESTPENFP' || type === 'ENFPESTP') {
				window.location="<?php echo get_bloginfo('url')?>/estp-enfp-relationship/";
			} else if (type === 'ESTPENTP' || type === 'ENTPESTP') {
				window.location="<?php echo get_bloginfo('url')?>/estp-entp-relationship/";
			} else if (type === 'ESTPESTJ' || type === 'ESTJESTP') {
				window.location="<?php echo get_bloginfo('url')?>/estp-estj-relationship/";
			} else if (type === 'ESTPESFJ' || type === 'ESFJESTP') {
				window.location="<?php echo get_bloginfo('url')?>/estp-esfj-relationship/";
			} else if (type === 'ESTPENFJ' || type === 'ENFJESTP') {
				window.location="<?php echo get_bloginfo('url')?>/estp-enfj-relationship/";
			} else if (type === 'ESTPENTJ' || type === 'ENTJESTP') {
				window.location="<?php echo get_bloginfo('url')?>/estp-entj-relationship/";
			} else if (type === 'ESFPESFP' || type === 'ESFPESFP') {
				window.location="<?php echo get_bloginfo('url')?>/esfp-esfp-relationship/";
			} else if (type === 'ESFPENFP' || type === 'ENFPESFP') {
				window.location="<?php echo get_bloginfo('url')?>/esfp-enfp-relationship/";
			} else if (type === 'ESFPENTP' || type === 'ENTPESFP') {
				window.location="<?php echo get_bloginfo('url')?>/esfp-entp-relationship/";
			} else if (type === 'ESFPESTJ' || type === 'ESTJESFP') {
				window.location="<?php echo get_bloginfo('url')?>/esfp-estj-relationship/";
			} else if (type === 'ESFPESFJ' || type === 'ESFJESFP') {
				window.location="<?php echo get_bloginfo('url')?>/esfp-esfj-relationship/";
			} else if (type === 'ESFPENFJ' || type === 'ENFJESFP') {
				window.location="<?php echo get_bloginfo('url')?>/esfp-enfj-relationship/";
			} else if (type === 'ESFPENTJ' || type === 'ENTJESFP') {
				window.location="<?php echo get_bloginfo('url')?>/esfp-entj-relationship/";
			} else if (type === 'ENFPENFP' || type === 'ENFPENFP') {
				window.location="<?php echo get_bloginfo('url')?>/enfp-enfp-relationship/";
			} else if (type === 'ENFPENTP' || type === 'ENTPENFP') {
				window.location="<?php echo get_bloginfo('url')?>/enfp-entp-relationship/";
			} else if (type === 'ENFPESTJ' || type === 'ESTJENFP') {
				window.location="<?php echo get_bloginfo('url')?>/enfp-estj-relationship/";
			} else if (type === 'ENFPESFJ' || type === 'ESFJENFP') {
				window.location="<?php echo get_bloginfo('url')?>/enfp-esfj-relationship/";
			} else if (type === 'ENFPENFJ' || type === 'ENFJENFP') {
				window.location="<?php echo get_bloginfo('url')?>/enfp-enfj-relationship/";
			} else if (type === 'ENFPENTJ' || type === 'ENTJENFP') {
				window.location="<?php echo get_bloginfo('url')?>/enfp-entj-relationship/";
			} else if (type === 'ENTPENTP' || type === 'ENTPENTP') {
				window.location="<?php echo get_bloginfo('url')?>/entp-entp-relationship/";
			} else if (type === 'ENTPESTJ' || type === 'ESTJENTP') {
				window.location="<?php echo get_bloginfo('url')?>/entp-estj-relationship/";
			} else if (type === 'ENTPESFJ' || type === 'ESFJENTP') {
				window.location="<?php echo get_bloginfo('url')?>/entp-esfj-relationship/";
			} else if (type === 'ENTPENFJ' || type === 'ENFJENTP') {
				window.location="<?php echo get_bloginfo('url')?>/entp-enfj-relationship/";
			} else if (type === 'ENTPENTJ' || type === 'ENTJENTP') {
				window.location="<?php echo get_bloginfo('url')?>/entp-entj-relationship/";
			} else if (type === 'ESTJESTJ' || type === 'ESTJESTJ') {
				window.location="<?php echo get_bloginfo('url')?>/estj-estj-relationship/";
			} else if (type === 'ESTJESFJ' || type === 'ESFJESTJ') {
				window.location="<?php echo get_bloginfo('url')?>/estj-esfj-relationship/";
			} else if (type === 'ESTJENFJ' || type === 'ENFJESTJ') {
				window.location="<?php echo get_bloginfo('url')?>/estj-enfp-relationship/";
			} else if (type === 'ESTJENTJ' || type === 'ENTJESTJ') {
				window.location="<?php echo get_bloginfo('url')?>/estj-entj-relationship/";
			} else if (type === 'ESFJESFJ' || type === 'ESFJESFJ') {
				window.location="<?php echo get_bloginfo('url')?>/esfj-esfj-relationship/";
			} else if (type === 'ESFJENFJ' || type === 'ENFJESFJ') {
				window.location="<?php echo get_bloginfo('url')?>/esfj-enfj-relationship/";
			} else if (type === 'ESFJENTJ' || type === 'ENTJESFJ') {
				window.location="<?php echo get_bloginfo('url')?>/esfj-entj-relationship/";
			} else if (type === 'ENFJENFJ' || type === 'ENFJENFJ') {
				window.location="<?php echo get_bloginfo('url')?>/enfj-enfj-relationship/";
			} else if (type === 'ENFJENTJ' || type === 'ENTJENFJ') {
				window.location="<?php echo get_bloginfo('url')?>/enfj-entj-relationship/";
			} else if (type === 'ENTJENTJ' || type === 'ENTJENTJ') {
				window.location="<?php echo get_bloginfo('url')?>/entj-entj-relationship/";
			}
		} 
		
		
	</script>
    <?php unset($_SESSION['flash_message']); ?>
    
<?php wp_footer(); ?>

</body>
</html>
