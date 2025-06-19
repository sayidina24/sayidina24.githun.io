<?php
include('header.php'); // Menginclude header.php untuk bagian atas halaman

// Data contoh file download (seperti sebelumnya)
// Anda bisa mengambil data ini dari database di aplikasi nyata
$files = [
    'modul' => [
        ['name' => 'Modul Mapaba', 'size' => '3.5 mb', 'type' => 'PDF', 'link' => 'assets/downoad/MUSPIMDA PMII JATIM 2024.pdf'],
        ['name' => 'Modul PKD', 'size' => '4.1 mb', 'type' => 'PDF', 'link' => 'assets/downoad/MUSPIMDA PMII JATIM 2024.pdf'],
        ['name' => 'Modul PKL', 'size' => '2.8 mb', 'type' => 'PDF', 'link' => 'assets/downoad/MUSPIMDA PMII JATIM 2024.pdf'],
    ],
    'produk-hukum' => [
        ['name' => 'AD/ART PMII', 'size' => '1.2 mb', 'type' => 'PDF', 'link' => 'assets/downoad/MUSPIMDA PMII JATIM 2024.pdf'],
        ['name' => 'POK-POK PMII', 'size' => '0.9 mb', 'type' => 'PDF', 'link' => 'assets/downoad/MUSPIMDA PMII JATIM 2024.pdf'],
    ],
    'program-kerja' => [
        ['name' => 'Proker Rayon 2024', 'size' => '0.7 mb', 'type' => 'PDF', 'link' => 'assets/downoad/MUSPIMDA PMII JATIM 2024.pdf'],
        ['name' => 'RAB Kegiatan', 'size' => '0.5 mb', 'type' => 'Excel', 'link' => 'assets/downoad/MUSPIMDA PMII JATIM 2024.pdf'],
    ],
];

// Ambil kategori dari URL, default ke 'modul' jika tidak ada atau tidak valid
$category = isset($_GET['category']) && array_key_exists($_GET['category'], $files) ? $_GET['category'] : 'modul';

// Tentukan judul berdasarkan kategori
$page_title = '';
switch ($category) {
    case 'modul':
        $page_title = 'Modul PMII';
        break;
    case 'produk-hukum':
        $page_title = 'Produk Hukum Organisasi';
        break;
    case 'program-kerja':
        $page_title = 'Program Kerja';
        break;
    default:
        $page_title = 'File Unduhan';
        break;
}

?>

    <aside class="sidebar">
        <h2>OUR BROCHURE</h2>

        <div class="download-item-wrapper highlighted">
            <a href="assets/downloads/modul-mapaba.pdf" target="_blank" class="download-item">
                <div class="icon">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1200px-PDF_file_icon.svg.png" alt="PDF Icon">
                </div>
                <div class="info">
                    <h3>Modul Mapaba</h3>
                    <p>3.5 mb, PDF</p>
                </div>
            </a>
        </div>

        <div class="download-item-wrapper highlighted">
            <a href="assets/downloads/produk-hukum.pdf" target="_blank" class="download-item">
                <div class="icon">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1200px-PDF_file_icon.svg.png" alt="PDF Icon">
                </div>
                <div class="info">
                    <h3>Produk Hukum</h3>
                    <p>2.3 mb, PDF</p>
                </div>
            </a>
        </div>

        <div class="questions-box">
            <h3>Do you have any questions?</h3>
            <p>Jika Anda memiliki pertanyaan, tim kami siap memberikan jawaban.</p>
        </div>
    </aside>

    <section class="content-area">
        <div class="breadcrumb">
            <a href="index.php">Home</a>
            <span>»</span>
            <span>Download</span>
            <span>»</span>
            <span><?php echo $page_title; ?></span>
        </div>
        <h1><?php echo $page_title; ?></h1>
        <p>Senin, 18 Juni 2025</p>
        <p>Kebebasan berpendapat dan berekspresi merupakan salah satu aspek penting dan mendasar dalam masyarakat demokratis. Hal tersebut tercermin dari adanya perlindungan terhadap kebebasan berkumpul, mengeluarkan pikiran dengan lisan dan tulisan, serta kebebasan pers. Dalam kehidupan bermasyarakat, berbangsa, dan bernegara yang demokratis, kemerdekaan menyatakan pikiran dan pendapat sesuai dengan hati nurani dan hak memperoleh informasi, merupakan hak asasi manusia yang sangat hakiki, yang diperlukan untuk menegakkan keadilan dan kebenaran, memajukan kesejahteraan umum, dan mencerdaskan kehidupan bangsa.</p>
        <p>Salah satu universalitas kebebasan ekspresi tersebut sebagaimana diatur dalam Pasal 19 DUHAM (Deklarasi Universal Hak Asasi Manusia), yang menyatakan:</p>

        <div class="download-list">
            <?php if (!empty($files[$category])): ?>
            <?php foreach ($files[$category] as $file): ?>
                <a href="<?php echo htmlspecialchars($file['link']); ?>" target="_blank" class="download-item">
                <div class="icon">
                    <?php
                    $icon_src = '';
                    if ($file['type'] == 'PDF') {
                        $icon_src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1200px-PDF_file_icon.svg.png';
                    } elseif ($file['type'] == 'Excel') {
                        $icon_src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Microsoft_Office_Excel_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Excel_%282019%E2%80%93present%29.svg.png';
                    } else {
                        $icon_src = 'https://via.placeholder.com/40x40?text=File';
                    }
                    ?>
                    <img src="<?php echo $icon_src; ?>" alt="<?php echo $file['type']; ?> Icon">
                </div>
                <div class="info">
                    <h3><?php echo htmlspecialchars($file['name']); ?></h3>
                    <p><?php echo htmlspecialchars($file['size']); ?>, <?php echo htmlspecialchars($file['type']); ?></p>
                </div>
                </a>
            <?php endforeach; ?>
            <?php else: ?>
            <p>Belum ada file untuk kategori ini.</p>
            <?php endif; ?>
        </div>
    </section>

</div> <section class="comment-section">
    <div class="reactions">
        <p>0 Respons</p>
        <div class="reaction-items">
            <span class="reaction-item"><span class="emoji">👍</span><span class="label">Upvote</span></span>
            <span class="reaction-item"><span class="emoji">😆</span><span class="label">Funny</span></span>
            <span class="reaction-item"><span class="emoji">😍</span><span class="label">Love</span></span>
            <span class="reaction-item"><span class="emoji">😲</span><span class="label">Surprised</span></span>
        </div>
    </div>

    <div class="comment-header">
        <h3>Komentar</h3>
        <a href="#" class="login-btn">Masuk ▾</a>
    </div>

    <div class="comment-input-area">
        <div class="comment-avatar">
            G </div>
        <div class="comment-form-group">
            <textarea class="comment-textarea" placeholder="Mulai berdiskusi..."></textarea>
            <div class="comment-toolbar">
                <div class="format-buttons">
                    <button>GIF</button>
                    <button>B</button>
                    <button>I</button>
                    <button>U</button>
                    <button>S</button>
                    <button>🔗</button>
                    <button>&#x270E;</button> <button>&lt;/&gt;</button>
                    <button>&ldquo;</button>
                    <button>@</button>
                </div>
                <button class="comment-submit-btn">Komentar</button>
            </div>
        </div>
    </div>

    <div class="comment-login-options">
        <h4>MASUK DENGAN</h4>
        <div class="comment-social-logins">
            <a href="#" class="facebook">f</a>
            <a href="#" class="x">X</a>
            <a href="#" class="google">G</a>
            <a href="#" class="microsoft">M</a>
            <a href="#" class="apple"></a>
            <a href="#" class="whatsapp">W</a> </div>
        <span class="comment-or">ATAU DAFTAR DISQUS</span>
        <div class="comment-name-input">
            <input type="text" placeholder="Nama">
            <span class="question-mark">?</span> </div>
    </div>
</section>
<a href="#top" class="top-button">TOP</a> <?php include('footer.php'); // Menginclude footer.php untuk bagian bawah halaman ?>