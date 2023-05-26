/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
// var path = location.pathname.split('/')
// var url = location.origin + '/' + path[1]


// $('ul.sidebar-menu li a').each(function() {
//     if ($(this).attr('href').indexOf(url) !== -1) {
//         $(this).parent().addClass('active').parent().parent('li').addClass('active')
//     }
// })
// console.log(url);


$(document).ready(function() {
    $('#t').DataTable();
    $(".pwstrength").pwstrength();
});
// tambahan kode untuk validasi input hanya angka dan 16 karakter
$('.nikktp').on('input', function() {
    var val = $(this).val().replace(/\D/g, ''); // hapus karakter selain digit
    if (val.length > 16) {
        val = val.slice(0, 16); // ambil 16 karakter pertama
    }
    $(this).val(val);
});
// tambahan kode untuk validasi input hanya angka dan 16 karakter
$('.angkatan').on('input', function() {
    var val = $(this).val().replace(/\D/g, ''); // hapus karakter selain digit
    if (val.length > 4) {
        val = val.slice(0, 4); // ambil 16 karakter pertama
    }
    $(this).val(val);
});
$('.npm').on('input', function() {
    var val = $(this).val().replace(/\D/g, ''); // hapus karakter selain digit
    if (val.length > 12) {
        val = val.slice(0, 12); // ambil 16 karakter pertama
    }
    $(this).val(val);
});

$('.huruf').on('input', function() {
    var val = $(this).val().replace(/[^a-zA-Z@. ]/g, ''); // hapus karakter selain huruf dan spasi
    if (val.length > 30 || /^\d+$/.test(val)) { // jika panjang karakter > 30 atau mengandung angka
        val = val.slice(0, 30); // ambil 30 karakter pertama
    }
    $(this).val(val);
});