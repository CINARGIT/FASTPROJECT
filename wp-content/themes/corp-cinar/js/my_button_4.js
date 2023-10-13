(function() {
    tinymce.create('tinymce.plugins.MyButton4', {
        init: function(ed, url) {
            ed.addButton('mybutton4', {
                title: 'Колонки 3 в ряд с иконками',
                text: 'Колонки 3 в ряд с иконками',
                onclick: function() {
                    var return_text = '<div class="row-style-wrap row-style-3"><div class="row-editor"><div class="col-4-editor"><div class="editor-item editor-icon">Вставьте изображение...</div><div class="editor-item editor-title">Вставьте заголовок...</div>Вставьте текст...</div><div class="col-4-editor"><div class="editor-item editor-icon">Вставьте изображение...</div><div class="editor-item editor-title">Вставьте заголовок...</div>Вставьте текст...</div><div class="col-4-editor"><div class="editor-item editor-icon">Вставьте изображение...</div><div class="editor-item editor-title">Вставьте заголовок...</div>Вставьте текст...</div></div></div><p>&nbsp;</p>';
                    ed.execCommand('mceInsertContent', 0, return_text);
                }
            });
        }
    });
    tinymce.PluginManager.add('mybutton4', tinymce.plugins.MyButton4);
})();