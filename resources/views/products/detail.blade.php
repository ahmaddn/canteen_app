@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Layout</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Blank</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="first">
                                        <img class="img-fluid"
                                            src="{{ asset('storage/' . $product->attachments->first()->name_img) }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        <h4>{{ $product->name }}</h4>
                                        <div class="d-table mb-2">
                                            <p class="price float-start d-block">Rp.
                                                {{ number_format($product->price, 0, ',', '.') }}</p>
                                        </div>
                                        <p>Availability:
                                            @if ($product->is_available == true)
                                                <span class="item"> In stock <i class="fa fa-shopping-basket"></i></span>
                                            @else
                                                <span class="item"> Out of stock <i class="fa fa-ban"></i></span>
                                            @endif
                                        </p>
                                        <p>Product code: <span class="item">{{ $product->sku }}</span> </p>
                                        <p>Brand: <span class="item">{{ $product->brand }}</span></p>
                                        <p>Product tags:&nbsp;&nbsp;
                                            <span class="badge badge-success light">{{ $product->category->name }}</span>
                                        </p>
                                        <p class="text-content">{{ $product->description }}</p>
                                        <div class="d-flex align-items-end flex-wrap mt-4">
                                            <!--Quantity start-->
                                            <div class="col-2 px-0  mb-2 me-3">
                                                <input type="number" name="num"
                                                    class="form-control input-btn input-number" value="1">
                                            </div>
                                            <!--Quanatity End-->
                                            <div class="shopping-cart  mb-2 me-3">
                                                <a class="btn btn-primary" href="javascript:void();"><i
                                                        class="fa fa-shopping-basket me-2"></i>Add
                                                    to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
