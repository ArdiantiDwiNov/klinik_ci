<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('login'))){
            redirect  ('auth');
        }

        $this->load->model('M_dokter');
    }

	public function index()

	{
        $data['title'] = "Manajemen Data Dokter";

        $data['dokter'] = $this->M_dokter->tampil_data()->result_array();

		$this->load->view('v_header', $data);
        $this->load->view('dokter/v_data', $data);
        $this->load->view('v_footer');
	}

    function tambah(){
        $data['title'] = "Tambah Data dokter";

        $this->load->view('v_header', $data);
        $this->load->view('dokter/v_data_tambah');
        $this->load->view('v_footer');
    }

    function insert(){
        $nama = $this->input->post('nama_dokter');

        $data = array(
            'nama_dokter' => $nama

        );

        $this->M_dokter->insert_data($data);

        redirect('dokter');
    }

    function edit($id){
        $data['title'] = "Edit Data Dokter";

        $where = array('id_dokter' => $id);
        $data['r'] = $this->M_dokter->edit_data($where)->row_array();

        $this->load->view('v_header', $data);
        $this->load->view('dokter/v_data_edit', $data);
        $this->load->view('v_footer');
    }

    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_dokter');

        $data = array(
            'nama_dokter' => $nama
        );

        $where = array('id_dokter' => $id);
        $this->M_dokter->update_data($data, $where);

        redirect('dokter');
    }

    function hapus($id){
        $where = array('id_dokter' => $id);
        $this->M_dokter->hapus_data($where);
        redirect('dokter');
    }
}
