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
                            <table class="table" id="list-customers">
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
                                                <a href="{{ route('customer.delete', ['id' => $customer->id]) }}" data-customername="{{ $customer->name }}" id="btn-delete-customer">{{ __('Delete') }}</a>
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
<div class="modal" tabindex="-1" role="dialog" id="modal-default">
    <div class="modal-dialog" role="document">
        <form action="" id="form-modal-default">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-action-modal">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script
              src="https://code.jquery.com/jquery-3.5.1.min.js"
              integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
              crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#list-customers').on('click', '#btn-delete-customer', function(event) {
            event.preventDefault()
            var action = $(this).attr('href')
            var customerName = $(this).data('customername')
            var modal = $('#modal-default')
            var form = $('#form-modal-default')

            form.attr('action', action)
            form.attr('method', 'POST')

            modal.find('.modal-title').text('Delete Customer')
            modal.find('.modal-body').html(`Are you sure you want to remove <strong>${customerName}</strong>?`)
            modal.find('#btn-action-modal').attr('type', 'submit')
                .removeClass('btn-primary')
                .addClass('btn-warning')
                .text('Delete')

            modal.modal('show')
            
        })
    })
    
</script>
@endsection
