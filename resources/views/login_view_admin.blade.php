<html>

   <head>
      <title>Login</title>
   </head>
   
   <body>
   {{ $error }}
      <form action = "/verify_login" method = "post">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
		
         <table>
            <tr>
               <td>Username</td>
               <td><input type='text' name='username' /></td>
            </tr>
			<tr>
               <td>Password</td>
               <td><input type='password' name='password' /></td>
            </tr>
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Login"/>
               </td>
            </tr>
         </table>
			
      </form>
   
   </body>
</html>