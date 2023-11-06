<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    <div id="page" class="site">
      <a class="skip-link screen-reader-text" href="#content" title="skip link">Skip to content</a>
      @php do_action('get_header') @endphp
      @include('partials.header')
      
      <main class="main" id="site-content" role="main">
        @yield('content')
      </main>
      @if (App\display_sidebar())
      <aside class="sidebar">
        @include('partials.sidebar')
      </aside>
      @endif
 
      @php do_action('get_footer') @endphp
      @include('partials.footer')
    </div>
    @php wp_footer() @endphp
  </body>
</html>
