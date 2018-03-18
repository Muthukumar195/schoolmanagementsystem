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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Student Details</h4>
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
                        <div class="col-md-12">
							
                            <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Student Details List</h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                    <!--<a href="add_user_details"><button type="button" class=" text-right btn bg-violet btn-labeled"><b><i class="icon-add"></i></b> Ad</button></a>-->
                                   
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
    
                           <!-- <div class="panel-body">
                            </div>-->
    
                            <table class="table   datatable-responsive">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Roll No</th>
                                        <th>Admission No</th>
                                        <th>Student Name</th>
                                        <th>Admission Date</th>
                                        <th>Class</th>
                                        <th>Acadamic</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $sno=1;
                                foreach($student_details_list->result() as $row){ ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $row->Student_roll_no; ?></td>
                                        <td><?php echo $row->Student_register_no; ?></td>
                                        <td><?php echo $row->Student_first_name; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($row->Student_join_date)); ?></td>
                                        <td><?php echo $row->Class_name; ?></td>
                                        <td><?php echo $row->Academic_name; ?></td>
                                        <td>
										<?php 
                                        if($row->Student_status=="A"){
                                          echo '<span class="label label-success"><i class="icon-checkmark2"></i>Active</span>';
										  
                                        }else{
                                             
                                            echo '<span class="label label-danger"><i class="icon-cross3"></i>Deny</span>';
                                        }
                                        ?>
                                        </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                              <li><a href="view_student_details?id=<?php echo $row->Student_id; ?>"><i class="icon-file-eye"></i></a></li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="edit_student_details?id=<?php echo $row->Student_id; ?>" class="text-info"><i class="icon-pen6"></i> Edit</a></li>
                                                        <li>
														<?php 
                                                        if($row->Student_status=="A"){
                                                        echo '<a href="deny?id='.$row->Student_id.'" class="text-danger"><i class="icon-cross3"></i>Deny</a>';
                                                        }
                                                        else{
                                                            echo '<a href="approve?id='.$row->Student_id.'" class="text-success"><i class="icon-checkmark2"></i>Active</a>';
                                                        }
                                                        ?>
                                                        </li>
                                                        <li><a href="delete?id=<?php echo $row->Student_id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="icon-trash"></i> Delete</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                           
                                        </td>
                                    </tr>
                                    <?php $sno++; } ?>
                                </tbody>
                               
                                <tfoot>
                                  <th>Sno</th>
                                    <th>Roll No</th>
                                    <th>Admission No</th>
                                    <th>Student Name</th>
                                    <th>Admission Date</th>
                                    <th>Class</th>
                                    <th>Acadamic</th>
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
include("include/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>


