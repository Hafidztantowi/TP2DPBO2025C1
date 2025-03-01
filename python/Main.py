# Class PetShop
class PetShop:
    def __init__(self, id, nama_produk, harga_produk, stok_produk):
        self.id = id
        self.nama_produk = nama_produk
        self.harga_produk = harga_produk
        self.stok_produk = stok_produk

    def display(self):
        print(f"{self.id:5} {self.nama_produk:20} {self.harga_produk:10} {self.stok_produk:10}", end=" ")

# Class Aksesoris (Child dari PetShop)
class Aksesoris(PetShop):
    def __init__(self, id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna):
        super().__init__(id, nama_produk, harga_produk, stok_produk)
        self.jenis = jenis
        self.bahan = bahan
        self.warna = warna

    def display(self):
        super().display()
        print(f"{self.jenis:15} {self.bahan:15} {self.warna:10}", end=" ")

# Class Baju (Child dari Aksesoris)
class Baju(Aksesoris):
    def __init__(self, id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna, untuk, size, merk):
        super().__init__(id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna)
        self.untuk = untuk
        self.size = size
        self.merk = merk

    def display(self):
        super().display()
        print(f"{self.untuk:10} {self.size:10} {self.merk:10}")

# Fungsi untuk menampilkan header tabel
def display_header():
    print(f"{'ID':5} {'Nama Produk':20} {'Harga':10} {'Stok':10} {'Jenis':15} {'Bahan':15} {'Warna':10} {'Untuk':10} {'Size':10} {'Merk':10}")
    print("-" * 105)

# Main Program
if __name__ == "__main__":
    data = []

    # Menambahkan 5 objek awal
    data.append(Baju(1, "Kalung Anjing", 50000, 10, "Kalung", "Plastik", "Merah", "Anjing", "M", "PetLover"))
    data.append(Baju(2, "Tali Leher", 30000, 15, "Tali", "Nilon", "Biru", "Kucing", "S", "CatWorld"))
    data.append(Baju(3, "Jas Hujan", 100000, 5, "Jas", "Plastik", "Kuning", "Anjing", "L", "RainPet"))
    data.append(Baju(4, "Topi", 25000, 20, "Topi", "Kain", "Hitam", "Kucing", "S", "CatStyle"))
    data.append(Baju(5, "Sepatu", 75000, 8, "Sepatu", "Karet", "Coklat", "Anjing", "M", "DogShoes"))

    # Menampilkan data awal
    display_header()
    for item in data:
        item.display()

    # Input dari user
    print("\nMasukkan data baru:")
    id = int(input("ID: "))
    nama_produk = input("Nama Produk: ")
    harga_produk = float(input("Harga: "))
    stok_produk = int(input("Stok: "))
    jenis = input("Jenis: ")
    bahan = input("Bahan: ")
    warna = input("Warna: ")
    untuk = input("Untuk: ")
    size = input("Size: ")
    merk = input("Merk: ")

    data.append(Baju(id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna, untuk, size, merk))

    # Menampilkan data setelah penambahan
    print("\nData setelah penambahan:")
    display_header()
    for item in data:
        item.display()