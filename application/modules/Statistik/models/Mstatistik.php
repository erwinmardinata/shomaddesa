<?php

class Mstatistik extends CI_Model {

	function get_dusun() {
		$sql = "SELECT
						d.nama,
						COUNT(p.nama) jumlah
						FROM dusun d
						JOIN tweb_penduduk p
						ON p.dusun_id = d.id
						GROUP BY p.dusun_id";
		return $this->db->query($sql)->result();
	}

	function get_jk() {
		$sql = "SELECT
						jk.nama,
						COUNT(jk.nama) jumlah
						FROM tweb_penduduk_sex jk
						JOIN tweb_penduduk p
						ON p.sex = jk.id
						GROUP BY p.sex";
		return $this->db->query($sql)->result();
	}

	function get_ktp_el() {
		$sql = "SELECT
						ktp.nama,
						COUNT(ktp.nama) jumlah
						FROM tweb_ktpel ktp
						JOIN tweb_penduduk p
						ON p.ktp_el = ktp.id
						GROUP BY p.ktp_el";
		return $this->db->query($sql)->result();
	}

	function get_agama() {
		$sql = "SELECT
						a.nama,
						COUNT(a.nama) jumlah
						FROM tweb_penduduk_agama a
						JOIN tweb_penduduk p
						ON p.agama_id = a.id
						GROUP BY p.agama_id";
		return $this->db->query($sql)->result();
	}

	function get_umur() {
		$sql = "SELECT
						p.nama, p.tanggallahir
						FROM tweb_penduduk p";
		return $this->db->query($sql)->result();
	}

	function gets_status_penduduk() {
		$sql = "SELECT
						sp.nama,
						COUNT(sp.nama) jumlah
						FROM tweb_penduduk_status sp
						JOIN tweb_penduduk p
						ON p.status_dasar = sp.id
						GROUP BY p.status_dasar";
		return $this->db->query($sql)->result();
	}

	function get_kwn() {
		$sql = "SELECT
						kwn.nama,
						COUNT(kwn.nama) jumlah
						FROM tweb_penduduk_warganegara kwn
						JOIN tweb_penduduk p
						ON p.warganegara_id = kwn.id
						GROUP BY p.warganegara_id";
		return $this->db->query($sql)->result();
	}

	function get_pendidikan_kk() {
		$sql = "SELECT
						pkk.nama,
						COUNT(pkk.nama) jumlah
						FROM tweb_penduduk_pendidikan_kk pkk
						JOIN tweb_penduduk p
						ON p.pendidikan_kk_id = pkk.id
						GROUP BY p.pendidikan_kk_id";
		return $this->db->query($sql)->result();
	}

	function get_pendidikan_sedang() {
		$sql = "SELECT
						ps.nama,
						COUNT(ps.nama) jumlah
						FROM tweb_penduduk_pendidikan ps
						JOIN tweb_penduduk p
						ON p.pendidikan_sedang_id = ps.id
						GROUP BY p.pendidikan_sedang_id";
		return $this->db->query($sql)->result();
	}

	function get_pekerjaan() {
		$sql = "SELECT
						pe.nama,
						COUNT(pe.nama) jumlah
						FROM tweb_penduduk_pekerjaan pe
						JOIN tweb_penduduk p
						ON p.pekerjaan_id = pe.id
						GROUP BY p.pekerjaan_id";
		return $this->db->query($sql)->result();
	}

	function get_kawin() {
		$sql = "SELECT
						k.nama,
						COUNT(k.nama) jumlah
						FROM tweb_penduduk_kawin k
						JOIN tweb_penduduk p
						ON p.status_kawin = k.id
						GROUP BY p.status_kawin";
		return $this->db->query($sql)->result();
	}

	function get_goldarah() {
		$sql = "SELECT
						d.nama,
						COUNT(d.nama) jumlah
						FROM tweb_golongan_darah d
						JOIN tweb_penduduk p
						ON p.golongan_darah_id = d.id
						GROUP BY p.golongan_darah_id";
		return $this->db->query($sql)->result();
	}

	function get_cacat() {
		$sql = "SELECT
						c.nama,
						COUNT(c.nama) jumlah
						FROM tweb_cacat c
						JOIN tweb_penduduk p
						ON p.cacat_id = c.id
						GROUP BY p.cacat_id";
		return $this->db->query($sql)->result();
	}

	function get_sakit() {
		$sql = "SELECT
						s.nama,
						COUNT(s.nama) jumlah
						FROM tweb_sakit_menahun s
						JOIN tweb_penduduk p
						ON p.sakit_menahun_id = s.id
						GROUP BY p.sakit_menahun_id";
		return $this->db->query($sql)->result();
	}

}
