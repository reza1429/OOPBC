<?php

class BangunDatar {
    public function area() {
        
    }
    public function circumference() {
        
    }
    public function enlarge($scale) {
        
    }
    public function shrink($scale) {
        
    }
}

class Lingkaran extends BangunDatar {
    public $jari_jari;
    public function __construct($jari_jari) {
        $this->jari_jari = $jari_jari;
    }
    public function area() {
        return pi() * pow($this->jari_jari, 2);
    }
    public function circumference() {
        return pi() * $this->jari_jari * 2;
    }
    public function enlarge($scale) {
        $this->jari_jari *= $scale;
    }
    public function shrink($scale) {
        $this->jari_jari /= $scale;
    }
}

class Persegi extends BangunDatar {
    public $sisi;
    public function __construct($sisi) {
        $this->sisi = $sisi;
    }
    public function area() {
        return pow($this->sisi, 2);
    }
    public function circumference() {
        return 4 * $this->sisi;
    }
    public function enlarge($scale) {
        $this->sisi *= $scale;
    }
    public function shrink($scale) {
        $this->sisi /= $scale;
    }
}

class PersegiPanjang extends BangunDatar {
    public $panjang;
    public $lebar;
    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }
    public function area() {
        return $this->panjang * $this->lebar;
    }
    public function circumference() {
        return 2 * ($this->panjang + $this->lebar);
    }
    public function enlarge($scale) {
        $this->panjang *= $scale;
        $this->lebar *= $scale;
    }
    public function shrink($scale) {
        $this->panjang /= $scale;
        $this->lebar /= $scale;
    }
}

class Descriptor {
    public static function describe($bangun_datar) {
        if ($bangun_datar instanceof Lingkaran) {
            $shape = "lingkaran";
            $parameter = "jari-jari " . $bangun_datar->jari_jari;
        } elseif ($bangun_datar instanceof Persegi) {
            $shape = "persegi";
            $parameter = "sisi " . $bangun_datar->sisi;
        } elseif ($bangun_datar instanceof PersegiPanjang) {
            $shape = "persegi panjang";
            $parameter = "panjang " . $bangun_datar->panjang . ", lebar " . $bangun_datar->lebar;
        } else {
            return "Bangun datar tidak dikenali.";
        }

        $area = $bangun_datar->area();
        $circumference = $bangun_datar->circumference();
        return "Bangun datar ini adalah $shape, yang memiliki luas $area dan keliling $circumference.";
    }
}

$lingkaran = new Lingkaran(10);
$persegi = new Persegi(7);
$persegi_panjang = new PersegiPanjang(4, 8);

echo Descriptor::describe($lingkaran) . "<br>";
echo Descriptor::describe($persegi) . "<br>";
echo Descriptor::describe($persegi_panjang) . "<br><br>";

$persegi_panjang->enlarge(3);
echo "Enlarge : <br>" . Descriptor::describe($persegi_panjang) . "<br><br>";
$persegi_panjang->shrink(2);
echo "Shrink : <br>" . Descriptor::describe($persegi_panjang);
?>