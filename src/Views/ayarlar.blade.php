<?php
echo Form::open(['url' => 'demirbas_ayar_kaydet']);
foreach ($formlar as $formKey=>$form) {
?>
<div style="float:left; padding: 2px; width: 48%;">
    <label><?php echo $form ?></label>
    <input class="form-control" name="<?php echo $formKey ?>" id="<?php echo $formKey ?>" value="<?php echo $ayar->$formKey ?>"/>
</div>

<?php }?>
<div style="clear:both;"></div>
<br><br>
<button class="btn btn-block btn-primary">Ayarları Kaydet</button>
<?php echo Form::close(); ?>
