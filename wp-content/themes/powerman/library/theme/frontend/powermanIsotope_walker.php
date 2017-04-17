<?php 


	class PowermanIsotopeCategoryWalker extends Walker_Category {
		 public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
	            $cat_name = apply_filters(
	                    'list_cats',
	                esc_attr( $category->name ),
	                    $category
	            );
	
	            $link = '<a href="#" data-filter=".'.esc_attr($category->slug).'"';
	            $class = 'btn font-additional font-weight-normal text-uppercase hover-focus-bg';
	            $link .= 'class="' . $class . '"';
	            if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
	                    /**
	                 * Filter the category description for display.
	                     *
	                     * @since 1.2.0
	                 *
	                     * @param string $description Category description.
	                     * @param object $category    Category object.
	                 */
	                $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
	        }
	
	        $link .= '>';
	        $link .= $cat_name . '</a>';
	        if ( 'list' == $args['style'] ) {
	                $output .= "\t<li";
	                $class = 'cat-item cat-item-' . $category->term_id;
	                if ( ! empty( $args['current_category'] ) ) {
	                        $_current_category = get_term( $args['current_category'], $category->taxonomy );
	                        if ( $category->term_id == $args['current_category'] ) {
	                                $class .=  ' current-cat';
	                        } elseif ( $category->term_id == $_current_category->parent ) {
	                                $class .=  ' current-cat-parent';
	                        }
	                }
	                $output .=  ' class="' . $class . '"';
	                $output .= ">$link\n";
	        } else {
	                $output .= "\t$link<br />\n";
	        }
		}
	}  
?>