<article @php post_class() @endphp>
  <!-- image -->
  <div class="entry-image">
    <a href="{{ get_permalink() }}">
      @if (has_post_thumbnail())
        {!! the_post_thumbnail('medium') !!}
      @else
        <!-- <img src="@asset('images/logo.png')"> -->
      @endif
    </a>
  </div>
  <header class="entry-header" >
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>

  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
  <footer class="entry-footer">
    @include('partials/entry-footer')
  </footer>
</article>
