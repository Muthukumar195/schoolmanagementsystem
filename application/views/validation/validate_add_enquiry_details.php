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
	
	jQuery("#enq_st_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a student name"
	});
	jQuery("#gender").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a  gender"
	});
	
	jQuery("#class_id").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a  class"
	});
	jQuery("#enq_dob").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a Date of birth"
	});
    jQuery("#enq_father_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a father name"
	});
	jQuery("#enq_email").validate({
	expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
	message: "Please enter a e-mail"
	});
	jQuery("#enq_mobile").validate({
	expression: "if (VAL.match(/^[1-9][0-9]{9}$/)) return true; else return false;",
	message: "Please enter a mobile"
	});
	jQuery("#enq_address").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a address"
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