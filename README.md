## Simplify Your Wordpress Theme Development

### Add Theme Support To Your Theme.
```php
asmthry_theme_support();
======== OR ============
asmthry_theme_support( array( 'title-tag' ) );
```
### Create custom post type using asmthry_create_cpt()
```php
asmthry_create_cpt( 'Blog' );
```
#### Filter post arguments and labels
If your post name is Blog, then the post slug will be blog.
If your post name is My Blog, then the post slug will be my_blog.
```php
function filter_post_arguments_values( $post_name, $post_slug ) {
	$array['supports'] = array( 'title', 'editor', 'thumbnail' );
	return $array;
}
add_filter( 'asmthry_{Post Slug}_post_arguments', 'filter_post_arguments_values', 10, 2 );

function filter_post_labels_values( $post_name, $post_slug ) {
	$array['name'] = __( 'My Blog', 'ASMTHRY' );
	return $array;
}
add_filter( 'asmthry_{Post Slug}_post_labels', 'filter_post_labels_values', 10, 2 );
```
### Create Taxonomies using asmthry_create_taxonomy()
```php
asmthry_create_taxonomy( 'Category', 'Blog' );
```
#### You can filter taxonomy arguments and labels.
```php
function change_taxonomy_labels_values( $taxonomy_name, $taxonomy_slug ) {
  $array['name'] = 'Category';
  return $array;
}
add_filter( 'asmthry_my_taxonomy_taxonomy_labels', 'change_taxonomy_labels_values', 10, 2 );
function change_taxonomy_arguments_values( $taxonomy_name, $taxonomy_slug ) {
  $array['show_ui'] = false;
  return $array;
}
add_filter( 'asmthry_my_taxonomy_taxonomy_arguments', 'change_taxonomy_arguments_values', 10, 2 );
```
### Enqueue Styles Using asmthry_register_style() and asmthry_enqueue_style()
```php
$styles = asmthry_register_style(
	array(
		'first-style'  => array(
			'path'       => 'assets/css/style.css',
            'version'    =>'1.0.5',
            'dependance' =>array(),
            'media'      =>'all',
            'page'       =>'home'
		),
		'second-style' => array(
			'url' => 'http://localhost/assets/css/page2.css',
			'page' => '2',
		),
	)
);
asmthry_enqueue_style( $styles );
```
### Enqueue Scripts Using asmthry_register_script() and asmthry_enqueue_script()
```php
$script = asmthry_register_script(
	array(
		'first-script'  => array(
			'path'       => 'assets/js/script.js',
			'version'    => '1.0.5',
			'dependance' => array(),
			'footer'     => true,
			'page'       => 'home-page',
		),
		'second-script' => array(
			'url'  => 'http://localhost/assets/js/page2.js',
			'page' => '2',
		),
	)
);
asmthry_enqueue_script( $script );
```
### Create customizer
```php
asmthry_create_customizer(
	array(
		'Contact Details'   => array(
			'Email' => array(
				'type' => 'text',
			),
			'Address' => array(
				'type' => 'textarea',
			),
		),
		'Settings' => array(),
	)
);
```
#### Use asmthry_get_customizer() to retrieve customizer value
```php
echo asmthry_get_customizer( 'Address' );
```