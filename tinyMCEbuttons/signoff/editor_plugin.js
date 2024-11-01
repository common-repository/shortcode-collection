function scc_signoff() {
	return "[signoff]";
}

(function() {
	
	/*signoff text*/
	tinymce.create('tinymce.plugins.scc_signoff', {

        init : function(ed, url){
            ed.addButton('scc_signoff', {
                title : 'Sign Off Text Shortcode Insering Button',
                onclick : function() {
                    ed.execCommand(
                        'mceInsertContent',
                        false,
                        scc_signoff()
                        );
                },
                image: url + "/images/signofftext35x35.png"
            });
        },

        getInfo : function() {
            return {
                longname : 'Sign Off Text Shortcode Insering Button',
                author : 'Agnel Waghela',
                authorurl : 'http://agnelwaghela.infiniteserve.com',
                infourl : '',
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add('scc_signoff', tinymce.plugins.scc_signoff);
    
})();