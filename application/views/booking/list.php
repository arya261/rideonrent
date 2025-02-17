<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/main.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>
    <div class="main-container">
    <?php $this->load->view("common/sidebar");?>
    <div class="right-container">
    <div class="header-class">
            <h2>Booking List</h2>
           
        </div>
        <table>
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Customer Name</th>
                    <th>Vehicle Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $sl_no=1; foreach($booking as $b){?>
                    <td><?=$sl_no?></td>
                    <td><?=$b->customer_name?></td>
                    <td><?=$b->make." ".$b->model?></td>
                    <td><?=$b->from_date?></td>
                    <td><?=$b->to_date?></td>
                    <td>
                        <button  class="accept-btn" onclick="status_update(<?=$b->booking_id?>,1)">Accept</button>
                        <button class="reject-btn" onclick="status_update(<?=$b->booking_id?>,2)">Reject</button>
                    </td>
                </tr>
                <?php $sl_no ++;}?>
                
            </tbody>
        </table>
    </div>
    </div>
    <script>
        function status_update(booking_id,status){
            if(status==1){
                var heading = "Accept Booking ?";
                var description ="Do You Want to accept the booking";
            }
            else{
                 var heading ="Reject Booking ?";
                 var description ="Do You want to delete the booking";
            }
            Swal.fire({
        title: heading,
        text:description,
        icon: 'warning', // SweetAlert2 uses 'icon' instead of 'type'
        showCancelButton: true,
        cancelButtonColor: '#ccc',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Update'
    }).then((result) => {
        if (result.isConfirmed) {  // Use isConfirmed instead of result.value
            $.post("<?= base_url(); ?>booking/update_status/" + booking_id + "/" + status, function(result) {
                var obj = JSON.parse(result);
                if (obj.status == 1) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",  // 'type' is replaced with 'icon'
                        title: obj.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        icon: 'error',  // Adding an error icon for failure
                        title: obj.message
                    });
                }
            });
        }
    });
}
            
    </script>
</body>
</html>

