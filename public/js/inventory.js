switch (content) {
 
    case 'kategori':
    table = $('#datatable').DataTable({
        responsive: true,
        autoWidth: false,
        processing : true,
        serverSide : true,
        pageLength: 50,
        ajax : {
            url : window.location.origin + '/datatable/' + url,
            type: 'GET',
        },
        columns : [
        { data : 'tipe_barang'},
        { data : 'action' }
        ]
    });
    break;

    case 'barang':
    table = $('#datatable').DataTable({
        responsive: true,
        autoWidth: false,
        processing : true,
        serverSide : true,
        pageLength: 50,
        ajax : {
            url : window.location.origin + '/datatable/' + url,
            type: 'GET',
        },
        columns : [
        { data : 'nama_barang'},
        { data : 'tipe_barang'},
        { data : 'kondisi_barang'},
        { data : 'jumlah_barang'},
        { data : 'vendor'},
        { data : 'action' }
        ]
    });
    break;
}
