<?php

function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}

function ketahanan($angka)
{
    if($angka == 3){
        return 1;
    }elseif($angka == 6){
        return 2;
    } elseif($angka == 9){
        return 3;
    } elseif($angka == 12){
        return 4;
    } elseif($angka == 15){
        return 5;
    }
}

function wpHarga($harga)
{
    if($harga == 80000){
        return 1;
    } elseif($harga == 75000){
        return 2;
    } elseif($harga == 70000){
        return 3;
    } elseif($harga == 65000){
        return 4;
    } elseif($harga == 60000){
        return 5;
    }
}

function jumlahBeli($beli)
{
    if($beli > 0 && $beli <= 40){
        return 1;
    } else if($beli > 40 && $beli <= 80){
        return 2;
    } else if($beli > 80 && $beli <= 120){
        return 3;
    } else if($beli > 120 && $beli <= 160){
        return 4;
    } else if($beli > 160 && $beli <= 200){
        return 5;
    }
}
