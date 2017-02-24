<tr id="grup_<?php echo $grup->id?>">
    <td nowrap="nowrap"><input onfocusout="grup_guncelle(<?php echo $grup->id?>)" id="grup_isim_<?php echo $grup->id?>" value="<?php echo $grup->grup_isim  ?>"/></td>
    <td><input onfocusout="grup_guncelle(<?php echo $grup->id?>)" id="grup_aciklama_<?php echo $grup->id?>" value="<?php echo $grup->grup_aciklama ?>"/></td>
    <td nowrap="nowrap">
        <span style="display: none;" id="grup_guncel_<?php echo $grup->id?>"></span>
        <button onclick="grup_guncelle(<?php echo $grup->id?>)" class="btn btn-xs btn-success">GÜNCELLE</button>
        <button onclick="derirbas_grup_sil(<?php echo $grup->id?>)" class="btn btn-xs btn-danger">SİL</button>
    </td>
</tr>