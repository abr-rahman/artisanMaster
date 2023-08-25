@extends('layouts.master')
@section('pageTitle')
    {{ __('Post') }}
@endsection
@section('content')
    <div class="pd-20 card-box mb-30">
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
                                <a href="{{ route('posts.approve_status', $item->id) }}" class="badge btn-success btn-sm">Approved</a>
                            @else
                                <a href="{{ route('posts.reject_status', $item->id) }}" class="badge btn-danger btn-sm">Reject</a>
                            @endif
                        </td>
                        <td>
                            <div class="table-actions">
                                <a class="m-1"  href="{{ route('posts.edit', $item->id) }}" data-color="#265ed7" style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-edit2"></i></a>
                                <form action="{{ route('posts.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="m-1" data-color="#e95959" style="border:none; color: rgb(233, 89, 89);"><i class="icon-copy dw dw-delete-3"></i></button>
                                </form>
                                <a class="m-1"  href="{{ route('posts.show', $item->id) }}" data-color="#265ed7" style="color: rgb(38, 215, 91);"><i class="icon-copy dw dw-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

