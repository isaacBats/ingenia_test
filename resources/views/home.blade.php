@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Customers list') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Customers') }}</h4>
                            <a href="{{ route('customer.add') }}" class="btn btn-success" >{{ __('Create customer') }}</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Surnames') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Phone') }}</th>
                                        <th>{{ __('Credit card') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($customers as $customer)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <th>{{ $customer->name }}</th>
                                            <th>{{ $customer->last_name }}</th>
                                            <th>{{ $customer->email }}</th>
                                            <th>{{ $customer->phone }}</th>
                                            <th>{{ $customer->credit_card }}</th>
                                            <th>
                                                <a href="{{ route('customer.edit', ['id' => $customer->id]) }}">{{ __('Edit') }}</a>
                                                <a href="javascript:void(0)">{{ __('Delete') }}</a>
                                            </th>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                {{ __('No customers available') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
