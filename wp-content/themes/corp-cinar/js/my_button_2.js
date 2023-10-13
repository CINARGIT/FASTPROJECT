(function() {
    tinymce.create('tinymce.plugins.MyButton2', {
        init: function(ed, url) {
            ed.addButton('mybutton2', {
                title: 'Колонки 3 ряд',
                text: 'Колонки 3 ряд',
                onclick: function() {
                    var return_text = '<div class="row-editor"><div class="col-4-editor">Вставьте текст...</div><div class="col-4-editor">Вставьте текст...</div><div class="col-4-editor">Вставьте текст...</div></div>';
                    ed.execCommand('mceInsertContent', 0, return_text);
                }
            });
        }
    });
    tinymce.PluginManager.add('mybutton2', tinymce.plugins.MyButton2);
})();

