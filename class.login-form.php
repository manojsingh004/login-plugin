<?php 



function registration_form( $username, $password, $email, $first_name, $last_name,$password_confirm ) {
    echo '
	<style>
	header.entry-header.ast-no-thumbnail.ast-no-meta {
    display: none;
}
	img.attachment-full.size-full {
    margin: auto;
    display: block;
    margin-bottom: 50px;
}
	</style>
	';
	$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

	echo '<img src="' . $image[0] . '" class="attachment-full size-full" alt="" loading="lazy">';
 global $extra_fields;
    echo '<div class="main_x_login">
    <form  id="msform" action="' . $_SERVER['REQUEST_URI'] . '" method="post">

    <ul id="progressbar">
		<li class="active"></li>
		<li></li>
		<li></li>
<li></li>
<li></li>
<li></li>

	</ul>
  <div class="slider-container">
  <div class="active" data-slide="1">
  <fieldset>
    <label for="username" class="username">Please enter your Username <span id="uname"> </span><strong>*</strong></label>
    <input type="text" id="username" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    
		<input type="button" name="OK" class="next action-button disable" value="OK" disabled/>
    </fieldset>
     </div>
  <div class="next-slide" data-slide="2">
    <fieldset>
    <label for="firstname" >Please enter your First Name<span id="firstname"> </span></label>
    <input type="text" id="fname" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
    
		<input type="button" name="OK" class="next action-button fname_btn" value="OK" disable/>
    </fieldset>
     </div>

     <div class="next-slide" data-slide="3">
    <fieldset>
    <label for="website">Please enter your Last Name <span id="lastname"> </span></label>
    <input type="text" id="lname" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
    
		<input type="button" name="OK" class="next action-button lname_btn" value="OK" disable/>
    </fieldset>
     </div>
	  <div class="next-slide" data-slide="4">
    <fieldset>
    <label for="email" class="email">What is the best email address to reach you  <span id="email_msg"> </span><strong>*</strong></label>
    <input type="text" id ="email" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    
		<input type="button" name="OK" class="next action-button email_disable" value="OK" disabled/>
    
		
   
    </fieldset>
     </div>
	 <div class="next-slide" data-slide="5">
    <fieldset>
    <label for="typeOfBuisness">Type Of Buisness<strong>*</strong></label>
    <select id="typeOfBuisness" name="typeOfBuisness" required>
                    <option value="retail" >Retail</option>
                    <option value="entertainment" >Entertainment</option>
				  <option value="food_and_beverage" >Food And Beverage</option>
				  <option value="barber_and_beautician" >Barber And Beautician</option>
                </select>
    
		<input type="button" name="OK" class="next action-button" value="OK" />
    </fieldset>
     </div>
     <div class="next-slide" data-slide="6">
    <fieldset>
    <label for="password">Password <strong>*</strong></label>
    <input type="password" id="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    
		<input type="button" name="OK" class="next action-button" value="OK" />
    </fieldset>
     </div>
	 
	 <div class="next-slide" data-slide="7">
    <fieldset>
    <label for="password">Confirm Password  <span id="message_password"> </span> <strong>*</strong></label>
    <input type="password" id="confirm_password" name="password confirm" value="' . ( isset( $_POST['password confirm'] ) ? $password_confirm : null ) . '">
    
	
	<input type="submit" name="submit" class="submit action-button" value="Register" disabled />
    </fieldset>
     </div>
	 
    ';
?>
 
<?php
//      custom field array
	
// 	foreach( $extra_fields as $field ) {
// 		if ( $field[2] == true ) { 
// 		$field_value = isset( $_POST[ $field[0] ] ) ? $_POST[ $field[0] ] : '';
// 		echo '
//     <div class="next-slide" data-slide="5">
//     <fieldset>
//      <label for="'. esc_attr( $field[0] ) .'">'. esc_html( $field[1] ) .'<br />
//      <input type="text" name="'. esc_attr( $field[0] ) .'" id="'. esc_attr( $field[0] ) .'" class="input" value="'. esc_attr( $field_value ) .'" size="20" /></label>
//         </fieldset>
//         </div>';

//     }
//   }

    // echo '
//      <div class="next-slide" data-slide="6">
//     <fieldset>
//     <label for="website">Website</label>
//     <input type="text" name="website" value="' . ( isset( $_POST['website']) ? $website : null ) . '">
    
// 		<input type="button" name="OK" class="next action-button" value="OK" />
//     </fieldset>
//      </div>
     
//      <div class="next-slide" data-slide="7">
//     <fieldset>
//     <label for="nickname">Nickname</label>
//     <input type="text" name="nickname" value="' . ( isset( $_POST['nickname']) ? $nickname : null ) . '">
    
// 		<input type="button" name="OK" class="next action-button" value="OK" />
//     </fieldset>
//      </div>

//      <div class="next-slide" data-slide="8">
//     <fieldset>
//     <label for="bio">Give us a brief summary of some of your relevant work experience</label>
//     <textarea name="bio">' . ( isset( $_POST['bio']) ? $bio : null ) . '</textarea>

    
// 		<input type="submit" name="submit" class="submit action-button" value="Register" />
//     </fieldset>
//     </div>';
    echo'</div>
    </form></div>
    ';
}



