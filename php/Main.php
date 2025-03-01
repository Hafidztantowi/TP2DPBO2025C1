<?php
// Class PetShop
class PetShop {
    protected $id;
    protected $nama_produk;
    protected $harga_produk;
    protected $stok_produk;
    protected $foto_produk;

    public function __construct($id, $nama_produk, $harga_produk, $stok_produk, $foto_produk) {
        $this->id = $id;
        $this->nama_produk = $nama_produk;
        $this->harga_produk = $harga_produk;
        $this->stok_produk = $stok_produk;
        $this->foto_produk = $foto_produk;
    }

    public function display() {
        echo "<tr>
                <td>{$this->id}</td>
                <td>{$this->nama_produk}</td>
                <td>{$this->harga_produk}</td>
                <td>{$this->stok_produk}</td>
                <td><img src='{$this->foto_produk}' width='100'></td>";
    }
}

// Class Aksesoris (Child dari PetShop)
class Aksesoris extends PetShop {
    protected $jenis;
    protected $bahan;
    protected $warna;

    public function __construct($id, $nama_produk, $harga_produk, $stok_produk, $foto_produk, $jenis, $bahan, $warna) {
        parent::__construct($id, $nama_produk, $harga_produk, $stok_produk, $foto_produk);
        $this->jenis = $jenis;
        $this->bahan = $bahan;
        $this->warna = $warna;
    }

    public function display() {
        parent::display();
        echo "<td>{$this->jenis}</td>
              <td>{$this->bahan}</td>
              <td>{$this->warna}</td>";
    }
}

// Class Baju (Child dari Aksesoris)
class Baju extends Aksesoris {
    private $untuk;
    private $size;
    private $merk;

    public function __construct($id, $nama_produk, $harga_produk, $stok_produk, $foto_produk, $jenis, $bahan, $warna, $untuk, $size, $merk) {
        parent::__construct($id, $nama_produk, $harga_produk, $stok_produk, $foto_produk, $jenis, $bahan, $warna);
        $this->untuk = $untuk;
        $this->size = $size;
        $this->merk = $merk;
    }

    public function display() {
        parent::display();
        echo "<td>{$this->untuk}</td>
              <td>{$this->size}</td>
              <td>{$this->merk}</td>
              </tr>";
    }
}

// Data awal
$data = [
    new Baju(1, "Kalung Anjing", 50000, 10, "kalung.jpeg", "Kalung", "Plastik", "Merah", "Anjing", "M", "PetLover"),
    new Baju(2, "Tali Leher", 30000, 15, "tali.jpeg", "Tali", "Nilon", "Biru", "Kucing", "S", "CatWorld"),
    new Baju(3, "Jas Hujan", 100000, 5, "jas.jpeg", "Jas", "Plastik", "Kuning", "Anjing", "L", "RainPet"),
    new Baju(4, "Topi", 25000, 20, "topi.jpeg", "Topi", "Kain", "Hitam", "Kucing", "S", "CatStyle"),
    new Baju(5, "Sepatu", 75000, 8, "sepatu.jpeg", "Sepatu", "Karet", "Coklat", "Anjing", "M", "DogShoes")
];

// Jika form disubmit, tambahkan data baru
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = count($data) + 1;
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $stok_produk = $_POST['stok_produk'];
    $foto_produk = "uploads/" . basename($_FILES['foto_produk']['name']);
    move_uploaded_file($_FILES['foto_produk']['tmp_name'], $foto_produk);
    $jenis = $_POST['jenis'];
    $bahan = $_POST['bahan'];
    $warna = $_POST['warna'];
    $untuk = $_POST['untuk'];
    $size = $_POST['size'];
    $merk = $_POST['merk'];

    $data[] = new Baju($id, $nama_produk, $harga_produk, $stok_produk, $foto_produk, $jenis, $bahan, $warna, $untuk, $size, $merk);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Data Produk PetShop</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Foto Produk</th>
                <th>Jenis</th>
                <th>Bahan</th>
                <th>Warna</th>
                <th>Untuk</th>
                <th>Size</th>
                <th>Merk</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item): ?>
                <?php $item->display(); ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Tambah Data Baru</h2>
    <form method="POST" enctype="multipart/form-data">
        Nama Produk: <input type="text" name="nama_produk" required><br>
        Harga: <input type="number" name="harga_produk" required><br>
        Stok: <input type="number" name="stok_produk" required><br>
        Foto Produk: <input type="file" name="foto_produk" required><br>
        Jenis: <input type="text" name="jenis" required><br>
        Bahan: <input type="text" name="bahan" required><br>
        Warna: <input type="text" name="warna" required><br>
        Untuk: <input type="text" name="untuk" required><br>
        Size: <input type="text" name="size" required><br>
        Merk: <input type="text" name="merk" required><br>
        <input type="submit" value="Tambah Data">
    </form>
</body>
</html>