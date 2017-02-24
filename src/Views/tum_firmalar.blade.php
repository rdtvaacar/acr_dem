<div style=" font-size: 10pt;">
    <table class="table table-stripped" id="demirbas_firmaTable" style=" font-size: 10pt; margin: 0; padding: 0;" width="100%">
        <thead>
        <tr>
            <th>Kullan</th>
            <th>Firma</th>
            <th>Açıklama</th>
            <th>Vergi No</th>
        </tr>
        </thead>
        <tbody id="amortismanlar">
        <?php foreach ($firmalar as $item) { ?>
        <tr>
            <td>
                <div onclick="demirbas_firma_tuttur(<?php echo $item->id . ',' . $demirbas_id ?>)" class="btn btn-xs btn-success"> EKLE</div>
            </td>
            <td><?php echo $item->firma_isim ?></td>
            <td><?php echo $demirbas->sayYaz(100, $item->firma_aciklama) ?></td>
            <td><?php echo $item->firma_vergi_no ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div onclick="demirbas_firmalar()" class="btn btn-primary " style="float: left;">FİRMALARI DÜZENLE</div>
    <div style="clear:both;"></div>
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
