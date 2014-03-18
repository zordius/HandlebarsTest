var page = require('webpage').create(),
    system = require('system');

page.viewportSize = {width: 800, height: 600};
page.open(system.args[1], function (status) {
    page.render('chart.png');
    phantom.exit();
});
