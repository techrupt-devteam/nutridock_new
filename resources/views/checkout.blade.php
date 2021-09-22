@extends('layouts.master')
@section('content')
<div class="page-content-main">
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
	<div class="content-container">
		<div class="container">
			
					<div class="main-content">
						<div class="shop">
							<form>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="panel-group" id="accordion">
							                <div class="panel panel-default">
							                    <div class="panel-heading">
							                        <h4 class="panel-title">
							                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							                            	<span class="fa fa-file"></span> Login | Signup
							                            </a>
							                        </h4>
							                    </div>
							                    <div id="collapseOne" class="panel-collapse collapse in">
							                        <div class="panel-body">
							                           <div class="shop p-md-3">
														<h5 style="margin-top: 0;">Existing customer</h5>
														<p class="lead" style="margin-bottom: 1rem;">
															If you've previously registered an account, please log in:
														</p>
														<form class="login">
															<p class="form-row-wide">
																<label>Mobile No.<span class="required">*</span></label>
																<input type="text" class="form-control" name="username" placeholder="Mobile No" />
															</p>
															<p class="form-row-wide">
																<label>OTP <span class="required">*</span></label>
																<input class="form-control" type="password" name="OTP" placeholder="Enter OTP" />
															</p>
															<p class="float-left">
																<label class="inline form-flat-checkbox">
																	00:30 
																</label>
															</p>
															<p class="float-right">
																<a href="#" class=""> Resend </a>
															</p>
															<div class="clear"></div>
															<input type="submit" class="button" name="login" value="Login"/>
														</form>
														<div class="user-login-or"><span>or</span></div>
														<div class="user-login-facebook mt-2">
															<button class="btn-login-facebook mt-2" type="button">
																<i class="fab fa-facebook"></i> Sign in with Facebook
															</button>
															<button type="button" id="btnLogin" class="btn btn-success mt-2" style="font-size: 14.5px;border-radius: 4px;"> 
															 Without an account   &nbsp;
																<i class="fa fa-arrow-right" aria-hidden="true"></i>
															</button>
														</div>
														
													</div>
							                        </div>
							                    </div>
							                </div>
							                <div class="panel panel-default">
							                    <div class="panel-heading">
							                        <h4 class="panel-title">
							                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="fa fa-truck"></span> Delivery Address </a>
							                        </h4>
							                    </div>
							                    <div id="collapseTwo" class="panel-collapse collapse">
							                    	
							                        <div class="panel-body">
							                        	<div class="row">
							                        		<div class="col-sm-7 mb-3">
							                        			<label>First Name</label>
							                        		  <input type="text" placeholder="First name" name="" class="form-control">
							                        		</div>
							                        		<div class="col-sm-5 mb-3">
							                        			<label>Last Name</label>
							                        		  <input type="text" placeholder="Last name" name="" class="form-control">
							                        		</div>
							                        	</div>

							                        	<div class="row">
							                        		<div class="col-sm-12 mb-3">
							                        		  <label>Last Name</label>
							                        		  <textarea class="form-control" rows="3" placeholder="Address"></textarea>
							                        		</div>
							                        		
							                        		<div class="col-sm-6 mb-3">
							                        		   <label>City</label>
							                        		  <input type="text" placeholder="City" name="" class="form-control">
							                        		</div>
							                        		<div class="col-sm-6 mb-3">
							                        		   <label>Pincode</label>
							                        		  <input type="text" placeholder="Pincode" name="" class="form-control">
							                        		</div>
							                        	</div>

								                        <button type="button" class="btn btn-primary btn-lg"> 
								                        	<span>Proceed </span> 
								                            <i class="fa fa-angle-right" aria-hidden="true"></i> 
							                        	</button>
							                        </div>
							                    </div>
							                </div>

							                <div class="panel panel-default">
							                    <div class="panel-heading">
							                        <h4 class="panel-title">
							                            <a data-toggle="collapse" data-parent="#accordion" href="#coupon-code"><span class="fa fa-gift"></span> Digital Gift Card or coupon code  </a>
							                        </h4>
							                    </div>
							                    <div id="coupon-code" class="panel-collapse collapse">
							                    	<div class="panel-body">
							                        	<p>If you have a gift card, TradeUp voucher or coupon please enter them below. If not, simply proceed to the next step</p>

							                        	<div class="giftcard">
							                        		<div id="giftcardform" style="max-width: 360px;">
							                        			<h2 style="font-size:14px;margin:15px 0 0 0">Digital Gift Card or TradeUp voucher
							                        			</h2>
							                        			<div class="input-group mt-3">
																    <input type="text" class="form-control" placeholder="Enter your number" style="width: 250px;">
																    <div class="input-group-btn">
																      <button class="btn btn-default" type="submit" style="font-weight: 500;border-top-left-radius: 0px;border-bottom-left-radius: 0px;padding: 8px;">
																        Validate
																      </button>
																    </div>
																  </div>

																  <div class="input-group mt-3" style="max-width: 360px;">
																    <input type="text" class="form-control" placeholder="Enter your coupon code">
																    <div class="input-group-btn">
																      <button class="btn btn-default"  type="submit" style="font-weight: 500;border-top-left-radius: 0px;border-bottom-left-radius: 0px;padding: 8px;">
																        Validate
																      </button>
																    </div>
																  </div>
							                        		</div>
							                        	</div>

							                        	<button type="button" class="btn btn-primary btn-lg mt-4"> 
								                        	<span>Proceed </span> 
								                            <i class="fa fa-angle-right" aria-hidden="true"></i> 
							                        	</button>
							                        </div>
							                    </div>
							                </div>

							                <div class="panel panel-default">
							                    <div class="panel-heading">
							                        <h4 class="panel-title">
							                            <a data-toggle="collapse" data-parent="#accordion" href="#Payment"><span class="fa fa-money"></span> Payment  </a>
							                        </h4>
							                    </div>
							                    <div id="Payment" class="panel-collapse collapse">
							                    	<div class="panel-body">
							                        	<p>Please choose a payment method:</p>

							                        	<div class="choose-payment">
						                        		<ul class="row" style="padding: 0px;list-style: none;">
						                        			<li class="col-md-8 col-sm-6 col-xs-7">
						                        				<div class="">
								                        		  <div class="radio">
																	  <label>
																	    <input type="radio" name="optradio" checked> Credit card <br/> 
																	    <span style="font-size: 13px;color: #666;"> Pay by Visa, MasterCard or American Express. </span>
																	  </label>
																   </div>
								                        		</div>
															</li>
															<li class="col-md-4 col-sm-6 col-xs-5 text-right">
															   <img src="{{url('')}}/assets/images/icon_cards.png" class="payment-logo">
															</li>
															<li class="border-top-line "></li>
															<li class="col-md-8 col-sm-6 col-xs-7">
						                        				<div class="">
								                        		  <div class="radio">
																	  <label>
																	    <input type="radio" name="optradio" checked> PayPal <br/> 
																	    <span style="font-size: 13px;color: #666;"> Pay with your PayPal account. </span>
																	  </label>
																   </div>
								                        		</div>
															</li>
															<li class="col-md-4 col-sm-6 col-xs-5 text-right">
															   <img src="{{url('')}}/assets/images/icon_pp.png" class="payment-logo" alt="Pay by Visa, MasterCard or American Express." style="">
															</li>
															<li class="border-top-line "></li>
															<li class="col-md-8 col-sm-6 col-xs-7">
						                        				<div class="">
								                        		  <div class="radio">
																	  <label>
																	    <input type="radio" name="optradio"> Financing <br/> 
																	    <span style="font-size: 13px;color: #666;"> 0% APR or as low as $268/month with Affirm <a class="affirm-modal-trigger"> Prequalify now </a> </span>
																	  </label>
																   </div>
								                        		</div>
															</li>
															<li class="col-md-4 col-sm-6 col-xs-5 text-right">
															   <img src="{{url('')}}/assets/images/icon_affirm.png" class="payment-logo" alt="Pay by Visa, MasterCard or American Express." style="">
															</li>
															<li class="border-top-line "></li>
						                        		</ul>
							                        	</div>

							                        	<div class="paymentDetails clearfix" style="">
							                        		<div class="paymentExtraData ng-pristine ng-invalid ng-invalid-required" ng-show="paymentoption == 'stripe2'" ng-form="formStripe2" style="padding-top: 15px;">
							                        			<div class="row mt-3" style="">
							                        				<div class="col-md-5 col-sm-6 col-xs-12" style="">
							                        					<label for="card-number-element" style="">Number</label>
							                        				</div>
							                        				<div class="col-md-7 col-sm-6 col-xs-12" style="max-width: 180px;">
							                        				 <div class="__PrivateStripeElement">
							                        					<input class="form-control" maxlength="1">
							                        				</div>
							                        			</div>
							                        		</div>
							                        		<div class="row mt-3">
							                        			<div class="col-md-5 col-sm-6 col-xs-12">
							                        				<label for="card-cvc-element">
							                        					<span>Security Code</span>
							                        				</label>
							                        			</div>
							                        			<div class="col-md-7 col-sm-6 col-xs-12" style="max-width: 180px">
							                        			<div class="__PrivateStripeElement">
							                        				<input class="form-control" maxlength="1"/>
							                        			</div>
							                        		</div>
							                        	</div>

							                        	<div class="row mt-3">
							                        		<div class="col-md-5 col-sm-6 col-xs-12">
							                        			<label for="card-expiry-element"> Expiration (MM / YY)</label>
							                        		</div>
							                        		<div class="col-md-7 col-sm-6 col-xs-12 mt-3" style="max-width: 180px;">
							                        		<div class="__PrivateStripeElement">
							                        			<input class="form-control" maxlength="1"/>
							                        		</div>
								                        </div>
								                    </div>
							                    <div class="row mt-3">
							                    	<div class="col-md-6 col-sm-6 col-xs-12">
							                    		<h4>Credit card holder's details</h4>
							                    	</div>
							                    </div>
							                    <div class="row mt-3">
					                    			<div class="col-md-5 col-sm-6 col-xs-12">
					                    				<label></label>
					                    			</div>
					                    			<div class="col-md-7 col-sm-6 col-xs-12 mt-3">
					                    				<input type="checkbox"> 
					                    					<label for="useShippingAddress"> Use shipping address details
					                    				</label>
					                    			</div>
					                    		</div>
					                    		<div class="row mt-3">
					                    			<div class="col-md-5 col-sm-6 col-xs-12">
					                    				<label for="Order.OrderBillingAddressName"> Name on card</label>
					                    			</div>
					                    			<div class="col-md-7 col-sm-6 col-xs-12 mt-3">
					                    				<input type="text" class="form-control"/>
					                    			</div>
					                    		</div>
					                    		<div class="row mt-3">
					                    			<div class="col-md-5 col-sm-6 col-xs-12">
					                    				<label for="OrderBillingAddressStreet">Cardholder's street address </label>
					                    			</div>
					                    			<div class="col-md-7 col-sm-6 col-xs-12 mt-3">
					                    				<input type="text" class="form-control"/>
					                    			</div>
					                    		</div>
					                    		<div class="row mt-3">
					                    			<div class="col-md-5 col-sm-6 col-xs-12">
					                    				<label for="Order.OrderBillingAddressPostalcode"> Zipcode &amp; City</label>
					                    			</div>
					                    			<div class="col-md-3 col-sm-2 col-xs-12 mt-3">
					                    				<input type="text" placeholder="Zipcode" class="form-control"/>
					                    			</div>
					                    			<div class="col-md-4 col-sm-4 col-xs-12 mt-3">
					                    				<input type="text" class="form-control" placeholder="City"/>
					                    			</div>
					                    		</div>
					                    		<div class="row mt-3">
					                    			<div class="col-md-5 col-sm-6 col-xs-12">
					                    				<label for="Order.OrderBillingAddressState">State</label>
					                    			</div>
					                    			<div class="col-md-7 col-sm-6 col-xs-12">
					                    				<select class="form-control">
						                    				<option value="" selected="selected">
						                    					Select state
						                    				</option> 
					                    				</select>
					                    				<div class="checkbox mt-3" style="">
							                        		<label > 
							                        			<input type="checkbox"> 
							                        			<a class="agree-terms-conditions" href="#"> I agree to the terms and conditions
							                        			</a> 
							                        		</label> 
							                        	</div>
					                    			</div>
					                    		</div>
					                    		
							                    </div>
							                   </div>

							                        	
						                        <button type="button" class="btn btn-primary btn-lg mt-4"> 
						                        	<span>Proceed </span> 
						                            <i class="fa fa-angle-right" aria-hidden="true"></i> 
					                        	</button>
						                        </div>
						                    </div>
						                </div>
						            </div>
								</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="clearfix">
											<div style="font-size: 20px;padding-bottom: 10px;" class="bg-white">&nbsp; Your order</div>
											<div class="shop">
												<form>
													<table class="table shop_table cart" cellpadding="2" cellspacing="2">
														<tbody>
															<?php 
																$total=0;
																$cp=1;
															 ?>
															@foreach($cart_list as $listvalue)
															<tr class="cart_item">
																
																<td class="product-thumbnail hidden-xs">
																	<a href="#">
																		<img width="100" height="150" src="{{ url('/')}}/uploads/menu/{{$listvalue->image}}" alt="Product-1"/>
																	</a>
																</td>
																<td class="product-name">
																	<a href="#">{{$listvalue->menu_title}}</a>
																</td>
																
																<td class="product-quantity text-center">
																	<!-- <div class="quantity">
																		<input type="number" step="1" min="0" name="qunatity" value="2" title="Qty" class="input-text qty text" size="4"/>
																	</div> -->
																	<div class="col-7 text-center cart-pricing-quant">
												                    <div class="cart-item-add-delete-control">
												                        <div class="cart-del quantity-left-minus">
												                            <i class="fas fa-minus dark-grey-text" onclick="minusqty({{$cp}})"></i>
												                            <input type="hidden" value="{{$listvalue->menu_id}}" name="mcpenu_id" id="cpmenu_id{{$cp}}">
												                            <input type="hidden" value="{{$listvalue->rate}}" name="cpprice"   id="cpprice{{$cp}}">
												                            <input type="hidden" value="{{$listvalue->qty}}" name="cpqty"     id="cpqty{{$cp}}">

												                        </div>
												                        <div class="cart-pricing">
												                            <input type="number" step="1" class="form-control crtInpt no-spinners" id="qty_number{{$cp}}" value="{{$listvalue->qty}}">
												                        </div>
												                        <div class="cart-del quantity-right-plus">
												                            <i class="fas fa-plus dark-grey-text" onclick="plusqty({{$cp}})"></i>
												                        </div>

												                    </div>
   																	 </div>
																</td>
														     	<?php 
            														$total += $listvalue->qty*$listvalue->rate;
        														?>	
																<td class="product-subtotal hidden-xs text-center" >
																	<i class="fa fa-rupee"></i><span  class="amount" id="total_price{{$cp}}"> {{$listvalue->qty*$listvalue->rate}}</span>
																	<input type="hidden" name="finalprice"   id="finalprice{{$cp}}" value="{{$listvalue->qty*$listvalue->rate}}">
																</td>
																<td class="product-remove hidden-xs">
																	<a href="javacript:void(0);" onclick="deletecp({{$cp}})" class="remove" title="Remove this item">
																		<i class="far fa-trash-alt"></i>
																	</a>
																</td>
															</tr>
															<?php  $cp++;?>
															@endforeach
       
															
															<tr>
																<td colspan="6" class="actions">
																	<a href="{{url('/')}}" class="button btn btn-outline-success"  style="border-color: #74d141;color: green; hover:none"/>Explore Menu</a>
																	<!-- <input type="submit" class="button update-cart-button" name="update_cart" value="Update Cart"/> -->
																</td>
															</tr>
														</tbody>
													</table>
													       <input type="hidden" id="cp" value="{{$cp-1}}">
												</form>
												<div class="cart-collaterals">
													<div class="cart_totals">
														<h2>Cart Totals</h2>
														<table>
															<!-- <tr class="cart-subtotal">
																<th>Subtotal</th>
																<td><span class="amount">&#36;56.00</span></td>
															</tr>
															<tr class="shipping">
																<th>Shipping</th>
																<td><span class="amount">&#36;0.00</span></td>
															</tr> -->
															<tr class="order-total">
																<th>Total</th>
																<td><strong>    <i class="fa fa-rupee"></i><span class="totalamountclsval">{{$total}}</span>
          													  <input type="hidden" id="cptotalamt" name="cptotalamt" value="{{$total}}"></strong></td>
															</tr>
														</table>
														<div class="wc-proceed-to-checkout">
															<a href="#" class="btn btn-outline-success btn-lg">Proceed to Checkout</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
				</div>
			</div>
		</div>
</div>

@endsection

<script type="text/javascript">
    function deletecp(num)
    {
        swal({
        title: "Remove Product",
        text: "Are You sure to Delete",
        icon: "warning",
          buttons: [
            'Cancel',
            'Yes, change it!'
          ],
         
        }).then(function(isConfirm) 
        {
          if (isConfirm) 
          { 
            var session_id = $('#session_id').val();
            var login_id   = $('#login_id').val();
            var menu_id    = $('#cpmenu_id'+num).val();
            $.post("{{url('/')}}/delcartproduct",
            {
                session_id : session_id,
                login_id   : login_id,
                 menu_id   : menu_id
            },
            function(data){
                //swal({ title: "Deleted.",text:"Dish deleted on cart",icon: "success"}); 
                location.reload();
                //alert('test');
                loadCart();

            }
            );
         }

        });

    }

    function loadCart()
    {
        var session_id = $('#session_id').val();
        var login_id   = $('#login_id').val();
        $.post("{{url('/')}}/loadcartlist",
            {
                session_id : session_id,
                login_id   : login_id
            },
            function(data){
                /*data=data.split('{#}');*/
                $('#cart_list').html(data);
                 caltotal();
                /*$('#cartamount').html(data[1]);*/
            }
        );
          
    } 
    function minusqty(num)
    {
        var session_id = $('#session_id').val();
        var login_id   = $('#login_id').val();
        var  menu_id = $('#cpmenu_id'+num).val();
        var  price   = $('#cpprice'+num).val();
        var  qty     = $('#qty_number'+num).val();
        var  fqty    = parseInt(qty)-1;
        var  tprice  = parseInt(price) * fqty; 
        if(fqty==0){
            swal({ title: "Warning.",text:"Please select at least one quantity.",icon: "warning"}); 
            $('#qty_number'+num).val(qty);
            $('#total_price'+num).html(price);
            $('#finalprice'+num).val(price);
            return false;
        }
        else
        {
            $.post("{{url('/')}}/updateQty",
            {
                session_id : session_id,
                login_id   : login_id,
                qty1       : fqty,
                price1     : tprice,
                menu_id    : menu_id
            },
            function(data)
            {
                $('#qty_number'+num).val(fqty);
                $('#total_price'+num).html(tprice);
                $('#finalprice'+num).val(tprice);
                  caltotal();
             }
           );
        }
         loadCart();
        // caltotal();
    }

    function plusqty(num)
    {
        var session_id = $('#session_id').val();
        var login_id   = $('#login_id').val();
        var  menu_id   = $('#cpmenu_id'+num).val();
        var  price     = $('#cpprice'+num).val();
        var  qty       = $('#qty_number'+num).val();
        var  fqty      = parseInt(qty)+1;
        var  tprice    = price * fqty; 
          // alert(tprice);
           $.post("{{url('/')}}/updateQty",
            {
                session_id : session_id,
                login_id   : login_id,
                qty1       : fqty,
                price1     : tprice,
                menu_id    : menu_id
            },
            function(data)
            {
        $('#qty_number'+num).val(fqty);
        $('#total_price'+num).html(tprice);
        $('#finalprice'+num).val(tprice);
         caltotal();
     });
       loadCart();
       //caltotal();
     
    }

    function caltotal()
    {
        var length = $("#cp").val();
        var total = 0;
        for ( var i = 1; i <= length; i++ )
        {
            total += parseFloat($('#finalprice'+i).val());
            //alert("total"+total);

        }
       $('.totalamountclsval').html(total);
       $('#cptotalamt').val(total);
    }
</script>