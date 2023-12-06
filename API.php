<?php 
	session_start();
	date_default_timezone_set('Asia/Kolkata');
	include("connect.php");
	if(isset($_GET['newUser'])){
		$name = addslashes($_POST['name']);
		$email = addslashes($_POST['email']);
		$contact = addslashes($_POST['number']);
		$objective = addslashes($_POST['objective']);
		$hobbies = addslashes($_POST['hobbies']);
		$declaration = addslashes($_POST['declaration']);
		$date = date("Y-m-d H:i:s");


		// user data save
		$DB = new Database();
		$query = "INSERT INTO `users` (`name`,`email`,`contact`,`objective`,`hobbies`,`declaration`,`date`) VALUES('$name','$email','$contact','$objective','$hobbies','$declaration','$date')";
		$userid = $DB->saveWithId($query);

		// save image
		$theme = "";
		if(!empty($_FILES['profile-image']['name'])){
        	$folder = "Uploads/" . $userid . "/";
        	if(!file_exists($folder)){
                mkdir($folder,0777,true);
            }
            $allowed[] = "image/jpeg";
            $allowed[] = "image/jpg";
            $allowed[] = "image/png";
            if(in_array($_FILES['profile-image']['type'], $allowed)){
            	$ext = pathinfo($_FILES['profile-image']['name'],PATHINFO_EXTENSION);
                $ext = strtolower($ext);
                $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
				$text = "";
				for($x = 0; $x < 5; $x++)
				{
					$random = rand(0,20);
					$text .= $array[$random];
				}
	            $theme = $folder . $text . "." . $ext;
	            move_uploaded_file($_FILES['profile-image']['tmp_name'], $theme);
            }
        }
        $query = "UPDATE `users` SET image = '$theme' WHERE id = $userid";
        $DB->save($query);


        // save qualifications
		$qualifications = $_POST['qualifications'];
		$board = $_POST['board'];
		$year = $_POST['year'];
		$percentage = $_POST['percentage'];
		if (!empty($qualifications)){
			for ($i = 0; $i < count($qualifications); $i++){
				$q = $qualifications[$i];
				$b = $board[$i];
				$y = $year[$i];
				$p = $percentage[$i];
				$query = "INSERT INTO `qualifications` (`userid`,`qualification`,`board`,`year`,`percent`) VALUES('$userid','$q','$b','$y','$p')";
				$DB->save($query);
			}
		}
		


		// save skills
		$skill = $_POST['skill'];
		$skilldescri = $_POST['skilldescri'];
		if (!empty($skill)){
			for ($i = 0; $i < count($skill); $i++){
				$s = $skill[$i];
				$d = $skilldescri[$i];
				$query = "INSERT INTO `skills` (`userid`,`skill`,`descripton`) VALUES('$userid','$s','$d')";
				$DB->save($query);
			}
		}
		

		// save experience
		$experience = $_POST['experience'];
		$from = $_POST['from'];
		$to = $_POST['to'];
		$exdescri = $_POST['exdescri'];
		if (!empty($experience)){
			for ($i = 0; $i < count($experience); $i++){
				$e = $experience[$i];
				$f = $from[$i];
				$t = $to[$i];
				$d = $exdescri[$i];
				$query = "INSERT INTO `experiences` (`userid`,`experience`,`start_date`,`end_date`,`description`) VALUES('$userid','$e','$f','$t','$d')";
				$DB->save($query);
			}
		}
	}


?>