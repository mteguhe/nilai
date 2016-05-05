

<!doctype html>
<html lang="en-US">
<head>

	<meta charset="utf-8">

	<title>Login</title>

	
	<link href="stylelog.css" rel="stylesheet" type="text/css" />

</head>

<body>

	<div id="login">

		<h2><span class="fontawesome-lock"></span>Sign In</h2>

		<form name="login" id="login" action="ceklogin.php" method="post">

			<fieldset>

				<p><label for="email">Username</label></p>
				<p><input type="text" id="email" name="username" value="Username" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value=''"></p> 

				<p><label for="password">Password</label></p>
				<p><input type="password" name="password" id="password" value="password" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> 
                
				<select name="tingkat"  class="styledselect_form_2">
                          <option value="admin">Admin</option>
                          <option value="guru">Guru</option>
                          <option value="siswa">Siswa</option>
                          </select> 

				<p><input type="submit" value="Sign In"></p>

			</fieldset>

		</form>

	</div> <!-- end login -->

</body>	
</html>
