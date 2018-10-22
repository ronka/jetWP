const config = require( './jetwp.config.js' );

module.exports = {
  getSaasSources: function(direction){
    var c = config || {},
        d = direction || 'ltr';

    if (!!config.dev.saas[d].exclude) {
      return [config.dev.saas[d].url, config.dev.saas[d].exclude];
    } else {
      return [config.dev.saas[d].url];
    }
  },
  getCompiledAssets: function() {
    return [
      config.prod.paths.css + config.prod.names.css.ltr + '.css',
      config.prod.paths.css + config.prod.names.css.ltr + '.min.css',
      config.prod.paths.css + config.prod.names.css.ltr + '.min.css.gz',
      config.prod.paths.css + config.prod.names.css.rtl + '.css',
      config.prod.paths.css + config.prod.names.css.rtl + '.min.css',
      config.prod.paths.css + config.prod.names.css.rtl + '.min.css.gz',
      config.prod.paths.js + config.prod.names.js + '.js',
      config.prod.paths.js + config.prod.names.js + '.min.js',
      config.prod.paths.js + config.prod.names.js + '.min.js.gz',
    ];
  }
}