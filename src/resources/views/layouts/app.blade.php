
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>

    <body {{ body_class() }} >
        @php wp_body_open(); @endphp

        @include('sections.header')

        <main id="app">
            @yield('content')
        </main>

        @include('sections.footer')

        @php wp_footer(); @endphp
    </body>
</html>
