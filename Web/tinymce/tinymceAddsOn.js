tinymce.init({
    selector: '#mytextarea',
    language: 'fr_FR',
    language_url : '/jeanforteroche/Web/tinymce/langs/fr_FR.js',
    height : '780px',
    menubar: false,
    plugins: "lists emoticons",
    toolbar: [
        'undo redo | styleselect | bold italic underline strikethrough | link image',
        'alignleft aligncenter alignright  alignjustify | outdent indent'
    ],
    style_formats: [
        {title: 'En-têtes', items: [
                {title: 'En-tête 1', block: 'h3'},
                {title: 'En-tête 2', block: 'h4'},
                {title: 'En-tête 3', block: 'h5'},
                {title: 'En-tête 4', block: 'h6'},
            ]},
        {title: 'Inline', items: [
                {title: 'Bold', inline: 'b', icon: 'bold'},
                {title: 'Italic', inline: 'i', icon: 'italic'},
                {title: 'Underline', inline: 'span', styles : {textDecoration : 'underline'}, icon: 'underline'},
                {title: 'Strikethrough', inline: 'span', styles : {textDecoration : 'line-through'}, icon: 'strikethrough'},
                {title: 'Superscript', inline: 'sup', icon: 'superscript'},
                {title: 'Subscript', inline: 'sub', icon: 'subscript'},
                {title: 'Code', inline: 'code', icon: 'code'},
            ]},
        {title: 'Blocks', items: [
                {title: 'Paragraph', block: 'p'},
                {title: 'Blockquote', block: 'blockquote'},
                {title: 'Div', block: 'div'},
                {title: 'Pre', block: 'pre'}
            ]},
        {title: 'Alignment', items: [
                {title: 'Left', block: 'div', styles : {textAlign : 'left'}, icon: 'alignleft'},
                {title: 'Center', block: 'div', styles : {textAlign : 'center'}, icon: 'aligncenter'},
                {title: 'Right', block: 'div', styles : {textAlign : 'right'}, icon: 'alignright'},
                {title: 'Justify', block: 'div', styles : {textAlign : 'justify'}, icon: 'alignjustify'}
            ]}
    ],
});