<tr id="hesap_<?php echo $hesap->id?>">
    <td nowrap="nowrap"><input onfocusout="hesap_guncelle(<?php echo $hesap->id?>)" id="hesap_isim_<?php echo $hesap->id?>" value="<?php echo $hesap->hesap_isim  ?>"/></td>
    <td><input onfocusout="hesap_guncelle(<?php echo $hesap->id?>)" id="hesap_aciklama_<?php echo $hesap->id?>" value="<?php echo $hesap->hesap_aciklama ?>"/></td>
    <td nowrap="nowrap">
        <span style="display: none;" id="hesap_guncel_<?php echo $hesap->id?>"></span>
        <button onclick="hesap_guncelle(<?php echo $hesap->id?>)" class="btn btn-xs btn-success">GÜNCELLE</button>
        <button onclick="derirbas_hesap_sil(<?php echo $hesap->id?>)" class="btn btn-xs btn-danger">SİL</button>
    </td>
</tr>