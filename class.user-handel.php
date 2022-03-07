<?php
function complete_registration() {
    global $reg_errors, $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) { 
        
        global $extra_fields;


        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'user_url'      =>   $website,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
        'nickname'      =>   $nickname,
        'description'   =>   $bio,
        'role'     =>   'custom_editor'
        
        );

      
    
        
      $userdata_custom =array();
        
        // Save each field
        foreach( $extra_fields as $field ) {
            if( $field[2] == true ) { 
                $userdata_custom[ $field[0] ] = $_POST[ $field[0] ];
            } // endif
        } // end foreach

        

        $userdata = array_merge($userdata, $userdata_custom);

        $user = wp_insert_user( $userdata );
		echo '<h2 style="color: #0445af;
    font-size: 24px;
    line-height: 32px;">Registration completed.</h2>';  
    
    

    wp_redirect( home_url( '/sign-in' ));
		echo '<script>
					   
			function init() {
   var k ;
 var input_null= document.querySelectorAll("input[type="text"]");
			document.querySelector("input[type="password"]").value = "";
				for(k=0;k<input_null.length;k++){
					
					input_null[k].value = "";
					
				}
				
}
window.onload = init;
		
			</script>';
    }
}