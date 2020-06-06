<?php 


class admin extends admin_controller {
	
	var $controller;
	public function admin(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){

		$this->db->where('status_mati', 0);
		$this->db->where('status_pindah', 0);
		$data_penduduk = $this->db->get('penduduk')->result_array();

		$bayi = 0;
		$anak  = 0;
		$remaja = 0;
		$dewasa = 0;
		$lansia  = 0;
		$wanita_bayi = 0;
		$wanita_anak  = 0;
		$wanita_remaja = 0;
		$wanita_dewasa = 0;
		$wanita_lansia  = 0;
		$pria_bayi = 0;
		$pria_anak  = 0;
		$pria_remaja = 0;
		$pria_dewasa = 0;
		$pria_lansia  = 0;

		foreach ($data_penduduk as $row) {
			
			$from = new DateTime($row['tgl_lhr']);
			$to = new DateTime('today');
			$age = $from->diff($to)->y;
			if ($age>=60) {
				// lansia > 60 tahun
				$lansia++;
				if ($row['jk']=='L') {
					$wanita_lansia++;
				}else{
					$pria_lansia++;
				}
			}else if ($age>=24) {
				// dewasa = 24-59 tahun
				$dewasa++; 
				if ($row['jk']=='L') {
					$wanita_dewasa++;
				}else{
					$pria_dewasa++;
				}
			}else if ($age>=14) {
				// remaja  = 14-23 tahun
				$remaja++; 
				if ($row['jk']=='L') {
					$wanita_remaja++;
				}else{
					$pria_remaja++;
				}
			}else if ($age>=2) {
				// anak = 2-14 tahun
				$anak++; 
				if ($row['jk']=='L') {
					$wanita_anak++;
				}else{
					$pria_anak++;
				}
			}else{
				// bayi = 0- tahun
				$bayi++; 
				if ($row['jk']=='L') {
					$wanita_bayi++;
				}else{
					$pria_bayi++;
				}
			}

		}






		// echo 'Lansia =  '.$lansia.'<br/>';
		// echo 'Dewasa = '.$dewasa.'<br/>';
		// echo 'Remaja = '.$remaja.'<br/>';
		// echo 'Anak-anak = '.$anak.'<br/>';
		// echo 'Bayi = '.$bayi.'<br/>';

		// exit();


		$data_array=array();

		$data_array['lansia'] = $lansia;
		$data_array['dewasa'] = $dewasa;
		$data_array['remaja'] = $remaja;
		$data_array['anak'] = $anak;
		$data_array['bayi'] = $bayi;

		$data_array['wanita_lansia'] = $wanita_lansia;
		$data_array['wanita_dewasa'] = $wanita_dewasa;
		$data_array['wanita_remaja'] = $wanita_remaja;
		$data_array['wanita_anak'] = $wanita_anak;
		$data_array['wanita_bayi'] = $wanita_bayi;

		$data_array['pria_lansia'] = $pria_lansia;
		$data_array['pria_dewasa'] = $pria_dewasa;
		$data_array['pria_remaja'] = $pria_remaja;
		$data_array['pria_anak'] = $pria_anak;
		$data_array['pria_bayi'] = $pria_bayi;

		

		$this->db->where('status_mati', 0);
		$this->db->where('status_pindah', 0);
		$this->db->where('jk', 'P');
		$data_array['perempuan'] = $this->db->get('penduduk')->num_rows();

		$this->db->where('status_mati', 0);
		$this->db->where('status_pindah', 0);
		$this->db->where('jk', 'L');
		$data_array['laki_laki'] = $this->db->get('penduduk')->num_rows();

		$this->db->where('status_mati', 0);
		$this->db->where('status_pindah', 0);
		$data_array['penduduk'] = $this->db->get('penduduk')->num_rows();

		$this->db->where('status_mati', 0);
		$this->db->where('status_pindah', 0);
		$this->db->group_by('no_kk'); 
		$data_array['keluarga'] = $this->db->get('penduduk')->num_rows();

		$this->db->where('status_mati', 0);
		$this->db->where('status_pindah', 0);
		$this->db->where('status', 'KAWIN');
		$kawin = $this->db->get('penduduk')->num_rows();
		$data_array['kawin'] = ($kawin/$data_array['penduduk'])*100;

		$this->db->where('status_mati', 0);
		$this->db->where('status_pindah', 0);
		$this->db->where('status', 'BELUM KAWIN');
		$blm_kwn = $this->db->get('penduduk')->num_rows();
		$data_array['blm_kwn'] = ($blm_kwn/$data_array['penduduk'])*100;

		$this->db->where('status_mati', 0);
		$this->db->where('status_pindah', 0);
		$this->db->where('status', 'CERAI HIDUP');
		$cr_hidup = $this->db->get('penduduk')->num_rows();
		$data_array['cr_hidup'] = ($cr_hidup/$data_array['penduduk'])*100;

		$this->db->where('status_mati', 0);
		$this->db->where('status_pindah', 0);
		$this->db->where('status', 'CERAI MATI');
		$cr_mati = $this->db->get('penduduk')->num_rows();
		$data_array['cr_mati'] = ($cr_mati/$data_array['penduduk'])*100;

		// echo $kawin.'<br/>';
		// echo $blm_kwn.'<br/>';
		// echo $cr_hidup.'<br/>';
		// echo $cr_mati.'<br/>';
		// show_array($data_array);
		// exit();
		

		$content = $this->load->view("admin/index_view",$data_array,true);

		$this->set_subtitle("Desa Labuhan Ijuk");
		$this->set_title("BERANDA");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


}
?>