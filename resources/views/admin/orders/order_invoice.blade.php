<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
}
</style>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # {{$orderDetails->id}} </h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
                        {{$userDetails->name}} <br>
                        {{$userDetails->email}} <br>
                        {{$userDetails->number}} <br>
                        {{$userDetails->address}} <br>
                        {{$userDetails->city}} <br>
                        {{$userDetails->country}} <br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
                        {{$orderDetails->name}} <br>
                        {{$orderDetails->email}} <br>
                        {{$orderDetails->contact}} <br>
                        {{$orderDetails->address}} <br>
                        {{$orderDetails->city}} <br>
                        {{$orderDetails->country}} <br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
                        {{$orderDetails->payment_method}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{$orderDetails->created_at}} 
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td style="width:18%"><strong>Product Code</strong></td>
        							<td style="width:18%" class="text-center"><strong> Name</strong></td>
        							<td style="width:18%" class="text-center"><strong> Size</strong></td>
        							<td style="width:18%" class="text-center"><strong> Color</strong></td>
        							<td style="width:18%" class="text-center"><strong> Price</strong></td>
        							<td style="width:18%" class="text-center"><strong> Qty</strong></td>
        							<td style="width:18%" class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php $subtotal = 0; ?>
                                @foreach($orderDetails['ordersDetails'] as $order)
    							<tr class="text-center">
                                    <td class="text-left">{{$order->product_code}}</td>
                                    <td>{{$order->product_name}}</td>
                                    <td>{{$order->product_size}}</td>
                                    <td>{{$order->product_color}}</td>
                                    <td>Rs.{{$order->product_price}}.00</td>
                                    <td class="text-center">{{$order->product_qty}}</td>
                                    <td class="text-right">Rs.{{$order->product_price*$order->product_qty}}.00</td>
    							</tr>
                                <?php $subtotal = $subtotal + ($order->product_price*$order->product_qty); ?>
                                @endforeach
    							<tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">Rs.{{$subtotal}}.00</td>
    							</tr>
    							<tr>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
    								<td class="text-center"><strong>Shipping Charges(+)</strong></td>
    								<td class="text-right">Rs.{{$orderDetails->shipping_charges}}.00</td>
    							</tr>
                                <tr>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
    								<td class="text-center"><strong>Coupon Discount(-)</strong></td>
    								<td class="text-right">Rs.{{$orderDetails->coupon_amount}}.00</td>
    							</tr>
    							<tr>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
    								<td class=" text-center"><strong>Total</strong></td>
    								<td class=" text-right">Rs.{{$orderDetails->grand_total}}.00</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>