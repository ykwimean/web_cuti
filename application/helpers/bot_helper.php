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

function check_access($role_id, $menu_id)
{
    $dim = get_instance();

    $dim->db->where('role_id', $role_id);
    $dim->db->where('menu_id', $menu_id);
    $result = $dim->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}