<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<div style=" font-size: 10pt;">
    <div style=" width:  100%">
        <div class="bax" style="padding: 4px;">
            <div>
                <div style="float: left;"><b>İŞLEMLER</b></div>
                <div style="font-size: 10pt; float: right; color: #494b49;">
                    <b>NOT:</b> Excel formatı için <a href="/demirbas_excel_aktar?bosListe=1"> tıklayınız.</a>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div style="float: left; ">
                <div onclick="demirbas_duzenle(0)" class="btn  btn-reddit btn-sm">Yeni Demirbaş Ekle</div>
                <div onclick="demirbas_gruplar()" class="btn btn-reddit btn-sm">Grupları Düzenle</div>
                <div onclick="demirbas_firmalar()" class="btn btn-reddit   btn-sm ">Firmaları Düzenle</div>
                <div onclick="demirbas_ayarlar()" class="btn btn-reddit   btn-sm ">Ayarlar</div>
                <a href="/demirbas_excel_aktar" class="btn  btn-reddit btn-sm">Excel Demirbaş Listesi</a>
            </div>

            <div style="float: right; padding-top: 4px;">
                <?php echo Form::open(['url' => 'demirbas_excel_yukle', 'enctype' => 'multipart/form-data', 'style' => ' float:left; ']) ?>
                <input style="float: left; width: 80px; margin-top: 4px;  " type="file" name="file"/>
                <button style="float: left;" class="btn btn-reddit btn-sm"> İÇE AKTAR</button>
                <?php echo Form::close() ?>
            </div>

            <div style="clear:both;"></div>
            <div></div>

        <!--<?php echo Form::open(['url' => 'demirbas_hesap_excel_yukle', 'enctype' => 'multipart/form-data']) ?>
                <input class="form-control" type="file" name="file"></input>
                <button class="btn btn-block btn-reddit btn-sm"> İÇE AKTAR</button>
                <?php echo Form::close() ?>-->

            <div style="border-bottom: 1px solid rgba(22,22,22,0.82); height: 10px; margin-bottom: 10px;"></div>

        </div>
    </div>
    <div style="clear:both;"></div>
    <div style="float: left; margin-left: 10px; ">
        <div class="bax" style="padding: 4px;">
            <?php

            echo Form::open(['url' => 'raporOlustur']);?>
            <div style=" margin-left: auto; margin-right: auto; width: 400px; text-align: center;">
                <select name="rapor" style="padding: 2px; ">
                    <option>Raporlar</option>
                    <?php foreach ($raporlar as $val=>$rapor) { ?>
                    <option value="<?php echo $val ?>"><?php echo $rapor; ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-bitbucket btn-xs">Rapor Oluştur</button>
            </div>
            <div style="clear:both;"></div>
            <table class="table table-stripped" id="menuTable" style=" font-size:9pt; margin: 0; padding: 0;" width="100%">
                <thead>
                <tr>

                    <th></th>
                    <th>ID</th>
                    <th>Demirbaş</th>
                    <th>Kodu</th>
                    <th>Değer</th>
                    <th>Miktar</th>
                    <th>Toplam</th>
                    <th>Grup</th>
                    <th>Firma</th>
                    <th>Amortisman</th>
                    <th>Son Yıl</th>
                    <th>İşlem</th>
                </tr>
                </thead>
                <tbody id="demirbaslar">
                <?php

                // dd($demirbas->tum_demirbaslar());
                foreach ($demirbas->tum_demirbaslar() as $demir) {
                    echo $demirbas->demirbas_satir($demir);
                } ?>
                </tbody>
            </table>
         
            <?php echo Form::close() ?>
        </div>
    </div>
    <div style="clear:both;"></div>
    <div><h5><b>SİLME İŞLEMLERİ</b></h5></div>
    <button class="btn btn-danger  btn-sm" onclick="tum_demirbas_sil()">Tüm Demirbaşları Sil</button>
</div>
<div style="clear:both;"></div>

<div class="modal  fade" id="demirbasModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><span aria-hidden="true"><img src="icon/close48.png"/></span></span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Kapat</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>