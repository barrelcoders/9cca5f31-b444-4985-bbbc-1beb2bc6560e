<div class="box gradient">
    <div class="title">
        <h4><i class="icon-tasks"></i> <span>Arrival Vehicle Add<span class="botton_mergin3"></span></h4>
    </div>
    <div class="content top ">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'arrival-form',
            //'action'=>Yii::app()->request->baseUrl.'/index.php/arrival/create',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="form-row control-group row-fluid">
            <label class="control-label span3">Vehicle By TB</label>
            <div class="controls span7">
                <label class="inline radio">
                    <?php
                    //for nonA/C checked
                    if ($model_arrival->vehicle_required == 'yes')
                        $checkedac = 'checked';
                    else
                        $checkedac = '';

                    if (!isset($model_arrival->vehicle_required))
                        $checkedac = 'checked';
                    ?>  		   
                    <?php echo $form->radioButton($model_arrival, 'vehicle_required[]', array('value' => 'yes', 'checked' => $checkedac, 'class' => 'A_tbvy')); ?>
                    Yes</label>

                <label class="inline radio">
                    <?php
                    //for A/C checked
                    if ($model_arrival->vehicle_required == 'no')
                        $checkedac = 'checked';
                    else
                        $checkedac = '';
                    ?> 

                    <?php echo $form->radioButton($model_arrival, 'vehicle_required[]', array('value' => 'no', 'checked' => $checkedac, 'class' => 'A_tbvn')); ?>
                    No</label>


            </div>
        </div>
        <div class="form-row control-group row-fluid" id="A_driver_name">
            <label class="control-label span3" for="Phone_no">Driver Name</label>
            <div class="controls span7">
                <?php
                if (isset($_GET['id']))
                    echo $form->dropDownList($model_arrival, 'driver_name', CHtml::listData(DriverMaster::model()->findAll(), 'id', 'driver_name'), array('empty' => 'Select Driver', 'class' => 'chosen-select', 'options' => array($_GET['id'] => array('selected' => true))));
                else
                    echo $form->dropDownList($model_arrival, 'driver_name', CHtml::listData(DriverMaster::model()->findAll(), 'id', 'driver_name'), array('empty' => 'Select Driver', 'class' => 'chosen-select'));
                ?>

            </div>
        </div>

        <div class="form-row control-group row-fluid" id="A_outsite_drivername" style="display: none">
            <label class="control-label span3" for="driver_name">Driver Name</label>
            <div class="controls span7">
                <?php
                echo $form->textField($model_arrival, 'outsite_drivername', array('class' => 'row-fluid'));
                ?>
            </div>
        </div>

        <div class="form-row control-group row-fluid " id="A_mobile_no">
            <label class="control-label span3" for="mask-phone">Mobile No</label>
            <div class="controls span7">
                <?php echo $form->textField($model_arrival, 'mobile_no', array('class' => 'row-fluid',)); ?>
                <?php echo $form->error($model_arrival, 'mobile_no'); ?>

            </div>
        </div>

        <div class="form-row control-group row-fluid " id="A_outside_mobile_no" style="display: none">
            <label class="control-label span3" for="mask-phone">Mobile No</label>
            <div class="controls span7">
                <?php echo $form->textField($model_arrival, 'outside_mobile_no', array('class' => 'row-fluid',)); ?>
                <?php echo $form->error($model_arrival, 'outside_mobile_no'); ?>

            </div>
        </div>

        <div class="form-row control-group row-fluid" id="A_vehicle_category">
            <label class="control-label span3">Vehicle Category</label>
            <div class="controls span7">
                <?php
                $dropDownVal = CHtml::listData(VehicleCategory::model()->findAll("status='1'"), 'id', 'name');
                echo $form->dropDownList($model_arrival, 'vehicle_category', $dropDownVal, array('empty' => 'Select Any Category', 'class' => 'chosen-select'));
                ?>
            </div>
        </div>

        <div class="form-row control-group row-fluid" id="A_outsite_vehicle_category" style="display: none">
            <label class="control-label span3" for="Phone_no">Vehicle Category</label>
            <div class="controls span7">
                <?php echo $form->textField($model_arrival, 'outside_vehicle_category', array('class' => 'row-fluid',)); ?>
            </div>
        </div>

        <div class="form-row control-group row-fluid" id="A_vehicle_no">
            <label class="control-label span3" for="Phone_no">Vehicle No</label>
            <div class="controls span7">
                <span id="show_vehicle_no"></span>
                <?php echo $form->dropDownList($model_arrival, 'vehicle_no', array(), array('empty' => 'Select Vehicle'));
                ?>
                <?php echo $form->error($model_arrival, 'vehicle_no'); ?>
            </div>
        </div>

        <div class="form-row control-group row-fluid" id="A_outside_vehicle_no" style="display:none">
            <label class="control-label span3" for="Phone_no">Vehicle No</label>
            <div class="controls span7">
                <?php echo $form->textField($model_arrival, 'outside_vehicle_no', array('size' => 30, 'maxlength' => 30, 'class' => 'row-fluid')); ?>
                <?php echo $form->error($model_arrival, 'outside_vehicle_no'); ?>
            </div>
        </div>




        <div class="form-row control-group row-fluid">
            <label class="control-label span3" for="inputEmail">Status<span class="help-block"></span></label>
            <div class="controls span7">
                <?php //echo $form->listBox($model_arrival, 'status', array('Yes' => 'Yes', 'No' => 'No'), array('class' => 'chosen-select', 'data-placeholder' => 'Status')); ?>
                <?php echo $form->textField($model_arrival, 'status', array('size' => 30, 'maxlength' => 30, 'class' => 'row-fluid')); ?>
                <?php echo $form->error($model_arrival, 'status'); ?>


            </div>
        </div>

        <div class="form-row control-group row-fluid ">
            <label class="control-label span3" for="mask-phone">Hotel Room Nos</label>
            <div class="controls span7">
                <?php echo $form->textField($model_arrival, 'hotel_room_no', array('class' => 'row-fluid',)); ?>
                <?php echo $form->error($model_arrival, 'hotel_room_no'); ?>

            </div>
        </div>

        <div class="form-row control-group row-fluid" id="outsite_vehicle_no">
            <label class="control-label span3" for="Phone_no">Remarks</label>
            <div class="controls span7">
                <?php echo $form->textField($model_arrival, 'remarks', array('class' => 'row-fluid',)); ?>
            </div>
        </div>

        <div class="form-actions row-fluid">
            <div class="span7 offset3">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <input type="reset" class="btn btn-secondary" value="Cancel"/>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>

<script>
        $("#Arrival_arrival").change(function(){
            var val = $(this).val();
            if(val=='Train'){
                $("#A_train_name").css("display","block");
                $("#A_bus_name").css("display","none");
                $("#A_flight_name").css("display","none");
                $("#A_train_flight_no").css("display","block");
                $("#A_surface_location").css("display","none");
                $("#A_from").css("display","block");
                $("#A_to").css("display","block");
            }else if(val=='Bus'){
                $("#A_train_name").css("display","none");
                $("#A_bus_name").css("display","block");
                $("#A_flight_name").css("display","none");
                $("#A_train_flight_no").css("display","none");
                $("#A_surface_location").css("display","none");
                $("#A_from").css("display","block");
                $("#A_to").css("display","block");
            }else if(val=='Flight'){
                $("#A_train_name").css("display","none");
                $("#A_bus_name").css("display","none");
                $("#A_flight_name").css("display","block");
                $("#A_train_flight_no").css("display","block");
                $("#A_surface_location").css("display","none");
                $("#A_from").css("display","block");
                $("#A_to").css("display","block");
            }else{
                $("#A_train_name").css("display","none");
                $("#A_bus_name").css("display","none");
                $("#A_flight_name").css("display","none");
                $("#A_train_flight_no").css("display","none");
                $("#A_surface_location").css("display","block");
                $("#A_from").css("display","none");
                $("#A_to").css("display","none");
            }
        });
        
        $("#Arrival_train_name").change(function(){
            $.post('<?php echo $this->createUrl('//entries/getTrainFlightNumber'); ?>',{val:$(this).val(), type:'Train'},function(data){
                $("#Arrival_train_flight_no").html(data);
            });
        });
        
        $("#Arrival_flight_name").change(function(){
            $.post('<?php echo $this->createUrl('//entries/getTrainFlightNumber'); ?>',{val:$(this).val(), type:'Flight'},function(data){
                $("#Arrival_train_flight_no").html(data);
            });
        });
        
        $("#Arrival_bus_name").change(function(){
            var arrival = $("#Arrival_arrival").val();
            
            $.post('<?php echo $this->createUrl('//entries/getFrom'); ?>',{val:$(this).val(), type:arrival},function(data){
                $("#Arrival_from").html(data);
            });
            
            $.post('<?php echo $this->createUrl('//entries/getTo'); ?>',{val:$(this).val(), type:arrival},function(data){
                $("#Arrival_at").html(data);
            });
        });
        
        
        
        
        $("#Arrival_train_flight_no").change(function(){
            
            var arrival = $("#Arrival_arrival").val();
            
            $.post('<?php echo $this->createUrl('//entries/getFrom'); ?>',{val:$(this).val(), type:arrival},function(data){
                $("#Arrival_from").html(data);
            });
            
            $.post('<?php echo $this->createUrl('//entries/getTo'); ?>',{val:$(this).val(), type:arrival},function(data){
                $("#Arrival_at").html(data);
            });
        });
        
        
        //TB vehicle yes or not
        $(".A_tbvy").click(function(){
            $("#A_outsite_drivername").css("display","none");
            $("#A_outside_vehicle_no").css("display","none");
            $("#A_outside_mobile_no").css("display","none");
            $("#A_outsite_vehicle_category").css("display","none");

            $("#A_driver_name").css("display","block");
            $("#A_vehicle_no").css("display","block");
            $("#A_mobile_no").css("display","block");
            $("#A_vehicle_category").css("display","block");
        });

        $(".A_tbvn").click(function(){
            $("#A_driver_name").css("display","none");
            $("#A_vehicle_no").css("display","none");
            $("#A_mobile_no").css("display","none");
            $("#A_vehicle_category").css("display","none");

            $("#A_outsite_drivername").css("display","block");
            $("#A_outside_vehicle_no").css("display","block");
            $("#A_outside_mobile_no").css("display","block");
            $("#A_outsite_vehicle_category").css("display","block");
        });
        
        $("#Arrival_vehicle_category").change(function(){
            $.post('<?php echo $this->createUrl('//entries/getVehicleRegNum'); ?>',{val:$(this).val()},function(data){
                $("#Arrival_vehicle_no").html(data);
            });
        });
        
        $("#Arrival_driver_name").change(function(){
            $.post('<?php echo $this->createUrl('//entries/getDriverMobile'); ?>',{val:$(this).val()},function(data){
                if(data!='')
                    data = data;
                else
                    data = 'Not Set';
                $("#Arrival_mobile_no").val(data);
            }); 
        });
                               
                                   
    </script>