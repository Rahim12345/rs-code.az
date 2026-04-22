/**
 * Webpack config for building the custom CKEditor 5 bundle.
 * Run: npm run ckeditor
 */

'use strict';

const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { loaders } = require('@ckeditor/ckeditor5-dev-utils');

module.exports = {
    mode: 'production',
    entry: './resources/ckeditor/ckeditor.js',
    output: {
        path: path.resolve(__dirname, 'public/vendor/ckeditor'),
        filename: 'ckeditor.js',
        library: 'ClassicEditor',
        libraryExport: 'default',
        libraryTarget: 'umd',
    },
    plugins: [
        new MiniCssExtractPlugin({ filename: 'ckeditor.css' }),
    ],
    module: {
        rules: [
            // SVG icons
            loaders.getIconsLoader({ matchExtensionOnly: true }),
            // CKEditor theme CSS — use PostCSS to handle @mixin/@define-mixin
            {
                test: /\.css$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: { importLoaders: 1 }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: [
                                    require('postcss-import'),
                                    require('postcss-mixins'),
                                    require('postcss-nesting'),
                                ]
                            }
                        }
                    }
                ]
            }
        ]
    },
    resolve: {
        extensionAlias: {
            '.js': ['.ts', '.js'],
        }
    }
};
