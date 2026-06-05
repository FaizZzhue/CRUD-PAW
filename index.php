<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Optik Rayhan</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/style.css" />
</head>
<body>
    <header class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <h1 class="logo">
                    OPTIK RAYHAN
                </h1>

                <nav class="navbar-menu">
                    <a href="#">Dashboard</a>
                    <a href="#">Pelanggan</a>
                    <a href="#">Pemeriksaan</a>
                    <a href="#">Laporan</a>
                </nav>

            </div>

            <div class="navbar-right">
                <button class="btn btn-primary">
                    Tambah Pasien
                </button>

                <div class="navbar-actions">
                    <button class="icon-btn">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>

                    <button class="icon-btn">
                        <span class="material-symbols-outlined">settings</span>
                    </button>
                </div>

                <img 
                    alt="Profil Petugas Klinik" 
                    class="profile-image" 
                    data-alt="A close-up portrait of a professional clinic administrator in a bright, modern setting. Lighting is high-key and soft, emphasizing a clean, corporate medical aesthetic. The image conveys trust and efficiency, fitting seamlessly into a minimalist healthcare dashboard UI." 
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcpadrigGAcJ0X4Nb43KfFHGMQX54NZBkt2qiAaURzSbo_3kozSGZy3CfgEd_CzPM90U9aIhCOtxZLfv5C9pGwePjjuWUrtsCRw3EHIb8RTCcHIJBkasNJ5nKwuGjOYo6OlVhLWw4ENiwUh16soKdyA_45fU8Pq9Pc7FCIKXKxl0XP0TqMtNNgWxJgyKZjLwDe-lUUM4cfTzlSHYBrASZRjZY6hQ04xFtfuh6ZoOMKFI5ziynnOS1di8mzHOaXkI61zUH43KQQwNJU"
                />
            </div>
        </div>

    </header>

<!-- Main Content -->
    <main class="main-container">
        <div class="main-layout">
            <!-- LEFT CONTENT -->
            <div class="content-left">
                <!-- DATA PELANGGAN -->
                <section class="card">
                    <h2 class="section-title">
                        <span class="material-symbols-outlined">person</span>
                        Data Pelanggan
                    </h2>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>ID Pelanggan</label>
                            <input
                                type="text"
                                class="form-input"
                                value="CUST-2023-0891"
                                readonly
                            >
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input
                                type="text"
                                class="form-input"
                                placeholder="Masukkan nama"
                            >
                        </div>

                        <div class="form-group full-width">
                            <label>Alamat</label>
                            <input
                                type="text"
                                class="form-input"
                                placeholder="Alamat lengkap"
                            >
                        </div>

                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input
                                type="tel"
                                class="form-input"
                                placeholder="08..."
                            >
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>

                            <select class="form-input">
                                <option>Pria</option>
                                <option>Wanita</option>
                            </select>
                        </div>
                    </div>
                </section>

                <!-- RESEP KACAMATA -->
                <section class="card">
                    <h2 class="section-title">
                        <span class="material-symbols-outlined">eyeglasses</span>
                        Resep Kacamata
                    </h2>

                    <div class="prescription-table">
                        <div class="prescription-header">
                            <div>MATA</div>
                            <div>SPH (Minus/Plus)</div>
                            <div>CYL</div>
                            <div>AXIS</div>
                            <div>ADD</div>
                        </div>

                        <div class="prescription-row">
                            <div>Kanan (OD)</div>
                            <input class="form-input" type="text" placeholder="-1.50">
                            <input class="form-input" type="text" placeholder="-0.50">
                            <input class="form-input" type="text" placeholder="180">
                            <input class="form-input" type="text" placeholder="+1.00">
                        </div>

                        <div class="prescription-row">
                            <div>Kiri (OS)</div>
                            <input class="form-input" type="text" placeholder="-1.75">
                            <input class="form-input" type="text" placeholder="0.00">
                            <input class="form-input" type="text" placeholder="0">
                            <input class="form-input" type="text" placeholder="+1.00">
                        </div>
                    </div>

                    <div class="form-grid mt-16">
                        <div class="form-group">
                            <label>Pupil Distance (PD)</label>

                            <input
                                type="text"
                                class="form-input"
                                placeholder="62 mm"
                            >
                        </div>

                        <div class="form-group">
                            <label>Catatan Resep</label>
                            <input
                                type="text"
                                class="form-input"
                                placeholder="Progresif, Anti-Radiasi"
                            >
                        </div>
                    </div>
                </section>

                <!-- ACTION BUTTONS -->
                <div class="action-buttons">
                    <button class="btn btn-outline">
                        Reset Form
                    </button>

                    <button class="btn btn-danger">
                        Hapus Data
                    </button>

                    <button class="btn btn-outline">
                        Update Data
                    </button>

                    <button class="btn btn-primary">
                        Simpan Data
                    </button>
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="content-right">
                <!-- PEMERIKSAAN -->
                <section class="card">
                    <h2 class="section-title">
                        <span class="material-symbols-outlined">visibility</span>
                        Pemeriksaan
                    </h2>

                    <div class="form-group">
                        <label>Optometrist</label>
                        <input
                            type="text"
                            class="form-input"
                            value="Dr. Andi Saputra"
                        >
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input
                            type="date"
                            class="form-input"
                        >
                    </div>

                    <div class="form-group">
                        <label>Keluhan Pasien</label>

                        <textarea
                            class="form-input"
                            rows="3"
                            placeholder="Penglihatan kabur saat membaca..."
                        ></textarea>
                    </div>

                    <div class="form-group">
                        <label>Hasil Diagnosa</label>

                        <textarea
                            class="form-input"
                            rows="2"
                            placeholder="Myopia ringan dengan astigmatisme..."
                        ></textarea>
                    </div>

                </section>

                <!-- TRANSAKSI -->
                <section class="card">
                    <h2 class="section-title">
                        <span class="material-symbols-outlined">payments</span>
                        Transaksi
                    </h2>

                    <div class="transaction-item">
                        <span>ID Transaksi</span>
                        <strong>TRX-9921</strong>
                    </div>

                    <div class="transaction-item">
                        <span>Total Harga</span>
                        <strong>Rp 1.450.000</strong>
                    </div>

                    <div class="status-section">
                        <label>Status Pesanan</label>

                        <div class="status-grid">
                            <label class="status-card">
                                <input type="radio" name="status">
                                <span class="status-process">
                                    DIPROSES
                                </span>
                            </label>

                            <label class="status-card">
                                <input type="radio" name="status">
                                <span class="status-success">
                                    SELESAI
                                </span>
                            </label>

                            <label class="status-card active">
                                <input type="radio" name="status" checked>
                                <span class="status-info">
                                    DIAMBIL
                                </span>
                            </label>

                            <label class="status-card">
                                <input type="radio" name="status">
                                <span class="status-danger">
                                    BATAL
                                </span>
                            </label>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- HISTORY TABLE -->
        <section class="card table-card">
            <div class="table-header">
                <h3>Riwayat Pasien</h3>

                <div class="search-wrapper">
                    <span class="material-symbols-outlined">search</span>

                    <input
                        type="text"
                        class="form-input search-input"
                        placeholder="Cari ID, Nama..."
                    >
                </div>
            </div>

            <div class="history-table">
                <div class="history-header">
                    <div>ID</div>
                    <div>Nama Pelanggan</div>
                    <div>Tanggal</div>
                    <div>Status</div>
                    <div>Aksi</div>
                </div>

                <div class="history-row">
                    <div>CUST-0891</div>
                    <div>Budi Santoso</div>
                    <div>12 Nov 2023</div>
                    <div>
                        <span class="status-info">
                            DIAMBIL
                        </span>
                    </div>

                    <div class="action-cell">
                        <button class="icon-btn-table">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                        </button>

                        <button class="icon-btn-table">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </button>
                    </div>
                </div>

                <div class="history-row">
                    <div>CUST-0890</div>
                    <div>Siti Aminah</div>
                    <div>10 Nov 2023</div>

                    <div>
                        <span class="status-process">
                            DIPROSES
                        </span>
                    </div>

                    <div class="action-cell">
                        <button class="icon-btn-table">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                        </button>

                        <button class="icon-btn-table">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="pagination">
                <span>
                    Menampilkan 1-10 dari 45 data
                </span>

                <div class="pagination-buttons">
                    <button class="btn btn-outline">‹</button>
                    <button class="btn btn-primary">1</button>
                    <button class="btn btn-outline">2</button>
                    <button class="btn btn-outline">›</button>
                </div>
            </div>
        </section>
    </main>
<!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <p class="footer-text">
                © 2023 Optik Rayhan. Clinical Management System v2.1.0
            </p>

            <div class="footer-links">
                <a href="#">Bantuan</a>
                <a href="#">Privasi</a>
            </div>
        </div>
    </footer>
</body>
</html>