//manipulasi dom warna
// Mengambil semua elemen dengan kelas 'display-4'
const judul = document.getElementsByClassName('display-4');

// Mengubah warna teks dari setiap elemen dengan kelas 'display-4' menjadi merah
for (let i = 0; i < judul.length; i++) {
    judul[i].style.color = 'yellow';
}




const button = document.getElementById('btn-info');
button.addEventListener("click", function showinfo() {
    const x = document.getElementById('info');
    if (x.style.display == 'none'){
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
});


const toggleBtn = document.getElementById('toggleBtn');
const body = document.body;

toggleBtn.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    if (body.classList.contains('dark-mode')) {
        toggleBtn.innerText = 'Light Mode';
    } else {
        toggleBtn.innerText = 'Dark Mode';
    }
});

// Ambil elemen dengan ID "myDiv"
const mydiv = document.getElementById("mydiv");

// Mengubah style elemen
myDiv.style.backgroundColor = "lightgreen";
myDiv.style.color = "white";
myDiv.style.fontSize = "24px";
myDiv.textContent = "Gaya telah diubah menggunakan JavaScript!";

