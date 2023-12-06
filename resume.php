<?php 
	include("connect.php");
	include("functions.php");
	$DB = new Database();
	$userid = 1;
	if (isset($_REQUEST['id'])) {
	    $userid = $_REQUEST['id'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Resume</title>
	<link rel="stylesheet" href="css/library.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
	<style type="text/css">
		.container{
			min-height: 100vh;
			width: 50%;
			margin: auto;
			border: 1px solid silver;
			padding: 15px;
		}
		.personal-details{
			height: 200px;
			justify-content: space-evenly;
		}
		.profile-image{
			width: 200px;

		}
		.profile-image img{
			height: 180px;
			width: 180px;
			object-fit: cover;
			border-radius: 50%;
			border: 2px solid silver;
		}
		.profile-details{
			width: 60%;
		}
		.user-name{
			font-size: 1.4rem;
			margin: 10px 0;
		}
		.details{
			height: 30px;
		}
		.details i{
			font-size: 17px;
			margin-right: 10px;
			color: silver;
		}
		.qualification{
			margin-top: 20px;
		}
		.heading{
			font-size: 1.3rem;
		}
		.underline{
			height: 4px;
			background: silver;
			margin: 10px 0;
		}
		.qualification-up{
			font-size: 1rem;
			margin-bottom: 2px;
		}
		.qualification-down{
			margin-bottom: 7px;
		}
		.experience-container{
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<?php 

		$sql = "SELECT * FROM `users` WHERE id = $userid";
		$result = $DB->read($sql);
		$ROW = $result[0];

	?>
	<div class="container">
		<div class="personal-details d-f">
			<div class="profile-image h-100 d-f a-i-c j-c-c">
				<img src="<?=$ROW['image']?>">
			</div>
			<div class="profile-details h-100">
				<div class="user-name f-w-7"><?=$ROW['name']?></div>
				<div class="email-container d-f a-i-c details">
					<div class="icon"><i class="bi bi-envelope-fill"></i></div>
					<div class="icon-details"><?=$ROW['email']?></div>
				</div>

				<div class="number-container d-f a-i-c details">
					<div class="icon"><i class="bi bi-telephone-fill"></i></div>
					<div class="icon-details"><?=$ROW['contact']?></div>
				</div>

				<div class="number-container d-f a-i-c details">
					<div class="icon"><i class="bi bi-bookmark-heart-fill"></i></div>
					<div class="icon-details"><?=$ROW['hobbies']?></div>
				</div>

				<div class="number-container d-f a-i-c details">
					<div class="icon"><i class="bi bi-file-pdf-fill"></i></div>
					<div class="icon-details"><?=$ROW['objective']?></div>
				</div>
			</div>
		</div>

		<!-- qualification -->
		<div class="qualification">
			<div class="heading f-w-7">Qualifications</div>
			<div class="underline"></div>
			<?php 
				$Qualifications = getQualification($userid);
				foreach ($Qualifications as $key => $Qualification) {
					?>
					<div class="qualification-up f-w-7"><?=$Qualification['year']?> | <?=$Qualification['percent']?> %</div>
					<div class="qualification-down f-w-5"><?=$Qualification['qualification']?> (<?=$Qualification['board']?>) </div>
					<?php
				}
			?>
		</div>

		<div class="qualification">
			<div class="heading f-w-7">Skills</div>
			<div class="underline"></div>
			<?php 
				$Skills = getSkills($userid);
				foreach ($Skills as $key => $Skill){
					?>
					<div class="skill-container d-f a-i-c">
						<div class="f-w-7"><?=$key + 1?> . <?=$Skill['skill']?> :- </div> <div class=""> <?=$Skill['descripton']?></div>
					</div>
						
					<?php 
				}
			?>
		</div>		

		<div class="qualification">
			<div class="heading f-w-7">Experiences</div>
			<div class="underline"></div>
			<?php 
				$Experiences = getExperiencesResume($userid);
				if($Experiences && is_array($Experiences)){
					foreach ($Experiences as $key => $Experience) {
						?>
						<div class="experience-container">
							<div class="f-w-7">
								<?=$key + 1?> . <?= $Experience['experience']?> (<?=$Experience['start_date']?> to <?=$Experience['end_date']?>)
							</div>
							<div class="descripton"><?=$Experience['description']?></div>
						</div>
						<?php
					}

				}else{
					echo "As a Freshers.";
				}
			?>
		</div>

		<div class="qualification">
			<div class="heading f-w-7">Declaration</div>
			<div class="underline"></div>
			<div class="declaration">
				<?=$ROW['declaration']?>
			</div>
		</div>
	</div>
</body>
</html>