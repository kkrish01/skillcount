var page = 1;
function showPage(flag){

	if(flag === 'prev' && page > 1){
		page --;
	}
	if(flag === 'next' && page <= 6){
		page ++;
	}
	if(page == 1){
		$(".preview").css('display','none');
		$(".next").css('display','flex');
		$(".submit").css('display','none');
	}
	if(page >= 2 && page <= 5){
		$(".preview").css('display','flex');
		$(".next").css('display','flex');
		$(".submit").css('display','none');
	}
	if(page == 6){
		$(".preview").css('display','flex');
		$(".next").css('display','none');
		$(".submit").css('display','flex');
	}

	// page show
	$(".model").css('display','none');
	$('.step-'+page).css('display','block');
	var title = getTitile(page);
	$(".title").html(title);

}
function getTitile(page){
	if(page === 1){
		return 'Profile Picture';
	}
	if(page === 2){
		return 'Personal Details';
	}
	if(page === 3){
		return 'Qualification Details';
	}
	if(page === 4){
		return 'Skill Details';
	}
	if(page === 5){
		return 'Experience Details';
	}
	if(page === 6){
		return 'Declaration';
	}

}
// click on chose image 
$(".choose-image").click(function(){
	$("#profile-image").click();
});

var profile_image = document.getElementById("profile-image");
var preview_image = document.getElementById("preview-image");
profile_image.addEventListener("change",function(event){
	if(event.target.files.length == 0)
	{
		return;
		tempUrl1 = "Images/profile-2.jpg";
		preview_image.setAttribute("src",tempUrl1);
	}
	else
	{
		var tempUrl1 = URL.createObjectURL(event.target.files[0]);
		preview_image.setAttribute("src",tempUrl1);
	}
});

function addQualification(){
	var container = document.getElementById("qualification-body");
	var newQualification = document.createElement("tr");
	newQualification.innerHTML = `
		<td><input type="text" name="qualifications[]"></td>
		<td><input type="text" name="board[]"></td>
		<td><input type="number" name="year[]"></td>
		<td><input type="number" name="percentage[]"></td>
		<td onclick="removeElement(this)"><div class="remove c-p">x</div></td>
	`;
	container.appendChild(newQualification);
}
function addSkill(){
	var container = document.getElementById("skill-body");
	var newSkill = document.createElement("tr");
	newSkill.innerHTML = `
		<td><input type="text" name="skill[]"></td>
		<td><input type="text" name="skilldescri[]"></td>
		<td onclick="removeElement(this)"><div class="remove c-p">x</div></td>
	`;
	container.appendChild(newSkill);
}

function addExperience(){
	var container = document.getElementById("experience-body");
	var newExperience = document.createElement("tr");
	newExperience.innerHTML = `
		<td><input type="text" name="experience[]"></td>
		<td><input type="date" name="from[]"></td>
		<td><input type="date" name="to[]"></td>
		<td><input type="text" name="exdescri[]"></td>
		<td onclick="removeElement(this)"><div class="remove c-p">x</div></td>
	`;
	container.appendChild(newExperience);
}

function removeElement(element) {
    var qualificationEntry = element.parentElement;
    qualificationEntry.remove();
}

// click on submit button 
$(".submit").click(function(){
	$("#submit").click();
});

function emptyOrnot(inputs){
	var isEmpty = Array.from(inputs).some(function(input) {
      	return input.value.trim() === '';
    });
    return isEmpty;
}
function showAlert(content){
	$('.alert-container').css('display','flex');
	$(".alert-inner-container").html(content);
	hideAlert();
}
function hideAlert(){
	setTimeout(function(){
		$('.alert-container').css('display','none');
		$(".alert-inner-container").html("");
	},1500);
}

$("#skill-count-form").on('submit',(function(e){
	e.preventDefault();
	var skill_count_form = new FormData(this);

	// validation 
	var profile_image = $("#profile-image").val();

		var row1 = document.getElementById('qualification-table').rows.length;
		isQualification = emptyOrnot(document.querySelectorAll('input[name="qualifications[]"]'));
		isBoard = emptyOrnot(document.querySelectorAll('input[name="board[]"]'));
		isYear = emptyOrnot(document.querySelectorAll('input[name="year[]"]'));
		isPer = emptyOrnot(document.querySelectorAll('input[name="percentage[]"]'));


		var row2 = document.getElementById('skill-table').rows.length;
		isSkill = emptyOrnot(document.querySelectorAll('input[name="skill[]"]'));
		isDescription = emptyOrnot(document.querySelectorAll('input[name="skilldescri[]"]'));

		isExperience = emptyOrnot(document.querySelectorAll('input[name="experience[]"]'));
		isFrom = emptyOrnot(document.querySelectorAll('input[name="from[]"]'));
		isTo = emptyOrnot(document.querySelectorAll('input[name="to[]"]'));
		isExDescription = emptyOrnot(document.querySelectorAll('input[name="exdescri[]"]'));

	if(profile_image.length === 0){
		showAlert('Please upload profile picture.');
	}else if($('#name').val() == ''){
		showAlert('Please enter your name.');
	}else if($('#email').val() == ''){
		showAlert('Please enter your email.');
	}else if($('#number').val() == ''){
		showAlert('Please enter your contact number.');
	}else if($('#objective').val() == ''){
		showAlert('Please enter your objective.');
	}else if($('#hobbies').val() == ''){
		showAlert('Please enter your hobbies.');
	}else if(row1 == 1 || isQualification || isBoard || isYear || isPer){
		showAlert('Please add your qualifications.');
	}else if(row2 == 1 || isDescription || isSkill){
		showAlert('Please add your skills.');
	}else if(isExperience || isTo || isFrom || isExDescription){
		showAlert('Please add your experiences.');
	}else if($("#declaration").val() == ''){
		showAlert('Please enter your declaration.');
	}else{
		$.ajax({
			url  : "API.php?newUser",
			type : "POST",
			data : skill_count_form,
			beforeSend:function(){
				$('.alert-container').css('display','flex');
				$(".alert-inner-container").html('Processing...');
			},
			contentType: false, cache: false, processData:false,
			success : function(data){
				$(".alert-inner-container").html('Data Inserted Successfully.');
				setTimeout(function(){
					location.reload();
				},2000);
			}
		});
	}
}));