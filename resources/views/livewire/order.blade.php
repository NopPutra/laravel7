<!-- <div>
    {{ $orders }}
</div> -->


<div class="col-lg-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class=card-header>
                            <h4 class="text-uppercase" style="float: left">Order Product</h4>
                            <a href="" data-toggle="modal" data-target="#addProduct" style="float: right" class="btn btn-dark"><i class="fa fa-plus"></i>Add Product</a>
                        </div>
                        <form action="{{route('orders.store')}}" method= "post">
                            @csrf
                        <div class="card-body">
                            <div class="my-2">
                                {{ $product_code }}
                                <input type="text" name="" wire:model="product_code" id="" class="form-control" placeholder="Enter Product code">
                            </div>
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Dis (%)</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">
                                            <a href="#" class="btn btn-sm btn-success rounded-circle add_more"><i class="fa fa-plus"></i></a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreproduct">                                  
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select name="product_id[]" id="product_id" class="form-control product_id" style="width: 120px;">
                                                <option value="">Select Item</option>
                                                @foreach($products as $product)
                                                    <option data-price="{{$product->price}}" value="{{$product->id}}">{{$product->product_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                                        </td>
                                        <td>
                                            <input type="number" name="price[]" id="price" class="form-control price">
                                        </td>
                                        <td>
                                            <input type="number" name="discount[]" id="discount" class="form-control discount">
                                        </td>
                                        <td>
                                            <input type="number" name="total_amount[]" id="total_amount" class="form-control total_amount" style="width: 100px;">
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                               
                            </table> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class=card-header> 
                            <h4 class="text-uppercase">Total: <b class="total">0.00</b></h4>
                        </div>
                        <div class="card-body text-center"> 
                            <div class="btn-group">
                                <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-dark"><i class="fa fa-print"></i>Print</button>
                                <button type="button" onclick="" class="btn btn-primary"><i class="fa fa-history"></i>History</button>
                                <button type="button" onclick="" class="btn btn-danger"><i class="far fa-comment"></i>Report</button>
                            </div>  
                            <div class="panel">
                                <div class="row">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <label for="">Customer Name</label>
                                                <input type="text" name="customer_name" id="" class="form-control">
                                            </td>
                                            <td>
                                                <label for="">Customer Phone</label>
                                                <input type="number" name="customer_phone" id="" class="form-control">
                                            </td>
                                        </tr>
                                    </table>
                                    <td>Payment Method <br>
                                        <div class="">
                                            <span class="radio-item"> 
                                                <input type="radio" name="payment_method" id="payment_method" class="true" value="cash">
                                                <label for="payment_method"><i class="fa fa-money-bill text-success"></i>Cash</label>
                                            </span>
                                            <span class="radio-item">
                                                <input type="radio" name="payment_method" id="payment_method" class="true" value="bank transfer">
                                                <label for="payment_method"><i class="fa fa-university text-danger"></i>Bank Transfer</label>
                                            </span>
                                            <span class="radio-item">
                                                <input type="radio" name="payment_method" id="payment_method" class="true" value="credit Card">
                                                <label for="payment_method"><i class="fa fa-credit-card text-info"></i>Card</label>
                                            </span>
                                        </div>   
                                    </td><br>
                                    <td>Payment
                                        <input type="number" name="paid_amount" id="paid_amount" class="form-control">
                                    </td>
                                    <td>Returning Change
                                        <input type="number" name="balance" id="balance" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <button class="btn-primary btn-lg btn-block mt-3">Save</button>
                                    </td>
                                    <td>
                                        <button class="btn-danger btn-lg btn-block mt-2">Cancel</button>
                                    </td>
                                    <div class="text-center">
                                        <a href="#" class="text-danger"><i class="fa fa-sign-out-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>