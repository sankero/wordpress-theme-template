require('dotenv').config();
const path = require('path');

module.exports = {
  entry: './src/index.js',
  output: {
    path: path.resolve(__dirname, 'wp-content', 'themes', process.env.THEME_DIR, 'common'),
    filename: 'js/main.js',
  }
};
