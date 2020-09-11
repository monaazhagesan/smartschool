(function() {
    var app = ZendeskApps.defineApp(null)
  .reopenClass({"experiments":{},"location":{"support":{"ticket_sidebar":{"url":"assets/iframe.html"},"new_ticket_sidebar":{"url":"assets/iframe.html"}}},"noTemplate":[],"singleInstall":true,"signedUrls":false})
  .reopen({
    appName: "Bookmarks",
    appVersion: "2.0.5",
    locationIcons: {},
    assetUrlPrefix: "https://7.apps.zdusercontent.com/7/assets/1557717939-69b2d278f5a630508fe93862710321b3/",
    logoAssetHash: {"support":"logo-small.png"},
    appClassName: "app-7",
    author: {
      name: "Zendesk",
      email: "support@zendesk.com"
    },
    frameworkVersion: "2.0"
  });

ZendeskApps["Bookmarks"] = app;

    var app = ZendeskApps.defineApp(null)
  .reopenClass({"experiments":{},"location":{"support":{"system_top_bar":{"url":"assets/index.html"},"background":{"url":"assets/background.html"}}},"noTemplate":[],"singleInstall":true,"signedUrls":false})
  .reopen({
    appName: "Zendesk Chat",
    appVersion: "1.0.0",
    locationIcons: {"support":{"system_top_bar":{"svg":"icon_system_top_bar.svg"}}},
    assetUrlPrefix: "https://30460.apps.zdusercontent.com/30460/assets/1554358393-a7f360110bdb27c6c23f9a16678131ce/",
    logoAssetHash: {"support":"logo-small.png"},
    appClassName: "app-30460",
    author: {
      name: "Zendesk",
      email: "support@zendesk.com"
    },
    frameworkVersion: "2.0"
  });

ZendeskApps["Zendesk Chat"] = app;

    var app = ZendeskApps.defineApp(null)
  .reopenClass({"experiments":{},"location":{"support":{"ticket_sidebar":{"url":"assets/start.html"}}},"noTemplate":[],"singleInstall":false,"signedUrls":false})
  .reopen({
    appName: "Test App",
    appVersion: null,
    locationIcons: {},
    assetUrlPrefix: "https://70432.apps.zdusercontent.com/70432/assets/1541266409-37bf23d58c1d319828dd02e8d712b0d4/",
    logoAssetHash: {"support":"logo-small.png"},
    appClassName: "app-70432",
    author: {
      name: "Creativeitem",
      email: "support@envato.com"
    },
    frameworkVersion: "2.0"
  });

ZendeskApps["Test App"] = app;


    if (ZendeskApps["Zendesk Chat"]) {
      ZendeskApps["Zendesk Chat"].install({"id":1682987,"app_id":30460,"app_name":"Zendesk Chat","enabled":true,"settings":{"autologin":false,"name":"Zendesk Chat","title":"Zendesk Chat"},"requirements":[],"collapsible":true,"updated_at":"2017-02-27T10:57:44Z","created_at":"2017-02-27T10:57:44Z","plan":{"name":null}});
    }
    if (ZendeskApps["Test App"]) {
      ZendeskApps["Test App"].install({"id":405688,"app_id":70432,"app_name":"Test App","enabled":true,"settings":{"name":"Envato purchase verify","title":"Envato purchase verify"},"requirements":[],"collapsible":true,"updated_at":"2018-11-03T05:52:38Z","created_at":"2015-09-23T17:50:35Z","plan":{"name":null}});
    }
    if (ZendeskApps["Bookmarks"]) {
      ZendeskApps["Bookmarks"].install({"id":360001592191,"app_id":7,"app_name":"Bookmarks","enabled":true,"settings":{"name":"Bookmarks","title":"Bookmarks"},"requirements":[],"collapsible":true,"updated_at":"2018-11-09T04:13:20Z","created_at":"2018-11-09T04:13:19Z","plan":{"name":null}});
    }

    ZendeskApps.sortAppsForSite("ticket_sidebar", [405688,360001592191]);
    ZendeskApps.sortAppsForSite("new_ticket_sidebar", [360001592191]);
    ZendeskApps.sortAppsForSite("background", [1682987]);
    ZendeskApps.sortAppsForSite("system_top_bar", [1682987]);
}());

ZendeskApps.rollbarAccessToken = "492315100c9948248071fbcf0d0e1f55";

ZendeskApps.trigger && ZendeskApps.trigger('ready');
