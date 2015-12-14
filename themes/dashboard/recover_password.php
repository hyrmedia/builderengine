<?php echo get_header() ?>

<?php echo get_sidebar() ?>

<div id="content" class="content" style="min-height:800px">
    <ol class="breadcrumb pull-right">
        <li><a href="/admin">Home</a></li>
         <li><a href="#">User</a></li>
          <li class="active">Password Reset</li>
    </ol>
    <h1 class="page-header">Password Reset <small>Administration Control Panel</small></h1>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Password Reset</h4>
                </div>
                <div class="panel-body">
                    <form id="recovery" class="form-horizontal" action="" method="post">
                        <input type="hidden" name="token" value="<?php echo $token?>">
                        <div class="row-fluid">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="password" name="password" placeholder="New Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password"/>
                                </div>
                            </div>
                            <?php if($error == true):?>
                                <h4 style="color:red">Passwords do not match</h4>
                            <?php endif;?>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <button type="submit" class="btn btn-primary">Save Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
</div>

<?php echo get_footer()?>