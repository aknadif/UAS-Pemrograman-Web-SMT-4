// TANPA JQUERY
// var keyword = document.getElementById('keyword');
// var container = document.getElementById('container');

// keyword.addEventListener('keyup', function() {
//     console.log(keyword.value);
//     //membuat  object ajax
//     var xhr = new XMLHttpRequest();
//     //cek kesiapan ajax
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             container.innerHTML = xhr.responseText;
//         }
//     }

//     //eksekusi ajax
//     xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
//     xhr.send();
// });

// PAKAI JQUERY

$(document).ready(function() {
    // hilangkan tombol cari
    $('#tombol-cari').hide();

    $('#keyword').on('keyup', function() {

        //munculka loader
        $('.loader').show();
        //ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + 
        // $('#keyword').val());

        //ajax pakai get
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        })
    });
});