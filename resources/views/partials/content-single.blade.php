<article @php post_class() @endphp>
 
  @php if ( is_singular( array('producten', 'projecten', 'vacatures', 'verzorgingsgebied' ) ) ) : @endphp

    <div class="backgroundintro"></div>
    
    <div class="container container-header">
    @php if ( is_singular('producten') ) : @endphp
      <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
     
    @php endif @endphp
    </div>
   
  @php else: @endphp

  <header class="page-header" >  
  
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  @php endif @endphp

  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>

<?php 
/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
function get_breadcrumb() {

  // soort
  $id = get_the_ID();
	$soort = '';
	$terms = get_the_terms( $id, 'soort' );
	if ( !empty( $terms ) ){
		// get the last term
		$term = end( $terms );
		$soort = $term->name;
  }
  
  //outside the loop:
  /**
   * $post = get_queried_object();
   * $postType = get_post_type_object(get_post_type($post));
   * if ($postType) {
  *    echo esc_html($postType->labels->singular_name);
  *  }
   */
  //posttype
  $postType = get_post_type_object(get_post_type());
  $type = '';
  if ($postType) {
      $type = esc_html($postType->labels->singular_name);
      $type_slug = esc_html($postType->name);
      //var_dump($postType);
  }
  $home = home_url();

  echo '<a class="home" href="'.$home.'" rel="nofollow"><i class="fal fa-home "></i></a>';
  
  if (is_category() || is_single()) {
      echo " ";
      
      if ($type!='') {
        echo "<a class='page' href='$home/$type_slug/' rel='nofollow'>$type</a>";
        echo "<span class='bullet'><i class='fas fa-circle fa-xs'></i></span>";
      }

      if ($soort!='') {
        echo "<a class='page' href='$home/$type_slug/?soort-product=$soort' rel='nofollow'>$soort</a>";
        echo "<span class='bullet'><i class='fas fa-circle fa-xs'></i></span>";
      }


      the_category(' &bull; ');
          if (is_single()) {
              the_title();
          }
  } elseif (is_page()) {
      echo "<span class='bullet'><i class='fas fa-circle fa-xs'></i></span>";
      echo the_title();
  } elseif (is_search()) {
      echo "<i class='fas fa-circle'></i>Search Results for... ";
      echo '"<em>';
      echo the_search_query();
      echo '</em>"';
  }
}
?>