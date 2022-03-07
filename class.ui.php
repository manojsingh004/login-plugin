<?php
add_action( 'wp_footer', 'getStyle', 99 );

function getStyle() {
   
	echo '<link rel="stylesheet" id="wp-block-library-css"  href="'.plugin_dir_url( __FILE__ ).'_inc/main.css'.'" media="all" />';

 
}


function login_function() {
   echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <!-- jQuery easing plugin -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" type="text/javascript"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"  crossorigin="anonymous"></script>';
	$p= plugin_dir_url( __FILE__ ).'_inc/main.js';
	echo '<script src=" '. $p . '" type="text/javascript"></script>';

// 			wp_register_script( 'main.js', plugin_dir_url( __FILE__ ) . '_inc/main.js', array('jquery') );
// 			wp_enqueue_script( 'main.js' );
?>

<script>
jQuery(document).ready(function(){
    jQuery('#username').on('change', function(){
        let user = jQuery(this).val();
		
        jQuery.ajax({
            type: 'POST',
            url: 'http://www.pipelinesgo.com/wp-admin/admin-ajax.php',
            data: {action: 'verify_username', username: user},
            success: function(data){
				 document.querySelector('.disable').disabled = false;
				var xm = document.querySelector('#uname');
				 $('#uname').html(data).css('color', 'green');
                console.log(data);
                // Write code to show the message to user here
            },
            error: function(err){
				 document.querySelector('.disable').disabled = true;
				var xm = document.querySelector('label.username');
				 $('#uname').html(err).css('color', 'red');
                console.log(err);
            }
        });
    });
});
</script>

<script>
jQuery(document).ready(function(){
    jQuery('#email').on('change', function(){
        let email = jQuery(this).val();
		
        jQuery.ajax({
            type: 'POST',
            url: 'http://www.pipelinesgo.com/wp-admin/admin-ajax.php',
            data: {action: 'verify_email', email: email},
            success: function(data){
				 document.querySelector('.email_disable').disabled = false;
				var xmn = document.querySelector('label.email');
				
				 $('#email_msg').html(data).css('color', 'green');
                console.log(data);
                // Write code to show the message to user here
            },
            error: function(err){
				 document.querySelector('.email_disable').disabled = true;
				var xmn = document.querySelector('label.username');
				 $('#email_msg').html(err).css('color', 'Red');
				
                console.log(err);
            }
        });
    });
});
	

</script>
<script>

	function getMessage(){
   
     document.getElementById('message_password').style.color = 'red';
    document.getElementById('message_password').innerHTML = 'not Matching';
    console.log('test');
    }
    var timer = 0;
	jQuery('#confirm_password').on('keyup', function(e) {
 
  if (document.getElementById('password').value == e.target.value) {
  	clearTimeout(timer);
  	  document.getElementById('message_password').style.color = 'green';
    document.getElementById('message_password').innerHTML = 'Matching';
	    document.querySelector('.submit').disabled = false;
  } else {
   		clearTimeout(timer);
        timer = setTimeout(getMessage, 2000);
  }
  	
  
});




	
	
	
</script>

<script>
//  document.getElementById("#fname").addEventListener("change", function(){
// 	//This input has changed
//    console.log('This Value is', this.value);
// 	 if(this.value.length != 0)
// 			{
// 				 document.querySelector('.fname_btn').disabled = false;
   				
// 			}
// });
	$('#fname').change(function (e) {
	if(document.getElementById("#fname").value.length != null)
			{
				 document.querySelector('.fname_btn').disabled = false;
   				
			}
										 });

	
</script>
<script>
 $('#lname').change(function (e) {
	if(document.getElementById("#lname").value.length != null)
			{
				 document.querySelector('.lname_btn').disabled = false;
   				
			}
										 });



</script>

<script>
document.onkeydown = function (t) {
 if(t.which == 9){
  return false;
 }
}
</script>

<?php

		}
add_action( 'wp_footer', 'login_function', 100 );