// ToolbarConstants.js
import {
    BoldIcon,
    ItalicIcon,
    StrikethroughIcon,
    AlignCenterIcon,
    AlignRightIcon,
    AlignLeftIcon,
    AlignJustifyIcon,
    RedoDotIcon,
    UndoDotIcon,
} from 'lucide-vue-next';

export const formatButtons = [
    {
        icon: BoldIcon,
        action: (editor) => editor.chain().focus().toggleBold().run(),
        isActive: (editor) => editor.isActive('bold'),
        isDisabled: (editor) => !editor.can().chain().focus().toggleBold().run(),
    },
    {
        icon: ItalicIcon,
        action: (editor) => editor.chain().focus().toggleItalic().run(),
        isActive: (editor) => editor.isActive('italic'),
        isDisabled: (editor) => !editor.can().chain().focus().toggleItalic().run(),
    },
    {
        icon: StrikethroughIcon,
        action: (editor) => editor.chain().focus().toggleStrike().run(),
        isActive: (editor) => editor.isActive('strike'),
        isDisabled: (editor) => !editor.can().chain().focus().toggleStrike().run(),
    },
];

export const alignmentButtons = [
    {
        icon: AlignLeftIcon,
        action: (editor) => editor.chain().focus().setTextAlign('left').run(),
        isActive: (editor) => editor.isActive({ textAlign: 'left' }),
    },
    {
        icon: AlignCenterIcon,
        action: (editor) => editor.chain().focus().setTextAlign('center').run(),
        isActive: (editor) => editor.isActive({ textAlign: 'center' }),
    },
    {
        icon: AlignRightIcon,
        action: (editor) => editor.chain().focus().setTextAlign('right').run(),
        isActive: (editor) => editor.isActive({ textAlign: 'right' }),
    },
    {
        icon: AlignJustifyIcon,
        action: (editor) => editor.chain().focus().setTextAlign('justify').run(),
        isActive: (editor) => editor.isActive({ textAlign: 'justify' }),
    },
];

export const historyButtons = [
    {
        icon: UndoDotIcon,
        action: (editor) => editor.chain().focus().undo().run(),
        isDisabled: (editor) => !editor.can().undo(),
    },
    {
        icon: RedoDotIcon,
        action: (editor) => editor.chain().focus().redo().run(),
        isDisabled: (editor) => !editor.can().redo(),
    },
];
