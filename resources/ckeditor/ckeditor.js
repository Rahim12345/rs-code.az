/**
 * Custom CKEditor 5 Classic build with Code + CodeBlock plugins.
 */

// Lark theme: provides all visual CSS variables (colors, spacing, borders)
import '@ckeditor/ckeditor5-theme-lark/dist/index.css';

import { ClassicEditor } from '@ckeditor/ckeditor5-editor-classic';

import { Essentials }      from '@ckeditor/ckeditor5-essentials';
import { Autoformat }      from '@ckeditor/ckeditor5-autoformat';
import { Bold, Italic, Code } from '@ckeditor/ckeditor5-basic-styles';
import { BlockQuote }      from '@ckeditor/ckeditor5-block-quote';
import { CodeBlock }       from '@ckeditor/ckeditor5-code-block';
import { Heading }         from '@ckeditor/ckeditor5-heading';
import { Link }            from '@ckeditor/ckeditor5-link';
import { List }            from '@ckeditor/ckeditor5-list';
import { Paragraph }       from '@ckeditor/ckeditor5-paragraph';
import { Table, TableToolbar } from '@ckeditor/ckeditor5-table';
import { Undo }            from '@ckeditor/ckeditor5-undo';

class Editor extends ClassicEditor {
    static builtinPlugins = [
        Essentials,
        Autoformat,
        Bold,
        Italic,
        Code,
        BlockQuote,
        CodeBlock,
        Heading,
        Link,
        List,
        Paragraph,
        Table,
        TableToolbar,
        Undo,
    ];

    static defaultConfig = {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'code', '|',
                'link', 'blockQuote', 'codeBlock', '|',
                'bulletedList', 'numberedList', '|',
                'insertTable', '|',
                'undo', 'redo'
            ]
        },
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
        },
        language: 'en'
    };
}

window.ClassicEditor = Editor;
export default Editor;
