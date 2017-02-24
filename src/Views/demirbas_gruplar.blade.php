<div style=" font-size: 10pt;">

    <table class="table table-stripped" id="demirbas_grupTable" style=" font-size: 10pt; margin: 0; padding: 0;" width="100%">
        <thead>
        <tr>
            <th>Grup</th>
            <th>Açıklama</th>
            <th>işlem</th>
        </tr>
        </thead>
        <tbody id="gruplar">
        <?php foreach ($gruplar as $grup) {
            echo $demirbas->grup_satir($grup);
        } ?>
        </tbody>
    </table>
</div>

<script>
    $(function () {
        $('#demirbas_grupTable').DataTable({
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
