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
		
	jQuery("#academic_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a academic name"
	});
	jQuery("#class_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a Class Name"
	});
	
	jQuery("#academic_start").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select  a academic start"
	});
	
	jQuery("#academic_end").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a academic end"
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