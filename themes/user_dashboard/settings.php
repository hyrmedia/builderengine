<?php echo get_header() ?>

<?php echo get_sidebar() ?>

<!-- begin #content -->
<div id="content" class="content" style="min-height:800px">
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="/admin">Home</a></li>
	 <li><a href="#">Settings</a></li>
	  <li class="active">Edit Settings</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Settings</h1>
<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
                <!-- begin col-8 -->
			    <div class="col-md-8">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Settings / General Details</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" method="post" data-parsley-validate="true" name="demo-form">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="websitetitle">Display Avatar Image:</label>
									<div class="col-md-6 col-sm-6">
										<label class="radio-inline">
										 	<input type="radio" name="avatar" value="1" <?php echo ( $avatar ) ? 'checked="checked"' : ''; ?> > Yes
										</label>
										<label class="radio-inline">
										  	<input type="radio" name="avatar" value="0" <?php echo ( !$avatar ) ? 'checked="checked"' : ''; ?> > No
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" class="btn btn-primary">Save Settings</button>
									</div>
								</div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
				
                <!-- end col-8 -->
              <div class="col-md-4">
			        <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Support Builder</h4>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BuilderEngine Support Forums</td>
							            <td><a href="#modal-dialog" class="btn btn-sm btn-primary" data-toggle="modal">View</a></td>
							        </tr>
							        <tr>
							            <td>BuilderEngine Tutorials/Guides</td>
							            <td><a href="#modal-guides" class="btn btn-sm btn-primary" data-toggle="modal">View</a></td>
							        </tr>
							        <tr>
							            <td>BuilderEngine Support Tickets</td>
							            <td><a href="#modal-tickets" class="btn btn-sm btn-primary" data-toggle="modal">View</a></td>
							        </tr>
							        <tr>
							            <td>BuilderEngine.com Account Login</td>
							            <td><a href="#modal-cloudlogin" class="btn btn-sm btn-success" data-toggle="modal">View</a></td>
							        </tr>
                                </tbody>
                            </table>
							<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">BuilderEngine Support Forums</h4>
										</div>
										<div class="modal-body">
											You are about to leave your Administration Control Panel, click Continue to view page.
										</div>
										<div class="modal-footer">
											<a href="" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="http://builderengine.com/forums/" class="btn btn-sm btn-success">Continue</a>
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade" id="modal-guides">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">BuilderEngine Tutorials/Guides</h4>
										</div>
										<div class="modal-body">
											You are about to leave your Administration Control Panel, click Continue to view page.
										</div>
										<div class="modal-footer">
											<a href="" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="http://builderengine.com/page-support.html" class="btn btn-sm btn-success">Continue</a>
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade" id="modal-tickets">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">BuilderEngine Support Tickets</h4>
										</div>
										<div class="modal-body">
											You are about to leave your Administration Control Panel, click Continue to view page.
										</div>
										<div class="modal-footer">
											<a href="" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="http://builderengine.com/page-support.html" class="btn btn-sm btn-success">Continue</a>
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade" id="modal-cloudlogin">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">BuilderEngine.com Account Login</h4>
										</div>
										<div class="modal-body">
											You are about to leave your Administration Control Panel, click Continue to view page.
										</div>
										<div class="modal-footer">
											<a href="" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="http://builderengine.com/client/login" class="btn btn-sm btn-success">Continue</a>
										</div>
									</div>
								</div>
							</div>							
                        </div>
                    </div>
			    </div> 
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->
		
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
<?php echo get_footer()?>