@extends('layouts.master')
@section('pageTitle')
    {{ __('Post') }}
@endsection
@section('content')
    <div class="pd-20 card-box mb-30">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-6 col-md-1 col-form-label">Title</label>
                <div class="col-sm-6 col-md-5">
                    <input class="form-control" type="text" name="title" placeholder="Title">
                </div>
                <label class="col-sm-6 col-md-1 col-form-label">Category</label>
                <div class="col-sm-6 col-md-5">
                    <input class="form-control" name="category" type="text" placeholder="Category">
                </div> <br> <br><br>
                <label class="col-sm-6 col-md-1 col-form-label">Description</label>
                <div class="col-sm-6 col-md-5">
                    <textarea name="description" class="form-control" cols="10" rows="5"></textarea>
                </div>
                <label class="col-sm-6 col-md-1 col-form-label">Image</label>
                <div class="col-sm-6 col-md-5">
                    <input class="form-control" type="file" name="image"> <br> <br>
                    <button class="btn btn-sm btn-success float-end" type="submit">Submit</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>S/L</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $item->index +1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->image ?? 'Not Found' }}</td>
                        <td>
                            @if ($item->status == 1)
                                <button class="badge btn-warning btn-sm">Approved</button>
                            @else
                                <button class="badge btn-danger btn-sm">Pending</button>
                            @endif
                        </td>
                        <td>
                            <div class="table-actions">
                                @can('update')
                                    <a class="m-1"  href="{{ route('posts.edit', $item->id) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-edit2"></i></a>
                                @endcan
                                @can('delete')
                                    <form action="{{ route('posts.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="m-1" data-color="#e95959" style="border:none; color: rgb(233, 89, 89);"><i class="icon-copy dw dw-delete-3"></i></button>
                                    </form>
                                @endcan
                                @can('view')
                                    <a class="m-1"  href="{{ route('posts.show', $item->id) }}" data-color="#265ed7" style="color: rgb(38, 215, 91);"><i class="icon-copy dw dw-eye"></i></a>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

