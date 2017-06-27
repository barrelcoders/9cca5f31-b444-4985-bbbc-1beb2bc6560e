<?php
	$branchData = preg_replace("/[\r\n]*/","",
					str_replace('"', "'", CHtml::activeDropDownList(HotelMaster::model(),'branch_id_fk',
						CHtml::listData(BranchMaster::model()->findAll(), 'id', 'branch_name'),
						array(
							'id'=>'slBranch',
							'empty'=>'Select Branch',
							'name'=>'form_branch_id_fk'
						)
					))
				);
	$busTypeData = preg_replace("/[\r\n]*/","",
					str_replace('"', "'", CHtml::activeDropDownList(BusType::model(),'id',
						CHtml::listData(BusType::model()->findAll(), 'id', 'bus_type'),
						array(
							'id'=>'slType',
							'empty'=>'Select Bus Type',
							'name'=>'form_bus_type_id_fk'
						)
					))
				);
	$vehicleCategoryData = preg_replace("/[\r\n]*/","",
					str_replace('"', "'", CHtml::activeDropDownList(VehicleCategory::model(),'id',
						CHtml::listData(VehicleCategory::model()->findAll(), 'id', 'category'),
						array(
							'id'=>'slCategory',
							'empty'=>'Select category',
							'name'=>'form_category_id_fk'
						)
					))
				);
	$toPlacesData = preg_replace("/[\r\n]*/","",
					str_replace('"', "'", CHtml::activeDropDownList(Places::model(),'id',
						CHtml::listData(Places::model()->findAll(), 'id', 'name'),
						array(
							'id'=>'slToPlace',
							'empty'=>'Select City',
							'name'=>'form_to'
						)
					))
				);
	$fromPlacesData = preg_replace("/[\r\n]*/","",
					str_replace('"', "'", CHtml::activeDropDownList(Places::model(),'id',
						CHtml::listData(Places::model()->findAll(), 'id', 'name'),
						array(
							'id'=>'slFromPlace',
							'empty'=>'Select City',
							'name'=>'form_from'
						)
					))
				);
?>
<script type='text/javascript'>
function hasValue(array, value){
	for(var i = 0; i < array.length; i++) {
		if(array[i] === "Other") {
			return true;
		}
	}
	return false;
}
$(".other-select").each(function(){
	if($(this).find("option[value='Other']").val() === undefined){
		$(this).append("<option value='Other'>Other</option>");
	}
});

$(".other-select").bind("change", function(event){
	var value = $(event.target).val();
	if($.isArray(value) && hasValue(value, "Other")){
		openForm($(event.target).attr("data-field"), event.target);
	}
	else if(!$.isArray(value) && value === "Other"){
		openForm($(event.target).attr("data-field"), event.target);
	}
}).live("change", function(event){
	var value = $(event.target).val();
	if($.isArray(value) && hasValue(value, "Other")){
		openForm($(event.target).attr("data-field"), event.target);
	}
	else if(!$.isArray(value) && value === "Other"){
		openForm($(event.target).attr("data-field"), event.target);
	}
});
var timedata = getTimeSelectBoxes(),
	obj ={
	"vehicle":{
		"labels":[
			"",
			"Select Branch",
			"Select Vehicle Category",
			"Short Code",
			"Registeration Number",
			""
		],
		"fields":[
			"<input type='hidden' name='form_type' value='vehicle'><input type='hidden' id='success-ctrl' value=''>",
			"<?php echo $branchData; ?>",
			"<?php echo $vehicleCategoryData; ?>",
			"<input type='text' name='form_short_code'>",
			"<input type='text' name='form_registration_number'>",
			"<input type='submit' onclick='submitClick(this);' value='Submit' class='btn btn-primary' name='form_btnSubmit'/>&nbsp;&nbsp;<input type='reset' class='btn btn-secondary' value='Cancel' name='form_btnCancel' />"
		]
	},
	"service":{
		"labels":[
			"",
			"Select Branch",
			"Short Code",
			"Service Name",
			""
		],
		"fields":[
			"<input type='hidden' name='form_type' value='service'><input type='hidden' id='success-ctrl' value=''>",
			"<?php echo $branchData; ?>",
			"<input type='text' name='form_short_code'>",
			"<input type='text' name='form_name'>",
			"<input type='submit'  onclick='submitClick(this);' value='Submit' class='btn btn-primary' name='form_btnSubmit'/>&nbsp;&nbsp;<input type='reset' class='btn btn-secondary' value='Cancel' name='form_btnCancel' />"
		]
	},
	"hotel":{
		"labels":[
			"",
			"Select Branch",
			"Short Code",
			"Hotel Name",
			""
		],
		"fields":[
			"<input type='hidden' name='form_type' value='hotel'><input type='hidden' id='success-ctrl' value=''>",
			"<?php echo $branchData; ?>",
			"<input type='text' name='form_short_code'>",
			"<input type='text' name='form_name'>",
			"<input type='submit'  onclick='submitClick(this);' value='Submit' class='btn btn-primary' name='form_btnSubmit'/>&nbsp;&nbsp;<input type='reset' class='btn btn-secondary' value='Cancel' name='form_btnCancel' />"
		]
	},
	"flight":{
		"labels":[
			"<h4>Flight Detail</h4>",
			"Select Branch",
			"Short Code",
			"Flight Name",
			"Arrival Time",
			"From",
			"To",
			""
		],
		"fields":[
			"<input type='hidden' name='form_type' value='flight'><input type='hidden' id='success-ctrl' value=''>",
			"<?php echo $branchData; ?>",
			"<input type='text' name='form_short_code'>",
			"<input type='text' name='form_name'>",
			timedata,
			"<?php echo $fromPlacesData ?>",
			"<?php echo $toPlacesData ?>",
			"<input type='submit' onclick='submitClick(this);' value='Submit' class='btn btn-primary' name='form_btnSubmit'/>&nbsp;&nbsp;<input type='reset' class='btn btn-secondary' value='Cancel' name='form_btnCancel' />"
		]
	},
	"train":{
		"labels":[
			"<h4>Train Detail</h4>",
			"Select Branch",
			"Short Code",
			"Train Number",
			"Train Name",
			"Arrival Time",
			"From",
			"To",
			""
		],
		"fields":[
			"<input type='hidden' name='form_type' value='train'><input type='hidden' id='success-ctrl' value=''>",
			"<?php echo $branchData; ?>",
			"<input type='text' name='form_short_code'>",
			"<input type='text' name='form_number'>",
			"<input type='text' name='form_name'>",
			timedata,
			"<?php echo $fromPlacesData ?>",
			"<?php echo $toPlacesData ?>",
			"<input type='submit' onclick='submitClick(this);' value='Submit' class='btn btn-primary' name='form_btnSubmit'/>&nbsp;&nbsp;<input type='reset' class='btn btn-secondary' value='Cancel' name='form_btnCancel' />"
		]
	},
	"bus":{
		"labels":[
			"<h4>Bus Detail</h4>",
			"Select Branch",
			"Select Bus Type",
			"Short Code",
			"Bus Name",
			"Arrival Time",
			"To",
			"From",
			""
		],
		"fields":[
			"<input type='hidden' name='form_type' value='bus'><input type='hidden' id='success-ctrl' value=''>",
			"<?php echo $branchData; ?>",
			"<?php echo $busTypeData; ?>",
			"<input type='text' name='form_short_code'>",
			"<input type='text' name='form_name'>",
			timedata,
			"<?php echo $fromPlacesData ?>",
			"<?php echo $toPlacesData ?>",
			"<input type='submit' onclick='submitClick(this);' value='Submit' class='btn btn-primary' name='form_btnSubmit'/>&nbsp;&nbsp;<input type='reset' class='btn btn-secondary' value='Cancel' name='form_btnCancel' />"
		]
	},
	
};

function openForm(data, element){
	var length = obj[data].fields.length, content="";
	for(var i=0; i<length; i++) {
		content += "<div class='row-fluid'><div class='span4'>"+obj[data].labels[i]+"</div><div class='span8'>"+obj[data].fields[i]+"</div></div>";
	}
	content+="<div class='row-fluid'>&nbsp;</div>";
	$("#comman-modal").find(".modal-body").html(content);
	$("#comman-modal").modal('show');
	$("#comman-modal").find(".modal-body").find('#success-ctrl').val('#'+element.id);
	return false;
	
}

function submitClick(obj){
		var submit_button = $(obj);
		submit_button.hide();
		var ajaxRqCount =1 ;
		$('#comman-progress').css('display','inline');
		var modal = $("#comman-modal"),
			type = modal.find("[name='form_type']").val(),
			data={},
			url="", 
			successCtrl = modal.find("#success-ctrl").val(),
			otherOption = successCtrl+" option[value='Other']",
			optionText = "";
	switch(type){
			case 'vehicle': 
				data.registration_number = modal.find("input[name='form_registration_number']").val();
				data.short_code = modal.find("input[name='form_short_code']").val();
				data.branch_id_fk = modal.find("select[name='form_branch_id_fk']").val();
				data.category_id_fk = modal.find("select[name='form_category_id_fk']").val();
				url = '<?php echo Yii::app()->createUrl("VehicleMaster/ajaxCreateMini");?>';
				optionText = data.registration_number;
				break;
			case 'service': 
				data.name = modal.find("input[name='form_name']").val();
				data.short_code = modal.find("input[name='form_short_code']").val();
				data.branch_id_fk = modal.find("select[name='form_branch_id_fk']").val();
				url = '<?php echo Yii::app()->createUrl("ServiceMaster/ajaxCreateMini");?>';
				optionText = data.name;
				break;
			case 'hotel': 
				data.name = modal.find("input[name='form_name']").val();
				data.short_code = modal.find("input[name='form_short_code']").val();
				data.branch_id_fk = modal.find("select[name='form_branch_id_fk']").val();
				url = '<?php echo Yii::app()->createUrl("HotelMaster/ajaxCreateMini");?>';
				optionText = data.name;
				break;
			case 'flight': 
				data.name = modal.find("input[name='form_name']").val();
				data.short_code = modal.find("input[name='form_short_code']").val();
				data.branch_id_fk = modal.find("select[name='form_branch_id_fk']").val();
				data.hours = modal.find("select[name='form_time_hr']").val();
				data.minutes = modal.find("select[name='form_time_mm']").val();
				data.to = modal.find("select[name='form_to']").val();
				data.from = modal.find("select[name='form_from']").val();
				url = '<?php echo Yii::app()->createUrl("FlightMaster/ajaxCreateMini");?>';
				optionText = data.name;
				break;
			case 'train': 
				data.name = modal.find("input[name='form_name']").val();
				data.short_code = modal.find("input[name='form_short_code']").val();
				data.branch_id_fk = modal.find("select[name='form_branch_id_fk']").val();
				data.number = modal.find("input[name='form_number']").val();
				data.hours = modal.find("select[name='form_time_hr']").val();
				data.minutes = modal.find("select[name='form_time_mm']").val();
				data.to = modal.find("select[name='form_to']").val();
				data.from = modal.find("select[name='form_from']").val();
				url = '<?php echo Yii::app()->createUrl("TrainMaster/ajaxCreateMini");?>';
				optionText = data.name;
				break;
			case 'bus': 
				data.name = modal.find("input[name='form_name']").val();
				data.short_code = modal.find("input[name='form_short_code']").val();
				data.branch_id_fk = modal.find("select[name='form_branch_id_fk']").val();
				data.bus_type_id_fk = modal.find("select[name='form_bus_type_id_fk']").val();
				data.hours = modal.find("select[name='form_time_hr']").val();
				data.minutes = modal.find("select[name='form_time_mm']").val();
				data.to = modal.find("select[name='form_to']").val();
				data.from = modal.find("select[name='form_from']").val();
				url = '<?php echo Yii::app()->createUrl("BusMaster/ajaxCreateMini");?>';
				optionText = data.name;
				break;
			default:
				break;
		}
		$.ajax({
			data:data,
			url:url,
			method:'post',
			success:function(data){
				$('#comman-progress').hide();
				submit_button.show();
				
				if(data=="0"){
					alert("Error while processing you request. Please contact admin.");
				}
				else if(data=="Already"){
					alert(type+" already exists with this name. try using different name.");
				}
				else{
					if($(successCtrl).is('[data-field]') && $(successCtrl).is('[multiple]')){
						$(successCtrl).find("option:selected").remove();
						$("[data-field='"+$(successCtrl).attr('data-field')+"']")
							.find("option[value='Other']")
							.remove()
							.end()
							.append("<option value='"+data+"'>"+optionText+"</option><option>Other</option>");
					}
					else{
						$(successCtrl).find("option:selected").remove();
						$(successCtrl)
							.find("option[value='Other']")
							.remove()
							.end()
							.append("<option value='"+data+"'>"+optionText+"</option><option>Other</option>");
					}
					$(successCtrl+' option').each(function(){
						if ($(this).text() == optionText) {
							debugger;
							$(this).prop('selected', true);
							var controllerMethod = "";
							if($(successCtrl).attr('id') === 'slTrain' && window.location.href.indexOf('Arrival/')>-1 ){
								controllerMethod = '/travel/index.php?r=Arrival/TrainNumberArrivalTime';
							}
							else if($(successCtrl).attr('id') === 'slFlight' && window.location.href.indexOf('Arrival/')>-1 ){
								controllerMethod = '/travel/index.php?r=Arrival/FlightNumberArrivalTime';
							}
							else if($(successCtrl).attr('id') === 'slBus' && window.location.href.indexOf('Arrival/')>-1 ){
								controllerMethod = '/travel/index.php?r=Arrival/BusNumberArrivalTime';
							}
							else if($(successCtrl).attr('id') === 'slTrain' && window.location.href.indexOf('Departure/')>-1 ){
								controllerMethod = '/travel/index.php?r=Departure/TrainNumberArrivalTime';
							}
							else if($(successCtrl).attr('id') === 'slFlight' && window.location.href.indexOf('Departure/')>-1 ){
								controllerMethod = '/travel/index.php?r=Departure/FlightNumberArrivalTime';
							}
							else if($(successCtrl).attr('id') === 'slBus' && window.location.href.indexOf('Departure/')>-1 ){
								controllerMethod = '/travel/index.php?r=Departure/BusNumberArrivalTime';
							}
							if($(successCtrl).attr('id') === 'slBus' || $(successCtrl).attr('id') === 'slFlight' || $(successCtrl).attr('id') === 'slTrain') {
								jQuery.ajax({
									'type':'POST',
									'url':controllerMethod,
									'data':{'val':$(successCtrl).val()},
									'success':function(data){
										var arr = data.split(",");
										if($(successCtrl).attr('id') === 'slBus' || $(successCtrl).attr('id') === 'slFlight'){
											$(successCtrl).parent().parent().next().find('input').val(arr[0]);
											$(successCtrl).parent().parent().next().next().find('input').val(arr[1]);
										}
										else if($(successCtrl).attr('id') === 'slTrain'){
											$(successCtrl).parent().parent().next().find('input').val(arr[0]);
											$(successCtrl).parent().parent().next().next().find('input').val(arr[1]);
											$(successCtrl).parent().parent().next().next().next().find('input').val(arr[2]);
										
										}
									},
									'cache':false
								});
							}
						}
					});
					if($(successCtrl).next().hasClass('chosen-container')){
						$(successCtrl).trigger("chosen:updated"); 
					}										
					modal.modal('hide');
				}
			},
			error:function(){
				$('#comman-progress').hide();
				submit_button.show();
				alert("Error while processing you request. Please contact admin.");
			}
		});

}


//$('#select1 > :nth-child(6)').prop('selected', true);
function selectOptionByText(element, text) {
    for (var i = 0; i < element.options.length; ++i) {
		if (element.options[i].text === text) {
			element.options[i].selected = true;
		}
	}
}
function getValueByText(element, text) {
	debugger;
    for (var i = 0; i < element.options.length; ++i) {
		if (element.options[i].text === text) {
			return element.options[i].value;
		}
	}
}	
function getTimeSelectBoxes(){
	return "HH <select name='form_time_hr' style='width: 60px;'>"+
	"<option value='00'>00</option>"+
	"<option value='01'>01</option>"+
	"<option value='02'>02</option>"+
	"<option value='03'>03</option>"+
	"<option value='04'>04</option>"+
	"<option value='05'>05</option>"+
	"<option value='06'>06</option>"+
	"<option value='07'>07</option>"+
	"<option value='08'>08</option>"+
	"<option value='09'>09</option>"+
	"<option value='10'>10</option>"+
	"<option value='11'>11</option>"+
	"<option value='12'>12</option>"+
	"<option value='13'>13</option>"+
	"<option value='14'>14</option>"+
	"<option value='15'>15</option>"+
	"<option value='16'>16</option>"+
	"<option value='17'>17</option>"+
	"<option value='18'>18</option>"+
	"<option value='19'>19</option>"+
	"<option value='20'>20</option>"+
	"<option value='21'>21</option>"+
	"<option value='22'>22</option>"+
	"<option value='23'>23</option>"+
	"</select> MM <select name='form_time_mm' style='width: 60px;'>"+
	"<option value='00'>00</option>"+
	"<option value='01'>01</option>"+
	"<option value='02'>02</option>"+
	"<option value='03'>03</option>"+
	"<option value='04'>04</option>"+
	"<option value='05'>05</option>"+
	"<option value='06'>06</option>"+
	"<option value='07'>07</option>"+
	"<option value='08'>08</option>"+
	"<option value='09'>09</option>"+
	"<option value='10'>10</option>"+
	"<option value='11'>11</option>"+
	"<option value='12'>12</option>"+
	"<option value='13'>13</option>"+
	"<option value='14'>14</option>"+
	"<option value='15'>15</option>"+
	"<option value='16'>16</option>"+
	"<option value='17'>17</option>"+
	"<option value='18'>18</option>"+
	"<option value='19'>19</option>"+
	"<option value='20'>20</option>"+
	"<option value='21'>21</option>"+
	"<option value='22'>22</option>"+
	"<option value='23'>23</option>"+
	"<option value='24'>24</option>"+
	"<option value='25'>25</option>"+
	"<option value='26'>26</option>"+
	"<option value='27'>27</option>"+
	"<option value='28'>28</option>"+
	"<option value='29'>29</option>"+
	"<option value='30'>30</option>"+
	"<option value='31'>31</option>"+
	"<option value='32'>32</option>"+
	"<option value='33'>33</option>"+
	"<option value='34'>34</option>"+
	"<option value='35'>35</option>"+
	"<option value='36'>36</option>"+
	"<option value='37'>37</option>"+
	"<option value='38'>38</option>"+
	"<option value='39'>39</option>"+
	"<option value='40'>40</option>"+
	"<option value='41'>41</option>"+
	"<option value='42'>42</option>"+
	"<option value='43'>43</option>"+
	"<option value='44'>44</option>"+
	"<option value='45'>45</option>"+
	"<option value='46'>46</option>"+
	"<option value='47'>47</option>"+
	"<option value='48'>48</option>"+
	"<option value='49'>49</option>"+
	"<option value='50'>50</option>"+
	"<option value='51'>51</option>"+
	"<option value='52'>52</option>"+
	"<option value='53'>53</option>"+
	"<option value='54'>54</option>"+
	"<option value='55'>55</option>"+
	"<option value='56'>56</option>"+
	"<option value='57'>57</option>"+
	"<option value='58'>58</option>"+
	"<option value='59'>59</option>"+
	"</select>";
}
	

</script>
