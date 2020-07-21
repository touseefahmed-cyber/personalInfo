
$(document).ready(function(){

	// Custom method to validate username
	$.validator.addMethod("usernameRegex", function(value, element) {
		return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
	}, "Username must contain only letters, numbers");

	$('select#interestedProduct').on('change', function()
	{
		if( this.value ){
			$('#interestedModulesCon').show()
		}
		else {
			$('#interestedModulesCon').hide()
		}
	});

	$(".next").click(function(){
		var form = $("#myform");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').addClass("has-error");
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').removeClass("has-error");
			},
			rules: {
				username: {
					required: true,
					usernameRegex: true,
					minlength: 6,
				},
				email: {
					required: true,
					minlength: 3,
				},
				phone:{
					required: true,
					minlength: 3,
				},
				job_title:{
					required: true,
					minlength: 3,
				},
				interestedProduct:{
					required: true,
				},
				interestedModules:{
					required: true,
				}

			},
			messages: {
				username: {
					required: "Username required",
				},
				email : {
					required: "Email required",
				},
				phone:{
					required: "Phone required",
				},
				job_title:{
					required: "Job Title required",
				},
				interestedProduct:{
					required: "Product required",
				},
				interestedModules:{
					required: "Modules required",
				}

			}
		});
		if (form.valid() === true){
			if ($('#account_information').is(":visible")){
				current_fs = $('#account_information');
				next_fs = $('#personal_information');
			}
			next_fs.show();
			current_fs.hide();
		}
	});

	$('#previous').click(function(){
		if($('#personal_information').is(":visible")){
			current_fs = $('#personal_information');
			next_fs = $('#account_information');
		}
		next_fs.show();
		current_fs.hide();
	});


});
