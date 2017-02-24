<style>

</style>
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<div style=" font-size: 10pt;">
    <div style=" float: left;  width: 200px;">
        <div class="bax" style="padding: 4px;">
            <div><h4><b>İŞLEMLER</b></h4></div>
            <div onclick="demirbas_ekle(0)" class="btn btn-block btn-success">Yeni Demirbaş Ekle</div>
            <div onclick="demirbas_gruplar()" class="btn btn-block btn-reddit">Grupları Düzenle</div>
            <div onclick="demirbas_firmalar()" class="btn btn-primary  btn-block ">Firmaları Düzenle</div>
            <a href="/demirbas_excel_aktar" class="btn btn-block btn-info">Excel Demirbaş Listesi</a>
            <div style="border-bottom: 1px solid rgba(22,22,22,0.82); height: 10px; margin-bottom: 10px;"></div>
            <div><h4><b>DOSYA YÜKLE</b></h4></div>
            <?php echo Form::open(['url' => 'demirbas_excel_yukle', 'enctype' => 'multipart/form-data']) ?>
            <input class="form-control" type="file" name="file"></input>
            <button class="btn btn-block btn-danger"> İÇE AKTAR</button>
            <?php echo Form::close() ?>
            <div style="font-size: 10pt; color: #494b49;">
                <b>NOT:</b> Excel formatı için <a href="/demirbas_excel_aktar?bosListe=1"> tıklayınız.</a>
            </div>
            <div style="border-bottom: 1px solid rgba(22,22,22,0.82); height: 10px; margin-bottom: 10px;"></div>
            <div><h4><b>SİLME İŞLEMLERİ</b></h4></div>
            <button class="btn btn-danger btn-block" onclick="tum_demirbas_sil()">Tüm Demirbaşları Sil</button>
        </div>
    </div>
    <div style="float: left; margin-left: 10px; ">
        <div class="bax" style="padding: 4px;">
            <table class="table table-stripped" id="menuTable" style=" font-size: 10pt; margin: 0; padding: 0;" width="100%">
                <thead>
                <tr>
                    <th>Demirbaş</th>
                    <th>Grup</th>
                    <th>Açıklama</th>
                    <th>Firma</th>
                    <th>Amortisman</th>
                    <th>Ömür</th>
                    <th>Oran</th>
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
        </div>
    </div>
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