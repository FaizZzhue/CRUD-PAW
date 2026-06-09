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
    <?php
        require_once 'config/database.php';
        require_once 'includes/functions.php';
        require_once 'includes/generate_id.php';

        $id_edit = isset($_GET['edit']) ? mysqli_real_escape_string($conn, trim($_GET['edit'])) : '';
        $edit_data = null;

        if($id_edit != ''){
            $result = mysqli_query(
                $conn,
                "SELECT * FROM pelanggan
                WHERE id = '$id_edit'"
            );

            $edit_data = mysqli_fetch_assoc($result);
        }

        // Search filter
        $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, trim($_GET['search'])) : '';
        $search_raw = isset($_GET['search']) ? trim($_GET['search']) : '';

        if ($search != '') {
            $data = mysqli_query(
                $conn,
                "SELECT * FROM pelanggan
                WHERE kode_pelanggan LIKE '%$search%'
                OR nama_lengkap LIKE '%$search%'
                ORDER BY id DESC"
            );
        } else {
            $data = mysqli_query(
                $conn,
                "SELECT * FROM pelanggan
                ORDER BY id DESC"
            );
        }

        $kode_pelanggan = generateCustomerID();
    ?>

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
                <button type="button" onclick="window.location.href='index.php'" class="btn btn-primary">
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
        <form method="POST" id="optikForm">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($edit_data ? $edit_data['id'] : ''); ?>">
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
                                    name="kode_pelanggan"
                                    class="form-input"
                                    value="<?php echo htmlspecialchars($edit_data ? $edit_data['kode_pelanggan'] : $kode_pelanggan); ?>"
                                    readonly
                                >
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input
                                    type="text"
                                    name="nama_lengkap"
                                    class="form-input"
                                    placeholder="Masukkan nama"
                                    value="<?php echo htmlspecialchars($edit_data ? $edit_data['nama_lengkap'] : ''); ?>"
                                    required
                                >
                            </div>

                            <div class="form-group full-width">
                                <label>Alamat</label>
                                <input
                                    type="text"
                                    name="alamat"
                                    class="form-input"
                                    placeholder="Alamat lengkap"
                                    value="<?php echo htmlspecialchars($edit_data ? $edit_data['alamat'] : ''); ?>"
                                >
                            </div>

                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input
                                    type="tel"
                                    name="nomor_telepon"
                                    class="form-input"
                                    placeholder="08..."
                                    value="<?php echo htmlspecialchars($edit_data ? $edit_data['nomor_telepon'] : ''); ?>"
                                >
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>

                                <select name="jenis_kelamin" class="form-input">
                                    <option value="Pria" <?php echo ($edit_data && $edit_data['jenis_kelamin'] == 'Pria') ? 'selected' : ''; ?>>Pria</option>
                                    <option value="Wanita" <?php echo ($edit_data && $edit_data['jenis_kelamin'] == 'Wanita') ? 'selected' : ''; ?>>Wanita</option>
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
                                <input name="sph_kanan" class="form-input" type="text" placeholder="-1.50" value="<?php echo htmlspecialchars($edit_data ? $edit_data['sph_kanan'] : ''); ?>">
                                <input name="cyl_kanan" class="form-input" type="text" placeholder="-0.50" value="<?php echo htmlspecialchars($edit_data ? $edit_data['cyl_kanan'] : ''); ?>">
                                <input name="axis_kanan" class="form-input" type="text" placeholder="180" value="<?php echo htmlspecialchars($edit_data ? $edit_data['axis_kanan'] : ''); ?>">
                                <input name="add_kanan" class="form-input" type="text" placeholder="+1.00" value="<?php echo htmlspecialchars($edit_data ? $edit_data['add_kanan'] : ''); ?>">
                            </div>

                            <div class="prescription-row">
                                <div>Kiri (OS)</div>
                                <input name="sph_kiri" class="form-input" type="text" placeholder="-1.75" value="<?php echo htmlspecialchars($edit_data ? $edit_data['sph_kiri'] : ''); ?>">
                                <input name="cyl_kiri" class="form-input" type="text" placeholder="0.00" value="<?php echo htmlspecialchars($edit_data ? $edit_data['cyl_kiri'] : ''); ?>">
                                <input name="axis_kiri" class="form-input" type="text" placeholder="0" value="<?php echo htmlspecialchars($edit_data ? $edit_data['axis_kiri'] : ''); ?>">
                                <input name="add_kiri" class="form-input" type="text" placeholder="+1.00" value="<?php echo htmlspecialchars($edit_data ? $edit_data['add_kiri'] : ''); ?>">
                            </div>
                        </div>

                        <div class="form-grid mt-16">
                            <div class="form-group">
                                <label>Pupil Distance (PD)</label>

                                <input
                                    type="text"
                                    name="pd"
                                    class="form-input"
                                    placeholder="62 mm"
                                    value="<?php echo htmlspecialchars($edit_data ? $edit_data['pd'] : ''); ?>"
                                >
                            </div>

                            <div class="form-group">
                                <label>Catatan Resep</label>
                                <input
                                    type="text"
                                    name="catatan_resep"
                                    class="form-input"
                                    placeholder="Progresif, Anti-Radiasi"
                                    value="<?php echo htmlspecialchars($edit_data ? $edit_data['catatan_resep'] : ''); ?>"
                                >
                            </div>
                        </div>
                    </section>

                    <!-- ACTION BUTTONS -->
                    <div class="action-buttons">
                        <button type="button" onclick="window.location.href='index.php'" class="btn btn-outline">
                            Reset Form
                        </button>

                        <button type="button" onclick="<?php echo $edit_data ? "if(confirm('Apakah Anda yakin ingin menghapus data ini?')) window.location.href='process/hapus.php?id=" . $edit_data['id'] . "'" : "alert('Pilih data yang ingin dihapus terlebih dahulu dari riwayat!')"; ?>" class="btn btn-danger" <?php echo !$edit_data ? 'disabled' : ''; ?>>
                            Hapus Data
                        </button>

                        <button type="submit" formaction="process/update.php" class="btn btn-outline" <?php echo !$edit_data ? 'disabled' : ''; ?>>
                            Update Data
                        </button>

                        <button type="submit" formaction="process/simpan.php" class="btn btn-primary" <?php echo $edit_data ? 'disabled' : ''; ?>>
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
                                name="optometrist"
                                class="form-input"
                                value="<?php echo htmlspecialchars($edit_data ? $edit_data['optometrist'] : 'Dr. Andi Saputra'); ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input
                                type="date"
                                name="tanggal_pemeriksaan"
                                class="form-input"
                                value="<?php echo htmlspecialchars($edit_data ? $edit_data['tanggal_pemeriksaan'] : date('Y-m-d')); ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label>Keluhan Pasien</label>

                            <textarea
                                name="keluhan"
                                class="form-input"
                                rows="3"
                                placeholder="Penglihatan kabur saat membaca..."
                            ><?php echo htmlspecialchars($edit_data ? $edit_data['keluhan'] : ''); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Hasil Diagnosa</label>

                            <textarea
                                name="diagnosa"
                                class="form-input"
                                rows="2"
                                placeholder="Myopia ringan dengan astigmatisme..."
                            ><?php echo htmlspecialchars($edit_data ? $edit_data['diagnosa'] : ''); ?></textarea>
                        </div>

                    </section>

                    <!-- TRANSAKSI -->
                    <section class="card">
                        <h2 class="section-title">
                            <span class="material-symbols-outlined">payments</span>
                            Transaksi
                        </h2>

                        <?php
                        // ID Transaksi: ambil dari DB saat edit, generate baru saat tambah
                        if ($edit_data) {
                            // Jika data lama belum punya id_transaksi, generate & simpan ke DB
                            if (isset($edit_data['id_transaksi']) && trim($edit_data['id_transaksi']) != '') {
                                $id_transaksi = $edit_data['id_transaksi'];
                            } else {
                                $id_transaksi = generateTransactionID();
                                mysqli_query($conn, "UPDATE pelanggan SET id_transaksi = '" . mysqli_real_escape_string($conn, $id_transaksi) . "' WHERE id = '" . mysqli_real_escape_string($conn, $edit_data['id']) . "'");
                            }
                        } else {
                            $id_transaksi = generateTransactionID();
                        }

                        // Total Harga: ambil dari DB, fallback 0 jika kosong
                        $total_harga = ($edit_data && isset($edit_data['total_harga'])) ? (float)$edit_data['total_harga'] : 0;

                        // Status Pesanan: ambil dari DB, default DIPROSES untuk data baru
                        $status_pesanan = ($edit_data && isset($edit_data['status_pesanan']) && trim($edit_data['status_pesanan']) != '') ? $edit_data['status_pesanan'] : 'DIPROSES';
                        ?>
                        <input type="hidden" name="id_transaksi" value="<?php echo htmlspecialchars($id_transaksi); ?>">
                        <input type="hidden" name="total_harga" value="<?php echo htmlspecialchars($total_harga); ?>">

                        <div class="transaction-item">
                            <span>ID Transaksi</span>
                            <strong><?php echo htmlspecialchars($id_transaksi); ?></strong>
                        </div>

                        <div class="transaction-item">
                            <span>Total Harga</span>
                            <strong>Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></strong>
                        </div>

                        <div class="status-section">
                            <label>Status Pesanan</label>

                            <div class="status-grid">
                                <label class="status-card <?php echo $status_pesanan == 'DIPROSES' ? 'active' : ''; ?>">
                                    <input type="radio" name="status_pesanan" value="DIPROSES" <?php echo $status_pesanan == 'DIPROSES' ? 'checked' : ''; ?> onclick="document.querySelectorAll('.status-card').forEach(c => c.classList.remove('active')); this.closest('.status-card').classList.add('active');">
                                    <span class="status-process">
                                        DIPROSES
                                    </span>
                                </label>

                                <label class="status-card <?php echo $status_pesanan == 'SELESAI' ? 'active' : ''; ?>">
                                    <input type="radio" name="status_pesanan" value="SELESAI" <?php echo $status_pesanan == 'SELESAI' ? 'checked' : ''; ?> onclick="document.querySelectorAll('.status-card').forEach(c => c.classList.remove('active')); this.closest('.status-card').classList.add('active');">
                                    <span class="status-success">
                                        SELESAI
                                    </span>
                                </label>

                                <label class="status-card <?php echo $status_pesanan == 'DIAMBIL' ? 'active' : ''; ?>">
                                    <input type="radio" name="status_pesanan" value="DIAMBIL" <?php echo $status_pesanan == 'DIAMBIL' ? 'checked' : ''; ?> onclick="document.querySelectorAll('.status-card').forEach(c => c.classList.remove('active')); this.closest('.status-card').classList.add('active');">
                                    <span class="status-info">
                                        DIAMBIL
                                    </span>
                                </label>

                                <label class="status-card <?php echo $status_pesanan == 'BATAL' ? 'active' : ''; ?>">
                                    <input type="radio" name="status_pesanan" value="BATAL" <?php echo $status_pesanan == 'BATAL' ? 'checked' : ''; ?> onclick="document.querySelectorAll('.status-card').forEach(c => c.classList.remove('active')); this.closest('.status-card').classList.add('active');">
                                    <span class="status-danger">
                                        BATAL
                                    </span>
                                </label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </form>

        <!-- HISTORY TABLE -->
        <section class="card table-card">
            <div class="table-header">
                <h3>Riwayat Pasien</h3>

                <form method="GET" action="index.php" class="search-wrapper">
                    <span class="material-symbols-outlined">search</span>

                    <input
                        type="text"
                        name="search"
                        class="form-input search-input"
                        placeholder="Cari ID, Nama..."
                        value="<?php echo htmlspecialchars($search_raw); ?>"
                    >
                </form>
            </div>

            <div class="history-table">
                <div class="history-header">
                    <div>ID</div>
                    <div>Nama Pelanggan</div>
                    <div>Tanggal</div>
                    <div>Status</div>
                    <div>Aksi</div>
                </div>

                <?php
                if (mysqli_num_rows($data) == 0):
                ?>
                    <div class="history-row" style="grid-template-columns: 1fr; text-align: center; justify-content: center; padding: 20px;">
                        <?php echo $search_raw != '' ? 'Data tidak ditemukan untuk pencarian "' . htmlspecialchars($search_raw) . '"' : 'Belum ada data pelanggan'; ?>
                    </div>
                <?php
                else:
                    while ($row = mysqli_fetch_assoc($data)):
                        $formatted_date = formatDateIndonesia($row['tanggal_pemeriksaan']);
                        $status_class = getStatusClass($row['status_pesanan']);
                ?>
                    <div class="history-row">
                        <div><?php echo htmlspecialchars($row['kode_pelanggan']); ?></div>
                        <div><?php echo htmlspecialchars($row['nama_lengkap']); ?></div>
                        <div><?php echo htmlspecialchars($formatted_date); ?></div>
                        <div>
                            <span class="<?php echo $status_class; ?>">
                                <?php echo htmlspecialchars($row['status_pesanan']); ?>
                            </span>
                        </div>

                        <div class="action-cell">
                            <button type="button" class="icon-btn-table" disabled>
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </button>

                            <button type="button" onclick="window.location.href='index.php?edit=<?php echo $row['id']; ?>'" class="icon-btn-table">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </button>
                        </div>
                    </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>

            <div class="pagination">
                <span>
                    Menampilkan <?php echo mysqli_num_rows($data) > 0 ? 1 : 0; ?>-<?php echo mysqli_num_rows($data); ?> dari <?php echo mysqli_num_rows($data); ?> data
                </span>

                <div class="pagination-buttons">
                    <button class="btn btn-outline" disabled>‹</button>
                    <button class="btn btn-primary">1</button>
                    <button class="btn btn-outline" disabled>›</button>
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