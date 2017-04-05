const webpack = require('webpack'),
	ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  entry: {
	main: './templates/default/js/main.js',
	admin: './templates/default/js/admin.js'
  },
  output: {
    filename: './dist/[name]-bundle.js'
  },
  module: {
    rules: [
	  {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
		  use: 'css-loader'
        })
      },
	  {
        test: /webfont\.(svg|eot|ttf|woff|woff2)$/,
        loader: 'url-loader',
        options: {
          limit: 10000,
		  name: '/dist/fonts/[hash].[ext]'
        }
      },
	  {
        test: /icons\.(svg)$/,
        loader: 'url-loader',
        options: {
		  limit: 1,
		  name: '/dist/ui/[name].[ext]'
        }
      },
	  {
        test: /\.(png|jpg|gif|ico)$/,
        loader: 'url-loader',
        options: {
          limit: 10000,
		  name: '/dist/img/[hash].[ext]'
        }
      },
	  {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['env']
          }
        }
      }
	]
  },
  plugins:[
    new webpack.ProvidePlugin({   
        jQuery: 'jquery',
        $: 'jquery'
    }),
	new ExtractTextPlugin('./dist/[name]-styles.css'),
  ]
}