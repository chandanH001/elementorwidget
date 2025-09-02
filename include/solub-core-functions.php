 <?php
        // get all post 
        function tp_all_post($post_type_name = 'post'){
            $posts = get_posts( array(
                'post_type' => $post_type_name,
                'orderby' => 'name',
                'order'   => 'ASC',
                'posts_per_page'   => -1,
            ) );
            $posts_list = [];
            foreach($posts as $post){
                $posts_list[$post->ID] = $post->post_title;
            }
            return $posts_list;
        }


 /**
     * Sanitize SVG markup for front-end display.
     *
     * @param  string $svg SVG markup to sanitize.
     * @return string       Sanitized markup.
     */
    function solub_core_kses($custom_html_tags = '')
    {
        $allowed_html = [
            'svg'        => [
                'class'           => true,
                'aria-hidden'     => true,
                'aria-labelledby' => true,
                'role'            => true,
                'xmlns'           => true,
                'width'           => true,
                'height'          => true,
                'viewbox'         => true, // <= Must be lower case!
            ],
            'path'       => [
                'd'               => true,
                'fill'            => true,
                'stroke'          => true,
                'stroke-width'    => true,
                'stroke-linecap'  => true,
                'stroke-linejoin' => true,
                'opacity'         => true,
            ],
            'a'          => [
                'class'  => [],
                'href'   => [],
                'title'  => [],
                'target' => [],
                'rel'    => [],
            ],
            'b'          => [],
            'blockquote' => [
                'cite' => [],
            ],
            'cite'       => [
                'title' => [],
            ],
            'code'       => [],
            'del'        => [
                'datetime' => [],
                'title'    => [],
            ],
            'dd'         => [],
            'div'        => [
                'class' => [],
                'title' => [],
                'style' => [],
            ],
            'dl'         => [],
            'dt'         => [],
            'em'         => [],
            'h1'         => [],
            'h2'         => [],
            'h3'         => [],
            'h4'         => [],
            'h5'         => [],
            'h6'         => [],
            'i'          => [
                'class' => [],
            ],
            'img'        => [
                'alt'    => [],
                'class'  => [],
                'height' => [],
                'src'    => [],
                'width'  => [],
            ],
            'li'         => [
                'class' => [],
            ],
            'ol'         => [
                'class' => [],
            ],
            'p'          => [
                'class' => [],
            ],
            'q'          => [
                'cite'  => [],
                'title' => [],
            ],
            'q'          => [
                'cite'  => [],
                'title' => [],
            ],
            'span'       => [
                'class' => [],
                'title' => [],
                'style' => [],
                'id'    => [],
            ],
            'iframe'     => [
                'width'       => [],
                'height'      => [],
                'scrolling'   => [],
                'frameborder' => [],
                'allow'       => [],
                'src'         => [],
            ],
            'strike'     => [],
            'br'         => [],
            'strong'     => [],
        ];

    return wp_kses($custom_html_tags, $allowed_html);
}