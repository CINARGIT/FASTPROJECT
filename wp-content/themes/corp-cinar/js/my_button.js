(function() {
    tinymce.create('tinymce.plugins.MyButton', {
        init: function(ed, url) {
            ed.addButton('mybutton', {
                title: 'Insert Row and Columns',
                text: 'Колонки 2 в ряд',
                onclick: function() {
                    var return_text = '<div class="row-editor"><div class="col-6-editor">Вставьте текст...</div><div class="col-6-editor">Вставьте текст...</div></div>';
                    ed.execCommand('mceInsertContent', 0, return_text);
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
        getInfo: function() {
            return {
                longname: "Insert Row and Columns",
                author: 'You',
                version: "1"
            };
        }
    });
    tinymce.PluginManager.add('mybutton', tinymce.plugins.MyButton);
})();

(function($) {
    $(document).on('tinymce-editor-setup', function(event, editor) {
        editor.on('BeforeExecCommand', function(e) {
            if (e.command === 'JustifyRight' || e.command === 'JustifyLeft' || e.command === 'JustifyCenter') {
                var node = editor.selection.getNode();
                if (node && node.nodeName === 'IMG') {
                    var parent = node.parentElement;
                    if (parent && parent.nodeName === 'A') {
                        $(parent).removeClass('alignright-wrap-a alignleft-wrap-a aligncenter-wrap-a'); // Удалите предыдущие классы выравнивания
                        switch (e.command) {
                            case 'JustifyRight':
                                $(parent).addClass('alignright-wrap-a');
                                break;
                            case 'JustifyLeft':
                                $(parent).addClass('alignleft-wrap-a');
                                break;
                            case 'JustifyCenter':
                                $(parent).addClass('aligncenter-wrap-a');
                                break;
                        }
                    }
                }
            }
        });
    });
})(jQuery);