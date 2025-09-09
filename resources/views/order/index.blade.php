@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Index</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>Customer</th>
                                        <th>Qty</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $payment->product->name }}</td>
                                            <td>{{ $payment->user->name }}</td>
                                            <td>{{ $payment->qty }}</td>
                                            <td>{{ $payment->discount ?? '-' }}</td>
                                            <td>Rp. {{ number_format($payment->total, 0, ',', '.') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                                        data-bs-toggle="modal" data-bs-target="#modalDeleteProducts"><i
                                                            class="fa fa-trash"></i></button>
                                                    <div class="modal fade" id="modalDeleteProducts">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete Confirmation</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this
                                                                        <strong>( {{ $payment->product->name }} )</strong> ?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary light"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <form action="{{ route('order.delete', $payment->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No products found</td>
                                        </tr>
                                    @endforelse

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
