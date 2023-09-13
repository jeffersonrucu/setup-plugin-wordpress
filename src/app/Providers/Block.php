<?php

namespace App\Providers;

class Block
{
    private $slug;
    private $title;
    private $description;
    private $category_title;
    private $category_slug;
    private $icon;
    private $keywords;
    private $mode;
    private $view;
    private $post_type;
    private $supports;
    private $example;
    private $enqueue;
    private $dependencies;

    public function __construct($params)
    {
        $this->title = $params['title'];
        $this->slug = $params['slug'];
        $this->description = $params['description'];
        $this->category_slug = $params['category_slug'];
        $this->category_title = $params['category_title'];
        $this->icon = $params['icon'];
        $this->keywords = $params['keywords'];
        $this->post_type = $params['post_type'];
        $this->supports = $params['supports'];
        $this->mode = $params['mode'];
        $this->view = $params['view'];
        $this->example = $params['example'];
        $this->enqueue = isset($params['enqueue']) ? $params['enqueue'] : '';
        $this->dependencies = ['jquery'];

        if ( is_array( $this->enqueue ) ) {
            foreach ( $this->enqueue as $type => $asset ) {
                if ( $type == 'script' && is_array( $asset ) ) {
                    foreach ( $asset as $item ) {
                        $this->dependencies[] = $item[0];
                    }
                }
            }
        }

        add_action('acf/init', [$this, 'configGutenbergBlock']);
        add_filter('block_categories_all', [$this, 'registerBlockCategory'], 10, 2);
    }

    public function registerBlockCategory($categories)
    {
        array_unshift($categories, array(
            'slug'  => $this->category_slug,
            'title' => $this->category_title,
            'icon' => null
        ));

        return $categories;
	}

    public function configGutenbergBlock(): void
    {
	    acf_register_block_type([
            'name'              => $this->slug,                                     // Nome do bloco (deve ser único)
            'title'             => __($this->title, 'text-domain'),                 // Título do bloco
            'description'       => __($this->description, 'text-domain'),           // Descrição do bloco
            'render_callback'   => [$this, 'renderBlockBlade'],                     // Função de callback para renderizar o bloco
            'category'          => $this->category_slug,                                 // Categoria onde o bloco será exibido (e.g., common, formatting, layout, widgets, etc.)
            'icon'              => $this->icon,                                     // Ícone do bloco (veja: https://developer.wordpress.org/resource/dashicons/)
            'keywords'          => $this->keywords,                                 // Palavras-chave relacionadas ao bloco
            'mode'              => $this->mode,                                     // Modo de edição (pode ser 'auto', 'preview', ou 'edit')
            'view'              => $this->view,
            'supports'          => [
                'align'         => $this->supports['align'],                        // Suporte à alinhamento (true ou false)
                'mode'          => $this->supports['mode'],                         // Suporte a modos de edição (true ou false)
                'multiple'      => $this->supports['multiple'],                     // Permite múltiplas instâncias do bloco no mesmo post ou página (true ou false)
                'jsx'           => $this->supports['jsx'],                          // Permite JSX no bloco (true ou false)
                'align_text'    => $this->supports['align_text'],                  // Suporte ao alinhamento do texto
                'align_content' => $this->supports['align_content'],               // Suporte ao alinhamento do conteúdo
                'full_height'   => $this->supports['full_height'],                 // Suporte ao botão "altura total"
                'template'      => $this->supports['template'],                    // Suporte a modelos de bloco personalizados
                'template_lock' => $this->supports['template_lock'],               // Bloquear o modelo de bloco
                'example'       => $this->supports['example'],                     // Suporte a exemplos de bloco
                'inner_blocks'  => $this->supports['inner_blocks'],                // Suporte a blocos internos (inner blocks)
            ],
            'post_types'        => $this->post_type,                                        // Tipos de post onde o bloco estará disponível
            'enqueue_assets'    => [$this, 'enqueueAssetsBlock'],                                // Função de callback para enfileirar assets do bloco
            'enqueue_script'    => $this->enqueueScriptBlock(),    // URL do arquivo de script do bloco
            'example' => [
                'attributes' => [
                    'mode' => 'preview',
                    'data' => $this->example
                ]
            ]
        ]);
    }

    public function renderBlockBlade()
    {
        \blade($this->view);
    }

    public function enqueueAssetsBlock()
    {
        if ( is_array( $this->enqueue ) ) {
            foreach ( $this->enqueue as $type => $asset ) {
                if ( $type == 'style' && is_array( $asset ) ) {
                    foreach ( $asset as $item ) {
                        wp_enqueue_style( $item[0], $item[1], $item[2], $item[3], $item[4] );
                    }
                }

                if ( $type == 'script' && is_array( $asset ) ) {
                    foreach ( $asset as $item ) {
                        $this->dependencies[] = $item[0];
                        wp_enqueue_script( $item[0], $item[1], $item[2], $item[3], $item[4] );
                    }
                }
            }
        }
    }

    public function enqueueScriptBlock()
    {
        $words = explode('-', $this->slug);
        $formattedWords = array_map('ucwords', $words);

        $fileName = (implode('', $formattedWords));

        wp_enqueue_script('seu-bloco-script-handle', PLUGIN_SETUP_GUTENBERG_PUBLIC_SCRIPTS_URL . "wordpress/blocks/$fileName.js", $this->dependencies, null, true);
    }
}
