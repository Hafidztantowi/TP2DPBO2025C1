#include <iostream>
#include <vector>
#include <iomanip>

using namespace std;

// Class PetShop
class PetShop {
protected:
    int id;
    string nama_produk;
    double harga_produk;
    int stok_produk;

public:
    PetShop(int id, string nama_produk, double harga_produk, int stok_produk)
        : id(id), nama_produk(nama_produk), harga_produk(harga_produk), stok_produk(stok_produk) {}

    virtual void display() const {
        cout << setw(5) << id << setw(20) << nama_produk << setw(10) << harga_produk << setw(10) << stok_produk;
    }
};

// Class Aksesoris (Child dari PetShop)
class Aksesoris : public PetShop {
protected:
    string jenis;
    string bahan;
    string warna;

public:
    Aksesoris(int id, string nama_produk, double harga_produk, int stok_produk, string jenis, string bahan, string warna)
        : PetShop(id, nama_produk, harga_produk, stok_produk), jenis(jenis), bahan(bahan), warna(warna) {}

    void display() const override {
        PetShop::display();
        cout << setw(15) << jenis << setw(15) << bahan << setw(10) << warna;
    }
};

// Class Baju (Child dari Aksesoris)
class Baju : public Aksesoris {
private:
    string untuk;
    string size;
    string merk;

public:
    Baju(int id, string nama_produk, double harga_produk, int stok_produk, string jenis, string bahan, string warna, string untuk, string size, string merk)
        : Aksesoris(id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna), untuk(untuk), size(size), merk(merk) {}

    void display() const override {
        Aksesoris::display();
        cout << setw(10) << untuk << setw(10) << size << setw(10) << merk << endl;
    }
};

// Fungsi untuk menampilkan header tabel
void displayHeader() {
    cout << setw(5) << "ID" << setw(20) << "Nama Produk" << setw(10) << "Harga" << setw(10) << "Stok"
         << setw(15) << "Jenis" << setw(15) << "Bahan" << setw(10) << "Warna"
         << setw(10) << "Untuk" << setw(10) << "Size" << setw(10) << "Merk" << endl;
}

int main() {
    vector<Baju> data;

    // Menambahkan 5 objek awal
    data.push_back(Baju(1, "Kalung Anjing", 50000, 10, "Kalung", "Plastik", "Merah", "Anjing", "M", "PetLover"));
    data.push_back(Baju(2, "Tali Leher", 30000, 15, "Tali", "Nilon", "Biru", "Kucing", "S", "CatWorld"));
    data.push_back(Baju(3, "Jas Hujan", 100000, 5, "Jas", "Plastik", "Kuning", "Anjing", "L", "RainPet"));
    data.push_back(Baju(4, "Topi", 25000, 20, "Topi", "Kain", "Hitam", "Kucing", "S", "CatStyle"));
    data.push_back(Baju(5, "Sepatu", 75000, 8, "Sepatu", "Karet", "Coklat", "Anjing", "M", "DogShoes"));

    // Menampilkan data awal
    displayHeader();
    for (const auto& item : data) {
        item.display();
    }

    // Input dari user
    int id, stok;
    string nama, jenis, bahan, warna, untuk, size, merk;
    double harga;

    cout << "\nMasukkan data baru:\n";
    cout << "ID: "; cin >> id;
    cout << "Nama Produk: "; cin.ignore(); getline(cin, nama);
    cout << "Harga: "; cin >> harga;
    cout << "Stok: "; cin >> stok;
    cout << "Jenis: "; cin.ignore(); getline(cin, jenis);
    cout << "Bahan: "; getline(cin, bahan);
    cout << "Warna: "; getline(cin, warna);
    cout << "Untuk: "; getline(cin, untuk);
    cout << "Size: "; getline(cin, size);
    cout << "Merk: "; getline(cin, merk);

    data.push_back(Baju(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk));

    // Menampilkan data setelah penambahan
    cout << "\nData setelah penambahan:\n";
    displayHeader();
    for (const auto& item : data) {
        item.display();
    }

    return 0;
}