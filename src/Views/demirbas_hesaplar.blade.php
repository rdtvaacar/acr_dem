<div style=" font-size: 10pt;">

    <table class="table table-stripped" id="demirbas_hesapTable" style=" font-size: 10pt; margin: 0; padding: 0;" width="100%">
        <thead>
        <tr>
            <th>hesap</th>
            <th>Açıklama</th>
            <th>işlem</th>
        </tr>
        </thead>
        <tbody id="hesaplar">
        <?php foreach ($hesaplar as $hesap) {
            echo $demirbas->hesap_satir($hesap);
        } ?>
        </tbody>
    </table>
</div>

<script>
    $(function () {
        $('#demirbas_hesapTable').DataTable({
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
