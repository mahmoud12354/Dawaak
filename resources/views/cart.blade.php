@extends('layouts.sign')

@section('title',"cart")

<link rel="stylesheet" type="text/css" href="../css/card.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <th style="width:35%">Product</th>
            <th style="width:9%">price</th>
            <th style="width:0.1%">quantity</th>
            <th style="width:12%"class="text-center">subtotal</th>
            <th style="width:10%"></th>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="productimage/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ $details['price'] }}َُEGP</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }}EGP</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                        </td>   
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td  colspan="5" class="text-right"><h3 ><strong style="position: relative; right: 45%;">Total {{ $total }}EGP </strong><a href="{{ route('login') }}"  style="position: relative; right: 26%;" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a></h3>
    
                </td>
            </tr>   
            <tr>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>

                @endif
                <td colspan="5" class="text-right">
                    
                    <form action= "{{ route('upload_to_cart') }}" method="POST">
                        @csrf
                        
                        <div class="address">
                            
                            <label>City : </label>
                            <input type="text" name="city" class="city" required>
                            </br>
                            </br>
                            <label>Street Name : </label>
                            <input type="text" name="streetname" class="street" required>
                            </br>
                            </br>
                            <label>bluiding No : </label>
                            <input type="text" name="bluidNo" class="bluidNo" required>
                            </br>
                            </br>
                            <label>floor : </label>
                            <input type="text" name="floor"class="floor" required>
                            </br>
                            </br>
                            <label>Apartment : </label>
                            <input type="text" name="apartment"  class="apartment"required>
                            </br>
                            </br>
                            <label>land mark : </label>
                            <input type="text" name="landmark" class="landmark"required>
                            
                            @if(session('cart'))
                                @foreach(session('cart') as $item)
                                    <input type="hidden" name="product_names[]" value="{{ $item['product_name'] }}">
                                    <input type="hidden" name="quantity[]" value="{{ $item['quantity'] }}">
                                @endforeach
                            @endif
                            <input type="hidden" name="total" value="{{ $total }}">
                        </br>
                        <button  style="right: 87px; position: relative; background: #29d0d8;"  class="btn btn-success"><i class="fa fa-money"></i>&nbsp;&nbsp;Checkout</button>
                        </div>
                    </form>
                </td>
            </tr>
        </tfoot>
        <form>

        </form>
    </table>
    
@endsection
@section('scripts')
    <script type="text/javascript">
    $(".cart_update").change(function (e) {
        e.preventDefault();
    
        var ele = $(this);
    
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
    $(".cart_remove").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
