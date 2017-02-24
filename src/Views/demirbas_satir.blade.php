<tr id="demirbas_<?php echo $demirbas->demirbas_id?>">

    <td>
        <input name="demirbas_id[]" id="demirbas_id_<?php echo $demirbas->demirbas_id?>" value="<?php echo $demirbas->demirbas_id?>" type="checkbox" style="width:18px; height:18px;"/>
    </td>
    <td>
        <label for="demirbas_id_<?php echo $demirbas->demirbas_id?>"
               id="demirbas_isim_<?php echo $demirbas->demirbas_id?>"><?php echo $demirbas->demirbas_id?></label>
    </td>
    <td>
        <span id="demirbas_yenile_<?php echo $demirbas->demirbas_id?>"></span>
        <label for="demirbas_id_<?php echo $demirbas->demirbas_id?>"
               id="demirbas_isim_<?php echo $demirbas->demirbas_id?>"><?php echo empty($demirbas->demirbas_isim) ? 'Demirbaş İsmi' : $demirbas->demirbas_isim;  ?></label>
    </td>
    <td>
        <span id="demirbas_hesap_kod_<?php echo $demirbas->demirbas_id?>"><?php echo $demirbas->kod_1 . ' ' . $demirbas->kod_2 . ' ' . $demirbas->kod_3 . ' ' . $demirbas->kod_4 . ' ' . $demirbas->kod_5 . ' ' .
                $demirbas->kod_6 ?></span>
        <div onclick="demirbas_hesap_sec(<?php echo $demirbas->demirbas_id?>)" class="btn btn-info btn-xs " style="float:right;"><span class="glyphicon glyphicon-record"></span></div>
    </td>
    <td id="amortisman_deger_<?php echo $demirbas->demirbas_id?>"><?php echo $demirbas->demirbas_deger ?></td>
    <td id="amortisman_miktar_<?php echo $demirbas->demirbas_id?>"><?php echo $demirbas->demirbas_miktar ?></td>
    <td id="amortisman_toplamFiyat_<?php echo $demirbas->demirbas_id?>"><?php echo round($demirbas->demirbas_miktar * $demirbas->demirbas_deger, 2) ?></td>
    <td nowrap="nowrap"><span
                id="demirbas_grup_<?php echo $demirbas->demirbas_id?>"><?php echo !empty($demirbas->grup_id) ? 'G_' . $demirbas->grup_id . ' ' . $demirbas_func->sayYaz(15, $demirbas->grup_isim) : ''; ?> </span>
        <div onclick="demirbas_grup_sec(<?php echo $demirbas->demirbas_id?>)" class="btn btn-info btn-xs " style="float:right;"><span class="glyphicon glyphicon-record"></span></div>
    </td>

    <td nowrap="nowrap"><span id="demirbas_firma_<?php echo $demirbas->demirbas_id?>"><?php echo !empty($demirbas->firma_id) ? 'F_' . $demirbas->firma_id . ' ' . $demirbas_func->sayYaz(15, $demirbas->firma_isim) : '';
            ?></span>
        <div onclick="demirbas_firma_sec(<?php echo $demirbas->demirbas_id?>)" class="btn btn-info btn-xs " style="float:right;"><span class="glyphicon glyphicon-record"></span></div>
    </td>
    <td nowrap="nowrap"><span id="amortisman_<?php echo $demirbas->demirbas_id?>"><?php echo !empty($demirbas->amortisman_id) ? 'A_' . $demirbas->amortisman_id . ' ' . $demirbas_func->sayYaz(15, $demirbas->amortisman)
                : '';
            ?></span>
        <div onclick="amortismanSec(<?php echo $demirbas->demirbas_id?>)" class="btn btn-info btn-xs " style="float:right;"><span class="glyphicon glyphicon-record"></span></div>
    </td>
    <td id="amortisman_son_yil_<?php echo $demirbas->demirbas_id?>">
        <?php if (!empty($demirbas->amortisman_id)) {
            echo date('d/', strtotime($demirbas->demirbas_alis_tarihi)) . date('m/', strtotime($demirbas->demirbas_alis_tarihi)) . (date('Y/', strtotime($demirbas->demirbas_alis_tarihi)) + $demirbas->omur);
        }?>
    </td>
    <td nowrap="nowrap">
        <span style="display: none;" id="demirbas_guncel_<?php echo $demirbas->demirbas_id?>"></span>
        <div id="duzenleButton_<?php echo $demirbas->demirbas_id?>" onclick="demirbas_duzenle(<?php echo $demirbas->demirbas_id?>)" class="btn btn-xs btn-warning">
            <span class="glyphicon glyphicon-edit"></span>
        </div>
        <div style="display: none;" id="guncelleButton_<?php echo $demirbas->demirbas_id?>" onclick="demirbas_guncelle(<?php echo $demirbas->demirbas_id?>)" class="btn btn-xs btn-success"><span
                    class="glyphicon glyphicon-floppy-disk"></span></div>
        <div onclick="demirbas_sil(<?php echo $demirbas->demirbas_id?>)" class="btn btn-xs btn-danger">
            <span class="glyphicon glyphicon-trash"></span>
        </div>
    </td>
</tr>
