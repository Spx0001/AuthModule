<?php

/**
* ChangelogModule
* Auth Class
* @Nekkathecat
* Made : 19/07/2013
**/


    //Authentification Function :: /changelog/changelog
    function Auth() {
    //POST REQUEST NAME 
	if (isset($_POST['logon'])) {
			// SECURE FORMS
			$compte = htmlspecialchars(mysql_escape_string($_POST['login']));
			$password = htmlspecialchars(mysql_escape_string($_POST['passlog']));
			// MYSQL QUERY
			$requete = mysql_query("SELECT * FROM accounts WHERE account = '".$compte."'");
			$donnees = mysql_fetch_array($requete);
			if ($password == $donnees['pass']){
			//DEFINE SESSION VARS
				$_SESSION['login'] = $donnees['account'];
				$_SESSION['pseudo'] = $donnees['pseudo'];
				$_SESSION['guid'] = $donnees['guid'];
				//REDIRECTION
				echo'<meta http-equiv="refresh" content="3; URL=http://reckless-project.exano.net/auth/index.php?cat=auth&action=check">';
			}
			else {
			//ERROR
            echo'<div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Error</h4>
            An error during the identification
            </div>';
               }
			
            }
			
			}
			
			function RegForm() {
			//REGISTER FORM FUNCTION
			
			echo '<form action="" method="POST">';
			                    echo '<label>Account</label>';
                				echo '<input type="text" name="ndc"  value="" placeholder="Account Name" tabindex="3" />';
								echo '<label>Password</label>';
                   				echo '<input type="password" name="mdp"  placeholder="Password" tabindex="4" />';
								echo '<label>Pseudo</label>';
                   				echo '<input type="text" name="pseudo"  value="" placeholder="Pseudo" tabindex="6" />';
								echo '<label>E.Mail</label>';
								echo '<input type="text" name="mail"  value="" placeholder="EMail" tabindex="6" />';
								echo '<label>Captcha</label>';
								echo '<input type="text" name="captcha"  value="" placeholder="Captcha" tabindex="7" /><img class="img_text" src="./system/captcha.php" alt=\"Captcha\" />';
								echo '<label>Secret Question</label>';
								echo '<input type="text" name="secretq"  value="" placeholder="Secret Question" tabindex="7" />';
								echo '<label>Secret Answer</label>';
								echo '<input type="text" name="reps"  value="" placeholder="Secret Answer" tabindex="8" />';
								//echo ' <input class="apply" type="submit" name="send" value=""/>';
								echo'<br/>';
								  echo'<input name="send" class="btn btn-inverse" value="Send !" type="submit">';
												
				echo '	</form>   ';   
			}
						function AuthTest() {
			//REGISTER FORM FUNCTION
		    if(isset($_SESSION['login'])){
			echo'<p>Logged as '.$_SESSION['login'].' </p>';
			}else{
			echo'<p>Not Logged , <a href="index.php?cat=auth&action=index"><b>Connect-now ?</b></a>';
			}
			}
			function Register() {
			// REGISTER FUNCTION 4 ANCESTRA DERIVATIONS 
			// COMMENTARIES FOR BEGGINERS 
			
			
   $error['username'] = FALSE;
   $error['pseudo'] = FALSE;
   $error['password'] = FALSE;
   $error['email'] = FALSE;
   $error['captcha'] = FALSE;
   $error['secretq'] = FALSE;
   $error['reps'] = FALSE;
   if(isset($_POST['send']))
   {
   //DEFINE POST DATAS AS VARIABLES + SECU.
	  $username = mysql_real_escape_string(htmlspecialchars(trim($_POST['ndc'])));
	  $password = mysql_real_escape_string(htmlspecialchars(trim($_POST['mdp'])));
	  $pseudo = mysql_real_escape_string(htmlspecialchars(trim($_POST['pseudo'])));
	  $email = mysql_real_escape_string(htmlspecialchars(trim($_POST['mail'])));
	  $captcha = mysql_real_escape_string(htmlspecialchars(trim($_POST['captcha'])));
	  $secretq = mysql_real_escape_string(htmlspecialchars(trim($_POST['secretq'])));
	  $reps = mysql_real_escape_string(htmlspecialchars(trim($_POST['reps'])));

	  $register['username'] = FALSE;
	  $register['password'] = FALSE;
	  $register['pseudo'] = FALSE;
	  $register['email'] = FALSE;
	  $register['captcha'] = FALSE;
	  $register['secretq'] = FALSE;
	  $register['reps'] = FALSE;
	  
	  
	  //ACCOUNT CHECK
	  if(isset($_POST['ndc']) && $username != '')
	  {
		$sq = "SELECT account FROM accounts";
		$re = mysql_query($sq) or die('SQL Error !<br>'.$sq.'<br>'.mysql_error());
		$dat = mysql_fetch_array($re);
		if($dat['account'] == $_POST['ndc'])
		{
			$error['username'] = TRUE;
			echo "Username already in use !<br />";
		}
		else
		{
			$register['username'] = TRUE;
		}
       }
	  else
	  {
		 $error['username'] = TRUE;
		 echo "No account name !<br />";
	  }
	
	
	//PASSWORD CHECK
	  if(isset($_POST['mdp']) && $password != '')
	  {
			$register['password'] = TRUE;
	  }
	  else
	  {
		 $error['password'] = TRUE;
		 echo "No password  !<br />";
	  }
	  //PSEUDO CHECK
	   if(isset($_POST['pseudo']) && $pseudo != '' )
	  {
			$sq = 'SELECT * FROM accounts';
			$re = mysql_query($sq) or die('SQL Error !<br>'.$sq.'<br>'.mysql_error());
			$dat = mysql_fetch_array($re);
		if($dat['pseudo'] == $pseudo)
		{
			$error['pseudo'] = TRUE;
			echo "Pseudo already in use !<br />";
		}
		else
		{
			$register['pseudo'] = TRUE;
		}
	  }
	  else
	  {
		 $error['pseudo'] = TRUE;
		 echo "No pseudo writen !<br />";
	  }
       //EMAIL CHECK
	  if(isset($_POST['mail']) && $email != '')
	  {
		 if(preg_match("/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,3}$/i",$email))
		 {
			$register['email'] = TRUE;
		 }
		 else
		 {
			$error['email'] = TRUE;
			echo "Invalid Email!<br />";
		 }
	  }
	  else
	  {
		 $error['email'] = TRUE;
		 echo "No adress writen !<br />";
	  }
      //CAPTCHA CHECK
	  if(isset($_POST['captcha']) && $captcha != '')
	  {
		 if(strtoupper($captcha) == $_POST['captcha'])
		 {
			$register['captcha'] = TRUE;
		 }
		 else
		 {
			$error['captcha'] = TRUE;
			echo "Invalid Captcha , Try Again !<br />";
		 }
	  }
	  else
	  {
		 $error['captcha'] = TRUE;
		 echo "No code writen !<br />";
	  }
	  //SECRETQ CHECK
	  if(isset($_POST['secretq']) && $secretq != '')
	  {
			$register['secretq'] = TRUE;
	  }
	  else
	  {
		 $error['secretq'] = TRUE;
		 echo "No secret question writen !<br />";
	  }
	  //REPS CHECK
	  if(isset($_POST['reps']) && $reps != '')
	  {
			$register['reps'] = TRUE;
	  }
	  else
	  {
		 $error['reps'] = TRUE;
		 echo "No secret answer written !<br />";
	  }
    // IF ALL VARS ARE SET TO TRUE
	  if($register['username'] == TRUE && $register['password'] == TRUE && $register['email'] == TRUE && $register['pseudo'] == TRUE && $register['captcha'] == TRUE && $register['secretq'] == TRUE && $register['reps'] == TRUE)
	  {
	  //EXECUTE
		mysql_query("INSERT INTO accounts (guid,account,pass,level,email,pseudo) VALUES ('','".$username."','".$password."','0','".$email."','".$pseudo."')")or die(mysql_error());
		//SUCCESS MESSAGE
		echo '<div class="alert alert-info">';
        echo '<button class="close" data-dismiss="alert" type="button"></button>';
        echo '<h4>Success !</h4>';
        echo 'Vous etes desormais inscrit !'; 
        echo '</div>';
	  }  
	  echo '</div></center><br />';
   }
			
					
			}
				