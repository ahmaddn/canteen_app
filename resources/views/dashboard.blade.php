@extends('layouts.app')
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Layout</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Blank</a></li>
            </ol>
        </div>

        <div class="row">
            @forelse ($products as $prod)
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <a href="{{ route('products.detail', $prod->id) }}">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid"
                                            src="{{ asset('storage/' . $prod->attachments->first()->name_img) }}"
                                            alt="">

                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>{{ $prod->name }}</h4>
                                        <span class="price">Rp. {{ $prod->price }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
