<?php 
 if(!isset($_SESSION['sessionid']))$_SESSION['sessionid']= Session::getId();
?>
@extends('layouts.master')
@section('content')
<div class="page-content-main ">
<div class="overlay"></div>
  <div class="my-3 text-center pt-4">
    <div class="form-check-inline">
      <label class="form-check-label" style="font-size: 18px;">
        <input type="radio" class="form-check-input" name="optradio"> Delivery
      </label>
    </div>
    <div class="form-check-inline" style="font-size: 18px;">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optradio"> Takeaway
      </label>
    </div>
</div> 
<div class="container-fluid content-main page-content-list contentmainload readOnlyMenu">
<div class="row">
<!-- category section ---->
<div class="col col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 col-left-sidebar">    
    <nav class="left_category_nav" id="category_scrollspy" style="height: 581px;">
        <ul class="category_scrollspy-ul">
            @foreach($category as $cat_value)
            <li class="nav-item">
                <a data-scroll="" class="nav-link parentcat" href="#{{strtoupper($cat_value['name'])}}">
                <p>{{strtoupper($cat_value['name'])}}</p></a>
            </li>
            @endforeach
        </ul>
    </nav>
</div>

<!-- category section end---->
 <div class="col col-12 col-sm-12 col-md-9 col-lg-9 col-xl-10 col-right-list">
   <!-- coupon slider section end---->
    <div class="item-list-main mt-5s">
        <!-- main item section start -->
        <input type="hidden" name="session_id" id="session_id" value="{{$_SESSION['sessionid']}}">
        <?php $i=1;?>         
        @foreach($menu_data as $key => $menu_value)
         @if(!empty($menu_value))   
        <div class="category-sec" id="{{strtoupper($key)}}">
                
            <h2 class="category-title"><span>{{strtoupper($key)}} </span></h2>
            <ul class="grid-container align-content-center">
                 @foreach($menu_value as $mvalue) 
                <li class="foodmenu grid-item bg-white z-depth-1 IT_1235587613"> 
                    <div class="img-wrap" style="background-image: url('<?php  echo url('/')."/uploads/menu/".$mvalue['image'];?>');"></div>
                        <div class="content-detail-wrap">
                            <div class="d-flex justify-content-between">
                                <h4 class="veg-egg order-1">{{$mvalue['menu_title']}}</h4>
                            </div>
                            <div class="menu-item-text-wrap">
                                <p class="menu-item-text mb-0 more">  </p>
                            </div>
                            <div class="nutridock-icon over-xs-limit">
                                <div class="meal-icon">
                                 <a href="" class="" data-toggle="tooltip" title="High Protein">  
                                  <img src="{{url('')}}/assets/images/High-Protein.png" alt="High Protein"> 
                                 </a> 
                                 <a href="" class=""  data-toggle="tooltip" title="Gluten Free">  
                                  <img src="{{url('')}}/assets/images/Gluten-Free.png" alt="Gluten Free"> 
                                 </a> 
                                 <a href="" class="" data-toggle="tooltip" title="Indian Super Food">  
                                  <img src="{{url('')}}/assets/images/Indian-Super-Food.png" alt="Indian Super Food"> 
                                 </a>  
                                </div>
                             </div>

                            <div class="d-flex menu-item-price-wrap justify-content-between mt-auto">
                                <div class="foodpric-text order-1 d-flex">
                                    <span class="foodpric display-block mr-1">
                                        Rs {{$mvalue['menu_price']}}</span>
                                    <span class="strikethrough-discount colorfontclass">
                                </span>
                                </div>
                                <div class="menu-item-btn-wrap order-2 menu-item-btn-error">
                                    <input type="hidden" name="price" id="price{{$i}}" value="{{$mvalue['menu_price']}}">
                                    <input type="hidden" name="menu_id" id="menu_id{{$i}}" value="{{$mvalue['id']}}">
                                    <a href="#" class="btn btn-success" onclick="addtocart({{$i}})">ADD TO CART</a>
                                </div>                                                   
                            </div> 
                            
                        <div class="clear"></div>
                    </div>
                </li>
                <?php $i++;?>
                @endforeach
            </ul>
        </div>
        @endif
        @endforeach
    </div>
 </div>
</div>
@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{url('/admin_css_js')}}/css_and_js/admin/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
    loadCart();
    caltotal();
    });
    function addtocart(num)
    {    
        var menu_id    = $('#menu_id'+num).val();
        var price      = $('#price'+num).val();
        var session_id = $('#session_id').val();
        var login_id   = $('#login_id').val();
        $.post("{{url('/')}}/addtocart",
            {
                menu_id    : menu_id,
                price      : price,
                session_id : session_id,
                login_id   : login_id
            },
            function(data){
                
                //alert(data);
                if(data==='success'){
                    swal({ title: "Menu added to cart",icon: "success"});
                    loadCart();
                }
                if(data==='duplicate')
                {
                    swal({ title: "Duplicate dish selected.",text:"Dish already added to cart",icon: "warning"}); 
                }
            }
        );
        return false;
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
                /*$('#cartamount').html(data[1]);*/
            }
        );
    } 

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
                swal({ title: "Deleted.",text:"Dish deleted on cart",icon: "success"}); 
                loadCart();
            }
            );
         }

        });

    }

    function minusqty(num)
    {
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
            $('#qty_number'+num).val(fqty);
            $('#total_price'+num).html(tprice);
            $('#finalprice'+num).val(tprice);
        }
         caltotal();
    }

    function plusqty(num)
    {
        var  menu_id = $('#cpmenu_id'+num).val();
        var  price   = $('#cpprice'+num).val();
        var  qty     = $('#qty_number'+num).val();
        var  fqty    = parseInt(qty)+1;
        var  tprice  = price * fqty; 
      // alert(tprice);
            $('#qty_number'+num).val(fqty);
            $('#total_price'+num).html(tprice);
            $('#finalprice'+num).val(tprice);
         caltotal();
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