<?php echo get_header() ?>

<?php echo get_sidebar() ?>
<div id="content" class="content" style="min-height:800px">
<ol class="breadcrumb pull-right">
	<li><a href="#">Home</a></li>
	<li><a href="#">Blog</a></li>
	<li class="active"><?=$page?> Category</li>
</ol>
<h1 class="page-header"><?=$page?> Category</h1>

<script src="<?php echo get_theme_path()?>assets/plugins/jquery-1.8.2/jquery-1.8.2.min.js"></script>

<div class="row">
    <div class="col-md-12">
		<div class="panel panel-inverse">
		    <div class="panel-heading">
		        <div class="panel-heading-btn">
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		        </div>
		        <h4 class="panel-title"><?=$page?> Category</h4>
		    </div>
		    <div class="panel-body panel-form">
		        <form class="form-horizontal form-bordered" data-parsley-validate="true" method="post" enctype="multipart/form-data" name="category">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="categoryname">Category Title:</label>
						<div class="col-md-8 col-sm-8">
							<input class="form-control" type="text" id="categoryname" name="name" value="<?=$object->name?>" data-parsley-required="true" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="categoryimage">Category Image:</label>
						<div class="col-md-6 col-sm-6">
					<span class="btn btn-success fileinput-button">
		                <i class="fa fa-plus"></i>
		                <span>Edit Image</span>
		                <input type="file" name="image" >
		            </span>
                        <?php if($object->image) : ?>
                            <div class="profile-avatar" style="width:250px !important">
                                <img style="width:100% !important; height:auto !important" class="file_preview" src="<?php echo $object->image?>" alt="No Image">
                            </div>
                        <?php endif;?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="categoryselection">Parent Category:</label>
						<div class="col-md-8 col-sm-8">								
							<select class="form-control" id="parent_id" name="parent_id" data-parsley-required="true">
								<option value="0">No Parent</option>						
				                    <?php $categories = new Category();?>
				                    <?php if($page == 'Add'):?>
					                    <?php foreach ($categories->get() as $parent_category):?>
						                    <option value="<?=$parent_category->id?>"><?=$parent_category->name?></option>
										<?php endforeach;?>
									<?php else:?>
										<?php foreach ($categories->get() as $parent_category):?>
											<?php if($parent_category->id != $object->id):?>
						                        <option value="<?=$parent_category->id?>" <?php if($object->parent_id == $parent_category->id) echo 'selected';?>><?=$parent_category->name?></option>
						                    <?php endif?> 
										<?php endforeach;?>
									<?php endif;?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4"></label>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-primary"><?=$page?> Category</button>
						</div>
					</div>
		        </form>
		    </div>
		</div>
    </div>
</div>
</div>
<?php $groups = new Group;?>
<script>
    $(document).ready(function (){
	    $('#access-groups').tagit({
	        fieldName: "groups_allowed",
	        singleField: true,
	        showAutocompleteOnFocus: true,
	        availableTags: [ <?php foreach ($groups->get() as $group): ?>"<?php echo $group->name?>", <?php endforeach;?>]
	    });
	});
</script>
<?php echo get_footer()?>