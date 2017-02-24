<tr id="demirbas_<?php echo $demirbas->demirbas_id?>">
    <td>
       <span id="demirbas_yenile_<?php echo $demirbas->demirbas_id?>">

       </span>
        <div id="demirbas_isim_<?php echo $demirbas->demirbas_id?>"><?php echo empty($demirbas->demirbas_isim) ? 'Demirbaş İsmi' : $demirbas->demirbas_isim;  ?></div>
    </td>
    <td nowrap="nowrap"><span id="demirbas_grup_<?php echo $demirbas->demirbas_id?>"><?php echo ' #' . $demirbas->grup_id . ' ' . $demirbas_func->sayYaz(15, $demirbas->grup_isim) ?> </span>
        <div onclick="demirbas_grup_sec(<?php echo $demirbas->demirbas_id?>)" class="btn btn-bitbucket btn-xs " style="float:right;"> SEÇ</div>
    </td>
    <td>
        <div id="demirbas_aciklama_<?php echo $demirbas->demirbas_id?>"><?php echo empty($demirbas->demirbas_aciklama) ? 'Demirbaş Açıklama' : $demirbas->demirbas_aciklama;  ?></div>
    </td>
    <td nowrap="nowrap"><span id="demirbas_firma_<?php echo $demirbas->demirbas_id?>"><?php echo ' #' . $demirbas->firma_id . ' ' . $demirbas_func->sayYaz(15, $demirbas->firma_isim) ?></span>
        <div onclick="demirbas_firma_sec(<?php echo $demirbas->demirbas_id?>)" class="btn btn-warning btn-xs " style="float:right;"> SEÇ</div>
    </td>
    <td nowrap="nowrap"><span id="amortisman_<?php echo $demirbas->demirbas_id?>"><?php echo ' #' . $demirbas->amortisman_id . ' ' . $demirbas_func->sayYaz(15, $demirbas->amortisman) ?></span>
        <div onclick="amortismanSec(<?php echo $demirbas->demirbas_id?>)" class="btn btn-info btn-xs " style="float:right;"> SEÇ</div>
    </td>
    <td id="amortisman_omur_<?php echo $demirbas->demirbas_id?>"><?php echo $demirbas->omur ?></td>
    <td id="amortisman_oran_<?php echo $demirbas->demirbas_id?>"><?php echo $demirbas->oran ?></td>
    <td nowrap="nowrap">
        <span style="display: none;" id="demirbas_guncel_<?php echo $demirbas->demirbas_id?>"></span>
        <button id="duzenleButton_<?php echo $demirbas->demirbas_id?>" onclick="demirbas_duzenle(<?php echo $demirbas->demirbas_id?>)" class="btn btn-xs btn-warning">DÜZENLE</button>
        <button style="display: none;" id="guncelleButton_<?php echo $demirbas->demirbas_id?>" onclick="demirbas_guncelle(<?php echo $demirbas->demirbas_id?>)" class="btn btn-xs btn-success">GÜNCELLE</button>
        <button onclick="demirbas_sil(<?php echo $demirbas->demirbas_id?>)" class="btn btn-xs btn-danger">SİL</button>
    </td>
</tr>
