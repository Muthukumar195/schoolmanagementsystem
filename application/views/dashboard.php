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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>
					
				</div> 
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">


					<!-- Dashboard content -->
					<div class="row">
						<div class="col-lg-8">
							<!-- Quick stats boxes -->
							<div class="row">
								<div class="col-lg-4">

									<!-- Members online -->
									<div class="panel bg-teal-400">
										<div class="panel-body">
											<div class="heading-elements">
												<span class="heading-text badge bg-teal-800">Member</span>
											</div>

											<h3 class="no-margin">3,450</h3>
											Members online
											<div class="text-muted text-size-small">489 avg</div>
										</div>

										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>
									<!-- /members online -->

								</div>

								<div class="col-lg-4">

									<!-- Current server load -->
									<div class="panel bg-pink-400">
										<div class="panel-body">
											<div class="heading-elements">
                                            <span class="heading-text badge bg-pink-800">Student</span>
												<!--<ul class="icons-list">
							                		<li class="dropdown">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	--></ul>
											</div>

											<h3 class="no-margin">49.4%</h3>
											Current server load
											<div class="text-muted text-size-small">34.6% avg</div>
										</div>

										<div id="server-load"></div>
									</div>
									<!-- /current server load -->

								</div>

								<div class="col-lg-4">

									<!-- Today's revenue -->
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<div class="heading-elements">
												<span class="heading-text badge bg-blue-800">Employee</span>
                                                <!--<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>-->
						                	</div>

											<h3 class="no-margin">$18,390</h3>
											Today's revenue
											<div class="text-muted text-size-small">$37,578 avg</div>
										</div>

										<div id="today-revenue"></div>
									</div>
									<!-- /today's revenue -->

								</div>
							</div>
							<!-- /quick stats boxes -->
						</div>

						<div class="col-lg-4">
						

						</div>
					</div>
					<!-- /dashboard content -->
                

<?php 
include("include/main_js.php");
include("include/footer.php");?>