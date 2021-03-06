<?php
if ( ! crimson_rose_is_woocommerce_activated() ) {
	return;
}

/**
 * Content Widget: WooCommerce Products
 *
 * @package WordPress
 * @subpackage Crimson_Rose
 * @since 1.01
 * @author Chris Baldelomar <chris@webplantmedia.com>
 * @copyright Copyright (c) 2018, Chris Baldelomar
 * @link https://webplantmedia.com/product/crimson-rose-wordpress-theme/
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Class: WooCommerce Products
 *
 * @since Crimson_Rose 1.01
 *
 * @see Crimson_Rose_Widget
 */
class Crimson_Rose_Content_Widget_WooCommerce_Products extends Crimson_Rose_Widget {
	/**
	 * Call image size from any member function.
	 *
	 * @since Crimson_Rose 1.01
	 *
	 * @var string
	 */
	private $image_size = 'woocommerce_single';

	/**
	 * __construct
	 *
	 * @since Crimson_Rose 1.01
	 *
	 * @return void
	 */
	public function __construct() {
		$this->widget_id          = 'crimson-rose-content-widget-woocommerce-products';
		$this->widget_description = esc_html__( 'Displays WooCommerce products on your widgetized page.', 'crimson-rose' );
		$this->widget_name        = esc_html__( 'Crimson Rose: WooCommerce Products', 'crimson-rose' );
		$this->settings           = array(
			'title'          => array(
				'type'     => 'text',
				'std'      => esc_html__( 'NEW PRODUCTS', 'crimson-rose' ),
				'label'    => esc_html__( 'Title:', 'crimson-rose' ),
				'sanitize' => 'text',
			),
			'limit'          => array(
				'type'        => 'number',
				'std'         => 4,
				'step'        => 1,
				'min'         => -1,
				'label'       => esc_html__( 'Limit:', 'crimson-rose' ),
				'description' => esc_html__( 'The number of products to display. Defaults to display all (-1)', 'crimson-rose' ),
				'sanitize'    => 'number',
			),
			'columns'        => array(
				'type'     => 'select',
				'std'      => '4',
				'label'    => esc_html__( 'Columns:', 'crimson-rose' ),
				'options'  => array(
					'2' => esc_html__( '2', 'crimson-rose' ),
					'3' => esc_html__( '3', 'crimson-rose' ),
					'4' => esc_html__( '4', 'crimson-rose' ),
					'5' => esc_html__( '5', 'crimson-rose' ),
					'6' => esc_html__( '6', 'crimson-rose' ),
				),
				'sanitize' => 'text',
			),
			'image_size'     => array(
				'type'     => 'select',
				'std'      => 'woocommerce_single',
				'label'    => esc_html__( 'Image Size:', 'crimson-rose' ),
				'options'  => array(
					'woocommerce_thumbnail' => esc_html__( 'Thumbnail', 'crimson-rose' ),
					'woocommerce_single'    => esc_html__( 'Main Image', 'crimson-rose' ),
				),
				'sanitize' => 'woocommerce_image_sizes',
			),
			'orderby'        => array(
				'type'     => 'select',
				'std'      => 'date',
				'label'    => esc_html__( 'Order By:', 'crimson-rose' ),
				'options'  => array(
					'title'      => esc_html__( 'Title', 'crimson-rose' ),
					'date'       => esc_html__( 'Date', 'crimson-rose' ),
					'id'         => esc_html__( 'ID', 'crimson-rose' ),
					'menu_order' => esc_html__( 'Menu Order', 'crimson-rose' ),
					'popularity' => esc_html__( 'Popularity', 'crimson-rose' ),
					'rand'       => esc_html__( 'Random', 'crimson-rose' ),
					'rating'     => esc_html__( 'Rating', 'crimson-rose' ),
				),
				'sanitize' => 'text',
			),
			'post_ids'       => array(
				'type'      => 'post',
				'post_type' => 'product',
				'std'       => '',
				'label'     => esc_html__( 'Post ID\'s:', 'crimson-rose' ),
				'sanitize'  => 'post_ids',
			),
			'skus'           => array(
				'type'        => 'text',
				'std'         => '',
				'label'       => esc_html__( 'Skus:', 'crimson-rose' ),
				'description' => esc_html__( 'Comma separated list of product SKUs.', 'crimson-rose' ),
				'sanitize'    => 'ids',
			),
			'category'       => array(
				'type'        => 'text',
				'std'         => '',
				'label'       => esc_html__( 'Category:', 'crimson-rose' ),
				'description' => esc_html__( 'Comma separated list of category slugs.', 'crimson-rose' ),
				'sanitize'    => 'slugs',
			),
			'order'          => array(
				'type'     => 'select',
				'std'      => 'desc',
				'label'    => esc_html__( 'Order:', 'crimson-rose' ),
				'options'  => array(
					'asc'  => esc_html__( 'ASC', 'crimson-rose' ),
					'desc' => esc_html__( 'DESC', 'crimson-rose' ),
				),
				'sanitize' => 'text',
			),
			'on_sale'        => array(
				'type'        => 'checkbox',
				'std'         => 0,
				'label'       => esc_html__( 'On Sale:', 'crimson-rose' ),
				'description' => esc_html__( 'Retrieve on sale products. Not to be used in conjunction with best_selling or top_rated.', 'crimson-rose' ),
				'sanitize'    => 'checkbox',
			),
			'best_selling'   => array(
				'type'        => 'checkbox',
				'std'         => 0,
				'label'       => esc_html__( 'Best Selling:', 'crimson-rose' ),
				'description' => esc_html__( 'Retrieve best selling products. Not to be used in conjunction with on_sale or top_rated.', 'crimson-rose' ),
				'sanitize'    => 'checkbox',
			),
			'top_rated'      => array(
				'type'        => 'checkbox',
				'std'         => 0,
				'label'       => esc_html__( 'Top Rated:', 'crimson-rose' ),
				'description' => esc_html__( 'Retrieve top rated products. Not to be used in conjunction with on_sale or best_selling.', 'crimson-rose' ),
				'sanitize'    => 'checkbox',
			),
			'featured'       => array(
				'type'        => 'checkbox',
				'std'         => 0,
				'label'       => esc_html__( 'Featured:', 'crimson-rose' ),
				'description' => esc_html__( 'Products that are marked as Featured Products.', 'crimson-rose' ),
				'sanitize'    => 'checkbox',
			),
			'button_text'    => array(
				'type'     => 'text',
				'std'      => '',
				'label'    => esc_html__( 'Button Text:', 'crimson-rose' ),
				'sanitize' => 'text',
			),
			'button_link'    => array(
				'type'     => 'text',
				'std'      => '',
				'label'    => esc_html__( 'Button Link:', 'crimson-rose' ),
				'sanitize' => 'url',
			),
			'button_style'   => array(
				'type'     => 'select',
				'std'      => 'button-2',
				'label'    => esc_html__( 'Button Style:', 'crimson-rose' ),
				'options'  => array(
					'default'  => esc_html__( 'Default Button', 'crimson-rose' ),
					'button-1' => esc_html__( 'Image Button 1', 'crimson-rose' ),
					'button-2' => esc_html__( 'Image Button 2', 'crimson-rose' ),
				),
				'sanitize' => 'text',
			),
			'padding_top'    => array(
				'type'     => 'number',
				'std'      => 40,
				'step'     => 1,
				'min'      => 0,
				'label'    => esc_html__( 'Top padding of widget:', 'crimson-rose' ),
				'sanitize' => 'number',
			),
			'padding_bottom' => array(
				'type'     => 'number',
				'std'      => 40,
				'step'     => 1,
				'min'      => 0,
				'label'    => esc_html__( 'Bottom padding of widget:', 'crimson-rose' ),
				'sanitize' => 'number',
			),
			'margin_bottom'  => array(
				'type'     => 'number',
				'std'      => 40,
				'step'     => 1,
				'min'      => 0,
				'label'    => esc_html__( 'Bottom margin of widget:', 'crimson-rose' ),
				'sanitize' => 'number',
			),
		);

		parent::__construct();
	}

	/**
	 * Widget Function
	 *
	 * @since Crimson_Rose 1.01
	 *
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	public function widget( $args, $instance ) {
		$o = $this->sanitize( $instance );

		$style             = array();
		$testimonial_style = array();
		$classes[]         = 'content-woocommerce-products';

		$this->image_size = $o['image_size'];

		if ( ! empty( $o['margin_bottom'] ) ) {
			$style[] = 'margin-bottom:' . $o['margin_bottom'] . 'px;';
		}

		if ( ! empty( $o['padding_top'] ) ) {
			$style[] = 'padding-top:' . $o['padding_top'] . 'px;';
		}

		if ( ! empty( $o['padding_bottom'] ) ) {
			$style[] = 'padding-bottom:' . $o['padding_bottom'] . 'px;';
		}
		if ( ! empty( $o['limit'] ) ) {
			$attr[] = 'limit="' . $o['limit'] . '"';
		}
		if ( ! empty( $o['columns'] ) ) {
			$attr[] = 'columns="' . $o['columns'] . '"';
		}
		if ( ! empty( $o['orderby'] ) ) {
			$attr[] = 'orderby="' . $o['orderby'] . '"';
		}
		if ( ! empty( $o['post_ids'] ) ) {
			$attr[] = 'ids="' . $o['post_ids'] . '"';
		}
		if ( ! empty( $o['skus'] ) ) {
			$attr[] = 'skus="' . $o['skus'] . '"';
		}
		if ( ! empty( $o['category'] ) ) {
			$attr[] = 'category="' . $o['category'] . '"';
		}
		if ( ! empty( $o['order'] ) ) {
			$attr[] = 'order="' . $o['order'] . '"';
		}
		if ( ! empty( $o['on_sale'] ) ) {
			$attr[] = 'on_sale="1"';
		}
		if ( ! empty( $o['best_selling'] ) ) {
			$attr[] = 'best_selling="1"';
		}
		if ( ! empty( $o['top_rated'] ) ) {
			$attr[] = 'top_rated="1"';
		}
		if ( ! empty( $o['featured'] ) ) {
			$attr[] = 'visibility="featured"';
		}

		$shortcode = '[products]';
		if ( ! empty( $attr ) ) {
			$shortcode = '[products ' . implode( ' ', $attr ) . ']';
		}
		?>

		<?php echo $args['before_widget']; /* WPCS: XSS OK. HTML output. */ ?>

			<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" style="<?php echo esc_attr( implode( '', $style ) ); ?>">
				<?php if ( ! empty( $o['title'] ) ) : ?>
					<?php echo $args['before_title'] . esc_html( $o['title'] ) . $args['after_title']; /* WPCS: XSS OK. HTML output. */ ?>
				<?php endif; ?>

				<?php add_filter( 'single_product_archive_thumbnail_size', array( $this, 'single_product_archive_thumbnail_size' ), 10, 1 ); ?>

				<?php echo do_shortcode( $shortcode ); ?>

				<?php remove_filter( 'single_product_archive_thumbnail_size', array( $this, 'single_product_archive_thumbnail_size' ), 10 ); ?>

				<?php if ( '' !== $o['button_text'] ) : ?>
					<?php
					switch ( $o['button_style'] ) {
						case 'button-1':
							$button_class = ' fancy-button';
							break;
						case 'button-2':
							$button_class = ' fancy2-button';
							break;
						default:
							$button_class = '';
							break;
					}
					?>
					<p class="button-wrapper">
						<a class="button<?php echo esc_attr( $button_class ); ?>" href="<?php echo esc_url( $o['button_link'] ); ?>"><?php echo $o['button_text']; /* WPCS: XSS OK. HTML output. */ ?></a>
					</p>
				<?php endif; ?>

			</div><!-- .content-woocommerce-products -->

		<?php echo $args['after_widget']; /* WPCS: XSS OK. HTML output. */ ?>
		<?php
	}

	/**
	 * Return WooCommerce image size.
	 *
	 * @since Crimson_Rose 1.01
	 *
	 * @param string $size
	 * @return string
	 */
	public function single_product_archive_thumbnail_size( $size ) {
		return $this->image_size;
	}

	/**
	 * Registers the widget with the WordPress Widget API.
	 *
	 * @since Crimson_Rose 1.01
	 *
	 * @return void
	 */
	public static function register() {
		register_widget( __CLASS__ );
	}
}

add_action( 'widgets_init', array( 'Crimson_Rose_Content_Widget_WooCommerce_Products', 'register' ) );
