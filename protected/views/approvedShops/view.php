<?php
	$this->layout="travel_layout_content";
?>

<style>
	.container{
		background:none;
	}
	table{
		border-radius:10px;
	}
	tr.odd, tr.even{
		background:#FFF;
	}
</style>

<h1><?php echo $model->shops_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'shops_name',
		'short_code',
		'address',
		'mobile_no',
		'phone_r',
		'country',
		'state',
		'city',
	),
)); ?>
