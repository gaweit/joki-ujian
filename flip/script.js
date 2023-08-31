// Buat konten untuk setiap halaman
const pagesContent = [
    `<div class="content">
        <h1>Halaman 1</h1>
        <p>Ini adalah konten dari Halaman 1.</p>
    </div>`,
    `<div class="content">
        <h1>Halaman 2</h1>
        <p>Ini adalah konten dari Halaman 2.</p>
    </div>`,
    `<div class="content">
        <h1>Halaman 3</h1>
        <p>Ini adalah konten dari Halaman 3.</p>
    </div>`,
    `<div class="content">
        <h1>Halaman 3</h1>
        <p>Ini adalah konten dari Halaman 3.</p>
    </div>`,
    `<div class="content">
        <h1>Halaman 3</h1>
        <p>Ini adalah konten dari Halaman 3.</p>
    </div>`,
    `<div class="content">
        <h1>Halaman 3</h1>
        <p>Ini adalah konten dari Halaman 3.</p>
    </div>`,
    `<div class="content">
        <h1>Halaman 3</h1>
        <p>Ini adalah konten dari Halaman 3.</p>
    </div>`,
    `<div class="content">
        <h1>Halaman 3</h1>
        <p>Ini adalah konten dari Halaman 3.</p>
    </div>`,
    `<div class="content">
        <h1>Halaman 3</h1>
        <p>Ini adalah konten dari Halaman 3.</p>
    </div>`
    // Tambahkan konten untuk halaman berikutnya di sini
];

// Membuat elemen flipbook
const flipbook = document.createElement('div');
flipbook.className = 'flipbook';
document.body.appendChild(flipbook);

// Menambahkan halaman ke dalam flipbook
pagesContent.forEach(content => {
    const page = document.createElement('div');
    page.className = 'page';
    page.innerHTML = content;
    flipbook.appendChild(page);
});

let currentPage = 0;

function turnPage() {
    if (currentPage < pagesContent.length - 1) {
        currentPage++;
        updateFlipbook();
    }
}

function updateFlipbook() {
    const translateX = -currentPage * 100;
    flipbook.style.transform = `translateX(${translateX}%)`;
}

flipbook.addEventListener('click', turnPage);
