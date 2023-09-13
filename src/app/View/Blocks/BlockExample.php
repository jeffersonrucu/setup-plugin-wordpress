<?php

namespace App\View\Blocks;

use App\Providers\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class BlockExample
{
    public $name;
    public $slug;
    public $description;
    public $category_title;
    public $category_slug;
    public $icon;
    public $keywords;
    public $post_types;
    public $mode;
    public $view;
    public $supports;
    public $example;

    /**
     * Constructor for BlockExample class.
     *
     * Registers the block and its fields.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = 'Block Name';
        $this->slug = 'block-example';
        $this->description = 'Description of my custom block';
        $this->category_title = 'Category Title';
        $this->category_slug = 'category-slug';
        $this->icon = 'excerpt-view';
        $this->keywords = [];
        $this->post_types = ['page', 'post'];
        $this->mode = 'edit';
        $this->view = 'blocks.block-example.index';
        $this->supports = [
            'align'         => true,
            'mode'          => true,
            'multiple'      => true,
            'jsx'           => true,
            'align_text'    => true,
            'align_content' => true,
            'full_height'   => true,
            'template'      => true,
            'template_lock' => true,
            'example'       => true,
            'inner_blocks'  => true
        ];
        $this->example = [];

        $this->registerBlock();
        $this->registerFields();
    }

    /**
     * Registers the block in WordPress.
     *
     * @return void
     */
    public function registerBlock(): void
    {
        new Block([
            'title' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'category_title'  => $this->category_title,
            'category_slug' => $this->category_slug,
            'icon' => $this->icon,
            'keywords' => $this->keywords,
            'post_type' => $this->post_types,
            'supports' => $this->supports,
            'mode' => $this->mode,
            'view'      => $this->view,
            'example'     => $this->example,
            'enqueue'     => $this->enqueue()
        ]);
    }

    /**
     * Registers the fields for the block in Advanced Custom Fields.
     *
     * @return void
     */
    public function registerFields(): void
    {
        acf_add_local_field_group( $this->fields() );
    }

    /**
     * Defines the block's field group using ACF Builder.
     *
     * @return array
     */
    public function fields() {
        $fields = new FieldsBuilder($this->slug);

        $fields
            ->addGroup($this->slug, [
                'label' => 'Block Processes',
            ])
            ->addAccordion('accordion_data', [
                'label' => 'Content',
                'instructions' => 'Block data',
            ])
            ->addAccordion('accordion_data_end')->endpoint()

            ->setLocation( 'block', '==', "acf/$this->slug" );

        return $fields->build();
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return array
     */
    public function enqueue()
    {
        return  [
            'style'  => [
                ['slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css', [], '1.8.1', 'all'],
                ['slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css', [], '1.8.1', 'all'],
            ],
            'script' => [
                ['slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', false]
            ]
        ];
    }
}
