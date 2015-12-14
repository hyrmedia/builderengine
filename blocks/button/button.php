<?php
class button_block_handler extends  block_handler{
        function info()
        {
            $info['category_name'] = "Bootstrap";
            $info['category_icon'] = "dsf";

            $info['block_name'] = "Button";
            $info['block_icon'] = "fa-envelope-o";
            
            return $info;
        }
        public function generate_admin()
        {
            $button_text = $this->block->data('text');
            $this->admin_input('text','text', 'Text: ', $button_text);
        }
		public function generate_style()
		{
			include $_SERVER['DOCUMENT_ROOT'].'/builderengine/public/animations/animations.php';
			
            $button_style = $this->block->data('color');

            $colors = array(
                "default" => "Default Button",
                "primary" => "Primary Button",
                "success" => "Success Button",
                "info" => "Info Button",
                "warning" => "Warning Button",
				"inverse" => "Inverse Button",
				"outline" => "Outline Button",
                "danger" => "Danger Button"
                );

			$button_animation_type = $this->block->data('button_animation_type');	  
			$button_animation_duration = $this->block->data('button_animation_duration');
			$button_animation_event = $this->block->data('button_animation_event');
			$button_animation_delay = $this->block->data('button_animation_delay');
			
            $this->admin_select('color', $colors, 'Color: ', $button_style);
			$this->admin_select('button_animation_type', $types,'Animation type: ',$button_animation_type);
			$this->admin_select('button_animation_duration', $durations,'Animation duration: ',$button_animation_duration);
			$this->admin_select('button_animation_event', $events,'Animation Start: ',$button_animation_event);
			$this->admin_select('button_animation_delay', $delays,'Animation Delay: ',$button_animation_delay);	
		}
		
        public function generate_content()
        {
            $button_style = $this->block->data('color');
            $button_text = $this->block->data('text');
			$button_animation_type = $this->block->data('button_animation_type');	  
			$button_animation_duration = $this->block->data('button_animation_duration');
			$button_animation_event = $this->block->data('button_animation_event');
			$button_animation_delay = $this->block->data('button_animation_delay');	
			$settings[0][0] = 'button'.$this->block->get_id();
			$settings[0][1] = $button_animation_event;
			$settings[0][2] = $button_animation_duration.' '.$button_animation_delay.' '.$button_animation_type;
			add_action("be_foot", generate_animation_events($settings));
			
			 if($button_text == '')
            	$button_text = 'Button';
			if($button_style == '')
            	$button_style = 'primary';
            $output = '
                <link href="'.base_url('blocks/button/style.css').'" rel="stylesheet">
				<link href="'.base_url('builderengine/public/animations/css/animate.min.css').'" rel="stylesheet" />
				<button id="button'.$this->block->get_id().'" type="button" class="btn btn-'.$button_style.'">'.$button_text.'</button>
            ';

            return $output;
        }
        public function generate_admin_menus()
        {
            
        }
    }
?>