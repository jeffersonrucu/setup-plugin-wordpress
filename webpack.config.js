const path = require('path');
const fs = require('fs');
const ESLintPlugin = require('eslint-webpack-plugin');

const options = {
  extensions: ['.js', '.jsx', '.ts', '.tsx'],
  emitError: true,
  emitWarning: true,
};

const sourceDirectory = 'src/resources/scripts/wordpress/blocks';
const outputDirectory = 'public/scripts/wordpress/blocks';

const entry = {};

fs.readdirSync(sourceDirectory).forEach(file => {
  if (file.endsWith('.ts')) {
    const fileName = path.basename(file, '.ts');
    entry[fileName] = path.resolve(sourceDirectory, file);
  }
});

module.exports = {
  mode: 'development',
  entry,
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        use: 'ts-loader',
        exclude: /node_modules/,
      },
    ],
  },
  resolve: {
    extensions: ['.ts', '.js'],
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, outputDirectory),
  },
  plugins: [new ESLintPlugin(options)],
};
