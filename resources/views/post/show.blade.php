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
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $item->index +1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category }}</td>
                        <td>
                            @if ($item->status == 1)
                                <a href="{{ route('posts.approve_status', $item->id) }}" class="badge btn-success btn-sm">Approved</a>
                            @else
                                <a href="{{ route('posts.reject_status', $item->id) }}" class="badge btn-danger btn-sm">Reject</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

