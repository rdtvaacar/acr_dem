<div style=" font-size: 10pt;">
    <table class="table table-stripped" id="amortismanTable" style=" font-size: 10pt; margin: 0; padding: 0;" width="100%">
        <thead>
        <tr>
            <th>GrupID</th>
            <th>Kullan</th>
            <th>Amortisman</th>
            <th>Açıklama</th>
            <th>Faydalı Ömür</th>
            <th>Oran</th>
        </tr>
        </thead>
        <tbody id="amortismanlar">
        <?php foreach ($amortismanlar as $item) {
        if ($item->omur != null) {
        ?>
        <tr>
            <td>#<?php echo $item->amortisman_id . '-' . $item->grup_isim ?>  </td>
            <td>
                <div onclick="amortismanEkle(<?php echo $item->id . ',' . $demirbas_id ?>)" class="btn btn-xs btn-success">EKLE</div>
            </td>
            <td><?php echo $item->amortisman ?></td>
            <td><?php echo $demirbas->sayYaz(100, $item->amortisman_aciklama)  ?></td>
            <td><?php echo $item->omur ?></td>
            <td><?php echo $item->oran ?></td>
        </tr>
        <?php
        }
        }?>
        </tbody>
    </table>

</div>

<script>
    $(function () {
        $('#amortismanTable').DataTable({
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
