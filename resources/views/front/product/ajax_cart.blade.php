  <div class="shopping-cart">
    <table class="cart_table">
      <thead class="column-labels">
        <tr>
          <th><label class="product-serial">SN</label></th>
          <th><label class="product-image">Image</label></th>
          <th><label class="product-details">Product</label></th>
          <th><label class="product-price">Price</label></th>
          <th><label class="product-quantity">Quantity</label></th>
          <th><label class="product-removal">Remove</label></th>
          <th><label class="product-line-price">Total</label></th>
        </tr>
      </thead>
      <tbody class="product">
          <?php $sub_total = 0;?>
        @foreach ($carts as $cart)
          <tr>
              <td>1.</td>
              <td><figure class="product-image"> <img src="{{$cart->product_image}}" alt="" title=""> </figure></td>
              <td><div class="product-details">
                  <div class="product-title">{{$cart->product_name}}({{$cart->product_code}})</div>
              </div></td>
              <td><div class="product-price">{{$cart->price}}</div></td>
              <td><div class="product-quantity">
                  <input type="number" value="{{$cart->quantity}}" min="1" max="99" id="cart-id-{{$cart->id}}" 
                  onchange="productQuantity(this.getAttribute('cart_id'));"
                  cart_id="{{$cart->id}}"" maxlength="1" ></div
              </div></td>
              <td><div class="product-removal">
                  <button class="remove-product" onclick="deleteData(this.getAttribute('cart_id'),this.getAttribute('record'));" cart_id="{{$cart->id}}" record='cart-record'><i class="fa-solid fa-trash"></i> </button>
              </div></td>
              <td><div class="product-line-price">{{$cart->price*$cart->quantity}}</div></td>
          </tr>
          <?php $sub_total += $cart->price*$cart->quantity ?>
        @endforeach
      </tbody>
    </table>
    <div class="totals">
      <div class="totals-item">
        <label>Subtotal</label>
        <div class="totals-value" id="cart-subtotal">{{$sub_total}}</div>
      </div>
      <div class="totals-item">
        <label>Tax (%)</label>
        <div class="totals-value" id="cart-tax">10%</div>
      </div>
      <div class="totals-item">
        <label>Shipping</label>
        <div class="totals-value" id="cart-shipping">50</div>
      </div>
      <div class="totals-item totals-item-total">
        <?php 
        $total = $sub_total +($sub_total *10 /100);
        $grand_total = $total +50;
        ?>
        <label>Grand Total</label>
        <div class="totals-value" id="cart-total">{{$grand_total}}</div>
      </div>
    </div>
    <a href="{{route('checkout')}}" class="checkout_btn btn pull-right">Proceed to Checkout</a> 
  </div>