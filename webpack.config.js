const path = require('path');
const ESLintPlugin = require('eslint-webpack-plugin');

const options = {
  extensions: ['.js', '.jsx', '.ts', '.tsx'],
  emitError: true,
  emitWarning: true,
};

module.exports = {
  mode: 'development',
  entry: {
    app: path.resolve(__dirname, './src/resources/scripts/app.ts'),
    editor: path.resolve(__dirname, './src/resources/scripts/editor.ts'),
    admin: path.resolve(__dirname, './src/resources/scripts/admin.ts'),
  },
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
    path: path.resolve(__dirname, 'public/scripts'),
  },
  plugins: [new ESLintPlugin(options)],
};
