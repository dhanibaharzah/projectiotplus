/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function(){
	
	var addjobForm = $("#addjob");
	
	var validator = addjobForm.validate({
		
		rules:{
			machine :{ required : true, selected : true },
			jobtype : { required : true, selected : true },
			name : {required : true},
			detail : { required : true},
			dura : { required : true, digits : true},
			man_0 : { required : true, digits : true},
			man_1 : { required : true, digits : true},
			man_2 : { required : true, digits : true},
			man_3 : { required : true, digits : true},
			man_4 : { required : true, digits : true},
			man_5 : { required : true, digits : true}
		},
		messages:{
			machine :{ required : "This field is required", selected : "Please select atleast one option" },
			jobtype :{ required : "This field is required", selected : "Please select atleast one option" },
			name :{ required : "This field is required" },
			detail :{ required : "This field is required" },
			dura : { required : "This field is required", digits : "Please enter numbers only" },
			man_0 : { required : "This field is required", digits : "Please enter numbers only" },
			man_1 : { required : "This field is required", digits : "Please enter numbers only" },
			man_2 : { required : "This field is required", digits : "Please enter numbers only" },
			man_3 : { required : "This field is required", digits : "Please enter numbers only" },
			man_4 : { required : "This field is required", digits : "Please enter numbers only" },
			man_5 : { required : "This field is required", digits : "Please enter numbers only" }
			
		}
	});
});
