@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class=card-header>
                            <h4 class="text-uppercase" style="float: left">Add Product</h4>
                            <a href="{{route('products.create')}}" data-toggle="modal" data-target="#addProduct" style="float: right" class="btn btn-dark"><i class="fa fa-plus"></i>Add Product</a>
                        </div>
                        <div class="card-body">
                            <table class=table table-bordered table-left>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Stock</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $product)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $product->product_name }}</td>
                                        <td class="text-center">{{ $product->brand }}</td>
                                        <td class="text-center">{{ number_format($product->price, 2) }}</td>
                                        <td class="text-center">{{ $product->quantity }}</td>
                                        <td class="text-center">
                                            @if($product->alert_stock >= $product->quantity )
                                                <span class="badge badge-danger">Low Stock > {{$product->alert_stock}}</span>
                                            @else
                                                <span class="badge badge-success">{{$product->alert_stock}}</span>
                                            @endif
                                        </td>
                                        <!-- <td class="text-center">{{ $product->description }}</td> -->
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#"><i class="fa fa-eye"></i>View</a> 
                                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#editProduct{{$product->id}}"><i class="fa fa-edit"></i>Edit</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteProduct{{$product->id}}"><i class="fa fa-trash"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- modal edit product -->
                                    <div class="modal right fade" id="editProduct{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{route('products.update', $product->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                        <div class="form-group">
                                                            <label for="">Product Name</label>
                                                            <input type="text" name="product_name" id="" class="form-control" value="{{$product->product_name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Brand</label>
                                                            <input type="text" name="brand" id="" class="form-control" value="{{$product->brand}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Price</label>
                                                            <input type="number" name="price" id="" class="form-control" value="{{$product->price}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Quantity</label>
                                                            <input type="number" name="quantity" id="" class="form-control" value="{{$product->quantity}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Stock</label>
                                                            <input type="number" name="alert_stock" id="" class="form-control" value="{{$product->alert_stock}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Description</label>
                                                            <textarea name="description" id="" cols="30" rows="3" class="form-control">{{$product->description}}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary btn-block">Update Product</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal delete product -->
                                    <div class="modal right fade" id="deleteProduct{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">                                      
                                                    <form action="{{route('products.destroy', $product->id)}}" method="post">
                                                        @csrf 
                                                        @method('delete')
                                                            <p>Do you want to delete this {{ $product->product_name }} ?</p>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @endforeach
                                </tbody>
                                {{ $products->links() }}
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="card">
                    <div class=card-header> 
                        <h4 class="text-uppercase">Search Product</h4>
                    </div>
                        <div class="card-body">   
                            ............
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal adding new user -->
    <div class="modal right fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('products.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <input type="text" name="brand" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" name="quantity" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" name="alert_stock" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-block">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <style>
            .modal.right .modal-dialog{
                top: 0;  
                right: 0;
                margin-right: 20vh;
            }

            .modal.fade:not(.in).right .modal-dialog{
                -webkit-transform: translate(25%, 0. 0);
                transform: translate3d(25%, 0, 0);
            }
        </style>

@endsection