import java.util.ArrayList;
import java.util.Scanner;

// Class PetShop
class PetShop {
    protected int id;
    protected String namaProduk;
    protected double hargaProduk;
    protected int stokProduk;

    public PetShop(int id, String namaProduk, double hargaProduk, int stokProduk) {
        this.id = id;
        this.namaProduk = namaProduk;
        this.hargaProduk = hargaProduk;
        this.stokProduk = stokProduk;
    }

    public void display() {
        System.out.printf("%-5d %-20s %-10.2f %-10d", id, namaProduk, hargaProduk, stokProduk);
    }
}

// Class Aksesoris (Child dari PetShop)
class Aksesoris extends PetShop {
    protected String jenis;
    protected String bahan;
    protected String warna;

    public Aksesoris(int id, String namaProduk, double hargaProduk, int stokProduk, String jenis, String bahan, String warna) {
        super(id, namaProduk, hargaProduk, stokProduk);
        this.jenis = jenis;
        this.bahan = bahan;
        this.warna = warna;
    }

    @Override
    public void display() {
        super.display();
        System.out.printf("%-15s %-15s %-10s", jenis, bahan, warna);
    }
}

// Class Baju (Child dari Aksesoris)
class Baju extends Aksesoris {
    private String untuk;
    private String size;
    private String merk;

    public Baju(int id, String namaProduk, double hargaProduk, int stokProduk, String jenis, String bahan, String warna, String untuk, String size, String merk) {
        super(id, namaProduk, hargaProduk, stokProduk, jenis, bahan, warna);
        this.untuk = untuk;
        this.size = size;
        this.merk = merk;
    }

    @Override
    public void display() {
        super.display();
        System.out.printf("%-10s %-10s %-10s%n", untuk, size, merk);
    }
}

// Main Class
public class Main {
    public static void main(String[] args) {
        ArrayList<Baju> data = new ArrayList<>();

        // Menambahkan 5 objek awal
        data.add(new Baju(1, "Kalung Anjing", 50000, 10, "Kalung", "Plastik", "Merah", "Anjing", "M", "PetLover"));
        data.add(new Baju(2, "Tali Leher", 30000, 15, "Tali", "Nilon", "Biru", "Kucing", "S", "CatWorld"));
        data.add(new Baju(3, "Jas Hujan", 100000, 5, "Jas", "Plastik", "Kuning", "Anjing", "L", "RainPet"));
        data.add(new Baju(4, "Topi", 25000, 20, "Topi", "Kain", "Hitam", "Kucing", "S", "CatStyle"));
        data.add(new Baju(5, "Sepatu", 75000, 8, "Sepatu", "Karet", "Coklat", "Anjing", "M", "DogShoes"));

        // Menampilkan data awal
        displayHeader();
        for (Baju item : data) {
            item.display();
        }

        // Input dari user
        Scanner scanner = new Scanner(System.in);
        System.out.println("\nMasukkan data baru:");
        System.out.print("ID: ");
        int id = scanner.nextInt();
        scanner.nextLine(); // Membersihkan newline
        System.out.print("Nama Produk: ");
        String namaProduk = scanner.nextLine();
        System.out.print("Harga: ");
        double hargaProduk = scanner.nextDouble();
        System.out.print("Stok: ");
        int stokProduk = scanner.nextInt();
        scanner.nextLine(); // Membersihkan newline
        System.out.print("Jenis: ");
        String jenis = scanner.nextLine();
        System.out.print("Bahan: ");
        String bahan = scanner.nextLine();
        System.out.print("Warna: ");
        String warna = scanner.nextLine();
        System.out.print("Untuk: ");
        String untuk = scanner.nextLine();
        System.out.print("Size: ");
        String size = scanner.nextLine();
        System.out.print("Merk: ");
        String merk = scanner.nextLine();

        data.add(new Baju(id, namaProduk, hargaProduk, stokProduk, jenis, bahan, warna, untuk, size, merk));

        // Menampilkan data setelah penambahan
        System.out.println("\nData setelah penambahan:");
        displayHeader();
        for (Baju item : data) {
            item.display();
        }

        scanner.close();
    }

    // Fungsi untuk menampilkan header tabel
    public static void displayHeader() {
        System.out.printf("%-5s %-20s %-10s %-10s %-15s %-15s %-10s %-10s %-10s %-10s%n",
                "ID", "Nama Produk", "Harga", "Stok", "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk");
    }
}