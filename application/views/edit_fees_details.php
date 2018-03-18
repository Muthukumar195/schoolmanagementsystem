<?php include("include/header.php"); ?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<?php include("include/sidebar.php"); ?>
			<!-- /main sidebar -->


			    <!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Fees Details</h4>
						</div>

						<!--<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>-->
					</div>
					
				</div> 
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
                  <div class="row">
						<div class="col-md-6">
                        	<!--start Form-->
                        <div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-pencil6"></i>&nbsp;<strong>Edit Fees Details</strong></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
                               <?php if($this->session->flashdata('failear_msg')){?>
                                    <div class="alert alert-danger alert-styled-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<span class="text-semibold"><?php echo $this->session->flashdata('failear_msg'); ?></span>
                                    </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('success_msg')){?>
                                   <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<span class="text-semibold"> <?php echo $this->session->flashdata('success_msg'); ?></span>
								    </div>
                                <?php } ?>
							 <?php echo form_open_multipart('fees_details/edit_validate_fees_details', array('subject'=>'form-horizontal')); ?>
                             <strong class="text-danger"><?php echo validation_errors(); ?></strong>
								<fieldset class="content-group">
                                <?php foreach($get_fees_details->result() as $row){ ?>
                                   <div class="form-group">
										<label>Class code<span class="req">*</span></label>
										 <?php
                                         $option_class[''] = "Select Class Code"; 
                                        foreach($class_list->result() as $class){
                                            
                                            $option_class[$class->Class_id] = $class->Class_code;
                                        }
                                        echo form_dropdown('class_id', $option_class, $row->Fees_class_id, 'class="form-control" id="class_id"');
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row->Fees_id; ?>">
                                        <div class="text-right">
                                        <strong id="class_name" class="text-violet"></strong>
                                        </div>
									</div>
                                    <div class="form-group">
										<label>Academic year<span class="req">*</span></label>
										 <?php
                                         $option_aca[''] = "Select Academic year"; 
                                        foreach($academic_list->result() as $aca){
                                            
                                            $option_aca[$aca->Academic_id] = $aca->Academic_name;
                                        }
                                        echo form_dropdown('academic_id', $option_aca, $row->Fees_academic_id, 'class="form-control" id="academic_id"');
                                        ?>
                                        <div class="text-right">
                                        <strong id="academic_year" class="text-violet"></strong>
                                        </div>
									</div>
                                     <div class="form-group">
										<label>Fees amount<span class="req">*</span></label>
										 <?php
                                         $data1 = array(
										 'name'     => 'fees_amount',
										 'id'       => 'fees_amount',
										 'value'    => $row->Fees_amount,
										 'placeholder' => 'Enter Fees amount',
										 'onkeyup'  => 'checkInt(this)',
										 'class'    => 'form-control'
										 );
                                        echo form_input($data1);
                                        ?>
                                        <div class="text-right">
                                        <strong id="academic_year" class="text-violet"></strong>
                                        </div>
									</div>
                                   
                                    <div class="text-center">
											<button type="submit" class="btn bg-teal-400">Save</button>
                                            <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='fees_details_list'" >
									</div>
                                    <?php } ?>
							</form>
						</div>
					</div>
					<!--End form-->
						</div>
                        <div class="col-md-6">
							
                            <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Fees Details List</h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                    <!--<a href="add_user_details"><button type="button" class=" text-right btn bg-violet btn-labeled"><b><i class="icon-add"></i></b> Ad</button></a>-->
                                   
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
    
                            <!--<div class="panel-body">
                               
                            </div>-->
    
                            <table class="table datatable-responsive">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Class</th>
                                        <th>Academic</th>
                                        <th>Year</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $sno=1;
                                foreach($get_fees_details->result() as $row){ ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $row->Class_name; ?></td>
                                         <td><?php echo $row->Academic_name; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($row->Academic_start)).' To '.date('d-m-Y', strtotime($row->Academic_end)); ?></td>
                                         <td><?php echo $row->Fees_amount; ?></td>
                                         <td>
										<?php 
                                        if($row->Fees_status=="A"){
                                          echo '<span class="label label-success"><i class="icon-checkmark2"></i>Active</span>';
                                        }else{
                                             
                                            echo '<span class="label label-danger"><i class="icon-cross3"></i>Deny</span>';
                                        }
                                        ?>
                                        </td>
                                       
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="edit_fees_details?id=<?php echo $row->Fees_id; ?>" class="text-info"><i class="icon-pen6"></i> Edit</a></li>
                                                        <li>
														<?php 
                                                        if($row->	Fees_status=="A"){
                                                            echo '<a href="deny?id='.$row->Fees_id.'" class="text-danger"><i class="icon-cross3"></i>Deny</a>';
                                                        }
                                                        else{
                                                            echo '<a href="approve?id='.$row->Fees_id.'" class="text-success"><i class="icon-checkmark2"></i>Active</a>';
                                                        }
                                                        ?>
                                                        </li>
                                                        <li><a href="delete?id=<?php echo $row->Fees_id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="icon-trash"></i> Delete</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php $sno++; } ?>
                                </tbody>
                                <tfoot>
                                     <th>Sno</th>
                                        <th>Class</th>
                                        <th>Academic</th>
                                        <th>Year</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tfoot>
                            </table>
                        </div>

						</div>
					</div>
                <!--End Table--> 

<?php 
include("include/main_js.php");
include("validation/validation_fees_details.php");
include("include/footer.php");
?>
<script type="application/javascript">
$(document).ready(function(){
	$('#employee_id').change(function(){
		var employee_id = $('#employee_id').val();
		/*alert(employee_id);*/
		$.ajax({
			type : "GET",
			url  : "<?php echo base_url(); ?>/index.php/employee/ajax_check_employee_name",
			data : {"employee_id" : employee_id},
			success : function(data){
			jQuery("#employee_name").html(data);
			}
		})
	})
	
})

</script>
<script type="application/javascript">
$(document).ready(function(){
	$('#class_id').change(function(){
		var class_id = $('#class_id').val();
		/*alert(employee_id);*/
		$.ajax({
			type : "GET",
			url  : "<?php echo base_url(); ?>/index.php/class_details/ajax_check_class_name",
			data : {"class_id" : class_id},
			success : function(data){
				/*alert(data);*/
			jQuery("#class_name").html(data);
			}
		})
	})
	
})

</script>
<script type="application/javascript">
$(document).ready(function(){
	$('#academic_id').change(function(){
		var academic_id = $('#academic_id').val();
		/*alert(academic_id);*/
		$.ajax({
			type : "GET",
			url  : "<?php echo base_url(); ?>/index.php/academic/ajax_check_academic_year",
			data : {"academic_id" : academic_id},
			success : function(data){
				/*alert(data);*/
			jQuery("#academic_year").html(data);
			}
		})
	})
	
})

</script>
<script type="application/javascript">
$(document).ready(function(){
	$('#subject_id').change(function(){
		var subject_id = $('#subject_id').val();
		/*alert(subject_id);*/
		$.ajax({
			type : "GET",
			url  : "<?php echo base_url(); ?>/index.php/subject_details/ajax_check_subject_year",
			data : {"subject_id" : subject_id},
			success : function(data){
				/*alert(data);*/
			jQuery("#subject_name").html(data);
			}
		})
	})
	
})

</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#class_id').change(function(){
			var class_id = $('#class_id').val();
			/*alert(class_id);*/
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/academic/check_academic_year",
				data :{"class_id" : class_id},
				success : function(data){
					jQuery("#academic_id").html(data);
					/*alert(data);*/
				}
			});
			
		});	
	});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>

 
