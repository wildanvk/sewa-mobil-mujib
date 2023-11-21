/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function () {
  $("#table-1").DataTable({
    autoWidth: true,
    responsive: true,
    lengthMenu: [
      [5, 10, 25, -1],
      [5, 10, 25, "Semua"],
    ],
    language: {
      emptyTable: "Tidak Ada Data",
      lengthMenu: "Lihat :  _MENU_  Data",
      search: "Cari ",
      searchPlaceholder: "Ketikkan Kata Kunci",
      info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
    },
  });
});

function previewFoto() {
  const foto = document.querySelector("#gambar_mobil");
  const fotoPreview = document.querySelector("#gambar_preview");
  const labelFoto = document.querySelector(".custom-file-label");

  const fileFoto = new FileReader();
  fileFoto.readAsDataURL(foto.files[0]);

  fileFoto.onload = function (e) {
    fotoPreview.src = e.target.result;
    labelFoto.textContent = foto.files[0].name;
  };
}
