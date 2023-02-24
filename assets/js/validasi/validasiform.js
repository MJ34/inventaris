function validateForm() {
    var tanggal = document.forms["myForm"]["tanggal"].value;
    var no_inventaris = document.forms["myForm"]["no_inventaris"].value;
    var judul = document.forms["myForm"]["judul"].value;
    var asal = document.forms["myForm"]["asal"].value;
    var pengarang = document.forms["myForm"]["pengarang"].value;
    var penanggungjawab = document.forms["myForm"]["penanggungjawab"].value;
    var kota = document.forms["myForm"]["kota"].value;
    var penerbit = document.forms["myForm"]["penerbit"].value;
    var tahun = document.forms["myForm"]["tahun"].value;
    var jumlahjudul = document.forms["myForm"]["jumlahjudul"].value;
    var jumlaheks = document.forms["myForm"]["jumlaheks"].value;

    if (tanggal == "") {
        validasi('Tanggal wajib !', 'warning');
        return false;
    } else if (no_inventaris == '') {
        validasi('No Inventaris buku wajib di isi!', 'warning');
        return false;
    } else if (judul == '') {
        validasi('Judul buku wajib di isi!', 'warning');
        return false;
    } else if (asal == '') {
        validasi('Asal wajib di isi!', 'warning');
        return false;
    } else if (pengarang == '') {
        validasi('Pengarang wajib di isi!', 'warning');
        return false;
    } else if (penanggungjawab == '') {
        validasi('Penanggung Jawab Halaman wajib di isi!', 'warning');
        return false;
    } else if (kota == '') {
        validasi('kota wajib di isi!', 'warning');
        return false;
    } else if (penerbit == '') {
        validasi('Penerbit wajib di isi!', 'warning');
        return false;
    } else if (tahun == '') {
        validasi('Tahun Terbit wajib di isi!', 'warning');
        return false;
    } else if (
        jumlaheks == '') {
        validasi('Jumlah Eks wajib di isi!', 'warning');
        return false;
 
    } else if (jumlahjudul == '') {
        validasi('Jumlah Judul wajib di isi!', 'warning');
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


function fileIsValid(fileName) {
    var ext = fileName.match(/\.([^\.]+)$/)[1];
    ext = ext.toLowerCase();
    var isValid = true;
    switch (ext) {
        case 'png':
        case 'jpeg':
        case 'jpg':
        case 'tiff':
        case 'gif':
        case 'tif':

            break;
        default:
            this.value = '';
            isValid = false;
    }
    return isValid;
}

function VerifyFileNameAndFileSize() {
    var file = document.getElementById('GetFile').files[0];


    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan gambar!', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }
        var content;
        var size = file.size;
        if ((size != null) && ((size / (1024 * 1024)) > 3)) {
            validasi('Ukuran maximum 1024px', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();

        if (ext == 'pdf') {
            $('#pdf').show();
            $('#img').hide();
            $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputPdf').src = window.URL.createObjectURL(file);
        } else {
            $('#pdf').hide();
            $('#img').show();
            $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputImg').src = window.URL.createObjectURL(file);
        }
        return true;

    } else
        return false;
}