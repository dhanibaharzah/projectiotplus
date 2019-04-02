/**
 * File : editUser.js 
 * 
 * This file contain the validation of edit user form
 * 
 * @author Kishor Mali
 */
$(document).ready(function(){
	
	var editGearboxForm = $("#editGearbox");
	
	var validator = editGearboxForm.validate({
		
		rules:{
			gx_brand : { required : true },
			gx_sn : {required : true},
			gx_model : { required : true},
			gx_ratio : { required : true},
			gx_outrpm : { required : true},
			gx_outshaft : { required : true},
			dm_brand : { required : true },
			dm_kw : {required : true},
			dm_rpm : { required : true},
			br_brand : { required : true},
			br_type : { required : true},
			br_torque : { required : true},
			pm_lub : { required : true},
			pm_oil :{ required : true, selected : true },
			pm_seal :{ required : true, selected : true },
			pm_over :{ required : true, selected : true }
			
		},
		messages:{
			size :{ required : "This field is required", selected : "Please select atleast one option" },
			gx_brand :{ required : "This field is required" },
			gx_sn :{ required : "This field is required" },
			gx_model :{ required : "This field is required" },
			gx_ratio :{ required : "This field is required" },
			gx_outrpm :{ required : "This field is required" },
			gx_outshaft :{ required : "This field is required" },
			dm_brand :{ required : "This field is required" },
			dm_kw :{ required : "This field is required" },
			dm_rpm :{ required : "This field is required" },
			br_brand :{ required : "This field is required" },
			br_type :{ required : "This field is required" },
			br_torque :{ required : "This field is required" },
			pm_lub :{ required : "This field is required" },
			pm_oil :{ required : "This field is required", selected : "Please select atleast one option" },
			pm_seal :{ required : "This field is required", selected : "Please select atleast one option" },
			pm_over :{ required : "This field is required", selected : "Please select atleast one option" }
		}
	});
});