'use strict'

$(function() {
    // launch datatables

    $(".datatable").DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['colvis', 'pdf', 'excel', 'print'],
        language: {
            decimal: "",
            emptyTable: "Tabloda hiçbir veri yok",
            info: "Toplam _TOTAL_ veri arasından _START_ ila _END_ arası gösteriliyor",
            infoEmpty: "Toplam 0 veri arasından 0 ila 0 arası gösteriliyor",
            infoFiltered: "(Toplam _MAX_ veri arasından filtrelenenler gösteriliyor)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "_MENU_ adet veri göster",
            loadingRecords: "Yükleniyor...",
            processing: "",
            search: "Ara:",
            zeroRecords: "Buna ilişkin hiçbir veri bulunamadı.",
            paginate: {
                first: "İlk",
                last: "Son",
                next: "Sonraki",
                previous: "Önceki"
            },
            buttons: {
                colvis: "Görünürlük",
                copy: "Kopyala",
                csv: "CSV",
                excel: "EXCEL",
                pdf: "PDF",
                print: "YAZDIR"
            },
        },
    });

    /* launch flatpickr */

    let flatpickr_config = {
        enableTime: false,
        dateFormat: "d.m.y",
        maxDate: 'today',
        locale: 'tr',
    }

    $(".flatpickr").flatpickr(flatpickr_config)

    // date range

    let range_flatpickr_config = flatpickr_config
    range_flatpickr_config.mode = 'range' // reference bug
    $('.range_flatpickr').flatpickr(range_flatpickr_config)
})
