function scc_pirate() {
	return "[pirate][/pirate]";
}

(function() {

	/*pirate*/
	tinymce.create('tinymce.plugins.scc_pirate', {

        init : function(ed, url){
            ed.addButton('scc_pirate', {
                title : 'Pirate Talk Shortcode Insering Button',
                onclick : function() {
                    ed.execCommand(
                        'mceInsertContent',
                        false,
                        scc_pirate()
                        );
                },
                image: url + "/images/pirate35x35.png"
            });
        },

        getInfo : function() {
            return {
                longname : 'Pirate Talk Shortcode Insering Button',
                author : 'Agnel Waghela',
                authorurl : 'http://agnelwaghela.infiniteserve.com',
                infourl : '',
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add('scc_pirate', tinymce.plugins.scc_pirate);
    
	
})();