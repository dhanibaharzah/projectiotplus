/**
 * File : editUser.js 
 * 
 * This file contain the validation of edit user form
 * 
 * @author Kishor Mali
 */
$(document).ready(function(){
	
	var editToolForm = $("#editTool");
	
	var validator = editToolForm.validate({
		
		rules:{
			st_brand : { required : true },
			st_sn : {required : true},
			st_model : { required : true},
			st_fungsi : { required : true},
			st_power : { required : true},
			st_price : { required : true},
			st_noasset : { required : true },
			st_io : {required : true},
			st_other : { required : true},
			st_life1 : { required : true, selected : true },
			st_life2 :{ required : true, selected : true },
			st_pm :{ required : true, selected : true }
			
		},
		messages:{
			st_brand :{ required : "This field is required" },
			st_sn :{ required : "This field is required" },
			st_model :{ required : "This field is required" },
			st_fungsi :{ required : "This field is required" },
			st_power :{ required : "This field is required" },
			st_price :{ required : "This field is required" },
			st_noasset :{ required : "This field is required" },
			st_io :{ required : "This field is required" },
			st_other :{ required : "This field is required" },
			st_life1 :{ required : "This field is required", selected : "Please select atleast one option" },
			st_life2 :{ required : "This field is required", selected : "Please select atleast one option" },
			st_pm :{ required : "This field is required", selected : "Please select atleast one option" }
		}
	});
});