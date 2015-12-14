<?php
class testimonials_block_handler extends  block_handler{
        function info()
        {
            $info['category_name'] = "BuilderEngine";
            $info['category_icon'] = "dsf";

            $info['block_name'] = "Testimonials";
            $info['block_icon'] = "fa-envelope-o";
            
            return $info;
        }
        public function generate_admin()
        {
            $slide_author = $this->block->data('slide_author');
            $slide_author_profession = $this->block->data('slide_author_profession');
            $slide_text = $this->block->data('slide_text');
            
            if(!is_array($slide_text) || empty($slide_text))
            {
                $slide_author[0] = "John Doe";
                $slide_author_profession[0] = "Manager";
                $slide_text[0] = "Copy over your client / customer quotes to fill this important section of testimonials,<br>show new visitors why your best, why they should trust you and win them.";
                $slide_author[1] = "Joe Doe";
                $slide_author_profession[1] = "Marketing";
                $slide_text[1] = "Copy over your client / customer quotes to fill this important section of testimonials,<br>show new visitors why your best, why they should trust you and win them.";
                $slide_author[2] = "Paddy Doe";
                $slide_author_profession[2] = "QA Lead";
                $slide_text[2] = "Copy over your client / customer quotes to fill this important section of testimonials,<br>show new visitors why your best, why they should trust you and win them.";
            }
            $num_slides = count($slide_text);?>

            <script>
                var num_slides = <?=$num_slides?>;
                <?php if($num_slides == 0): ?>
                    var num_slides = 1;
                <?php endif;?>
                $(document).ready(function (){
                    $("#myTab a").click(function (e) {
                      e.preventDefault();
                      $(this).tab("show");
                    });
                    $(".delete-slide").bind("click.delete_slide",function (e) {
                        slide = $(this).attr('slide');
                        $("#slide-section-" + slide).remove();
                        $("#slide-section-tab-" + slide).remove();
                    });
                    $("#add-slide").click(function (e) {
                        num_slides++;
                        $("#slide-section-tabs").append('<li id="slide-section-tab-' + num_slides +'"><a href="#slide-section-' + num_slides + '" data-toggle="tab">Slide ' + num_slides + '</a></li>');
                        $("#slide-sections").append('\
                            <div class="tab-pane" id="slide-section-' + num_slides + '">\
                              \
                            </div>\
                                ');
                        e.preventDefault();
                        html = $("#slide-section-1").html();
                        $("#slide-section-" + num_slides).html(html);
                        $('#slides a:last').tab('show');
                        $('#slide-section-' + num_slides).find('.delete-slide').attr('slide', num_slides);
                        $('#slide-section-' + num_slides).find('[name="slide_author[0]"]').attr('name', 'slide_author[' + (num_slides-1) + ']');
                        $('#slide-section-' + num_slides).find('[name="slide_author_profession[0]"]').attr('name', 'slide_author_profession[' + (num_slides-1) + ']');
                        $('#slide-section-' + num_slides).find('[name="slide_text[0]"]').attr('name', 'slide_text[' + (num_slides-1) + ']');
                        $(".delete-slide").unbind("click.delete_slide");
                        $(".delete-slide").bind("click.delete_slide",function (e) {
                            slide = $(this).attr('slide');
                            $("#slide-section-" + slide).remove();
                            $("#slide-section-tab-" + slide).remove();
                            $('#slides a:first').tab('show');
                        });
                    });
                });
            </script>
            <ul class="nav nav-tabs" id="slide-section-tabs" style="margin-left:-15px">
                <li style="height: 42px;"><span style="height: 100%;padding-top: 10px;" id="add-slide" class="btn btn-primary">Add Slide</span></li>
                <?php for($i = 0; $i < $num_slides; $i++): ?>
                    <li class="<?php if($i == 0) echo'active'?>" id="slide-section-tab-<?=$i+1?>"><a href="#slide-section-<?=$i+1?>" data-toggle="tab">Slide <?=$i+1?></a></li>
                <?php endfor; ?>
                <?php if($num_slides == 0): ?>
                    <li class="active"><a href="#slide-section-1" data-toggle="tab">Slide 1</a></li>
                <?php endif;?>
            </ul>
            <div class="tab-content" id="slide-sections">
                <?php for($i = 0; $i < $num_slides; $i++): ?>
                    <div class="tab-pane <?php if($i == 0) echo'active'?>" id="slide-section-<?=$i+1?>">
                        <?php
                        $this->admin_input('slide_author['.$i.']','text','Author: ', $slide_author[$i]);
                        $this->admin_input('slide_author_profession['.$i.']','text','Author profession: ', $slide_author_profession[$i]);
                        $this->admin_textarea('slide_text['.$i.']','Quotation: ', $slide_text[$i]);
                        ?>
                        <div class="form-group">
                            <span class="btn btn-danger delete-slide" slide="<?=$i+1?>">Delete Slide</span>
                        </div>
                    </div>
                <?php endfor; ?>


                <?php if($num_slides == 0): ?>
                    <div class="tab-pane active" id="slide-section-1">
                        <?php
                        $this->admin_input('slide_author[0]','text','Author: ');
                        $this->admin_input('slide_author_profession[0]','text','Author profession: ');
                        $this->admin_textarea('slide_text[0]','Quotation: ');
                        ?>
                    </div>
                <?php endif;?>
            </div>
            <?php
        }
        public function generate_style()
        {
			include $_SERVER['DOCUMENT_ROOT'].'/builderengine/public/animations/animations.php';

            $slide_font_color = $this->block->data('slide_font_color');
            $slide_font_weight = $this->block->data('slide_font_weight');
            $slide_font_size = $this->block->data('slide_font_size');

            $author_font_color = $this->block->data('author_font_color');
            $author_font_weight = $this->block->data('author_font_weight');
            $author_font_size = $this->block->data('author_font_size');

            $profession_font_color = $this->block->data('profession_font_color');
            $profession_font_weight = $this->block->data('profession_font_weight');
            $profession_font_size = $this->block->data('profession_font_size');

			$animation_type = $this->block->data('animation_type');	  
		    $animation_duration = $this->block->data('animation_duration');
		    $animation_event = $this->block->data('animation_event');
		    $animation_delay = $this->block->data('animation_delay');
            ?>
            <div role="tabpanel">

                <ul class="nav nav-tabs" role="tablist" style="margin-left: -20px;">
                    <li role="presentation" class="active"><a href="#text" aria-controls="text" role="tab" data-toggle="tab">Text</a></li>
                    <li role="presentation"><a href="#author" aria-controls="author" role="tab" data-toggle="tab">Author</a></li>
                    <li role="presentation"><a href="#profession" aria-controls="profession" role="tab" data-toggle="tab">Profession</a></li>
					<li role="presentation"><a href="#animations" aria-controls="animations" role="tab" data-toggle="tab">Animations</a></li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="text">
                        <?php
                        $this->admin_input('slide_font_color','text', 'Font color: ', $slide_font_color);
                        $this->admin_input('slide_font_weight','text', 'Font weight: ', $slide_font_weight);
                        $this->admin_input('slide_font_size','text', 'Font size: ', $slide_font_size);
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="author">
                        <?php
                        $this->admin_input('author_font_color','text', 'Font color: ', $author_font_color);
                        $this->admin_input('author_font_weight','text', 'Font weight: ', $author_font_weight);
                        $this->admin_input('author_font_size','text', 'Font size: ', $author_font_size);
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profession">
                        <?php
                        $this->admin_input('profession_font_color','text', 'Font color: ', $profession_font_color);
                        $this->admin_input('profession_font_weight','text', 'Font weight: ', $profession_font_weight);
                        $this->admin_input('profession_font_size','text', 'Font size: ', $profession_font_size);
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
            $slide_author = $this->block->data('slide_author');
            $slide_author_profession = $this->block->data('slide_author_profession');
            $slide_text = $this->block->data('slide_text');

            if(!is_array($slide_text) || empty($slide_text))
            {
                $slide_author[0] = "John Doe";
                $slide_author_profession[0] = "Manager";
                $slide_text[0] = "Copy over your client / customer quotes to fill this important section of testimonials,<br>show new visitors why your best, why they should trust you and win them.";
                $slide_author[1] = "Joe Doe";
                $slide_author_profession[1] = "Marketing";
                $slide_text[1] = "Copy over your client / customer quotes to fill this important section of testimonials,<br>show new visitors why your best, why they should trust you and win them.";
                $slide_author[2] = "Paddy Doe";
                $slide_author_profession[2] = "QA Lead";
                $slide_text[2] = "Copy over your client / customer quotes to fill this important section of testimonials,<br>show new visitors why your best, why they should trust you and win them.";
            }

            //style
            $slide_font_color = $this->block->data('slide_font_color');
            $slide_font_weight = $this->block->data('slide_font_weight');
            $slide_font_size = $this->block->data('slide_font_size');

            $author_font_color = $this->block->data('author_font_color');
            $author_font_weight = $this->block->data('author_font_weight');
            $author_font_size = $this->block->data('author_font_size');

            $profession_font_color = $this->block->data('profession_font_color');
            $profession_font_weight = $this->block->data('profession_font_weight');
            $profession_font_size = $this->block->data('profession_font_size');

			$animation_type = $this->block->data('animation_type');	  
		    $animation_duration = $this->block->data('animation_duration');
		    $animation_event = $this->block->data('animation_event');
		    $animation_delay = $this->block->data('animation_delay');

			$settings[0][0] = 'testimonials'.$this->block->get_id();
			$settings[0][1] = $animation_event;
			$settings[0][2] = $animation_duration.' '.$animation_delay.' '.$animation_type;
			add_action("be_foot", generate_animation_events($settings));

            $num_slides = count($slide_text);
            $text_style = 
                'style="
                    color: '.$slide_font_color.' !important;
                    font-weight: '.$slide_font_weight.' !important;
                    font-size: '.$slide_font_size.' !important;
                "';
            $author_style = 
                'style="
                    color: '.$author_font_color.' !important;
                    font-weight: '.$author_font_weight.' !important;
                    font-size: '.$author_font_size.' !important;
                "';
            $profession_style = 
                'style="
                    color: '.$profession_font_color.' !important;
                    font-weight: '.$profession_font_weight.' !important;
                    font-size: '.$profession_font_size.' !important;
                "';

            $output = '
			<link href="'.base_url('builderengine/public/animations/css/animate.min.css').'" rel="stylesheet" />
            <link href="'.base_url('blocks/testimonials/style.css').'" rel="stylesheet">
			<div id="client" class="blockcontent-testimonials has-bg custom-content" data-scrollview="true">
                <div class="content-bg">
                    
                </div>
                <div data-animation="true" data-animation-type="fadeInUp">
                    <h2 id="testimonials'.$this->block->get_id().'" class="content-title">Our Client Testimonials</h2>
                    <div class="carousel testimonials slide" data-ride="carousel" id="testimonials">
                        <div class="carousel-inner text-center">';
                        
                        for($i = 0; $i < $num_slides; $i++)
                        {
                            $output .= '
                            <div class="item';

                            if($i == 0)
                                $output .= ' active';

                            $output .= '">
                                <blockquote '.$text_style.'>
                                    <i class="fa fa-quote-left"></i>
                                    '.$slide_text[$i].'
                                    <i class="fa fa-quote-right"></i>
                                </blockquote>
                                <div '.$profession_style.' class="name"> — 
                                    <span '.$author_style.' class="text-theme">'.$slide_author[$i].'</span>
                                    , '.$slide_author_profession[$i].'
                                </div>
                            </div>';
                        }
                        
                        $output .= '    
                        </div>
                        <ol class="carousel-indicators">';
                            for($i = 0; $i < $num_slides; $i++)
                            {
                                $output .= '
                                <li data-target="#testimonials" data-slide-to="'.$i.'"';

                                if($i == 0)
                                    $output .= 'class="active"';

                                $output .= '
                                ></li>';
                            }
                        $output .= '
                        </ol>
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