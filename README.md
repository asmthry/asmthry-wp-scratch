## Simplify Your Wordpress Theme Development

### Add Theme Support To Your Theme.
```php
asmthry_theme_support();
======== OR ============
asmthry_theme_support( array( 'title-tag' ) );
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