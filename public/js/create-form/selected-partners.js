/*
 Mitra -> Mitra terpilih
 */

 
 // Ambil data mitra dari PHP dan ubah menjadi format yang sesuai
 var partners = ['TEST','TESTS']
var input = document.getElementById('tagify-input');
var tagify = new Tagify(input, {
    dropdown: {
        enabled: 0
    },
    whitelist: partners // Menggunakan data mitra sebagai whitelist
});