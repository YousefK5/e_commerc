<?php
require_once '../../views/connection.php';

$ordersDetails = $connect->query('SELECT * FROM orders as o 
JOIN order_details as od 
ON o.order_id=od.order_id');
$ordersDetails = $ordersDetails->fetchAll(PDO::FETCH_ASSOC);

$orders = $connect->query("SELECT * FROM orders as o 
JOIN users as u
ON o.user_id=u.user_id");
$orders = $orders->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $getUser = $_GET['id'];
    $orders = $connect->query("SELECT * FROM orders as o 
    JOIN users as u
    ON o.user_id=u.user_id 
    WHERE o.user_id='$getUser'");
    $orders = $orders->fetchAll(PDO::FETCH_ASSOC);

    $user = $connect->query("SELECT * FROM users WHERE user_id='$getUser'");
    $user = $user->fetch(PDO::FETCH_ASSOC);
}
?>


<?php require 'header.php'; ?>
<div class="container-fluid page-body-wrapper">
<?php require 'sidebar.php'; ?>

<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-contacts menu-icon"></i>
                </span> Orders
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Orders For <b><?php echo isset($_GET['id'])
                            ? $user['first_name'] . $user['last_name']
                            : 'All Users'; ?></b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Date</th>			
                        <th>User Name</th>			
                        <th>Total Price</th>						
                        <th>Phone</th>					
                        <th>Address, Postal Code</th>					
                        <th>Coupon</th>					
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                        <td><?php echo $order['first_name'] .
                            ' ' .
                            $order['last_name']; ?></td>
                        <td><?php echo $order['total_price']; ?></td>
                        <td><?php echo $order['order_phone']; ?></td>
                        <td><?php
                        echo $order['order_city'];
                        echo $order['order_address'];
                        echo ',' . $order['postal_code'];
                        ?></td>
                        <td><?php echo $order['coupon_id']; ?></td>
                        <td>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" id="delBtn"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE417;</i></a>    
                        </td>
                    </tr>
                    <div id="deleteEmployeeModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">						
                                        <h4 class="modal-title">Order Details</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">				
                                        <h4>Order Number : <?php echo $order[
                                            'order_id'
                                        ]; ?></h4>
                                        <h4>Order Date : <?php echo $order[
                                            'order_date'
                                        ]; ?></h4>
                                        <div>
                                            <span style="width:110px;font-size:21px;display: inline-block;">Product ID</span>
                                            <span style="width:110px;font-size:21px;display: inline-block;">Unit Price</span>
                                            <span style="width:110px;font-size:21px;display: inline-block;">Quantity</span>
                                            <span style="width:110px;font-size:21px;display: inline-block;">Price</span>
                                        </div>
                                        <?php foreach (
                                            $ordersDetails
                                            as $detail
                                        ) {
                                            if (
                                                $detail['order_id'] ==
                                                $order['order_id']
                                            ) { ?>
                                        <div>
                                            <span style="width:110px;font-size:21px;display: inline-block;"><?php echo $detail[
                                                'product_id'
                                            ]; ?></span>
                                            <span style="width:110px;font-size:21px;display: inline-block;"><?php echo $detail[
                                                'unit_price'
                                            ]; ?></span>
                                            <span style="width:110px;font-size:21px;display: inline-block;"><?php echo $detail[
                                                'quantity'
                                            ]; ?></span>
                                            <span style="width:110px;font-size:21px;display: inline-block;"><?php echo $detail[
                                                'quantity'
                                            ] * $detail['unit_price']; ?></span>
                                        </div>
                                        <?php }
                                        } ?>
                                        <h4>Total Price : <?php echo $order[
                                            'total_price'
                                        ]; ?></h4>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="OK">
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>  
</div>

<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>

<?php require 'footer.php'; ?>
