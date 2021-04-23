<?php 
function registration_form( $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio ) {
    echo '';
 
    echo '
    <form  id="msform" action="' . $_SERVER['REQUEST_URI'] . '" method="post">


    <ul id="progressbar">
		<li class="active"></li>
		<li></li>
		<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
	</ul><fieldset>
    <label for="username">Username <strong>*</strong></label>
    <input type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
     
    <fieldset>
    <label for="password">Password <strong>*</strong></label>
    <input type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
     
    <fieldset>
    <label for="email">Email <strong>*</strong></label>
    <input type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
     
    <fieldset>
    <label for="website">Website</label>
    <input type="text" name="website" value="' . ( isset( $_POST['website']) ? $website : null ) . '">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
     
    <fieldset>
    <label for="firstname">First Name</label>
    <input type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
     
    <fieldset>
    <label for="website">Last Name</label>
    <input type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
     
    <fieldset>
    <label for="nickname">Nickname</label>
    <input type="text" name="nickname" value="' . ( isset( $_POST['nickname']) ? $nickname : null ) . '">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
     
    <fieldset>
    <label for="bio">About / Bio</label>
    <textarea name="bio">' . ( isset( $_POST['bio']) ? $bio : null ) . '</textarea>

    <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="submit action-button" value="Register" />
    </fieldset>
    
    </form>
    ';


   echo '<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
   <!-- jQuery easing plugin -->
   <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>';
}