<?php
class Pegawai{

    public $nama;
    protected $nip;
    public $jabatan;
    public $agama;
    public $status;
    public $gaji;
    public $gajik;
    public $tunjab;
    public $tunkel;
    public $zakatp;

    const JUDUL = 'Daftar Pegawai';
    static $jml = 0;
    
    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jml++;
    }

    public function setGajiPokok($jabatan){
        $this->jabatan = $jabatan;
        switch($jabatan){
            case 'Manager': 
            $gajipokok = 15000000; 
            break;
            case 'Asisten': 
            $gajipokok = 10000000; 
            break;
            case 'Kabag': 
            $gajipokok = 7000000; 
            break;
            case 'Staff': 
            $gajipokok = 4000000; 
            break;
            default: 
            $gajipokok = '';
        }
        return $gajipokok;
    }

    public function setTunJab($gajipokok){
        $gajipokok = $this->setGajiPokok($this->jabatan);
        $tun_jab = $gajipokok * 0.2;
        return $tun_jab;
    }

    public function setTunKel($status, $gajipokok){
        $this->status = $status;
        $gajipokok = $this->setGajiPokok($this->jabatan);;
        $tun_kel = ($status == 'Sudah Menikah') ? 0.1 * $gajipokok : 0;
        return $tun_kel;
    }
    
    public function setGajiKotor($gajipokok, $tunjab, $tunkel){
        $gajipokok = $this->setGajiPokok($this->jabatan);
        $tunjab = $this->setTunJab($this->gaji);
        $tunkel = $this->setTunKel($this->status, $this->gaji);

        $gajikotor = $gajipokok + $tunjab + $tunkel;
        return $gajikotor;
    }

    public function setZakat($agama, $gajipokok, $gajikotor){
        $this->agama = $agama;
        $gajipokok = $this->setGajiPokok($this->jabatan);
        $gajikotor = $this->setGajiKotor($this->gaji, $this->setTunJab($this->gaji), $this->setTunKel($this->status, $this->gaji));
        
        if($gajikotor >= 6000000 && $agama == 'Islam'){
            $zakat = $gajipokok * 0.025;
        }else{
            $zakat = 0;
        }
        $this->zakatp = $zakat; 
        return $zakat;
    }

    public function setGajiBersih($gajikotor, $zakat){
        $gajikotor = $this->setGajiKotor($this->gaji, $this->setTunJab($this->gaji), $this->setTunKel($this->status, $this->gaji));
        $zakat = $this->setZakat($this->agama, $this->gaji, $this->setGajiKotor($this->gaji, $this->setTunJab($this->gaji), $this->setTunKel($this->status, $this->gaji)));

        $gajibersih = $gajikotor - $zakat;
        return $gajibersih;
    }
    
    public function mencetak(){
        echo '<br/>NIP: '.$this->nip;
        echo '<br/>Nama Pegawai: '.$this->nama;
        echo '<br/>Jabatan: '.$this->jabatan;
        echo '<br/>Agama: '.$this->agama;
        echo '<br/>Status: '.$this->status;
        echo '<br/>Gaji Pokok: Rp. '.number_format($this->setGajiPokok($this->jabatan), 0, ',', '.');
        echo '<br/>Tunjangan Jabatan: Rp. '.number_format($this->setTunJab($this->gaji), 0, ',', '.');
        echo '<br/>Tunjangan Keluarga: Rp. '.number_format($this->setTunKel($this->status, $this->gaji), 0, ',', '.');
        echo '<br/>Zakat: Rp. '.number_format($this->setZakat($this->agama, $this->gaji, $this->gajik), 0, ',', '.');
        echo '<br/>Gaji Bersih: Rp. '.number_format($this->setGajiBersih($this->gajik, $this->zakatp), 0, ',', '.');
        echo '<hr/>';
    }
}