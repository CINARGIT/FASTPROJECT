(function() {
    tinymce.create('tinymce.plugins.MyButton3', {
        init: function(ed, url) {
            ed.addButton('mybutton3', {
                title: 'Колонки 3 ряд c индикатором',
                text: 'Колонки 3 ряд c индикатором',
                onclick: function() {
                    var return_text = '<div class="row-style-wrap row-style-2"><div class="row-editor"><div class="col-4-editor">Вставьте текст...</div><div class="col-4-editor">Вставьте текст...</div><div class="col-4-editor">Вставьте текст...</div></div></div><p>&nbsp;</p>';
                    ed.execCommand('mceInsertContent', 0, return_text);
                }
            });
        }
    });
    tinymce.PluginManager.add('mybutton3', tinymce.plugins.MyButton3);
})();