<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('login'))){
            redirect  ('auth');
        }

        $this->load->model('M_kunjungan');
        $this->load->model('M_pasien');
        $this->load->model('M_dokter');
    }

	public function index()
	{
        $data['title'] = "Data Kunjungan/Berobat";

        $data['kunjungan'] = $this->M_kunjungan->tampil_data()->result_array();

		$this->load->view('v_header', $data);
        $this->load->view('kunjungan/v_data', $data);
        $this->load->view('v_footer');
	}

    function tambah(){
        $data['title'] = "Kunjungan Baru";

        $data['pasien'] = $this->M_pasien->tampil_data()->result_array();
        $data['dokter'] = $this->M_dokter->tampil_data()->result_array();

        $this->load->view('v_header', $data);
        $this->load->view('kunjungan/v_data_tambah', $data);
        $this->load->view('v_footer');
    }

    function insert(){
        $tgl = $this->input->post('tgl_berobat');
        $pasien = $this->input->post('pasien');
        $dokter = $this->input->post('dokter');

        $data = array(
            'tgl_berobat' => $tgl,
            'id_pasien' => $pasien,
            'id_dokter' => $dokter
        );

        $this->M_kunjungan->insert_data($data);

        redirect('kunjungan');
    }

    function edit($id){
        $data['title'] = "Edit Data kunjungan/Berobat Pasien";

        $where = array('id_berobat' => $id);
        $data['edit'] = $this->M_kunjungan->edit_data($where)->row_array();

        $data['pasien'] = $this->M_pasien->tampil_data()->result_array();
        $data['dokter'] = $this->M_dokter->tampil_data()->result_array();

        $this->load->view('v_header', $data);
        $this->load->view('kunjungan/v_data_edit', $data);
        $this->load->view('v_footer');
    }

    function update(){
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl_berobat');
        $pasien = $this->input->post('pasien');
        $dokter = $this->input->post('dokter');

        $data = array(
            'tgl_berobat' => $tgl,
            'id_pasien' => $pasien,
            'id_dokter' => $dokter
        );

        $where = array('id_berobat' => $id);
        $this->M_kunjungan->update_data($data, $where);

        redirect('kunjungan');
    }

    function hapus($id){
        $where = array('id_berobat' => $id);
        $this->M_kunjungan->hapus_data($where);
        redirect('kunjungan');
    }
}
