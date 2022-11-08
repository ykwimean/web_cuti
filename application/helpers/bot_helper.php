<?php

function is_logged_in()
{
    $dim = get_instance();
    if (!$dim->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $dim->session->userdata('role_id');
        $menu = $dim->uri->segment(1);

        $queryMenu = $dim->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $dim->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}