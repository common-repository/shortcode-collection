function scc_note(){
	return "[note][/note]";
}

(function() {
	
	/*note*/
	tinymce.create('tinymce.plugins.scc_note', {

        init : function(ed, url){
            ed.addButton('scc_note', {
                title : 'Note Shortcode Insering Button',
                onclick : function() {
                    ed.execCommand(
                        'mceInsertContent',
                        false,
                        scc_note()
                        );
                },
                image: url + "/images/note35x35.png"
            });
        },

        getInfo : function() {
            return {
                longname : 'Note Shortcode Insering Button',
                author : 'Agnel Waghela',
                authorurl : 'http://agnelwaghela.infiniteserve.com',
                infourl : '',
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add('scc_note', tinymce.plugins.scc_note);

})();s