<div style=" font-size: 10pt;">

    <table class="table table-stripped" id="demirbas_firmaTable" style=" font-size: 10pt; margin: 0; padding: 0;" width="100%">
        <thead>
        <tr>
            <th>Firma</th>
            <th>Açıklama</th>
            <th>Vergi No</th>
            <th>işlem</th>
        </tr>
        </thead>
        <tbody id="firmalar">
        <?php foreach ($firmalar as $firma) {
            echo $demirbas->firma_satir($firma);
        } ?>
        </tbody>
    </table>
</div>

<script>
    $(function () {
        $('#demirbas_firmaTable').DataTable({
            "language": {
                "sProcessing" : "İşleniyor...",
                "lengthMenu"  : "Sayfada _MENU_ satır gösteriliyor",
                "zeroRecords" : "Eşleşen sonuç yok",
                "info"        : "Toplam _PAGES_ sayfadan _PAGE_. sayfa gösteriliyor",
                "infoEmpty"   : "Gösterilecek öğe yok",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search"      : "Arama yap",
                "oPaginate"   : {
                    "sFirst"   : "İlk",
                    "sPrevious": "Önceki",
                    "sNext"    : "Sonraki",
                    "sLast"    : "Son"
                }

            }
        });
    });


</script>
