<?php 
	
	function calculateTotalExperience($experiences) {
		$totalYears = 0;
		$totalMonths = 0;
		$totalDays = 0;
		foreach ($experiences as $experience) {
			$startDateObj = new DateTime($experience['start_date']);
			$endDateObj = new DateTime($experience['end_date']);

			$interval = $startDateObj->diff($endDateObj);

			$totalYears += $interval->y;
			$totalMonths += $interval->m;
			$totalDays += $interval->d;
		}

		$totalMonths += floor($totalDays / 30);
		$totalDays %= 30;

		$totalYears += floor($totalMonths / 12);
		$totalMonths %= 12;

		$totalExperience = [
			'years' => $totalYears,
			'months' => $totalMonths,
			'days' => $totalDays,
		];

		return $totalExperience;
	}
	// Example usage with multiple experiences
	// $experiences = [
	//     ['start_date' => '2022-01-01', 'end_date' => '2022-07-01'],
	//     ['start_date' => '2023-01-01', 'end_date' => '2023-03-30'],
	// ];

	// $totalExperience = calculateTotalExperience($experiences);

	function getExperiences($id){
		$DB = new Database();
		$sql = "SELECT start_date, end_date FROM experiences WHERE userid = $id";
		$result = $DB->read($sql);
		if($result && is_array($result)){
			$totalExperience = calculateTotalExperience($result);
			return $totalExperience;
		}else{
			$totalExperience = [
				'years' => 0,
				'months' => 0,
				'days' => 0,
			];

			return $totalExperience;
		}
		
	}

	function getQualification($id){
		$DB = new Database();
		$sql = "SELECT * FROM `qualifications` WHERE userid = $id ORDER by year DESC";
		$result = $DB->read($sql);
		return $result;
	}

	function getSkills($id){
		$DB = new Database();
		$sql = "SELECT * FROM `skills` WHERE userid = $id";
		$result = $DB->read($sql);
		return $result;
	}

	function getExperiencesResume($id){
		$DB = new Database();
		$sql = "SELECT * FROM `experiences` WHERE userid = $id";
		$result = $DB->read($sql);
		return $result;
	} 
?>