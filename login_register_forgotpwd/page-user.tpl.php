<style>
body {
	font-family: 'Open Sans', sans-serif;
	background:none repeat scroll 0 0 #f2f2f2;
}
@import url(http://fonts.googleapis.com/css?family=Open+Sans);
#container {
	width: 350px;
	margin: 30px auto;
}
a {
	text-decoration:none;
}
#edit-name, #edit-name--2, #edit-name--3 {
    background: url("sites/all/modules/login_register_forgotpwd/user.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
}
#edit-pass, #edit-pass-pass1, #edit-pass-pass2 {
 background: url("sites/all/modules/login_register_forgotpwd/password.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
}
#edit-mail{
 background: url("sites/all/modules/login_register_forgotpwd/mail.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
}
#tabbox {
	height: 40px;
}
#panel {
	background-color: #fff;
	padding: 10px 20px;
	color:#4d4d4d;
	box-shadow:0px 2px 3px #dadada, 0 0px 0 #e6e6e6 inset;
	position:relative;
}
input[type="text"], input[type="password"] {
	background-color: white;
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 2px;
	color: #767676;
	display: block;
	font-size: 14px;
	height: 34px;
	line-height: 1.42857;
	padding: 6px 12px 6px 45px;
	transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
	width: 100%;
	box-shadow:0 1px 2px rgba(0, 0, 0, 0.1) inset;
}
input[type="text"]:hover, input[type="password"]:hover {
	border:1px solid #949494;
	box-shadow:0 1px 2px rgba(0, 0, 0, 0.1) inset;
}
input[type="text"]:focus, input[type="password"]:focus {
   box-shadow:0 1px 2px rgba(0, 0, 0, 0.1) inset;
   	border:1px solid #949494;
}
input[type="submit"] {
	background: none repeat scroll 0 0 #0067a6;
	border: 0 none;
	border-radius: 2px;
	color: #fff;
	display: block;
	font-size: 16px;
	padding: 7px;
	width: 100%;
	border:1px solid #0d4979;
}
input[type="submit"]:hover {
border:1px solid #0067a6;
background: none repeat scroll 0 0 #0d4979;
color:#fff;
}
.tab {
	background: #fff;
	display: inline-block;
	float: left;
	font-weight: normal;
	height: 40px;
	line-height: 40px;
	text-align: center;
	width: 49%;
	font-size: 16px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	color:#333;
	box-shadow:1px 0px 0px #dadada, 0 0px 0 #e6e6e6 inset;
	font-weight:500;
	
}
.password-strength {
    color: #0067a6;
	width:100%;
}
.password-indicator {
  
    margin-top: 0.5em;
   
}

#span_back_to_login_block, #span_forgot_password {
    color: #0068ba;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
}
div.form-item div.password-suggestions {
    border: 1px solid #b4b4b4;
    margin: 0.7em 0;
    padding: 0.2em 0.5em;
    width: inherit;
}
.signup {
	margin-left: 8px;
}
#signup {
	background: none repeat scroll 0 0 #fff;
	float:right;
}
#login {
	float:left;
}
.select {
	background-color: #0067a6 !important;
	color: #fff;
}
#loginbox {
}
.confirm-parent, .password-parent {
	clear: left;
	margin: 0;
	width: inherit;
}
#signupbox {
	display: none;
}
#span_back_to_login_block, #span_forgot_password {
	color:#0067a6;
	cursor:pointer;
}

.confirm-parent, .password-parent {

    margin: 15px 0;
	position:relative;
 
}
div.password-confirm {
	margin-top: 0;
	position: absolute;
	right: 0;
	top: 0;
	visibility: hidden;
	width: inherit;
}
.error, .messages--error {
    background-color:inherit;
    color: #ff0000;
	font-weight:500;
}
.ok, .messages--status {
    background-color: inherit;
    color: #19b55a;
	font-weight:500;
}
.password-suggestions  ul{margin:0; padding:10px;}
label {
	font-size: 14px;
	font-weight: 500;
}
</style>
<script type="application/javascript">
jQuery(document).ready(function()
{
	jQuery(".tab").click(function()
	{
		var X=jQuery(this).attr('id');
	
		if(X=='signup')
		{
			jQuery("#login").removeClass('select');
			jQuery("#signup").addClass('select');
			jQuery("#loginbox").slideUp();
			jQuery("#signupbox").slideDown();
		}
		else
		{
			jQuery("#signup").removeClass('select');
			jQuery("#login").addClass('select');
			jQuery("#signupbox").slideUp();
			jQuery("#loginbox").slideDown();
			jQuery("#loginbox").show('fast');
			jQuery("#custom_forgotpwd_block").hide('fast');
			jQuery("#custom_user_login_block").show('fast');
		}
	});

	jQuery("#span_forgot_password").click(function()
	{
		jQuery("#login, #signup").removeClass('select');
		jQuery("#loginbox").show('slow');
		jQuery("#custom_user_login_block").hide('fast');
		jQuery("#custom_forgotpwd_block").show('slow');
	});

	jQuery("#span_back_to_login_block").click(function() {
		jQuery("#login, #signup").removeClass('select');
		jQuery("#login").addClass('select');
		jQuery("#loginbox").show('slow');
		jQuery("#custom_forgotpwd_block").hide('fast');
		jQuery("#custom_user_login_block").show('fast');		
	});
});
</script>
<div id="container">
  <div id="tabbox"> <a href="javascript:void(0)" id="signup" class="tab">Signup</a> <a href="javascript:void(0)" id="login" class="tab select">Login</a> </div>
  <div id="panel">
    <div id="loginbox">
      <div id="custom_user_login_block">
        <?php
						module_load_include('inc', 'user', 'user.pages');
						$login_form = drupal_get_form ( 'custom_user_login' );
						echo drupal_render ( $login_form );
					?>
      </div>
      <div id="custom_forgotpwd_block" style="display: none">
        <?php
						$forgot_password_form = drupal_get_form ( 'user_pass' );
						echo drupal_render ( $forgot_password_form );
					?>
      </div>
    </div>
    <div id="signupbox">
      <?php
					$register_form = drupal_get_form ( 'user_register_form' );
					echo drupal_render ( $register_form );
				?>
    </div>
  </div>
</div>
<?php 
if(isset($_REQUEST['form_id'])) {
	if($_REQUEST['form_id'] == 'user_pass') {
		?>
<script>
		jQuery("#login, #signup").removeClass('select');
		jQuery("#loginbox").show('slow');
		jQuery("#custom_user_login_block").hide('fast');
		jQuery("#custom_forgotpwd_block").show('slow');
		</script>
<?php
	}
	if($_REQUEST['form_id'] == 'custom_user_login') {
		?>
<script>
		jQuery("#login, #signup").removeClass('select');
		jQuery("#loginbox").show('slow');
		jQuery("#custom_forgotpwd_block").hide('fast');
		jQuery("#custom_user_login_block").show('fast');
		</script>
<?php
	}
	if($_REQUEST['form_id'] == 'user_register_form') {
		?>
<script>
		jQuery("#login").removeClass('select');
		jQuery("#signup").addClass('select');
		jQuery("#loginbox").slideUp();
		jQuery("#signupbox").slideDown();
		</script>
<?php
	}
}
?>
