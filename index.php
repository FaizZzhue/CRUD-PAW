<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Optik Rayhan</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/style.css"/>
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
                <h1 class="logo">OPTIK RAYHAN</h1>
            </div>

            <div class="navbar-right">
                <button type="button" onclick="window.location.href='index.php'" class="btn btn-primary">
                    + Tambah Pasien
                </button>

                <!-- <div class="navbar-actions">
                    <button class="icon-btn"><span class="material-symbols-outlined">notifications</span></button>
                    <button class="icon-btn"><span class="material-symbols-outlined">settings</span></button>
                </div> -->

                <img 
                    alt="Profil Petugas Klinik" 
                    class="profile-image" 
                    src="https://ui-avatars.com/api/?name=Admin+Klinik&background=0284c7&color=fff"
                />
            </div>
        </div>
    </header>

    <main class="main-container">
        <form method="POST" id="optikForm">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($edit_data ? $edit_data['id'] : ''); ?>">
            <div class="main-layout">
                
                <div class="content-left">
                    <section class="card">
                        <h2 class="section-title">
                            <span class="material-symbols-outlined">person</span> Data Pelanggan
                        </h2>

                        <div class="form-grid">
                            <div class="form-group">
                                <label>ID Pelanggan</label>
                                <input type="text" name="kode_pelanggan" class="form-input" value="<?php echo htmlspecialchars($edit_data ? $edit_data['kode_pelanggan'] : $kode_pelanggan); ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-input" placeholder="Masukkan nama" value="<?php echo htmlspecialchars($edit_data ? $edit_data['nama_lengkap'] : ''); ?>" required>
                            </div>

                            <div class="form-group full-width">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-input" placeholder="Alamat lengkap" value="<?php echo htmlspecialchars($edit_data ? $edit_data['alamat'] : ''); ?>">
                            </div>

                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="tel" name="nomor_telepon" class="form-input" placeholder="08..." value="<?php echo htmlspecialchars($edit_data ? $edit_data['nomor_telepon'] : ''); ?>">
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

                    <section class="card">
                        <h2 class="section-title">
                            <span class="material-symbols-outlined">eyeglasses</span> Resep Kacamata
                        </h2>

                        <div class="prescription-table">
                            <div class="prescription-header">
                                <div>MATA</div>
                                <div>SPH (-/+)</div>
                                <div>CYL</div>
                                <div>AXIS</div>
                                <div>ADD</div>
                            </div>

                            <div class="prescription-row">
                                <div><b>Kanan (OD)</b></div>
                                <input name="sph_kanan" class="form-input" type="text" placeholder="-1.50" value="<?php echo htmlspecialchars($edit_data ? $edit_data['sph_kanan'] : ''); ?>">
                                <input name="cyl_kanan" class="form-input" type="text" placeholder="-0.50" value="<?php echo htmlspecialchars($edit_data ? $edit_data['cyl_kanan'] : ''); ?>">
                                <input name="axis_kanan" class="form-input" type="text" placeholder="180" value="<?php echo htmlspecialchars($edit_data ? $edit_data['axis_kanan'] : ''); ?>">
                                <input name="add_kanan" class="form-input" type="text" placeholder="+1.00" value="<?php echo htmlspecialchars($edit_data ? $edit_data['add_kanan'] : ''); ?>">
                            </div>

                            <div class="prescription-row">
                                <div><b>Kiri (OS)</b></div>
                                <input name="sph_kiri" class="form-input" type="text" placeholder="-1.75" value="<?php echo htmlspecialchars($edit_data ? $edit_data['sph_kiri'] : ''); ?>">
                                <input name="cyl_kiri" class="form-input" type="text" placeholder="0.00" value="<?php echo htmlspecialchars($edit_data ? $edit_data['cyl_kiri'] : ''); ?>">
                                <input name="axis_kiri" class="form-input" type="text" placeholder="0" value="<?php echo htmlspecialchars($edit_data ? $edit_data['axis_kiri'] : ''); ?>">
                                <input name="add_kiri" class="form-input" type="text" placeholder="+1.00" value="<?php echo htmlspecialchars($edit_data ? $edit_data['add_kiri'] : ''); ?>">
                            </div>
                        </div>

                        <div class="form-grid" style="margin-top: 16px;">
                            <div class="form-group">
                                <label>Pupil Distance (PD)</label>
                                <input type="text" name="pd" class="form-input" placeholder="62 mm" value="<?php echo htmlspecialchars($edit_data ? $edit_data['pd'] : ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>Catatan Resep</label>
                                <input type="text" name="catatan_resep" class="form-input" placeholder="Progresif, Anti-Radiasi" value="<?php echo htmlspecialchars($edit_data ? $edit_data['catatan_resep'] : ''); ?>">
                            </div>
                        </div>
                    </section>

                    <div class="action-buttons">
                        <button type="button" onclick="window.location.href='index.php'" class="btn btn-outline">Reset Form</button>
                        <button type="button" onclick="<?php echo $edit_data ? "if(confirm('Apakah Anda yakin ingin menghapus data ini?')) window.location.href='process/hapus.php?id=" . $edit_data['id'] . "'" : "alert('Pilih data yang ingin dihapus terlebih dahulu dari riwayat!')"; ?>" class="btn btn-danger" <?php echo !$edit_data ? 'disabled' : ''; ?>>Hapus Data</button>
                        <button type="submit" formaction="process/update.php" class="btn btn-outline" <?php echo !$edit_data ? 'disabled' : ''; ?>>Update Data</button>
                        <button type="submit" formaction="process/simpan.php" class="btn btn-primary" <?php echo $edit_data ? 'disabled' : ''; ?>>Simpan Data</button>
                    </div>
                </div>

                <div class="content-right">
                    
                    <section class="card promo-card">
                        <img 
                            src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=800"
                            alt="Ilustrasi Optik" 
                            class="promo-img"
                        >
                        <div class="promo-content">
                            <h3>Promo Kacamata Gacorrr</h3>
                            <p>Desain khusus untuk kaum emak - emak. Lensa tahan benturan diskon 20%!</p>
                        </div>
                    </section>

                    <section class="card">
                        <h2 class="section-title">
                            <span class="material-symbols-outlined">visibility</span> Pemeriksaan
                        </h2>

                        <div class="form-group">
                            <label>Optometrist</label>
                            <input type="text" name="optometrist" class="form-input" value="<?php echo htmlspecialchars($edit_data ? $edit_data['optometrist'] : 'Dr. Andi Saputra'); ?>">
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal_pemeriksaan" class="form-input" value="<?php echo htmlspecialchars($edit_data ? $edit_data['tanggal_pemeriksaan'] : date('Y-m-d')); ?>">
                        </div>

                        <div class="form-group">
                            <label>Keluhan Pasien</label>
                            <textarea name="keluhan" class="form-input" rows="3" placeholder="Penglihatan kabur saat membaca..."><?php echo htmlspecialchars($edit_data ? $edit_data['keluhan'] : ''); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Hasil Diagnosa</label>
                            <textarea name="diagnosa" class="form-input" rows="2" placeholder="Myopia ringan dengan astigmatisme..."><?php echo htmlspecialchars($edit_data ? $edit_data['diagnosa'] : ''); ?></textarea>
                        </div>
                    </section>

                    <section class="card">
                        <h2 class="section-title">
                            <span class="material-symbols-outlined">payments</span> Transaksi
                        </h2>

                        <?php
                        if ($edit_data) {
                            if (isset($edit_data['id_transaksi']) && trim($edit_data['id_transaksi']) != '') {
                                $id_transaksi = $edit_data['id_transaksi'];
                            } else {
                                $id_transaksi = generateTransactionID();
                                mysqli_query($conn, "UPDATE pelanggan SET id_transaksi = '" . mysqli_real_escape_string($conn, $id_transaksi) . "' WHERE id = '" . mysqli_real_escape_string($conn, $edit_data['id']) . "'");
                            }
                        } else {
                            $id_transaksi = generateTransactionID();
                        }

                        $total_harga = ($edit_data && isset($edit_data['total_harga'])) ? (float)$edit_data['total_harga'] : 0;
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
                            <strong style="color: var(--primary); font-size: 18px;">Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></strong>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label>Status Pesanan</label>
                            <div class="status-grid">
                                <label class="status-card <?php echo $status_pesanan == 'DIPROSES' ? 'active' : ''; ?>">
                                    <input type="radio" name="status_pesanan" value="DIPROSES" <?php echo $status_pesanan == 'DIPROSES' ? 'checked' : ''; ?> onclick="document.querySelectorAll('.status-card').forEach(c => c.classList.remove('active')); this.closest('.status-card').classList.add('active');">
                                    <span class="status-process">DIPROSES</span>
                                </label>
                                <label class="status-card <?php echo $status_pesanan == 'SELESAI' ? 'active' : ''; ?>">
                                    <input type="radio" name="status_pesanan" value="SELESAI" <?php echo $status_pesanan == 'SELESAI' ? 'checked' : ''; ?> onclick="document.querySelectorAll('.status-card').forEach(c => c.classList.remove('active')); this.closest('.status-card').classList.add('active');">
                                    <span class="status-success">SELESAI</span>
                                </label>
                                <label class="status-card <?php echo $status_pesanan == 'DIAMBIL' ? 'active' : ''; ?>">
                                    <input type="radio" name="status_pesanan" value="DIAMBIL" <?php echo $status_pesanan == 'DIAMBIL' ? 'checked' : ''; ?> onclick="document.querySelectorAll('.status-card').forEach(c => c.classList.remove('active')); this.closest('.status-card').classList.add('active');">
                                    <span class="status-info">DIAMBIL</span>
                                </label>
                                <label class="status-card <?php echo $status_pesanan == 'BATAL' ? 'active' : ''; ?>">
                                    <input type="radio" name="status_pesanan" value="BATAL" <?php echo $status_pesanan == 'BATAL' ? 'checked' : ''; ?> onclick="document.querySelectorAll('.status-card').forEach(c => c.classList.remove('active')); this.closest('.status-card').classList.add('active');">
                                    <span class="status-danger">BATAL</span>
                                </label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </form>

        <section class="card" style="margin-top: 32px;">
            <div class="table-header">
                <h3>Riwayat Pasien</h3>
                <form method="GET" action="index.php" class="search-wrapper">
                    <span class="material-symbols-outlined">search</span>
                    <input type="text" name="search" class="form-input search-input" placeholder="Cari ID, Nama..." value="<?php echo htmlspecialchars($search_raw); ?>">
                </form>
            </div>

            <div class="history-table">
                <div class="history-header">
                    <div>ID Pelanggan</div>
                    <div>Nama Lengkap</div>
                    <div>Tanggal Periksa</div>
                    <div>Status</div>
                    <div>Aksi</div>
                </div>

                <?php if (mysqli_num_rows($data) == 0): ?>
                    <div class="history-row" style="grid-template-columns: 1fr; padding: 30px;">
                        <span style="color: var(--text-muted); text-align: center; width: 100%;">
                            <?php echo $search_raw != '' ? 'Data tidak ditemukan untuk pencarian "' . htmlspecialchars($search_raw) . '"' : 'Belum ada data pelanggan'; ?>
                        </span>
                    </div>
                <?php else: while ($row = mysqli_fetch_assoc($data)): 
                        $formatted_date = formatDateIndonesia($row['tanggal_pemeriksaan']);
                        $status_class = getStatusClass($row['status_pesanan']);
                ?>
                    <div class="history-row">
                        <div><strong><?php echo htmlspecialchars($row['kode_pelanggan']); ?></strong></div>
                        <div><?php echo htmlspecialchars($row['nama_lengkap']); ?></div>
                        <div><?php echo htmlspecialchars($formatted_date); ?></div>
                        <div>
                            <span class="<?php echo $status_class; ?>">
                                <?php echo htmlspecialchars($row['status_pesanan']); ?>
                            </span>
                        </div>
                        <div class="action-cell">
                            <button type="button" class="icon-btn-table" disabled><span class="material-symbols-outlined">visibility</span></button>
                            <button type="button" onclick="window.location.href='index.php?edit=<?php echo $row['id']; ?>'" class="icon-btn-table"><span class="material-symbols-outlined">edit</span></button>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>

            <div class="pagination">
                <span style="font-size: 14px; font-weight: 500; color: var(--text-muted);">
                    Menampilkan <?php echo mysqli_num_rows($data) > 0 ? 1 : 0; ?>-<?php echo mysqli_num_rows($data); ?> dari <?php echo mysqli_num_rows($data); ?> data
                </span>
                <div class="pagination-buttons" style="display: flex; gap: 8px;">
                    <button class="btn btn-outline" style="padding: 6px 12px;" disabled>‹ Prev</button>
                    <button class="btn btn-primary" style="padding: 6px 16px;">1</button>
                    <button class="btn btn-outline" style="padding: 6px 12px;" disabled>Next ›</button>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <p class="footer-text">© 2026 Optik Rayhan - Smart Clinic Dashboard</p>
            <div class="footer-links">
                <a href="#">Bantuan Layanan</a>
                <a href="#">Privasi & Syarat</a>
            </div>
        </div>
    </footer>
</body>
</html>