<?php 
	include("connect.php");
	include("functions.php");
	$DB = new Database();
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>
	<link rel="stylesheet" href="css/library.css" />
	<style type="text/css">
		.header{
			height: 60px;
			border-bottom: 1px solid silver;
			position: fixed;
			top: 0;
			width: 100%;
			font-size: 1.5rem;
		}
		.manage{
			height: 60px;
		}
		.user-table{
			width: 90%;
			border: 1px solid silver;
			border-collapse:collapse;
			margin: auto;
		}
		th,td{
			border: 1px solid silver;
			padding: 5px;
		}
		.resume-btn{
			padding: 5px;
			border: 1px solid;
			border-radius: 8px;
			background: #336aea;
			color: white;
		}
	</style>
</head>
<body>
	<div class="header d-f a-i-c j-c-c f-w-7">User Details</div>
	<div class="manage"></div>
	<table class="user-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact Number</th>
				<th>Experience</th>
				<th>Resume</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$sql = "SELECT users.`id`,users.`name`,users.`email`,users.`contact`, SUM(DATEDIFF(experiences.`end_date`, experiences.`start_date`)) AS total_experience_days FROM `users` LEFT JOIN experiences ON users.id = experiences.userid GROUP BY experiences.userid ORDER BY total_experience_days DESC";
				$result = $DB->read($sql);
				if($result && is_array($result)){
					foreach ($result as $key => $ROW) {
						$totalExperience = getExperiences($ROW['id']);
						?>
							<tr>
								<td><?=$key + 1?></td>
								<td><?=$ROW['name']?></td>
								<td><?=$ROW['email']?></td>
								<td><?=$ROW['contact']?></td>
								<td><?=$totalExperience['years']?> Year, <?=$totalExperience['months']?> Month, <?=$totalExperience['days']?> Days</td>
								<td><div class="resume-btn d-f a-i-c j-c-c c-p"><a href="resume.php?id=<?=$ROW['id']?>">View Resume</a></div></td>
							</tr>
						<?php
					}
				}else{
					?>
					<tr>
						<td style="text-align: center;" colspan="6">No user were found.</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</body>
</html>