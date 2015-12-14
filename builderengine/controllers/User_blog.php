<?php
/***********************************************************
 * BuilderEngine v3.1.0
 * ---------------------------------
 * BuilderEngine CMS Platform - Radian Enterprise Systems Limited
 * Copyright Radian Enterprise Systems Limited 2012-2015. All Rights Reserved.
 *
 * http://www.builderengine.com
 * Email: info@builderengine.com
 * Time: 2015-08-31 | File version: 3.1.0
 *
 ***********************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');


class User_blog extends BE_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
    */
    function __construct()
    {
        parent::__construct();
        $this->user->is_verified();
        $this->load->model('builderengine');
        if($this->builderengine->get_option('user_dashboard_activ') != 'yes')
            redirect("/", 'location');
        if($this->builderengine->get_option('user_dashboard_blog') != 'yes')
            redirect("user/main/dashboard", 'location');
    }

    public function add_post($type = '', $id = -1)
    {
        $groups_name = $this->users->get_user_group_name(get_active_user_id());
        $groups = array();
        $user_created_posts = '';
        $user_created_categories = '';
        $default_user_post_category = '';

        foreach ($groups_name as $key => $value) {
            $group = $this->users->get_groups($value);

            if($group[0]->allow_posts)
                $user_created_posts = 1;

            if($group[0]->allow_categories)
                $user_created_categories = 1;

            $default_user_post_category .= $group[0]->default_user_post_category;

            $groups[] = $group[0];
        }

        if(!$this->user->is_logged_in())
            redirect("/user/main/userLogin", 'location');
        else{
            // if($this->builderengine->get_option('user_created_posts') == 'yes' && $type != '')
            if($user_created_posts && $type != '')
            {
                $category = new Category();
                $categores = explode(',', $default_user_post_category);
                $data['default_user_post_category'] = $category->where_in('name',$categores)->get();

                $this->load->model('post');
                $post = new Post($id);
                $data['object'] = $post;
                $data['page'] = ucfirst($type);
                if($this->input->post() && $this->input->post('category_id')){
                    $image_name = mt_rand().'.jpg';
                    $this->load->model('user');
                    $this->user->upload_file('image', 'files/users', $image_name);

                    $_POST['groups_allowed'] = implode(',',$this->users->get_user_group_name($this->user->get_id()));
                    $_POST['image'] = base_url().'files/users/'.$image_name;
                    $post->create($_POST);
                    redirect('/user/blog/posts', 'location');
                }
                $this->show->set_user_backend();
                $this->show->user_backend('add_post',$data);
            }else{
                redirect("user/main/dashboard", 'location');
            }
        }
    }
    public function posts()
    {
        if(!$this->user->is_logged_in())
            redirect("/user/main/userLogin", 'location');
        else{
            $post = new post(-1);
            $data['objects'] = $post->get();
            $data['id_user'] = $this->user->get_id();
            $this->show->set_user_backend();
            $this->show->user_backend('show_post_objects',$data);
        }
    }
    public function delete_post($id)
    {
        if(!$this->user->is_logged_in())
            redirect("/user/main/userLogin", 'location');
        else{
            $post = new post($id);
            $post->delete();
            redirect('/user/blog/posts', 'location');
        }
    }
    public function add_category($type = '', $id = -1)
    {
        $groups_name = $this->users->get_user_group_name(get_active_user_id());
        $groups = array();
        $user_created_posts = '';
        $user_created_categories = '';

        foreach ($groups_name as $key => $value) {
            $group = $this->users->get_groups($value);

            if($group[0]->allow_posts)
                $user_created_posts = 1;

            if($group[0]->allow_categories)
                $user_created_categories = 1;

            $groups[] = $group[0];
        }

        if(!$this->user->is_logged_in())
            redirect("/user/main/userLogin", 'location');
        else{
            // if($this->builderengine->get_option('user_created_categories') == 'yes' && $type != '')
            if($user_created_categories && $type != '')
            {
                $category = new category($id);
                $data['object'] = $category;
                $data['page'] = ucfirst($type);
                if($this->input->post()){
                    $image_name = mt_rand().'.jpg';
                    $this->load->model('user');
                    $this->user->upload_file('image', 'files/users', $image_name);

                    $_POST['groups_allowed'] = implode(',',$this->users->get_user_group_name($this->user->get_id()));
                    $_POST['user_id'] = $this->user->get_id();
                    $_POST['image'] = base_url().'files/users/'.$image_name;
                    $category->create($_POST);
                    redirect('/user/blog/categories', 'location');
                }
                $this->show->set_user_backend();
                $this->show->user_backend('add_category',$data);
            }else{
                redirect("user/main/dashboard", 'location');
            }
        }
    }
    public function categories()
    {
        if(!$this->user->is_logged_in())
            redirect("/user/main/userLogin", 'location');
        else{
            $category = new category(-1);
            $data['objects'] = $category->get();
            $data['id_user'] = $this->user->get_id();
            $this->show->set_user_backend();
            $this->show->user_backend('show_category_objects',$data);
        }
    }
    public function delete_category($id)
    {
        if(!$this->user->is_logged_in())
            redirect("/user/main/userLogin", 'location');
        else{
            $category = new category($id);
            $category->delete();
            redirect('/index.php/user/blog/categories', 'location');
        }
    }
}
/* End of file user_blog.php */
/* Location: ./application/controllers/user_blog.php */