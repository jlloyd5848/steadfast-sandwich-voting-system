const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue({
        version: 3,
        options: {
            postcss: {
                plugins: [
                    require('tailwindcss'),
                    require('autoprefixer'),
                ],
            },
        },
    })
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
    

if (mix.inProduction()) {
    mix.version();
}
