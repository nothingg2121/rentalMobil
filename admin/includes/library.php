<?php
# Pengaturan tanggal komputer
date_default_timezone_set("Asia/Jakarta");

# Fungsi untuk membuat kode automatis
function buatKode($tabel, $inisial){
	global $koneksidb;
	$struktur = mysqli_query($koneksidb, "SELECT * FROM `".str_replace('`','``',$tabel)."` LIMIT 1");
	if(!$struktur){
		return $inisial . "00001";
	}
	$fieldInfo = mysqli_fetch_field_direct($struktur, 0);
	$field = $fieldInfo ? $fieldInfo->name : '';
	if($field===''){
		return $inisial . "00001";
	}

	$tableIdent = "`".str_replace('`','``',$tabel)."`";
	$fieldIdent = "`".str_replace('`','``',$field)."`";

	$lenSql = "SELECT CHARACTER_MAXIMUM_LENGTH AS l FROM information_schema.COLUMNS "
		. "WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME='".mysqli_real_escape_string($koneksidb,$tabel)."' "
		. "AND COLUMN_NAME='".mysqli_real_escape_string($koneksidb,$field)."' LIMIT 1";
	$lenQry = mysqli_query($koneksidb, $lenSql);
	$maxLen = 0;
	if($lenQry){
		$lenRow = mysqli_fetch_assoc($lenQry);
		$maxLen = isset($lenRow['l']) ? intval($lenRow['l']) : 0;
	}
	$numericWidth = ($maxLen > strlen($inisial)) ? ($maxLen - strlen($inisial)) : 5;
	if($numericWidth < 1){
		$numericWidth = 5;
	}

	$prefixEsc = mysqli_real_escape_string($koneksidb, $inisial);
	$startPos = strlen($inisial) + 1;
	$maxSql = "SELECT MAX(CAST(SUBSTRING($fieldIdent,$startPos) AS UNSIGNED)) AS maxnum "
		. "FROM $tableIdent WHERE $fieldIdent LIKE '".$prefixEsc."%'";
	$maxQry = mysqli_query($koneksidb, $maxSql);
	$maxNum = 0;
	if($maxQry){
		$maxRow = mysqli_fetch_assoc($maxQry);
		$maxNum = isset($maxRow['maxnum']) ? intval($maxRow['maxnum']) : 0;
	}

	$next = $maxNum + 1;
	$candidate = $inisial . str_pad((string)$next, $numericWidth, '0', STR_PAD_LEFT);
	for($guard=0; $guard<50; $guard++){
		$chkSql = "SELECT COUNT(*) AS cnt FROM $tableIdent WHERE $fieldIdent='".mysqli_real_escape_string($koneksidb,$candidate)."'";
		$chkQry = mysqli_query($koneksidb, $chkSql);
		if($chkQry){
			$chkRow = mysqli_fetch_assoc($chkQry);
			$cnt = isset($chkRow['cnt']) ? intval($chkRow['cnt']) : 0;
			if($cnt === 0){
				break;
			}
		}
		$next++;
		$candidate = $inisial . str_pad((string)$next, $numericWidth, '0', STR_PAD_LEFT);
	}
	return $candidate;
}

# Fungsi untuk membalik tanggal dari format Indo (d-m-Y) -> English (Y-m-d)
function InggrisTgl($tanggal){
	$tgl=substr($tanggal,0,2);
	$bln=substr($tanggal,3,2);
	$thn=substr($tanggal,6,4);
	$tanggal="$thn-$bln-$tgl";
	return $tanggal;
}

# Fungsi untuk membalik tanggal dari format English (Y-m-d) -> Indo (d-m-Y)
function IndonesiaTgl($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl-$bln-$thn";
	return $tanggal;
}

# Fungsi untuk membalik tanggal dari format English (Y-m-d) -> Indo (d-m-Y)
function Indonesia2Tgl($tanggal){
	$namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
					 "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
					 
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal ="$tgl ".$namaBln[$bln]." $thn";
	return $tanggal;
}

function hitungHari($myDate1, $myDate2){
        $myDate1 = strtotime($myDate1);
        $myDate2 = strtotime($myDate2);
 
        return ($myDate2 - $myDate1)/ (24 *3600);
}

# Fungsi untuk membuat format rupiah pada angka (uang)
function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return $hasil;
}

# Fungsi untuk format tanggal, dipakai plugins Callendar
function form_tanggal($nama,$value=''){
	echo" <input type='text' name='$nama' id='$nama' size='11' maxlength='20' value='$value'/>&nbsp;
	<img src='images/calendar-add-icon.png' align='top' style='cursor:pointer; margin-top:7px;' alt='kalender'onclick=\"displayCalendar(document.getElementById('$nama'),'dd-mm-yyyy',this)\"/>			
	";
}

function angkaTerbilang($x){
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return angkaTerbilang($x - 10) . " belas";
  elseif ($x < 100)
    return angkaTerbilang($x / 10) . " puluh" . angkaTerbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . angkaTerbilang($x - 100);
  elseif ($x < 1000)
    return angkaTerbilang($x / 100) . " ratus" . angkaTerbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . angkaTerbilang($x - 1000);
  elseif ($x < 1000000)
    return angkaTerbilang($x / 1000) . " ribu" . angkaTerbilang($x % 1000);
  elseif ($x < 1000000000)
    return angkaTerbilang($x / 1000000) . " juta" . angkaTerbilang($x % 1000000);
}
?>