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
	
	var addmotorForm = $("#addMotor");
	
	var validator = addmotorForm.validate({
		
		rules:{
			size :{ required : true, selected : true },
			el_brand : { required : true },
			el_sn : {required : true},
			el_model : { required : true},
			el_power : { required : true},
			el_amp : { required : true},
			el_rpm : { required : true},
			el_type : { required : true },
			el_size : {required : true},
			el_weight : { required : true},
			el_de : { required : true},
			el_nde : { required : true},
			el_outshaft : { required : true},
			pm_in : { required : true, selected : true },
			pm_lub :{ required : true, selected : true },
			pm_over :{ required : true, selected : true }
		},
		messages:{
			size :{ required : "This field is required", selected : "Please select atleast one option" },
			el_brand :{ required : "This field is required" },
			el_sn :{ required : "This field is required" },
			el_model :{ required : "This field is required" },
			el_power :{ required : "This field is required" },
			el_amp :{ required : "This field is required" },
			el_rpm :{ required : "This field is required" },
			el_type :{ required : "This field is required" },
			el_size :{ required : "This field is required" },
			el_weight :{ required : "This field is required" },
			el_de :{ required : "This field is required" },
			el_nde :{ required : "This field is required" },
			el_outshaft :{ required : "This field is required" },
			pm_in :{ required : "This field is required", selected : "Please select atleast one option" },
			pm_lub :{ required : "This field is required", selected : "Please select atleast one option" },
			pm_over :{ required : "This field is required", selected : "Please select atleast one option" }
			
		}
	});
});
