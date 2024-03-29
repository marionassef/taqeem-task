@extends('dashboard.layouts.master')
@section('content')
{{-- Error handling --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (isset($errors))
    @foreach($errors->all()  as $error)
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
    @endif
{{-- End Error handling --}}

    <div class="box-typical box-typical-padding">
            <a href="" class="btn btn-rounded btn-inline btn-primary-outline">Add New</a>
        <table id="dTable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Seller</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($items as $item)
            <tr>
                <td class="v-align-middle">{{$item->id}}</td>
                <td class="v-align-middle">{{$item->name}}</td>
                <td class="v-align-middle">{{$item->price}}</td>
                <td class="v-align-middle">{{$item->seller}}</td>
                <td class="v-align-middle">
                    <div class="action-bar pull-right">
                        <a href=""
                           class="btn btn-warning btn-circle waves-effect waves-circle waves-float">
                            <i class="font-icon font-icon-eye"></i></a>
                        <a href=""
                           class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                            <i class="font-icon font-icon-pencil"></i></a>
                        <span onclick="deleteThisItem(this)"
                              data-link=""
                              class="btn bg-deep-purple btn-circle waves-effect waves-circle waves-float">
                                                <i class="font-icon font-icon-trash"></i></span>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="41" class="text-center">No records were found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@stop
