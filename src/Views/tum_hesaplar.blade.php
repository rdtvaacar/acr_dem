<div style=" font-size: 10pt;">
    <table class="table table-stripped" id="demirbas_hesapTable" style=" font-size: 10pt; margin: 0; padding: 0;" width="100%">
        <thead>
        <tr>
            <th>Kullan</th>
            <th>hesap</th>
            <th>Açıklama</th>
        </tr>
        </thead>
        <tbody id="amortismanlar">
        <?php foreach ($hesaplar as $item) { ?>
        <tr>
            <td>
                <div onclick="demirbas_hesap_tuttur(<?php echo $item->id . ',' . $demirbas_id ?>)" class="btn btn-xs btn-success"> EKLE</div>
            </td>
            <td><?php echo $item->kod_1 . ' ' . $item->kod_2 . ' ' . $item->kod_3 . ' ' . $item->kod_4 . ' ' . $item->kod_5 . ' ' .
                    $item->kod_6 ?></td>
            <td><?php echo $item->d_hesap_isim ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div style="clear:both;"></div>
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
