<tr id="firma_<?php echo $firma->id?>">
    <td nowrap="nowrap"><input onfocusout="firma_guncelle(<?php echo $firma->id?>)" id="firma_isim_<?php echo $firma->id?>" value="<?php echo $firma->firma_isim  ?>"/></td>
    <td><input onfocusout="firma_guncelle(<?php echo $firma->id?>)" id="firma_aciklama_<?php echo $firma->id?>" value="<?php echo $firma->firma_aciklama ?>"/></td>
    <td nowrap="nowrap"><input onfocusout="firma_guncelle(<?php echo $firma->id?>)" id="firma_vergi_no_<?php echo $firma->id?>" value="<?php echo $firma->firma_vergi_no ?>"/></td>
    <td nowrap="nowrap">
        <span style="display: none;" id="firma_guncel_<?php echo $firma->id?>"></span>
        <button onclick="firma_guncelle(<?php echo $firma->id?>)" class="btn btn-xs btn-success">GÜNCELLE</button>
        <button onclick="derirbas_firma_sil(<?php echo $firma->id?>)" class="btn btn-xs btn-danger">SİL</button>
    </td>
</tr>