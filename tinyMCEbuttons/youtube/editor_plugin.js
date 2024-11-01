function scc_youtube() {
    return "[youtube value= width=430]";
}

(function() {

	/*youtube*/
    tinymce.create('tinymce.plugins.scc_youtube', {

        init : function(ed, url){
            ed.addButton('scc_youtube', {
                title : 'Insert a YouTube Shortcode Insering Plugin',
                onclick : function() {
                    ed.execCommand(
                        'mceInsertContent',
                        false,
                        scc_youtube()
                        );
                },
                image: url + '/images/youtube35x35.png'
            });
        },

        getInfo : function() {
            return {
                longname : 'YouTube Shortcode Insering plugin',
                author : 'Agnel Waghela',
                authorurl : 'http://agnelwaghela.infiniteserve.com',
                infourl : '',
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add('scc_youtube', tinymce.plugins.scc_youtube);
    
})();
