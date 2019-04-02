/**
 * File : editUser.js 
 * 
 * This file contain the validation of edit user form
 * 
 * @author Kishor Mali
 */
$(document).ready(function(){
	
	var editValveForm = $("#editValve");
	
	var validator = editValveForm.validate({
		
		rules:{
			param1 : { required : true },
			param2 : {required : true},
			param3 : { required : true},
			param4 : { required : true},
			param5 : { required : true},
			param6 : { required : true},
			param7 : { required : true },
			param8 : {required : true},
			param9 : { required : true},
			param10 : { required : true, selected : true },
			param11 :{ required : true, selected : true },
			param12 :{ required : true, selected : true }
			
		},
		messages:{
			param1 :{ required : "This field is required" },
			param2 :{ required : "This field is required" },
			param3 :{ required : "This field is required" },
			param4 :{ required : "This field is required" },
			param5 :{ required : "This field is required" },
			param6 :{ required : "This field is required" },
			param7 :{ required : "This field is required" },
			param8 :{ required : "This field is required" },
			param9 :{ required : "This field is required" },
			param10 :{ required : "This field is required", selected : "Please select atleast one option" },
			param11 :{ required : "This field is required", selected : "Please select atleast one option" },
			param12 :{ required : "This field is required", selected : "Please select atleast one option" }
		}
	});
});