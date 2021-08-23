    @if(!empty($cart_list))
        <?php $total=0;
         $cp=1;
        ?>
        @foreach($cart_list as $listvalue)
        <div class="cart_menu_body">
            <div class="row">
                <div class="col-4 mb-2">
                    <div class="crt-cnt-img">
                        <div class="injectStyles-sc-1jy9bcf-0 cxiGXZ"></div>
                        <img src="{{ url('/')}}/uploads/menu/{{$listvalue->image}}"/>
                    </div>
                </div>
                <div class="col-8 pl-0">
                    <div class="crt-cnt-descrptn">
                        <span class="crt-cnt-descrptn-ttl">{{$listvalue->menu_title}}</span>
                        <span class="crt-cnt-descrptn-txt">
                        {{$listvalue->menu_description}}
                        </span>
                        <div class="crt-cnt-descrptn-sz-crst">
                            <button class="btn btn-outline-danger" onclick="deletecp({{$cp}})"> <i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-item row pt-2">
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
                <?php 
                    $total += $listvalue->rate;
                ?>
                <div class="col-5 text-right item-total-price" >&nbsp;Rs <span id="total_price{{$cp}}">{{$listvalue->qty*$listvalue->rate}}</span></div>
                <input type="hidden" name="finalprice"   id="finalprice{{$cp}}" value="{{$listvalue->qty*$listvalue->rate}}">
                <?php  $cp++;?>
            </div>
        </div>
        @endforeach
         <input type="hidden" id="cp" value="{{$cp-1}}">
    @else
    <div class="empty__cart d-none">
        <div class="text-center">
            <img src="{{url('')}}/assets/images/food-serving.png" style="max-width: 50%;display: ;" />
            <h4 class="mt-4 mb-0">Your Cart is Empty</h4>
            <p>Please add some items from the menu.</p> 
        </div>
    </div>
    @endif
    
     <div class="cartFot"> 
        <div class="suggestionNots">
           <div class="input-group">
              <input type="text" class="form-control" placeholder="Apply Voucher Code" id="vcode" name="vccode">
              <div class="input-group-append">
                <span class="input-group-text"><button class="btn">Apply</button></span>
              </div>
            </div>
        </div>
            
        <div class="d-flex justify-content-between align-items-center waves-effect waves-light" style="line-height: 1;">
            <div class="order-1 py-1 cart-icon-wrap">
               <span class="d-inline-block pl-1"> 
                <span class="colorfontclass price-subtotal"> Subtotal : Rs 
                    <span class="totalamountclsval">{{$total}}</span>
                    <input type="hidden" id="cptotalamt" name="cptotalamt" value="{{$total}}">
                </span>
                <p class="mb-0 py-1 mt-1" style="font-size: 11px;">Extra charges may apply</p>
            </span>
            </div>
            <span class="order-2 checkout--btn--div colorcodeclass">
               <a href="">  Checkout  </a>
            </span>
        </div>
    </div>