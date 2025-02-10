<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/checkoutform.css">
    
</head>
<body>
    <?php
    $ordometer_out ='';
    $fuel_out ='';
    $checkout_date = '';
    $expected_checkin_date = '';
    $fixed_charge ='';
    $amount ='';
    $remark ='';
    $discount = '';

    if($mode =='edit'){
        foreach($checkout as $c){
            $ordometer_out = $c->ordometer_out;
            $fuel_out = $c->fuel_out;
            $checkout_date = $c->checkout_date;
            $expected_checkin_date = $c->expected_checkin_date;
            $fixed_charge = $c->fixed_charge;
            $amount = $c->amount;
            $remark = $c->remark;
            $discount = $c->discount;
        }
      
    }
    ?>












    <form action="<?=base_url()?>/checkout/process" id="registration_form" method="post">
    <div class="container">
        <!-- Left Section -->
        <div class="left">
            <h3>Select Vehicle</h3>
            <div class="form-group">
                <label for="vehicle">Vehicle:</label>
                <select id="vehicle" name="vehicle_id">
                    <?php foreach($vehicle as $v) { ?>
                        <option value="<?=$v->vehicle_id?>"><?=$v->vehicle_name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="odometer">Odometer Reading:</label>
                    <input type="text" id="odometer" name="ordometer_out" value="<?=$ordometer_out?>" placeholder="Enter Odometer Reading">
                </div>

                <div class="form-group">
                    <label for="fuel">Fuel Reading:</label>
                    <input type="text" id="fuel" name="fuel_out" value="<?=$fuel_out?>" placeholder="Enter Fuel Reading">
                </div>
            </div>
        </div>

        <div class="line"></div>

        <!-- Right Section -->
        <div class="right">
        <div class="form-group">
                    <label for="duration">Select customer</label>
                    <select name="customer_id" id="">
                        <?php foreach($customer as $c){?>
                            <option value="<?=$c->customer_id?>"><?=$c->customer_name?></option>
                            <?php }?>
                    </select>
                </div>
            <div class="form-row">
               
                <div class="form-group">
                    <label for="startDate">From Date:</label>
                    <input type="date" id="startDate" name="checkout_date" value="<?=$checkout_date?>">
                </div>
                <div class="form-group">
                    <label for="startTime">From Time:</label>
                    <input type="time" id="startTime" name="from_datetime">
                </div>
            </div>
            <div class="form-row">
               
                <div class="form-group">
                    <label for="endDate">To Date:</label>
                    <input type="date" id="endDate" name="expected_checkin_date" value="<?=$expected_checkin_date?>">
                </div>
                <div class="form-group">
                    <label for="endTime">To Time:</label>
                    <input type="time" id="endTime" name="to_datetime">
                </div>
            </div>
            <!-- <div class="form-row">

                <div class="form-group">
                    <label for="duration">Duration:</label>
                    <input type="text" id="duration" name="duration" placeholder="Enter Duration">
                </div>
            </div> -->
            <div class="form-row">
                <div class="form-group">
                    <label for="duration">Fixed Charge:</label>
                    <input type="text" id="duration" name="fixed_charge" value="<?=$fixed_charge?>">
                </div>
                <div class="form-group">
                    <label for="duration">Discount:</label>
                    <input type="text" id="duration" name="discount" value="<?=$discount?>">
                </div>
                <div class="form-group">
                    <label for="duration">Total Amount:</label>
                    <input type="text" id="duration" name="amount" value="<?=$amount?>" >
                </div>
            </div>
            <div class="form-group">
                <label for="remark">Remark:</label>
                <textarea id="remark" name="remark" value="<?=$remark?>" rows="4" placeholder="Enter any remarks"><?=$remark?></textarea>
            </div>

            <button type="submit" class="button">confirm checkout</button>
        </div>
    </div>
    </form>
</body>
</html>
