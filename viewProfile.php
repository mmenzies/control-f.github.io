<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equix="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- jQUERY -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	
	<link rel="stylesheet" href="viewProfile.css">
	<link rel="icon" href="img\icon.ico" type="image/x-icon">
	<title>Control-F</title>
	
		

</head>
<?php include "connectDB.php"?>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-header">
       			 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#theNav">
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>                        
      			</button>
    		</div>
    		<div>
      			<div class="collapse navbar-collapse" id="theNav">
       			 	<ul class="nav navbar-nav">
         			</ul>
         			<ul class="nav navbar-nav navbar-right">
         				<li><a href="welcome.php">Home</a></li>         		
         				<li><a href="viewProfile.php">Profile</a></li>
         				<li><a href="search.php">Search</a></li>
						<li><a href="about.html">About Us</a></li>
         				<li><a href="contact.php">Contact Us</a></li>
         			</ul>
      			</div>
    		</div>
    	</nav>
    	<!--- for the profile backimage -->
	
		<div class = "container-fluid" id = "top-background">
			<div id = "title-text">
			<?php #query to get user information#
   				$query = "SELECT firstName, lastName, email, phone, age, uDescription FROM user WHERE userID = 1 ";
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				} 
   				$row = mysqli_fetch_assoc($result);
   				echo($row['firstName'] . " " . $row['lastName']);
   			?>
			
			</div>	 
		</div>
		<div class = "container-fluid" id = "division-bar"> 
		</div>
		<img src="img/ross.png" class="img-fluid" alt="Responsive image" id = "profile-image">
		<div class="container-fluid"
		<div class="row">
			<div class="alert alert-success alert-dismissable" id="updateYes" style="display: none;">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Profile updated.</strong>
			</div>	  	
	  		<div class="alert alert-danger alert-dismissable" id="updateNo" style="display: none;">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>ERROR: Profile failed to update.</strong>
			</div>
			
		  	<!--first row-->
		  	<div class="col-sm-4 col-sm-offset-2 left-box left-box" id = "about-box">
		  		<button onclick="editAbout(this);" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button  onclick="update('about-text')" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button>
		  		<br>
				<p class = "sub-heading" > About Developer </p>
				<p id="about-text" contentEditable="false">
				<?php #query to get user information#
   					$query = "SELECT uDescription FROM user WHERE userID = 1 ";
   					if ( ! ( $result = mysqli_query($conn, $query)) ) {
   						echo("Error: %s\n"+ mysqli_error($conn));
   						exit(1);
   					} 
   					$row = mysqli_fetch_assoc($result);
   					echo($row['uDescription']);
   				?>	
				</p>
				<script>
			  	function editAbout(button) {
			    	var text = document.getElementById("about-text");
			    	var box = document.getElementById("about-box");
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	 box.style.border = "none";
				       
				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				       
				    }
				}
		  		</script>
			</div>
		  	


		  	<div class="col-sm-4  col-sm-offset-1 right-box top-box" id = "quick-facts-box"> 
				<button onclick="editFacts(this);" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button  onclick="update('quick-facts')" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button> <br>
				<p class = "sub-heading" > Quick Facts </p>
				<p id="quick-facts">
				<?php #query to get user information#
   				$query = "SELECT email, phone, age FROM user WHERE userID = 1 ";
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				} 
   				while($row = mysqli_fetch_assoc($result)) {
   					echo("Age: &nbsp; <span contentEditable='false' class='facts-text' id='myAge'>" . $row['age'] . "</span><br>");
   					echo("Email: &nbsp; <span contentEditable='false' class='facts-text' id='myEmail'>" . $row['email'] . "</span><br>");
   					echo("Phone: &nbsp; <span contentEditable='false' class='facts-text' id='myPhone'>" . $row['phone'] . "</span><br>");
   				}
   				
   				?>	 
				</p>

				<script>
			  	function editFacts(button) {
			    	var text = document.getElementsByClassName("facts-text");
			    	var box = document.getElementById("quick-facts-box");
				    if (text[0].contentEditable == "true" || text[1].contentEditable == "true" || text[2].contentEditable == "true") {
				        text[0].contentEditable = "false";
				        text[1].contentEditable = "false";
				        text[2].contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	box.style.border = "none";
				       
				    } else {
				        text[0].contentEditable = "true";
				        text[1].contentEditable = "true";
				        text[2].contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				       
				    }
				}
		  		</script>
			
			</div>

			<!-- 3rd row -->

			<div class="col-sm-9 col-sm-offset-2 left-box " id = "skills-box"> 
				<button onclick="editSkills(this);" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button  onclick="update('skills-facts')" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button> <br>
				<p class = "sub-heading" >Skills </p>
				<p>
				<div class="table-responsive">
					<table class="table table-striped" id="skill-table">
						<thead><tr>
							<th>Skill</th>
							<th>Years of Experience</th>
							<th>Sample URL</th></tr>
						</thead>
						<tbody>
						<?php 
						$query = "SELECT skillName, yearsExp, portfolioURL FROM userSkill WHERE userID = 1";
						if ( ! ( $result = mysqli_query($conn, $query)) ) {
							echo("Error: %s\n"+ mysqli_error($conn));
							exit(1);
						}
						while($row = mysqli_fetch_assoc($result)) {
							echo("<tr class='skillz'><td class='skills-text' contentEditable='false'>" . $row['skillName'] . 
									"</td><td class='skills-text' contentEditable='false'>" . $row['yearsExp'] . 
									"</td><td class='skills-text' contentEditable='false'>" . $row['portfolioURL'] . 
									"</td><td><span class='glyphicon glyphicon-remove' onclick='removeSkill(this)'></span></tr>");
						}

						?>
												
						<button type="button" class="btn btn-info" onclick="addSkill()"><span class="glyphicon glyphicon-plus"></span></button>
						</tbody>
					</table>
				</div>
				</p>

				<script>
			  	function editSkills(button) {
			    	var text = document.getElementsByClassName("skills-text");
			    	var box = document.getElementById("skills-box");
			    	var startEdit=false;
					for (var i=0; i<text.length; i++) {
						if (text[i].contentEditable == "true") {
							startEdit == true;
							break;
						}
					}
			    
				    if (startEdit) {
				    	for (var i=0; i<text.length; i++) {
							text[i].contentEditable = "false";
								
						}
				       	box.style.backgroundColor="#e8e9ea";
				       	box.style.border = "none";
				       
				    } else {
				    	for (var i=0; i<text.length; i++) {
							text[i].contentEditable = "true";
								
						}
						box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				       
				    }
				}
		  		</script>
				
			</div>
			
			<div class="col-sm-9  col-sm-offset-2 left-box " id = "social-media"> 
				<button onclick="editLinks(this);" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button  onclick="update('links-facts')" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button>
		  		 <br>
				<p class = "sub-heading" > Other Places to Find Developer </p> 
				<p>
				<div class="table-responsive">
					<table class="table table-striped" id="link-table">
						<thead><tr>
							<th>Name</th>
							<th>URL</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$query = "SELECT name, links FROM links WHERE id=1";
						if ( ! ( $result = mysqli_query($conn, $query)) ) {
							echo("Error: %s\n"+ mysqli_error($conn));
							exit(1);
						}
						while($row = mysqli_fetch_assoc($result)) {
							echo("<tr class='linkz'><td class='link-text' contentEditable='false'>" . $row['name'] .
									"</td><td class='link-text' contentEditable='false'><a href='" . $row['links'] . "'>" . $row['links'] . "</a>
									</td><td><span class='glyphicon glyphicon-remove' onclick='removeLink(this)'></span></tr>");
						}
						

						?>
						<button type="button" class="btn btn-info" onclick="addLink()"><span class="glyphicon glyphicon-plus"></span></button>
						</tbody>
					</table>
				</div>
				</p>

				<script>
			  	function editLinks(button) {
			    	var text = document.getElementsByClassName("link-text");
			    	var box = document.getElementById("social-media");
			    	var startEdit=false;
					for (var i=0; i<text.length; i++) {
						if (text[i].contentEditable == "true") {
							startEdit == true;
							break;
						}
					}
			    
				    if (startEdit) {
				    	for (var i=0; i<text.length; i++) {
							text[i].contentEditable = "false";
								
						}
				       	box.style.backgroundColor="#e8e9ea";
				       	box.style.border = "none";
				       
				    } else {
				    	for (var i=0; i<text.length; i++) {
							text[i].contentEditable = "true";
								
						}
						box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				       
				    }
				}
		  		</script>
				
			</div>
		  	
		</div>
		  	
	</div>	
<?php mysqli_close($conn); ?>

<script>
	function addSkill() {
		var table = document.getElementById('skill-table');
		var row = table.insertRow(-1);
		row.className = "skillz";
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		cell1.className = "skills-text";
		cell2.className = "skills-text";
		cell3.className = "skills-text";
		var att = document.createAttribute("contentEditable");
		att.value=false;
		cell1.setAttributeNode(att);
		cell2.setAttributeNode(att.cloneNode(true));
		cell3.setAttributeNode(att.cloneNode(true));
		cell1.innerHTML = "Skill";
		cell2.innerHTML = "0";
		cell3.innerHTML = "sample website";
		cell4.innerHTML = "<span class='glyphicon glyphicon-remove' onclick='removeSkill(this)'></span>";
	}

	function removeSkill(skill) {
		var j = skill.parentNode.parentNode.rowIndex;
	    document.getElementById("skill-table").deleteRow(j);
		
	}

	function addLink() {
		var table = document.getElementById('link-table');
		var row = table.insertRow(-1);
		row.className = "linkz";
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		cell1.className = "link-text";
		cell2.className = "link-text";
		cell3.className = "link-text";
		var att = document.createAttribute("contentEditable");
		att.value=false;
		cell1.setAttributeNode(att);
		cell2.setAttributeNode(att.cloneNode(true));
		cell1.innerHTML = "Name";
		cell2.innerHTML = "URL";
		cell3.innerHTML = "<span class='glyphicon glyphicon-remove' onclick='removeLink(this)'></span>";
	}

	function removeLink(link) {
		var j = link.parentNode.parentNode.rowIndex;
	    document.getElementById("link-table").deleteRow(j);
	}
	
	function update(id) {
		var box = document.getElementById(id);
		var text="";
		var func = "";
		var years="";
		var urls="";
		var size=0;
		switch(id) {
			case 'about-text':
				f = 'about';
				text = box.innerHTML;
				break;
			case 'quick-facts':
				f = 'facts';
				var text = [];
				var age = document.getElementById('myAge');
				if (parseFloat(age.innerHTML) % 1 != 0 || typeof parseFloat(age.innerHTML) != 'number' || parseFloat(age.innerHTML) < 0) {
					alert("Please use a whole number greater than 0 for age");
					return;
				}
				var email = document.getElementById('myEmail'); 
				var phone = document.getElementById('myPhone');
				text = [parseFloat(age.innerHTML), email.innerHTML, phone.innerHTML];
				break;
			case 'skills-facts':
				var skillz = document.getElementsByClassName('skillz');
				f = 'skills';
				text = []; years = []; urls=[];
				for (var i=0; i<skillz.length; i++) {
					var s = skillz[i].getElementsByClassName('skills-text');
					text.push(s[0].innerHTML);	
					years.push(s[1].innerHTML);
					if (s[2].innerHTML == "") {
						urls.push("no website available");
					} else {
						urls.push(s[2].innerHTML);
					}			
				}
				size = text.length;
				break;
			case 'links-facts':
				f = 'links';
				var linkz = document.getElementsByClassName('linkz');
				text = []; urls=[];
				for (var i=0; i<linkz.length; i++) {
					var s = linkz[i].getElementsByClassName('link-text');
					if (s[1].innerHTML.indexOf("<a href") == -1) {
						var web = s[1].innerHTML;
					} else {
						var a = s[1].getElementsByTagName('a');
						var web = a[0].innerHTML;
					}
					text.push(s[0].innerHTML);	
					
					if (web == "") {
						urls.push("no website available");
					} else {
						urls.push(web);
					}			
				}
				size = text.length;
				break;
			default:
				alert("Error");
				break;
		} 
		$.ajax ({
			type: "POST",
			url: "ajax.php",
			data: {func: f, textUpdate: text, tYear: years, tURL: urls, s: size},
			dataType: "html",
			success: function(data) {
				var success = document.getElementById("updateYes");
				success.style.display='block';
				
			},
			error: function(e) {
				var fail = document.getElementById("updateNo");
				success.style.display='block';
			}	
		});
		
		
	}
</script>   
			
</body>
</html>