<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Profil Ku';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_cuti()
    {
        $data['title'] = 'Pengajuan Cuti';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/permohonan-cuti', $data);
        $this->load->view('templates/footer');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Permohonan kamu sudah terkirim!
      </div>');
        // redirect('user/data_cuti');
    }

    public function semua_data_cuti()
    {
        $data['title'] = 'Data Cuti';
        $data['pegawai'] = $this->db->get_where('pegawai', ['nama_lengkap' =>
        $this->session->userdata('nama_lengkap')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/data_cuti', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Profile kamu sudah updated!
      </div>');
            redirect('user');
        }
    }

    public function pegawai()
    {
        $data['title'] = 'Data Cuti Pegawai';
        $data['pegawai'] = $this->db->get_where('pegawai', ['nama_lengkap' =>
        $this->session->userdata('nama_lengkap')])->row_array();

        $data['pegawai'] = $this->db->get('pegawai')->result_array();

        $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('tgl_diajukan', 'Tanggal', 'required');
        $this->form_validation->set_rules('mulai', 'Mulai', 'required');
        $this->form_validation->set_rules('berakhir', 'Berakhir', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/permohonan-cuti', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alasan' => $this->input->post('alasan'),
                'tgl_diajukan' => $this->input->post('tgl_diajukan'),
                'mulai' => $this->input->post('mulai'),
                'berakhir' => $this->input->post('berakhir')
            ];
            $this->db->insert('pegawai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sub Menu Baru sudah ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }
}