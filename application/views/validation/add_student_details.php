<!-- start jquery validation -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.validate.css" />

<script src="<?php echo base_url(); ?>assets/js/jquery_validation/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery_validation/jquery.validate.js" type="text/javascript">
</script>
<script src="<?php echo base_url(); ?>assets/js/jquery_validation/jquery.validation.functions.js" type="text/javascript">
</script>

<script type="text/javascript">
/* <![CDATA[ */
jQuery(function(){
		
	jQuery("#register_no").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a register no"
	});
	jQuery("#joining_date").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a joining date "
	});
	jQuery("#roll_no").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a roll no"
	});
	jQuery("#course_id").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a course id "
	});
	jQuery("#batch_id").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a batch name "
	});
	jQuery("#cat_id").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a Category Name "
	});
	jQuery("#first_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a first name"
	});
    jQuery("#last_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a last name"
	});	
	jQuery("#dob").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please Select date of birth"
	});	
	jQuery("#gender_id").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a gender "
	});
	jQuery("#birth_place").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a birth place"
	});
	jQuery("#nationality").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a nationality"
	});
	
	jQuery("#mother_tongue").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a mother tongue"
	});
	jQuery("#religion").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a religion"
	});
	jQuery("#present_address").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a present address"
	});
	jQuery("#con_mobile").validate({
    expression: "if (VAL.match(/^[1-9][0-9]{9}$/)) return true; else return false;",
	 message: "Please enter a Valid Mobile number",
    });
	jQuery("#con_email").validate({
	expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
	message: "Please Enter Your Valid Email ID"
	});
	jQuery("#con_city").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a city "
	});
	jQuery("#con_pin").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a pin number "
	});
	
	jQuery("#country").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a state"
	});
	
	jQuery("#state").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a state"
	});
	jQuery("#father_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a father name"
	});
	jQuery("#father_mobile").validate({
    expression: "if (VAL.match(/^[1-9][0-9]{9}$/)) return true; else return false;",
	 message: "Please enter a Valid Mobile number",
    });
	jQuery("#mother_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a mother name"
	});
	jQuery("#mother_mobile").validate({
    expression: "if (VAL.match(/^[1-9][0-9]{9}$/)) return true; else return false;",
	 message: "Please enter a Valid Mobile number",
    });
	 	
			
});
            /* ]]> */		
			
function checkInt(obj)
{
	if(obj.value*1 - obj.value*1!=0)
		{obj.value="";}
	
	if(obj.value.indexOf(" ",0)!=-1)
		{
		obj.value="";
		alert ("No Spaces Allowed");	
		obj.focus();
		obj.value="";
		}
}


</script>        
<!-- end jquery validation -->