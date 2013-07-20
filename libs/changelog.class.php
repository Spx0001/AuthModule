<?php

/**
* ChangelogModule
* Changelog Class
* @Nekkathecat
* Made : 19/07/2013
**/


    //GETPOST FUNCTION :: /changelog/changelog
    function getPosts() {
	$pagination = 100;
	$sql = "SELECT * FROM devblog ORDER BY date DESC LIMIT 0, $pagination";
    $resultat = mysql_query($sql);
    while ($donnee = mysql_fetch_assoc($resultat)) 
	{
     echo' <tr>
     <td># '.$donnee['id'].'</td>
     <td><span class="label label-warning">'.$donnee['category'].'</span></td>
     <td><a href ="update-'.$donnee['id'].'">'.$donnee['title'].'</a></td>
     <td>'.$donnee['author'].'</td>
      </tr>';
	}
}
		
		// ADD POST FUNCTION :: /changelog/update-$id
	function getPostsById() {
	            
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
				//DEFINE $_GET['id'] as $id
                $id = $_GET['id'];
				//MySQL Query :: Select infos from devblog table
				$sql = "SELECT id, title, message, author, date FROM devblog WHERE id = $id";
				$resultat = mysql_query($sql);
				while ($donnee = mysql_fetch_assoc($resultat)) 
	{
					
					echo'<div class="row">
	               <div class="span5">
                    <p>'.$donnee['message'].'</p>
	                </div>
  	               <div class="span3">
                      Author: <span class="label label-info">@'.$donnee['author'].'</span>
	                 <p>Posted : '.$donnee['date'].'</p>
  	                 </div>
                     </div>';
                }
				} else {
				//ERROR 
    echo '<center><b>News introuvable</b></center>';
}

	}
	
	// ADD POST FUNCTION :: /changelog/add-more
	function addPost() {
	//CODE
	    //POST REQUEST NAME
        if (isset($_POST['send'])) {
		//POST CONDITIONS
		if(isset($_POST['title']) && $_POST['category'] != "" && strlen($_POST['message']) > 10)
			{
			   //MySQL Query with Htmlspecialchars on inputs
				mysql_query("INSERT INTO devblog (id,title,category,message,author) VALUES ('', '". mysql_real_escape_string(htmlspecialchars($_POST['title'])) ."','". mysql_real_escape_string(htmlspecialchars($_POST['category'])) ."','". mysql_real_escape_string(htmlspecialchars($_POST['message'])) ."','". mysql_real_escape_string(htmlspecialchars($_SESSION['pseudo'])) ."')")or die(mysql_error());
				    //SUCCESS
					echo '<div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                     <h4>Success !</h4>
                     Your post has been posted  ! 
                     </div>';
			}
			else
			{
			            //ERROR
						echo '<div class="alert alert-block">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
                       <h4>Error</h4>
                       </div>';
			}
	    }  
//FORM
  echo'<h1>Post a revision/release</h1>
  <p>Here you can post a revision or a release</p> 
  <br/>
<div class="span6">
  <form action="" method="POST">
      <div class="controls controls-row">
          <input id="name" name="title" type="text" class="span3" placeholder="Title"> 
          <input id="email" name="category" type="text" class="span3" placeholder="Category">
      </div>
      <div class="controls">
          <textarea id="message" name="message" class="span6" placeholder="Content" rows="5"></textarea>
      </div>
      
      <div class="controls">
	      <input name="send" class="btn btn-inverse" value="Send !" type="submit">
      </div>
  </form>
</div>';
	}