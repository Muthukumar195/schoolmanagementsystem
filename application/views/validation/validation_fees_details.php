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
	
	jQuery("#class_id").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a Class code"
	});
	
	jQuery("#academic_id").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select  a academic year"
	});
	
	jQuery("#fees_amount").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please Enter a Fees amount"
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