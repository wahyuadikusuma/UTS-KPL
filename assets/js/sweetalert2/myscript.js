const flashData = $('.flash-pesan').data('flashdata');

if (flashData) {
    Swal({
        title: 'Pesan',
        text: 'Berhasil ' + flashData,
        type: 'success'
    });
}

// tombol-hapus-pesan
$('a .hapus-pesan').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Pesan ini akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

// ============      ARTIKEL      ==============

//edit artikel
const flashDataA = $('.flash-artikel').data('flashdata');

if (flashDataA) {
    Swal({
        title: 'Artikel ',
        text: 'Berhasil ' + flashDataA,
        type: 'success'
    });
}
// tombol-hapus artikel
$('.hapus-artikel').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Artikel akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// ============      Slider      ==============

//edit slider
const flashDataS = $('.flash-slider').data('flashdata');

if (flashDataS) {
    Swal({
        title: 'Slider ',
        text: 'Berhasil ' + flashDataS,
        type: 'success'
    });
}
// tombol-hapus slider
$('.hapus-slider').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Slider akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// ============      Pokja      ==============

//edit pokja
const flashDataP = $('.flash-pokja').data('flashdata');

if (flashDataP) {
    Swal({
        title: 'Data Pokja ',
        text: 'Berhasil ' + flashDataP,
        type: 'success'
    });
}
// tombol-hapus pokja
$('.hapus-pokja').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Data Pokja akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// ============      Kegiatan      ==============

//edit kegiatan
const flashDataK = $('.flash-kegiatan').data('flashdata');

if (flashDataK) {
    Swal({
        title: 'Data Kegiatan ',
        text: 'Berhasil ' + flashDataK,
        type: 'success'
    });
}
// tombol-hapus kegiatan
$('.hapus-kegiatan').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Data Kegiatan akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});


//edit foto kegiatan
const flashDataFK = $('.flash-fotokegiatan').data('flashdata');

if (flashDataFK) {
    Swal({
        title: 'Foto Kegiatan ',
        text: 'Berhasil ' + flashDataFK,
        type: 'success'
    });
}
// tombol-hapus kegiatan
$('.hapus-fotokegiatan').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Foto Kegiatan akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

//edit materi
const flashDataM = $('.flash-materi').data('flashdata');

if (flashDataM) {
    Swal({
        title: 'Materi',
        text: 'Berhasil ' + flashDataM,
        type: 'success'
    });
}
// tombol-hapus kegiatan
$('.hapus-materi').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Materi akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});