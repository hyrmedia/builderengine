<?php
class action_bar_block_handler extends  block_handler{
		function info()
		{
			$info['category_name'] = "BuilderEngine";
			$info['category_icon'] = "dsf";

			$info['block_name'] = "Action Bar";
			$info['block_icon'] = "fa-envelope-o";
			
			return $info;
		}
		public function generate_admin()
		{
			$title = $this->block->data('title');
            $text = $this->block->data('text');
            $button_text = $this->block->data('button_text');
            $button_link = $this->block->data('button_link');
            $icon = $this->block->data('icon');
            
            $this->admin_input('title','text', 'Title: ', $title);
            $this->admin_input('text','text', 'Text: ', $text);
            $this->admin_input('button_text','text', 'Button text: ', $button_text);
            $this->admin_input('button_link','text', 'Button link: ', $button_link);
            $this->admin_input('icon','text', 'Icon code: ', $icon);
		}
		public function generate_style()
		{
			include $_SERVER['DOCUMENT_ROOT'].'/builderengine/public/animations/animations.php';
			
            $title_font_color = $this->block->data('title_font_color');
            $title_font_weight = $this->block->data('title_font_weight');
            $title_font_size = $this->block->data('title_font_size');
			$title_animation_type = $this->block->data('title_animation_type');	  
		    $title_animation_duration = $this->block->data('title_animation_duration');
		    $title_animation_event = $this->block->data('title_animation_event');
		    $title_animation_delay = $this->block->data('title_animation_delay');
			
            $subtitle_font_color = $this->block->data('subtitle_font_color');
            $subtitle_font_weight = $this->block->data('subtitle_font_weight');
            $subtitle_font_size = $this->block->data('subtitle_font_size');
			$subtitle_animation_type = $this->block->data('subtitle_animation_type');	  
			$subtitle_animation_duration = $this->block->data('subtitle_animation_duration');
			$subtitle_animation_event = $this->block->data('subtitle_animation_event');
			$subtitle_animation_delay = $this->block->data('subtitle_animation_delay');
			
            $icon_font_color = $this->block->data('icon_font_color');
            $icon_font_size = $this->block->data('icon_font_size');
			$icon_font_weight = $this->block->data('icon_font_weight');
			$icon_animation_type = $this->block->data('icon_animation_type');	  
			$icon_animation_duration = $this->block->data('icon_animation_duration');
			$icon_animation_event = $this->block->data('icon_animation_event');
			$icon_animation_delay = $this->block->data('icon_animation_delay');

			$button_animation_type = $this->block->data('button_animation_type');	  
			$button_animation_duration = $this->block->data('button_animation_duration');
			$button_animation_event = $this->block->data('button_animation_event');
			$button_animation_delay = $this->block->data('button_animation_delay');	
			
            $background_image = $this->block->data('background_image');

            ?>
            <div role="tabpanel">

                <ul class="nav nav-tabs" role="tablist" style="margin-left: -20px;">
                    <li role="presentation" class="active"><a href="#icon" aria-controls="icon" role="tab" data-toggle="tab">Icon</a></li>
                    <li role="presentation"><a href="#title" aria-controls="title" role="tab" data-toggle="tab">Title</a></li>
                    <li role="presentation"><a href="#subtitle" aria-controls="subtitle" role="tab" data-toggle="tab">Subtitle</a></li>
					<li role="presentation"><a href="#button" aria-controls="button" role="tab" data-toggle="tab">Button</a></li>					
                    <li role="presentation"><a href="#background" aria-controls="background" role="tab" data-toggle="tab">Background</a></li>
                </ul>

                <div class="tab-content">
                	 <div role="tabpanel" class="tab-pane fade in active" id="icon">
                        <?php
                        $this->admin_input('icon_font_color','text', 'Font color: ', $icon_font_color);
						$this->admin_input('icon_font_size','text', 'Font size: ', $icon_font_size);
            			$this->admin_input('icon_font_weight','text', 'Font weight: ', $icon_font_weight);
					    $this->admin_select('icon_animation_type', $types,'Animation type: ',$icon_animation_type);
					    $this->admin_select('icon_animation_duration', $durations,'Animation duration: ',$icon_animation_duration);
					    $this->admin_select('icon_animation_event', $events,'Animation Start: ',$icon_animation_event);
					    $this->admin_select('icon_animation_delay', $delays,'Animation Delay: ',$icon_animation_delay);					
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="title">
                        <?php
                        $this->admin_input('title_font_color','text', 'Font color: ', $title_font_color);
            			$this->admin_input('title_font_weight','text', 'Font weight: ', $title_font_weight);
            			$this->admin_input('title_font_size','text', 'Font size: ', $title_font_size);
					    $this->admin_select('title_animation_type', $types,'Animation type: ',$title_animation_type);
					    $this->admin_select('title_animation_duration', $durations,'Animation duration: ',$title_animation_duration);
					    $this->admin_select('title_animation_event', $events,'Animation Start: ',$title_animation_event);
					    $this->admin_select('title_animation_delay', $delays,'Animation Delay: ',$title_animation_delay);	
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="subtitle">
                        <?php
                        $this->admin_input('subtitle_font_color','text', 'Font color: ', $subtitle_font_color);
            			$this->admin_input('subtitle_font_weight','text', 'Font weight: ', $subtitle_font_weight);
            			$this->admin_input('subtitle_font_size','text', 'Font size: ', $subtitle_font_size);
						$this->admin_select('subtitle_animation_type', $types,'Animation type: ',$subtitle_animation_type);
						$this->admin_select('subtitle_animation_duration', $durations,'Animation duration: ',$subtitle_animation_duration);
						$this->admin_select('subtitle_animation_event', $events,'Animation Start: ',$subtitle_animation_event);
						$this->admin_select('subtitle_animation_delay', $delays,'Animation Delay: ',$subtitle_animation_delay);	
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="button">
                        <?php
						$this->admin_select('button_animation_type', $types,'Animation type: ',$button_animation_type);
						$this->admin_select('button_animation_duration', $durations,'Animation duration: ',$button_animation_duration);
						$this->admin_select('button_animation_event', $events,'Animation Start: ',$button_animation_event);
						$this->admin_select('button_animation_delay', $delays,'Animation Delay: ',$button_animation_delay);	
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="background">
                        <?php
                        $this->admin_file('background_image','Background image: ', $background_image);
                        ?>
                    </div>
                </div>

            </div>
            <?php
                }
		public function generate_content()
		{
			$title = $this->block->data('title');
            $text = $this->block->data('text');
            $button_text = $this->block->data('button_text');
            $button_link = $this->block->data('button_link');
            $icon = $this->block->data('icon');

            $icon_font_color = $this->block->data('icon_font_color');
            $icon_font_size = $this->block->data('icon_font_size');
			$icon_font_weight = $this->block->data('icon_font_weight');
			$icon_animation = $this->block->data('icon_animation');
			$icon_animation_state = $this->block->data('icon_animation_state');
			$icon_animation_type = $this->block->data('icon_animation_type');	  
			$icon_animation_duration = $this->block->data('icon_animation_duration');
			$icon_animation_event = $this->block->data('icon_animation_event');
			$icon_animation_delay = $this->block->data('icon_animation_delay');
			
            $title_font_color = $this->block->data('title_font_color');
            $title_font_weight = $this->block->data('title_font_weight');
            $title_font_size = $this->block->data('title_font_size');
			$title_animation = $this->block->data('title_animation');
			$title_animation_state = $this->block->data('title_animation_state');
			$title_animation_type = $this->block->data('title_animation_type');	  
		    $title_animation_duration = $this->block->data('title_animation_duration');
		    $title_animation_event = $this->block->data('title_animation_event');
		    $title_animation_delay = $this->block->data('title_animation_delay');
			
            $subtitle_font_color = $this->block->data('subtitle_font_color');
            $subtitle_font_weight = $this->block->data('subtitle_font_weight');
            $subtitle_font_size = $this->block->data('subtitle_font_size');
			$subtitle_animation = $this->block->data('subtitle_animation');
			$subtitle_animation_state = $this->block->data('subtitle_animation_state');
			$subtitle_animation_type = $this->block->data('subtitle_animation_type');	  
			$subtitle_animation_duration = $this->block->data('subtitle_animation_duration');
			$subtitle_animation_event = $this->block->data('subtitle_animation_event');
			$subtitle_animation_delay = $this->block->data('subtitle_animation_delay');
			
			$button_animation_type = $this->block->data('button_animation_type');	  
			$button_animation_duration = $this->block->data('button_animation_duration');
			$button_animation_event = $this->block->data('button_animation_event');
			$button_animation_delay = $this->block->data('button_animation_delay');	
			
            $background_image = $this->block->data('background_image');

			$settings[0][0] = 'icon'.$this->block->get_id();
			$settings[0][1] = $icon_animation_event;
			$settings[0][2] = $icon_animation_duration.' '.$icon_animation_delay.' '.$icon_animation_type;
			$settings[1][0] = 'title'.$this->block->get_id();
			$settings[1][1] = $title_animation_event;
			$settings[1][2] = $title_animation_duration.' '.$title_animation_delay.' '.$title_animation_type;
			$settings[2][0] = 'subtitle'.$this->block->get_id();
			$settings[2][1] = $subtitle_animation_event;
			$settings[2][2] = $subtitle_animation_duration.' '.$subtitle_animation_delay.' '.$subtitle_animation_type;
			$settings[3][0] = 'button'.$this->block->get_id();
			$settings[3][1] = $button_animation_event;
			$settings[3][2] = $button_animation_duration.' '.$button_animation_delay.' '.$button_animation_type;

			add_action("be_foot", generate_animation_events($settings));

            if($background_image == '')
            	$background_image = get_theme_path().'images/action-bg.jpg';
            if($title == '')
            	$title = 'CHECK OUT OUR CMS PLATFORM!';
            if($text == '')
            	$text = 'BuilderEngine CMS Platform Version 3 is Open Source software and is under the MIT License agreement.';
            if($button_text == '')
            	$button_text = 'Download Here';
            if($button_link == '')
            	$button_link = 'http://builderengine.org/page-cms-download.html';
            if($icon == '')
            	$icon = 'fa-check';				
            $icon_style = 
                'style="
                    color: '.$icon_font_color.' !important;
                    font-size: '.$icon_font_size.' !important;
                "';
            $title_style = 
                'style="
                    color: '.$title_font_color.' !important;
                    font-weight: '.$title_font_weight.' !important;
                    font-size: '.$title_font_size.' !important;
                "';
            $subtitle_style = 
                'style="
                    color: '.$subtitle_font_color.' !important;
                    font-weight: '.$subtitle_font_weight.' !important;
                    font-size: '.$subtitle_font_size.' !important;
                "';

			$output = '
			<link href="'.base_url('blocks/action_bar/style.css').'" rel="stylesheet">
			<link href="'.base_url('builderengine/public/animations/css/animate.min.css').'" rel="stylesheet" />
			<div id="action-box" class="blockcontent-action has-bg custom-content" data-scrollview="true" style="padding-left:15px;padding-right:15px;">
	            <div class="content-bg">
	                
	            </div>
	            <div data-animation="true" data-animation-type="fadeInRight">
	                <div class="row action-box" id="action_box">
	                    <!-- Column & Block -->
	                    <div class="col-md-9 col-sm-9">
	                        <div class="icon-large text-theme" id="icon'.$this->block->get_id().'">
	                            <i '.$icon_style.' class="fa '.$icon.'"></i>
	                        </div> 
	                        <h3 id="title'.$this->block->get_id().'" '.$title_style.'>'.$title.'</h3>
	                        <p id="subtitle'.$this->block->get_id().'" '.$subtitle_style.'>
	                           '.$text.'
	                        </p>
	                    </div>
	                    <div class="col-md-3 col-sm-3">
	                        <a id="button'.$this->block->get_id().'" href="'.$button_link.'" class="btn btn-outline btn-block">'.$button_text.'</a>
	                    </div>
	                </div>
	            </div>
	        </div>
            ';

	        return $output;
		}
		public function generate_admin_menus()
		{
			
		}
	}
?>