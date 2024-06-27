@extends('layouts.app')

@section('content')
  @include('partials.index-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class='blog-posts'>
    @while (have_posts()) @php the_post() @endphp
      @include('partials.content-'.get_post_type())
    @endwhile
  </div>

  <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>

  {!! get_the_posts_navigation() !!}
@endsection
