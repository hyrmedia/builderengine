<?php
class table_block_handler extends  block_handler{
        function info()
        {
            $info['category_name'] = "Bootstrap";
            $info['category_icon'] = "dsf";

            $info['block_name'] = "Table";
            $info['block_icon'] = "fa-envelope-o";
            
            return $info;
        }
        public function generate_admin()
        {

        }
        public function generate_style()
        {
			include $_SERVER['DOCUMENT_ROOT'].'/builderengine/public/animations/animations.php';

            $first_row_font_color = $this->block->data('first_row_font_color');
            $first_row_font_weight = $this->block->data('first_row_font_weight');
            $first_row_font_size = $this->block->data('first_row_font_size');
            $first_row_background = $this->block->data('first_row_background');

            $first_col_font_color = $this->block->data('first_col_font_color');
            $first_col_font_weight = $this->block->data('first_col_font_weight');
            $first_col_font_size = $this->block->data('first_col_font_size');
            $first_col_background = $this->block->data('first_col_background');

            $contents_font_color = $this->block->data('contents_font_color');
            $contents_font_weight = $this->block->data('contents_font_weight');
            $contents_font_size = $this->block->data('contents_font_size');
            $contents_background = $this->block->data('contents_background');
			
			$animation_type = $this->block->data('animation_type');	  
		    $animation_duration = $this->block->data('animation_duration');
		    $animation_event = $this->block->data('animation_event');
		    $animation_delay = $this->block->data('animation_delay');
            ?>
            <div role="tabpanel">

                <ul class="nav nav-tabs" role="tablist" style="margin-left: -20px;">
                    <li role="presentation" class="active"><a href="#first_row" aria-controls="icon" role="tab" data-toggle="tab">First row</a></li>
                    <li role="presentation"><a href="#first_col" aria-controls="title" role="tab" data-toggle="tab">First column</a></li>
                    <li role="presentation"><a href="#contents" aria-controls="subtitle" role="tab" data-toggle="tab">Table contents</a></li>
					<li role="presentation"><a href="#animations" aria-controls="animations" role="tab" data-toggle="tab">Animations</a></li>
                </ul>

                <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active" id="first_row">
                        <?php
                        $this->admin_input('first_row_font_color','text', 'Font color: ', $first_row_font_color);
                        $this->admin_input('first_row_font_weight','text', 'Font weight: ', $first_row_font_weight);
                        $this->admin_input('first_row_font_size','text', 'Font size: ', $first_row_font_size);
                        $this->admin_input('first_row_background','text', 'Background color: ', $first_row_background);
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="first_col">
                        <?php
                        $this->admin_input('first_col_font_color','text', 'Font color: ', $first_col_font_color);
                        $this->admin_input('first_col_font_weight','text', 'Font weight: ', $first_col_font_weight);
                        $this->admin_input('first_col_font_size','text', 'Font size: ', $first_col_font_size);
                        $this->admin_input('first_col_background','text', 'Background color: ', $first_col_background);
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="contents">
                        <?php
                        $this->admin_input('contents_font_color','text', 'Font color: ', $contents_font_color);
                        $this->admin_input('contents_font_weight','text', 'Font weight: ', $contents_font_weight);
                        $this->admin_input('contents_font_size','text', 'Font size: ', $contents_font_size);
                        $this->admin_input('contents_background','text', 'Background color: ', $contents_background);
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="animations">
                        <?php
						$this->admin_select('animation_type', $types,'Animation type: ',$animation_type);
						$this->admin_select('animation_duration', $durations,'Animation duration: ',$animation_duration);
						$this->admin_select('animation_event', $events,'Animation Start: ',$animation_event);
						$this->admin_select('animation_delay', $delays,'Animation Delay: ',$animation_delay);
                        ?>
                    </div>
                </div>

            </div>
            <?php
        }
        public function generate_content()
        {
            // Style
            $first_row_font_color = $this->block->data('first_row_font_color');
            $first_row_font_weight = $this->block->data('first_row_font_weight');
            $first_row_font_size = $this->block->data('first_row_font_size');
            $first_row_background = $this->block->data('first_row_background');

            $first_col_font_color = $this->block->data('first_col_font_color');
            $first_col_font_weight = $this->block->data('first_col_font_weight');
            $first_col_font_size = $this->block->data('first_col_font_size');
            $first_col_background = $this->block->data('first_col_background');

            $contents_font_color = $this->block->data('contents_font_color');
            $contents_font_weight = $this->block->data('contents_font_weight');
            $contents_font_size = $this->block->data('contents_font_size');
            $contents_background = $this->block->data('contents_background');

			$animation_type = $this->block->data('animation_type');	  
		    $animation_duration = $this->block->data('animation_duration');
		    $animation_event = $this->block->data('animation_event');
		    $animation_delay = $this->block->data('animation_delay');

			$settings[0][0] = 'table'.$this->block->get_id();
			$settings[0][1] = $animation_event;
			$settings[0][2] = $animation_duration.' '.$animation_delay.' '.$animation_type;
			add_action("be_foot", generate_animation_events($settings));

            $first_row_style = 
                'style="
                    color: '.$first_row_font_color.' !important;
                    font-weight: '.$first_row_font_weight.' !important;
                    font-size: '.$first_row_font_size.' !important;
                    background-color: '.$first_row_background.' !important;
                "';
            $first_col_style = 
                'style="
                    color: '.$first_col_font_color.' !important;
                    font-weight: '.$first_col_font_weight.' !important;
                    font-size: '.$first_col_font_size.' !important;
                    background-color: '.$first_col_background.' !important;
                "';
            $contents_style = 
                'style="
                    color: '.$contents_font_color.' !important;
                    font-weight: '.$contents_font_weight.' !important;
                    font-size: '.$contents_font_size.' !important;
                    background-color: '.$contents_background.' !important;
                "';

            $output = '
			<link href="'.base_url('builderengine/public/animations/css/animate.min.css').'" rel="stylesheet" />
                <table id="table'.$this->block->get_id().'" class="table">
                    <thead>
                        <tr>
                            <th '.$first_row_style.'>#</th>
                            <th '.$first_row_style.'>First Name</th>
                            <th '.$first_row_style.'>Last Name</th>
                            <th '.$first_row_style.'>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th '.$first_col_style.' scope="row">1</th>
                            <td '.$contents_style.'>Mark</td>
                            <td '.$contents_style.'>Otto</td>
                            <td '.$contents_style.'>@WebsiteBuilder</td>
                        </tr>
                        <tr>
                            <th '.$first_col_style.' scope="row">2</th>
                            <td '.$contents_style.'>Jacob</td>
                            <td '.$contents_style.'>Thornton</td>
                            <td '.$contents_style.'>@BuilderEngine</td>
                        </tr>
                        <tr>
                            <th '.$first_col_style.' scope="row">3</th>
                            <td '.$contents_style.'>Larry</td>
                            <td '.$contents_style.'>the Bird</td>
                            <td '.$contents_style.'>@Twitter</td>
                        </tr>
                    </tbody>
                </table>
            ';

            return $output;
        }
        public function generate_admin_menus()
        {
            
        }
    }
?>