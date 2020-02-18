<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class C_admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_admin();
		check_not_login();
		$this->load->library('form_validation');
		$this->load->model('m_admin', 'model');
		$this->load->helper(array('url', 'download'));
	}

	public function index()
	{
		$jumlah = 0;
		$omset = 0;
		foreach ($this->model->get_transaksi() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
		}
		$data = array(
			'region' => $this->model->get_region(),
			'powder' => $this->model->get_count_powder(),
			'topping' => $this->model->get_count_topping(),
			'karyawan' => $this->model->get_count_karyawan(),
			'profit' => $omset,
			'order' => $jumlah,
			'grafik' => $this->model->get_data_grafik_harian(),
			'favorit' => $this->model->get_data_grafik_favorit()
		);

		$this->template_admin->load('template_admin', 'admin/dashboard/v_dashboard', $data);
	}

	public function powder()
	{	
		$spreadsheet = new Spreadsheet();

		$spreadsheet->getActiveSheet()->freezePane('J2');

		$from = "A1";
		$last = "I1";
		$data = array("ID Jenis", "Nama Powder", "Stock Awal", "Penambahan", "Total", "Sisa", "ID Region", "ID Penyajian", "Harga");

		$spreadsheet->getActiveSheet()
			->fromArray($data, NULL)
			->getStyle("$from:$last")
			->getFont()
			->setBold(true);
		
		$Csv = new Csv($spreadsheet);
		$filename = "Powder.csv";

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$Csv = IOFactory::createWriter($spreadsheet, 'Csv');
		$Csv->save('php://output');
	}

	public function ekstra()
	{
		$spreadsheet = new Spreadsheet();

		$spreadsheet->getActiveSheet()->freezePane('H2');

		$from = "A1";
		$last = "G1";
		$data = array("Nama Ekstra", "Stock Awal", "Penambahan", "Total", "Sisa", "Satuan", "ID Region");

		$spreadsheet->getActiveSheet()
			->fromArray($data, NULL)
			->getStyle("$from:$last")
			->getFont()
			->setBold(true);			
		
		$Csv = new Csv($spreadsheet);
		$filename = "Topping.csv";

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$Csv = IOFactory::createWriter($spreadsheet, 'Csv');
		$Csv->save('php://output');
	}

	public function topping()
	{
		$spreadsheet = new Spreadsheet();

		$spreadsheet->getActiveSheet()->freezePane('H2');

		$from = "A1";
		$last = "G1";
		$data = array("Nama Topping", "Harga", "Stock Awal", "Penambahan", "Total", "Sisa", "ID Region");

		$spreadsheet->getActiveSheet()
			->fromArray($data, NULL)
			->getStyle("$from:$last")
			->getFont()
			->setBold(true);
		
		$Csv = new Csv($spreadsheet);
		$filename = "Topping.csv";

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$Csv = IOFactory::createWriter($spreadsheet, 'Csv');
		$Csv->save('php://output');
	}

	public function upload_powder()
	{
		$csvMimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv');
		if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
			if (is_uploaded_file($_FILES['file']['tmp_name'])) {

				//open uploaded csv file with read only mode
				$csvFile = fopen($_FILES['file']['tmp_name'], 'r');

				// skip first line
				// if your csv file have no heading, just comment the next line
				fgetcsv($csvFile);

				//parse data from csv file line by line
				while (($line = fgetcsv($csvFile)) !== FALSE) {
					// Get row data
					$jenis  = $line[0];
					$nama = $line[1];
					$stock  = $line[2];
					$tambah = $line[3];
					$total = $line[4];
					$sisa = $line[5];
					$region = $line[6];
					$saji = explode(";", $line[7]);
					$harga = explode(";", $line[8]);

					// Insert varian_powder data in the database
					$this->db->insert("varian_powder", array("nama_varian" => $nama, "stok_awal" => $stock, "penambahan" => $tambah, "total" => $total, "sisa" => $sisa, "id_region" => $region));

					if ($this->db->affected_rows() > 0) {
						$query = $this->model->get_id_varian($nama, $stock, $region);

						if ($query->num_rows() > 0) {
							$row = $query->row();
							$id_varian = $row->id_varian;

							// Insert powder data in the database
							$this->db->insert("powder", array("id_jenis" => $jenis, "nama_powder" => $nama, "id_varian" => $id_varian));

							if ($this->db->affected_rows() > 0) {
								$query = $this->model->get_id_powder($jenis, $nama, $id_varian);

								if ($query->num_rows() > 0) {
									$row = $query->row();
									$id_powder = $row->id_powder;

									// Insert looping into detail_penyajian
									for ($z = 0; $z < count($saji, COUNT_NORMAL); $z++) {
										$this->db->insert("detail_penyajian", array("id_powder" => $id_powder, "id_penyajian" => $saji[$z], "harga" => $harga[$z]));
									}
								}
							}
						}
					}
				}

				// Close opened CSV file
				fclose($csvFile);

				$qstring["status"] = 'Success';
			} else {
				$qstring["status"] = 'Error';
			}
		}
	}

	public function upload_topping()
	{
		$csvMimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv');
		if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
			if (is_uploaded_file($_FILES['file']['tmp_name'])) {

				//open uploaded csv file with read only mode
				$csvFile = fopen($_FILES['file']['tmp_name'], 'r');

				// skip first line
				// if your csv file have no heading, just comment the next line
				fgetcsv($csvFile);

				//parse data from csv file line by line
				while (($line = fgetcsv($csvFile)) !== FALSE) {
					// Get row data
					$nama  = $line[0];
					$harga = $line[1];
					$stock  = $line[2];
					$tambah = $line[3];
					$total = $line[4];
					$sisa = $line[5];
					$region = $line[6];

					// Insert member data in the database
					$this->db->insert("topping", array("nama_topping" => $nama, "harga" => $harga, "stock_awal" => $stock, "penambahan" => $tambah, "total" => $total, "sisa" => $sisa, "id_region" => $region));
				}

				// Close opened CSV file
				fclose($csvFile);

				$qstring["status"] = 'Success';
			} else {
				$qstring["status"] = 'Error';
			}
		}
	}

	public function upload_ekstra()
	{
		$csvMimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv');
		if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
			if (is_uploaded_file($_FILES['file']['tmp_name'])) {

				//open uploaded csv file with read only mode
				$csvFile = fopen($_FILES['file']['tmp_name'], 'r');

				// skip first line
				// if your csv file have no heading, just comment the next line
				fgetcsv($csvFile);

				//parse data from csv file line by line
				while (($line = fgetcsv($csvFile)) !== FALSE) {
					// Get row data
					$nama  = $line[0];
					$stock  = $line[1];
					$tambah = $line[2];
					$total = $line[3];
					$sisa = $line[4];
					$satuan = $line[5];
					$region = $line[6];

					// Insert member data in the database
					$this->db->insert("ekstra", array("nama_ekstra" => $nama, "stock_awal" => $stock, "penambahan" => $tambah, "total" => $total, "sisa" => $sisa, "satuan" => $satuan, "id_region" => $region));
					// $id = $this->db->get_where("ekstra", array("nama_ekstra"=>$nama, "satuan"=>$satuan, "id_region"=>$region))->result_array();

					if ($this->db->affected_rows() > 0) {
						$query = $this->model->get_id_ekstra($nama, $satuan, $region);

						if ($query->num_rows() > 0) {
							$row = $query->row();

							$id_ekstra = $row->id_ekstra;

							$this->model->insert_detail_ekstra($id_ekstra);

							if ($this->db->affected_rows() > 0) {
								$this->session->set_flashdata('flash', 'Data Ekstra Berhasil Disimpan');
							}
						}
					}
				}

				// Close opened CSV file
				fclose($csvFile);

				$qstring["status"] = 'Success';
			} else {
				$qstring["status"] = 'Error';
			}
		}
	}

	public function profil()
	{
		$jumlah = 0;
		$omset = 0;
		foreach ($this->model->get_transaksi() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
		}

		$omset_total = 0;
		foreach ($this->model->get_omset_bulanan() as $key => $value) {
			$omset_total = $value->omset;
		}
		$data = array(
			'admin' => $this->model->get_admin()->row(),
			'omset_hari' => $omset,
			'total_penjualan' => $jumlah,
			'omset_bulanan' => $omset_total
		);
		$this->template_admin->load('template_admin', 'admin/profil/v_viewProfile', $data);
	}

	public function update_profil($id)
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$username = $this->input->post('username', TRUE);
			$email = $this->input->post('email', TRUE);
			$contact = $this->input->post('contact', TRUE);
			$alamat = $this->input->post('alamat', TRUE);
			$password = $this->input->post('password', TRUE);

			$this->model->update_profile($id, $nama, $username, $email, $contact, $alamat, $password);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Admin Berhasil Diubah');
			}

			echo "<script>window.location='" . base_url('index.php/c_admin/profil') . "'</script>";
		}
	}

	public function shift1()
	{
		$jumlah = 0;
		$omset = 0;
		$status_proses = 0;
		$status_succcess = 0;
		foreach ($this->model->get_transaksi_shift1() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
			if ($value->status != 'Success') {
				$status_proses++;
			} else {
				$status_succcess++;
			}
		}
		$data = array(
			'jumlah' => $jumlah,
			'omset' => $omset,
			'proses' => $status_proses,
			'success' => $status_succcess,
			'region' => $this->model->get_region()
		);
		$this->template_admin->load('template_admin', 'admin/transaksi/v_shift1', $data);
	}

	public function shift2()
	{
		$jumlah = 0;
		$omset = 0;
		$status_proses = 0;
		$status_succcess = 0;
		foreach ($this->model->get_shift2() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
			if ($value->status != 'Success') {
				$status_proses++;
			} else {
				$status_succcess++;
			}
		}
		$data = array(
			'jumlah' => $jumlah,
			'omset' => $omset,
			'proses' => $status_proses,
			'success' => $status_succcess,
			'region' => $this->model->get_region()
		);
		$this->template_admin->load('template_admin', 'admin/transaksi/v_shift2', $data);
	}

	public function total_transaksi()
	{
		$jumlah = 0;
		$omset = 0;
		$status_proses = 0;
		$status_succcess = 0;
		foreach ($this->model->get_transaksi() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
			if ($value->status != 'Success') {
				$status_proses++;
			} else {
				$status_succcess++;
			}
		}
		$data = array(
			'jumlah' => $jumlah,
			'omset' => $omset,
			'proses' => $status_proses,
			'success' => $status_succcess,
			'region' => $this->model->get_region()
		);
		$this->template_admin->load('template_admin', 'admin/transaksi/v_totalTransaksi', $data);
	}

	public function inventory()
	{
		$data = array(
			'region' => $this->model->get_region(),
			'basic' => $this->model->get_menu_basic(),
			'pm' => $this->model->get_menu_pm(),
			'soklat' => $this->model->get_menu_soklat(),
			'coklat_pm' => $this->model->get_menu_coklat_pm(),
			'yakult' => $this->model->get_menu_yakult(),
			'juice' => $this->model->get_menu_juice()
		);
		$this->template_admin->load('template_admin', 'admin/inventory/v_listInventory', $data);
	}

	public function insert_powder()
	{
		if (isset($_POST['submit'])) {
			# code...
		} else {
			$data = array(
				'jenis_menu' => $this->model->get_jenis_menu(),
				'region' => $this->model->get_region(),
				'sajian' => $this->model->get_sajian()
			);
			$this->template_admin->load('template_admin', 'admin/inventory/powder/v_addPowder', $data);
		}
	}

	public function update_powder()
	{
		if (isset($_POST['submit'])) {
			#...
		} else {
			$this->template_admin->load('template_admin', 'admin/inventory/powder/v_updatePowder');
		}
	}

	public function update_menu_peny()
	{
		$id_powder = $this->input->post('id_powder', true);
		$id_peny = $this->input->post('id_peny', true);
		$harga = $this->input->post('harga', true);

		$status = $this->model->update_menu_peny($id_powder, $id_peny, $harga);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	public function delete_powder()
	{
		#code...
	}

	public function delete_powder_penyajian($id_varian, $id_region, $id_powder, $id_penyajian)
	{

		$this->model->delete_powder_penyajian($id_powder, $id_penyajian);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', 'Data Varian Berhasil Dihapus');
		}

		echo "<script>window.location='" . base_url('index.php/c_admin/update_varian/' . $id_varian . '/' . $id_region) . "'</script>";
	}

	public function update_varian($id, $region)
	{
		if (isset($_POST['submit'])) {
			# code...
		} else {
			$data = array(
				'powder' => $this->model->get_powder($id, $region)
			);

			$query = $this->model->get_varian($id, $region);
			if ($query->num_rows() > 0) {
				$data['varian'] = $query->row();
			}

			$this->template_admin->load('template_admin', 'admin/inventory/powder/v_listpowder', $data);
		}
	}

	public function action_update_varian()
	{
		$id = $this->input->post('id', TRUE);
		$sisa = $this->input->post('sisa', TRUE);
		$penambahan = $this->input->post('penambahan', TRUE);
		$region = $this->input->post('region', TRUE);

		$this->model->insert_transaksi_penambahan(null, $id, null, $region, $penambahan);
		$status = $this->model->update_varian($id, $sisa, $penambahan);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	public function delete_varian($id)
	{
		$this->model->delete_varian($id);

		$this->session->set_flashdata('flash', 'Data Varian Berhasil Dihapus');

		echo "<script>window.location='" . base_url('index.php/c_admin/inventory') . "'</script>";
	}

	public function insert_topping()
	{
		if (isset($_POST['submit'])) {
			$nama_topping = $this->input->post('nama', TRUE);
			$harga = $this->input->post('harga', TRUE);
			$stok = $this->input->post('stok', TRUE);
			$region = $this->input->post('region', TRUE);

			$this->model->insert_topping($nama_topping, $harga, $stok, $region);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Topping Berhasil Ditambahkan');
			}

			echo "<script>window.location='" . base_url('index.php/c_admin/inventory') . "'</script>";
		} else {
			$data = array(
				'region' => $this->model->get_region()
			);
			$this->template_admin->load('template_admin', 'admin/inventory/topping/v_addTopping', $data);
		}
	}

	public function update_topping($id)
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$harga = $this->input->post('harga', TRUE);
			$penambahan = $this->input->post('penambahan', TRUE);
			$sisa = $this->input->post('sisa', TRUE);
			$id_region = $this->input->post('id_region', TRUE);

			$this->model->insert_transaksi_penambahan(null, null, $id, $id_region, $penambahan);
			$this->model->update_topping($id, $nama, $harga, $penambahan, $sisa);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Topping Berhasil Diubah');
			}
			echo "<script>window.location='" . base_url('index.php/c_admin/inventory') . "'</script>";
		} else {
			$query = $this->model->get_topping($id);
			if ($query->num_rows() > 0) {
				$data['topping'] = $query->row();
				$this->template_admin->load('template_admin', 'admin/inventory/topping/v_updateTopping', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='" . site_url('index.php/c_admin/inventory') . "'</script>";
			}
		}
	}

	public function delete_topping($id)
	{
		$this->model->delete_topping($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', 'Data Topping Berhasil Dihapus');
		}

		echo "<script>window.location='" . base_url('index.php/c_admin/inventory') . "'</script>";
	}

	public function insert_ekstra()
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$stok = $this->input->post('stok', TRUE);
			$satuan = $this->input->post('satuan', TRUE);
			$region = $this->input->post('id_region', TRUE);

			$this->model->insert_ekstra($nama, $stok, $satuan, $region);
			if ($this->db->affected_rows() > 0) {
				$query = $this->model->get_id_ekstra($nama, $satuan, $region);

				if ($query->num_rows() > 0) {
					$row = $query->row();

					$id_ekstra = $row->id_ekstra;

					$this->model->insert_detail_ekstra($id_ekstra);

					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('flash', 'Data Ekstra Berhasil Disimpan');
					}
				}
			}
			echo "<script>window.location='" . base_url('index.php/c_admin/inventory') . "'</script>";
		} else {
			$data = array(
				'region' => $this->model->get_region()
			);
			$this->template_admin->load('template_admin', 'admin/inventory/ekstra/v_addEkstra', $data);
		}
	}

	public function update_ekstra($id)
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$sisa = $this->input->post('sisa', TRUE);
			$satuan = $this->input->post('satuan', TRUE);
			$penambahan = $this->input->post('penambahan', TRUE);
			$region = $this->input->post('id_region', TRUE);

			$this->model->insert_transaksi_penambahan($id, null, null, $region, $penambahan);

			$this->model->update_ekstra($id, $nama, $sisa, $penambahan, $satuan);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Ekstra Berhasil Diubah');
			}
			echo "<script>window.location='" . base_url('index.php/c_admin/inventory') . "'</script>";
		} else {
			$data = array(
				'region' => $this->model->get_region()
			);

			$query = $this->model->get_ekstra($id);

			if ($query->num_rows() > 0) {
				$data['ekstra'] = $query->row();
				$this->template_admin->load('template_admin', 'admin/inventory/ekstra/v_updateEkstra', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='" . site_url('index.php/c_admin/inventory') . "'</script>";
			}
		}
	}

	public function delete_ekstra($id)
	{
		$this->model->delete_ekstra($id);

		if ($this->db->affected_rows > 0) {
			$this->session->set_flashdata('flash', 'Data Ekstra Berhasil Dihapus');
		}

		echo "<script>window.location='" . base_url('index.php/c_admin/inventory') . "'</script>";
	}

	public function upload_file()
	{
		$this->template_admin->load('template_admin', 'admin/inventory/upload/v_uploadData');
	}

	public function discount()
	{
		$data = array(
			'data_diskon' => $this->model->get_diskon()
		);
		$this->template_admin->load('template_admin', 'admin/diskon/v_diskon', $data);
	}

	public function add_diskon()
	{
		$this->template_admin->load('template_admin', 'admin/diskon/v_addDiskon');
	}

	public function insert_diskon()
	{
		if (isset($_POST['submit'])) {

			$nominal = $this->input->post('nominal', TRUE);
			$min_pembelian = $this->input->post('min_pembelian', TRUE);

			$this->model->insert_diskon($nominal, $min_pembelian);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Diskon Berhasil Ditambahkan');
			}

			echo "<script>window.location='" . base_url('index.php/c_admin/discount') . "'</script>";
		}
	}

	public function update_diskon($id)
	{
		if (isset($_POST['submit'])) {
			// $id = $this->input->post('id', TRUE);
			$total = $this->input->post('nominal', TRUE);
			$min_pembelian = $this->input->post('min_pembelian', TRUE);

			$query = $this->model->update_diskon($id, $total, $min_pembelian);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Diskon Berhasil Diubah');
			}

			echo "<script>window.location='" . base_url('index.php/c_admin/discount') . "'</script>";
		} else {
			$query = $this->model->get_diskon($id);
			if ($query->num_rows() > 0) {
				$data['diskon'] = $query->row();
				$this->template_admin->load('template_admin', 'admin/diskon/v_updateDiskon', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='" . site_url('index.php/c_admin/diskon') . "'</script>";
			}
		}
	}

	public function delete_diskon($id)
	{
		$this->model->delete_diskon($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', 'Data Diskon Berhasil Dihapus');
		}

		echo "<script>window.location='" . base_url('index.php/c_admin/discount') . "'</script>";
	}

	public function region()
	{
		$data = array(
			'data_region' => $this->model->get_region()
		);
		$this->template_admin->load('template_admin', 'admin/region/v_cabang', $data);
	}

	public function add_region()
	{
		$this->template_admin->load('template_admin', 'admin/region/v_addRegion');
	}

	public function insert_region()
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$alamat = $this->input->post('alamat', TRUE);

			$this->model->insert_region($nama, $alamat);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Region Berhasil Ditambahkan');
			}

			echo "<script>window.location='" . base_url('index.php/c_admin/region') . "'</script>";
		}
	}

	public function update_region($id)
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$alamat = $this->input->post('alamat', TRUE);

			$this->model->update_region($id, $nama, $alamat);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Region Berhasil Diubah');
			}

			echo "<script>window.location='" . base_url('index.php/c_admin/region') . "'</script>";
		} else {
			$query = $this->model->get_region($id);
			if ($query->num_rows() > 0) {
				$data['region'] = $query->row();
				$this->template_admin->load('template_admin', 'admin/region/v_updateRegion', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='" . site_url('index.php/c_admin/region') . "'</script>";
			}
		}
	}

	public function delete_region($id)
	{
		$this->model->delete_region($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', 'Data Region Berhasil Dihapus');
		}
		echo "<script>window.location='" . base_url('index.php/c_admin/region') . "'</script>";
	}

	public function karyawan()
	{
		$data  = array(
			'data_karyawan' => $this->model->get_data_karyawan()
		);
		$this->template_admin->load('template_admin', 'admin/karyawan/v_karyawan', $data);
	}

	public function add_karyawan()
	{
		$this->template_admin->load('template_admin', 'admin/karyawan/v_addKaryawan');
	}

	public function insert_karyawan()
	{
		if (isset($_POST['submit'])) {
			$id = $this->input->post('id', TRUE);
			$nama = $this->input->post('nama', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$kontak = $this->input->post('kontak', TRUE);
			$email = $this->input->post('email', TRUE);
			$alamat = $this->input->post('alamat', TRUE);

			$this->model->insert_karyawan($id, $nama, $username, $password, $kontak, $email, $alamat);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Karyawan Berhasil Ditambahkan');
			}

			echo "<script>window.location='" . base_url('index.php/c_admin/karyawan') . "'</script>";
		}
	}

	public function update_karyawan($id)
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$kontak = $this->input->post('kontak', TRUE);
			$email = $this->input->post('email', TRUE);
			$alamat = $this->input->post('alamat', TRUE);

			$this->model->update_karyawan($id, $nama, $username, $password, $kontak, $email, $alamat);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash', 'Data Karyawan Berhasil DiUbah');
			}

			echo "<script>window.location='" . base_url('index.php/c_admin/karyawan') . "'</script>";
		} else {
			$query = $this->model->get_data_karyawan($id);

			if ($query->num_rows() > 0) {
				$data['staff'] = $query->row();
				$this->template_admin->load('template_admin', 'admin/karyawan/v_updateKaryawan', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='" . site_url('index.php/c_admin/karyawan') . "'</script>";
			}
		}
	}

	public function delete_karyawan($id)
	{
		$this->model->delete_karyawan($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', 'Data Karyawan Berhasil Dihapus');
		}

		echo "<script>window.location='" . base_url('index.php/c_admin/karyawan') . "'</script>";
	}

	public function list_penambahan()
	{
		$data = array(
			'data' => $this->model->get_transaksi_penambahan()
		);
		$this->template_admin->load('template_admin', 'admin/laporan_penambahan/v_listPenambahan', $data);
	}

	public function get_transaksi_penambahan()
	{
		$tanggal = $this->input->post('tanggal', TRUE);
		$tgl_selesai = $this->input->post('tanggal_selesai', TRUE);

		$data = $this->model->get_transaksi_penambahan($tanggal, $tgl_selesai);

		echo json_encode($data);
	}

	public function get_search_transaksi()
	{
		$tanggal = $this->input->post('tanggal', TRUE);
		$region = $this->input->post('region', TRUE);
		$shift = $this->input->post('id', TRUE);
		$tgl_selesai = $this->input->post('tgl_selesai', TRUE);

		$data = $this->model->get_search_transaksi($tanggal, $region, $shift, $tgl_selesai);

		echo json_encode($data);
	}

	public function get_laporan_pemakaian()
	{
		if (!isset($_POST['submit'])) {
			$data = array(
				'region' => $this->model->get_region()
			);
			$this->template_admin->load('template_admin', 'admin/laporan_pemakaian/v_formPemakaian', $data);
		}
		else{
			$tanggal = $this->input->post('tanggal', true);
			$shift = $this->input->post('shift', true);
			$reg = $this->input->post('reg', true);

			$data = array(
				'powder' => $this->model->get_pakai_powder($tanggal, $shift, $reg),
				'topping' => $this->model->get_pakai_topping($tanggal, $shift, $reg),
				'penjualan' => $this->model->get_penjualan($tanggal, $shift, $reg),
				'bubble' => $this->model->get_masak_bubble($tanggal, $shift, $reg),
				'susu_putih' => $this->model->get_pakai_susu_putih($tanggal, $shift, $reg),
				'susu_coklat' => $this->model->get_pakai_susu_coklat($tanggal, $shift, $reg),
				'ekstra' => $this->model->get_pakai_ekstra($tanggal, $shift, $reg)
				// 'region' => $this->model->get_region($reg)
			);
			$this->template_admin->load('template_admin', 'admin/laporan_pemakaian/v_listPemakaian', $data);
		}
	}

	public function data_grafik()
	{
		$data = [];
		$i = 0;
		foreach ($this->model->get_data_grafik_harian as $key => $value) {
			$data[i] = $value->total;
			$i++;
		}

		echo json_encode($data);
	}
}
