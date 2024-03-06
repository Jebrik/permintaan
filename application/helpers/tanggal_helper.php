<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

function laporan($angka){
	
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

function count_content($where)
{
    // get main CodeIgniter object
	$ci = get_instance();

	$ci->db->select('*');
	$ci->db->from('asets a');
	$ci->db->join('barang b', 'b.id_barang = a.id_barang');
	$ci->db->where('status_aset', 'Aktif');
	$ci->db->where('Kondisi', $where);
	$query = $ci->db->get();

	$val = $query->num_rows();

	if($val == 0){
		return '-';
	} else {
		return $val;
	}
}

?>