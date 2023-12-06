<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Skill Count</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="preconnect" href="https://fonts.gstatic.com" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.14.0/devicon.min.css" />
	<script src="https://kit.fontawesome.com/fa62c117c7.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/library.css" />
	<link rel="stylesheet" href="css/index.css" />
</head>
<body class="d-f a-i-c">
	<div class="container">
		<div class="alert-container h-100 w-100 d-f a-i-c j-c-c">
			<div class="alert-inner-container d-f a-i-c j-c-c"></div>
		</div>
		<form class="h-100 w-100 skill-count-form p-r" id="skill-count-form" enctype="multipart/form-data">
			<div class="title f-w-5">Profile Picture</div>
			<div class="h-100 first-step active step-1 model">
				<div class="for-flex d-f a-i-c j-c-c f-d-c h-100">
					<div class="profile-image">
						<img id="preview-image" src="Images/profile-2.jpg">
					</div>
					<div class="choose-image c-p">Upload Image</div>
					<input type="file" name="profile-image" id="profile-image" hidden accept=".png, .jpg, .jpeg">
				</div>
			</div>

			<div class="inactive step-2 model">
				<div class="input-container">
					<div class="label">Name</div>
					<div class="input"><input type="text" name="name" id="name" class="h-100 w-100"></input></div>
				</div>

				<div class="input-container">
					<div class="label">Email</div>
					<div class="input"><input type="text" name="email" id="email" class="h-100 w-100"></input></div>
				</div>

				<div class="input-container">
					<div class="label">Contact Number</div>
					<div class="input"><input type="number" name="number" id="number" class="h-100 w-100"></input></div>
				</div>

				<div class="input-container">
					<div class="label">Objective</div>
					<div class="input"><input type="text" name="objective" id="objective" class="h-100 w-100"></input></div>
				</div>

				<div class="input-container">
					<div class="label">Hobbies</div>
					<div class="input"><input type="text" name="hobbies" id="hobbies" class="h-100 w-100"></input></div>
				</div>
			</div>

			<div class="step-3 inactive model">
				<table id="qualification-table" class="qualification-table w-100">
					<thead>
						<tr>
							<td>Qualification</td>
							<td>Board</td>
							<td>Year</td>
							<td>%</td>
							<td class="action"><div class="add-qualification c-p" onclick="addQualification()">+</div></td>
						</tr>
					</thead>
					<tbody id="qualification-body">
						
					</tbody>
				</table>
			</div>

			<div class="step-4 inactive model">
				<table id="skill-table" class="skill-table w-100">
					<thead>
						<tr>
							<td>Skill</td>
							<td>Discription</td>
							<td class="action"><div class="add-skill c-p" onclick="addSkill()">+</div></td>
						</tr>
					</thead>
					<tbody id="skill-body">
						
					</tbody>
				</table>
			</div>

			<div class="step-5 inactive model">
				<table class="experience-table w-100">
					<thead>
						<tr>
							<td>Experience</td>
							<td>Form</td>
							<td>To</td>
							<td>Description</td>
							<td class="action"><div class="add-experience c-p" onclick="addExperience()">+</div></td>
						</tr>
					</thead>
					<tbody id="experience-body">
						
					</tbody>
				</table>
			</div>

			<div class="step-6 inactive model">
				<div class="input-container input-container-2">
					<div class="label">Declaration</div>
					<div class="input input-2">
						<textarea id="declaration" name="declaration" class="h-100 w-100"></textarea>
					</div>
				</div>
			</div>

			<div class="btn-container d-f a-i-c">
				<div class="step d-f a-i-c j-c-c c-p preview" onclick="showPage('prev')">Preview</div>
				<div class="step d-f a-i-c j-c-c c-p next" onclick="showPage('next')">Next</div>
				<div class="step d-f a-i-c j-c-c c-p submit">Submit</div>
			</div>
			<input type="submit" name="submit" id="submit" hidden>
		</form>

	</div>
	<script src="js/index.js"></script>
</body>
</html>