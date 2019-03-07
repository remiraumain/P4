// Insert only scripts with a specific path
// Scripts that need to execute on all the app need to be set directly on the layout
var scripts = [
    { "path": "/admin/billet-insert.html", "location": 'head', "script": [{ "async": false, "src": "https://cloud.tinymce.com/5/tinymce.min.js?apiKey=8pfy2ce1w2wznu2sl4peivm2990w6ck75m8ozvipust9m6kn" }, { "async": false, "src": "/tinymce/tinymceAddsOn.js" }] },
    { "path": "/billets.html", "location": 'body', "script": [{ "async": false, "src": "https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js" }, { "async": false, "src": "https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js" }, { "async": false, "src": "/masonry/js/masonryAddsOn.js" }] },
];

var Router = {
    location: "",
    js: "",
    path: "",
    scripts: "",

    init: function(loadDesign)
    {
        var js = document.createElement("script");

        js.type = "text/javascript";

        this.js = js;

        this.getRoute();

        if (this.getMatch())
        {
            this.loadScript();
        }

    },

    getRoute: function ()
    {
        this.path = window.location.pathname;
    },

    getMatch: function ()
    {
        var index = false;

        for (var i = 0; i < scripts.length; i++) {
            // look for the entry with a matching `path` value
            if (scripts[i].path == this.path) {
                this.location = document.getElementsByTagName(scripts[i].location)[0];
                this.scripts = scripts[i].script;

                index = true;
            }
        }

        return index;
    },

    loadScript: function ()
    {
        var scriptList = [];
        this.scripts.forEach(function(script)
        {
            var js = this.js.cloneNode();
            js.async = script.async;
            js.src = script.src;

            scriptList.push(js);
        }.bind(this));

        scriptList.forEach(function (script)
        {
            this.location.appendChild(script);
        }.bind(this));
    },
};

var routerApp = Object.create(Router);
routerApp.init();