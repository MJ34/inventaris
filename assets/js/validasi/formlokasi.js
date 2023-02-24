function validateForm() {
    var lokasi = document.forms["myForm"]["lokasi"].value;

    if (lokasi == "") {
        validasi('Nama Lokasi wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var lokasi = document.forms["myFormUpdate"]["lokasi"].value;

    if (lokasi == "") {
        validasi('Nama Lokasi tidak boleh kosong!', 'warning');
        return false;
    }

}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}
