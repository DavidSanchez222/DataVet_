@extends('layouts.admin')

@section('admin-content')
    <div class="row p-2">
        @foreach ($configuration_items as $configuration_item)
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $configuration_item['name'] }} <span class="badge badge-secondary">{{ $configuration_item['quantity'] }}</span></h5>
                        <div class="text-right">
                            <a href="{{ $configuration_item['url'] }}" class="btn btn-sm btn-primary stretched-link"><i class="fas fa-sign-in-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
