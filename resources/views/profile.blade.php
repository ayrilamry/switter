@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6" style="border-right: 1px solid grey; border-left: 1px solid grey; border-bottom: 1px solid grey;">
            <div class="row pb-3">
                <div class="col-4">
                    <img src="/images/test.png" style="height: 50px;" class="rounded-circle pe-3 ps-3">
                    <a href="#" class="text-weight-bold" style="text-decoration: none;">{{ $user->username }}</a>
                </div>
                <div class="col-8">
                    <div class="pt-3">{{ $user->profile->title }}</div>
                    <div class="pt-3">{{ $user->profile->description }}</div>
                    <div class="pt-3"><a href="#">{{ $user->profile->url }}</a></div> 
                </div>
            </div>
            @foreach($user->posts as $post)
            <div class="row pt-3 pb-3" style="border-top: 1px solid grey;">
                <div class="pt-3">{{ $post->created_at }}</div>
                <div class="pt-3">{{ $post->caption }}</div>
                <div class="pt-3">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection
