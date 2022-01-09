var tabelBarang = $("#tabel-barang");

function tambah() {
    var barang = document.getElementById("barang").value;
    barang = barang.replace(/^\[\'|\'\]$/g, "").split("', '");
    var jumlah = document.getElementById("jumlah").value;
    var id_barang = barang[0];
    var kode_barang = barang[1];
    var nama_barang = barang[2];
    var tersedia = parseInt(barang[3]);

    if (jumlah > tersedia) {
       swal({
           title: "Gagal menambahkan !",
           text: "Barang yang dipinjam melebihi batas tersedia.",
           type: "warning",
           confirmButtonClass: "btn btn-warning",
           confirmButtonText: "Oke",
           showLoaderOnConfirm: true,
       });
    } else {
        var markup =
            `<tr>
                    <td>` +
            kode_barang +
            `</td>
                    <td>` +
            nama_barang +
            `</td>
                    <td>` +
            jumlah +
            `</td>
                    <td>
                        <input type="hidden" id="pemminjaman_barang" name="peminjaman_barang[]" value="['` +
            id_barang +
            `', '` +
            jumlah +
            `']">
                        <button type="button" class="btn btn-danger btn-sm del"><i class="mdi mdi-delete"></i></button>
                    </td>
                </tr>`;

        tabelBarang.find("tbody").prepend(markup);

        var delButton = "tbody tr:first-child .del";

        tabelBarang.find(delButton).click(function () {
            $(this).closest("tr").remove();
        });
    }
}
