@extends('layouts.app')
@section('content')


<section class="about_section layout_padding">
    <div id="post">
        <post-component :post-route="'{{ route('create_posts') }}'"></post-component>
    </div>
    <div id="list">
        <article-list></article-list>
    </div>
</section>
<script type="text/javascript" src="{{asset('./js/post.js')}}"></script>
<script type="text/javascript" src="{{asset('./js/list.js')}}"></script>
@endsection