<?php

        function initialize_milestones_js()
        {

            echo "
            <script type=\"text/javascript\" src=\"/blocks/milestones/js/scrollMonitor.js\"></script>

            <script>
                $(document).ready(function() {
					/* Commas to Number
					------------------------------------------------ */
					var handleAddCommasToNumber = function(value) {
						return value.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, \"$1,\");
					};


					/* Page Container Show
					------------------------------------------------ */
					var handlePageContainerShow = function() {
						$('#page-container').addClass('in');
					};

					/* Page Scroll Content Animation
					------------------------------------------------ */
					var handlePageScrollContentAnimation = function() {
						$('[data-scrollview=\"true\"]').each(function() {
							var myElement = $(this);

							var elementWatcher = scrollMonitor.create( myElement, 60 );
							
							elementWatcher.enterViewport(function() {
								$(myElement).find('[data-animation=true]').each(function() {
									var targetAnimation = $(this).attr('data-animation-type');
									var targetElement = $(this);
									if (!$(targetElement).hasClass('contentAnimated')) {
										if (targetAnimation == 'number') {
											var finalNumber = parseInt($(targetElement).attr('data-final-number'));
											$({animateNumber: 0}).animate({animateNumber: finalNumber}, {
												duration: 1000,
												easing:'swing',
												step: function() {
													var displayNumber = handleAddCommasToNumber(Math.ceil(this.animateNumber));
													$(targetElement).text(displayNumber).addClass('contentAnimated');
												}
											});
										} else {
											$(this).addClass(targetAnimation + ' contentAnimateds');
										}
									}
								});
							});
						});
					};
					
					handlePageScrollContentAnimation();
                });
            </script>
            ";
        }
        add_action("be_foot", "initialize_milestones_js");
		
    class milestones_block_handler extends  block_handler{
		function info()
		{
			$info['category_name'] = "BuilderEngine";
			$info['category_icon'] = "dsf";

			$info['block_name'] = "Milestones";
			$info['block_icon'] = "fa-envelope-o";
			
			return $info;
		}
		public function generate_admin()
		{
			//<link href="=get_theme_path()css/bootstrap.min.css" rel="stylesheet">
            
            $section_text = $this->block->data('section_text');
            $section_number = $this->block->data('section_number');
            
            if(!is_array($section_text) || empty($section_text))
            {
                $section_text[0] = "Cups of Coffee (cost)";
                $section_number[0] = "15";
                $section_text[1] = "Registered Members";
                $section_number[1] = "5039";
                $section_text[2] = "Services Sold";
                $section_number[2] = "3191";
                $section_text[3] = "Years in Business";
                $section_number[3] = "20";
            }
            $num_sections = count($section_text);?>

            <script>
                var num_sections = <?=$num_sections?>;
                <?php if($num_sections == 0): ?>
                    var num_sections = 2;
                <?php endif;?>
                $(document).ready(function (){
                    $("#myTab a").click(function (e) {
                      e.preventDefault();
                      $(this).tab("show");
                    });
                    $(".delete-section").bind("click.delete_section",function (e) {
                        section = $(this).attr('section');
                        $("#section-section-" + section).remove();
                        $("#section-section-tab-" + section).remove();
                    });
                    $("#add-section").click(function (e) {
                        num_sections++;
                        $("#section-section-tabs").append('<li id="section-section-tab-' + num_sections +'"><a href="#section-section-' + num_sections + '" data-toggle="tab">section ' + num_sections + '</a></li>');
                        $("#section-sections").append('\
                            <div class="tab-pane" id="section-section-' + num_sections + '">\
                              \
                            </div>\
                                ');
                        e.preventDefault();
                        html = $("#section-section-1").html();
                        $("#section-section-" + num_sections).html(html);
                        $('#sections a:last').tab('show');
                        $('#section-section-' + num_sections).find('.delete-section').attr('section', num_sections);
                        $('#section-section-' + num_sections).find('[name="section_text[0]"]').attr('name', 'section_text[' + (num_sections-1) + ']');
                        $('#section-section-' + num_sections).find('[name="section_number[0]"]').attr('name', 'section_number[' + (num_sections-1) + ']');
                        $(".delete-section").unbind("click.delete_section");
                        $(".delete-section").bind("click.delete_section",function (e) {
                            section = $(this).attr('section');
                            $("#section-section-" + section).remove();
                            $("#section-section-tab-" + section).remove();
                            $('#sections a:first').tab('show');
                        });
                    });
                });
            </script>
            <ul class="nav nav-tabs" id="section-section-tabs" style="margin-left:-15px">
                <li style="height: 42px;"><span style="height: 100%;padding-top: 10px;" id="add-section" class="btn btn-primary">Add section</span></li>
                <?php for($i = 0; $i < $num_sections; $i++): ?>
                    <li class="<?php if($i == 0) echo'active'?>" id="section-section-tab-<?=$i+1?>"><a href="#section-section-<?=$i+1?>" data-toggle="tab">section <?=$i+1?></a></li>
                <?php endfor; ?>
                <?php if($num_sections == 0): ?>
                    <li class="active"><a href="#section-section-1" data-toggle="tab">section 1</a></li>
                <?php endif;?>
            </ul>
            <div class="tab-content" id="section-sections">
                <?php for($i = 0; $i < $num_sections; $i++): ?>
                	<?php if(empty($section_text[$i]))
                        		continue;?>
                    <div class="tab-pane <?php if($i == 0) echo'active'?>" id="section-section-<?=$i+1?>">
                        <?php
                        $this->admin_input('section_text['.$i.']','text','Text: ', $section_text[$i]);
                        $this->admin_input('section_number['.$i.']','text','Number: ', $section_number[$i]);
                        ?>
                        <div class="form-group">
                            <span class="btn btn-danger delete-section" section="<?=$i+1?>">Delete section</span>
                        </div>
                    </div>
                <?php endfor; ?>


                <?php if($num_sections == 0): ?>
                    <div class="tab-pane active" id="section-section-1">
                        <?php
                        $this->admin_input('section_text[0]','text','Text: ');
                        $this->admin_input('section_number[0]','text','Number: ');
                        ?>
                    </div>
                <?php endif;?>
            </div>
            <?php
        }
        public function generate_style()
        {
			include $_SERVER['DOCUMENT_ROOT'].'/builderengine/public/animations/animations.php';
            $text_font_color = $this->block->data('text_font_color');
            $text_font_weight = $this->block->data('text_font_weight');
            $text_font_size = $this->block->data('text_font_size');

            $number_font_color = $this->block->data('number_font_color');
            $number_font_weight = $this->block->data('number_font_weight');
            $number_font_size = $this->block->data('number_font_size');

 		    $text_animation_type = $this->block->data('text_animation_type');	  
		    $text_animation_duration = $this->block->data('text_animation_duration');
		    $text_animation_event = $this->block->data('text_animation_event');
		    $text_animation_delay = $this->block->data('text_animation_delay');
			
 		    $number_animation_type = $this->block->data('number_animation_type');	  
		    $number_animation_duration = $this->block->data('number_animation_duration');
		    $number_animation_event = $this->block->data('number_animation_event');
		    $number_animation_delay = $this->block->data('number_animation_delay');
            ?>
            <div role="tabpanel">

                <ul class="nav nav-tabs" role="tablist" style="margin-left: -20px;">
                    <li role="presentation" class="active"><a href="#text" aria-controls="text" role="tab" data-toggle="tab">Text</a></li>
                    <li role="presentation"><a href="#number" aria-controls="number" role="tab" data-toggle="tab">Number</a></li>
				</ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="text">
                        <?php
                        $this->admin_input('text_font_color','text', 'Font color: ', $text_font_color);
                        $this->admin_input('text_font_weight','text', 'Font weight: ', $text_font_weight);
                        $this->admin_input('text_font_size','text', 'Font size: ', $text_font_size);
					    $this->admin_select('text_animation_type', $types,'Animation type: ',$text_animation_type);
					    $this->admin_select('text_animation_duration', $durations,'Animation duration: ',$text_animation_duration);
					    $this->admin_select('text_animation_event', $events,'Animation Start: ',$text_animation_event);	
					    $this->admin_select('text_animation_delay', $delays,'Animation Delay: ',$text_animation_delay);
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="number">
                        <?php
                        $this->admin_input('number_font_color','text', 'Font color: ', $number_font_color);
                        $this->admin_input('number_font_weight','text', 'Font weight: ', $number_font_weight);
                        $this->admin_input('number_font_size','text', 'Font size: ', $number_font_size);
					    $this->admin_select('number_animation_type', $types,'Animation type: ',$number_animation_type);
					    $this->admin_select('number_animation_duration', $durations,'Animation duration: ',$number_animation_duration);
					    $this->admin_select('number_animation_event', $events,'Animation Start: ',$number_animation_event);	
					    $this->admin_select('number_animation_delay', $delays,'Animation Delay: ',$number_animation_delay);
                        ?>
                    </div>
				</div>

            </div>
            <?php
        }
		public function generate_content()
		{
			$section_text = $this->block->data('section_text');
            $section_number = $this->block->data('section_number');

 		    $text_animation_type = $this->block->data('text_animation_type');	  
		    $text_animation_duration = $this->block->data('text_animation_duration');
		    $text_animation_event = $this->block->data('text_animation_event');
		    $text_animation_delay = $this->block->data('text_animation_delay');
			
 		    $number_animation_type = $this->block->data('number_animation_type');	  
		    $number_animation_duration = $this->block->data('number_animation_duration');
		    $number_animation_event = $this->block->data('number_animation_event');
		    $number_animation_delay = $this->block->data('number_animation_delay');

            if(!is_array($section_text) || empty($section_text))
            {
                $section_text[0] = "Cups of Coffee (cost)";
                $section_number[0] = "15";
                $section_text[1] = "Registered Members";
                $section_number[1] = "5039";
                $section_text[2] = "Services Sold";
                $section_number[2] = "3191";
                $section_text[3] = "Years in Business";
                $section_number[3] = "20";
            }
            
            // style
            $text_font_color = $this->block->data('text_font_color');
            $text_font_weight = $this->block->data('text_font_weight');
            $text_font_size = $this->block->data('text_font_size');

            $number_font_color = $this->block->data('number_font_color');
            $number_font_weight = $this->block->data('number_font_weight');
            $number_font_size = $this->block->data('number_font_size');

            $num_sections = count($section_text);
			$settings = array();
			for($i = 0; $i < $num_sections; $i++)
			{
				$number_settings[0] = 'number'.$this->block->get_id().$i;
				$number_settings[1] = $this->block->data('number_animation_event');
				$number_settings[2] =$this->block->data('number_animation_state').' '.$this->block->data('number_animation_delay').' '.$this->block->data('number_animation_type');
				array_push($settings,$number_settings);
				$text_settings[0] = 'text'.$this->block->get_id().$i;
				$text_settings[1] = $this->block->data('text_animation_event');
				$text_settings[2] =$this->block->data('text_animation_state').' '.$this->block->data('text_animation_delay').' '.$this->block->data('text_animation_type');
				array_push($settings,$text_settings);
			}

		  add_action("be_foot", generate_animation_events($settings));
		  
            $text_style = 
                'style="
                    color: '.$text_font_color.' !important;
                    font-weight: '.$text_font_weight.' !important;
                    font-size: '.$text_font_size.' !important;
                "';
            $number_style = 
                'style="
                    color: '.$number_font_color.' !important;
                    font-weight: '.$number_font_weight.' !important;
                    font-size: '.$number_font_size.' !important;
                "';

			$output = '
			<link href="'.base_url('blocks/milestones/css/style.css').'" rel="stylesheet">
			<link href="'.base_url('builderengine/public/animations/css/animate.min.css').'" rel="stylesheet" />
			<div id="milestone" class="blockcontent-milestones bg-black-darker has-bg custom-content" data-scrollview="true">
	            <div class="content-bg">
	                
	            </div>
	            
	            <div class="container">
	                <div class="row">';

	                	for($i = 0; $i < $num_sections; $i++)
                        {
                        	if(empty($section_text[$i]))
                        		continue;
                        	if($num_sections == 1)
                        		$size = 'col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3';
                        	elseif($num_sections == 2)
                        		$size = 'col-md-6 col-sm-6';
                        	elseif($num_sections == 3)
                        		$size = 'col-md-4 col-sm-4';
                        	else
                        		$size = 'col-md-3 col-sm-3';
                        	
	                    	$output .= '
	                    	<div class="'.$size.' milestone-col">
		                        <div class="milestone">
		                            <div id="number'.$this->block->get_id().''.$i.'" class="number" '.$number_style.' data-animation="true" data-animation-type="number" data-final-number="'.$section_number[$i].'">'.$section_number[$i].'</div>
		                            <div id="text'.$this->block->get_id().''.$i.'" class="title" '.$text_style.'>'.$section_text[$i].'</div>
		                        </div>
		                    </div>';
					    }

					    $output .= '
	                </div>
	            </div>
	        </div>';

	        return $output;
		}
		public function generate_admin_menus()
		{
			
		}
	}
?>