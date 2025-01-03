import CharacterCount from '@tiptap/extension-character-count';
import textAlign from '@tiptap/extension-text-align';
import { StarterKit } from '@tiptap/starter-kit';
import { useEditor } from '@tiptap/vue-3';

export const characterLimit = 4000;

export const editor = useEditor({
    editorProps: {
        attributes: {
            class: 'h-[70dvh] focus:outline-none max-h-[80dvh] overflow-auto scrollbar  scrollbar-none ',
        },
        handlePaste(view, event) {
            const clipboardData = event.clipboardData || window.clipboardData;
            const text = clipboardData.getData('text');

            // Insert sanitized text into the editor
            view.dispatch(view.state.tr.insertText(text));
            return true; // Prevent default paste behavior
        },
    },

    content: '',
    extensions: [
        StarterKit.configure({
            paragraph: {
                HTMLAttributes: {
                    style: 'margin: 0; line-height: 1.4;', // Inline styles for custom spacing
                },
            },
            keyboardShortcuts: {
                'Mod-a': ({ editor }) => {
                    editor.commands.selectAll();
                    return true;
                },
            },
        }),
        textAlign.configure({
            types: ['heading', 'paragraph'],
        }),
        CharacterCount.configure({
            limit: characterLimit,
        }),
    ],
});


