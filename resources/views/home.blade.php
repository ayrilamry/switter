@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6" style="border-bottom: 1px solid grey;">
            <div class="timeline">
                <div class="row pb-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ route('profile.show', Auth::user()->username) }}" style="text-decoration: none; color: black; font-weight: bold">{{ Auth::user()->name }}</a>
                            <p style="font-size: 12px; color: grey;">{{ Auth::user()->username }}</p>
                        </div>
                        <div>
                            <a class="btn btn-secondary" href="{{ route('posts.create') }}">{{ __('Create new post')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    $(async function() {
        var html = '';
        var response = await getAllPosts();
        if(response.success) {
            var posts = response.posts;
            for(i = 0; i < posts.count; i++) {
                html += '<div class="row pt-3 pb-3" style="border-right: 1px solid grey; border-left: 1px solid grey; border-top: 1px solid grey;">';
                html += '<div class="d-flex justify-content-between pt-1">';
                html += '<div>';
                html += '<a href="{{ route('profile.show', ' + post[i].username + ') }}" style="text-decoration: none; color: black; font-weight: bold">' + post[i].name + '</a>';
                html += '<p style="font-size: 12px; color: grey;">' + post[i].username + '</p>';
                html += '</div>';
                html += '<div>';
                html += '<p style="font-size: 12px; color: grey;">{' + post[i].created_at + '</p>';
                html += '</div>';
                html += '</div>';
                html += '<div class="pt-3">' + post[i].caption + '</div>';
                html += '<div class="pt-3">';
                html += '<img src="/storage/' + post[i].image + '" class="w-100">';
                html += '</div>';
                html += '</div>';
            }
        }
    });
</script>

@endsection
