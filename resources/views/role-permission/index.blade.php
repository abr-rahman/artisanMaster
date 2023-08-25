@extends('layouts.master')
@section('pageTitle')
    {{ __('Permissions') }}
@endsection
@section('content')
    <div class="pd-20 card-box mb-30">
        <form method="POST" action="{{ route('role-permissions.store') }}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-5 col-md-1 col-form-label">Name</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="name" placeholder="Permission Name">
                </div>
                <label class="col-sm-7 col-md-2 col-form-label">Guard name</label>
                <div class="col-md-3">
                    <input class="form-control" name="slug" type="text" placeholder="Guard Name">

                </div>
                <div class="col-md-1"><button class="btn btn-success float-start" type="submit">Submit</button></div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>S/L</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $item)
                    <tr>
                        <td>{{ $item->index +1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

