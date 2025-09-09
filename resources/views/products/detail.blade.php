@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Products</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Detail</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

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
                                                <span class="item"> In stock ( {{ $product->stock }} ) <i
                                                        class="fa fa-shopping-basket"></i></span>
                                            @else
                                                <span class="item"> Out of stock <i class="fa fa-ban"></i></span>
                                            @endif
                                        </p>
                                        <p>Product code: <span class="item">{{ $product->sku }}</span> </p>
                                        <p>Brand: <span class="item">{{ $product->brand }}</span></p>
                                        <p>Product tags:&nbsp;&nbsp;
                                            <span class="badge badge-success light">{{ $product->category->name }}</span>
                                        </p>
                                        <p class="text-content">Description: <span
                                                class="item">{{ $product->description }}</span></p>
                                        <div class="d-flex align-items-end flex-wrap mt-4">
                                            <div class="shopping-cart  mb-2 me-3">
                                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalCenter"><i
                                                        class="fa fa-shopping-basket me-2"></i>Buy</button>
                                                <div class="modal fade" id="exampleModalCenter">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Konfirmasi Pembayaran</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('checkout.order', $product->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">


                                                                    <!-- Dropdown Metode Pembayaran -->
                                                                    <div class="mb-3">
                                                                        <label for="payment-method"
                                                                            class="form-label">Metode
                                                                            Pembayaran</label>
                                                                        <select name="payment" class="form-select">
                                                                            <option value="" selected disabled>Pilih
                                                                                metode pembayaran</option>
                                                                            <option value="transfer">Transfer Bank</option>
                                                                            <option value="qris">E-Wallet (OVO, Dana,
                                                                                GoPay)
                                                                            </option>
                                                                            <option value="cash">Cash
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <!--Quantity start-->
                                                                    <div class="col-2 px-0 mb-2 me-3">
                                                                        <label class="form-label">Qty</label>
                                                                        <input type="number" name="qty"
                                                                            class="form-control input-btn input-number"
                                                                            value="1">
                                                                    </div>
                                                                    <!--Quantity End-->
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
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
            </div>
        </div>
    </div>
@endsection
