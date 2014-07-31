var page = require('webpage').create(),
    system = require('system');

page.viewportSize = {width: 720, height: 5500};
page.open('index.html#!FEATURES.md', function (status) {
    page.render('features0.png');
    phantom.exit();
});
