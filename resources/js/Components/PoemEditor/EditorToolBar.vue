<template>
    <div
        class="editor-toolbar flex items-center gap-2 border-b border-gray-300 bg-gray-50 p-3"
    >
        <button
            v-for="tool in tools"
            :key="tool.name"
            :class="[tool.class, 'rounded p-2 transition-all hover:shadow-md']"
            :title="tool.title"
            @click="tool.action"
        >
            <component :is="tool.icon" class="h-5 w-5" />
        </button>
        <input
            ref="fileInput"
            type="file"
            class="hidden"
            accept="image/*"
            @change="$emit('image-upload', $event)"
        />
    </div>
</template>

<script>
export default {
    props: {
        editor: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const tools = [
            {
                name: 'bold',
                icon: 'i-lucide-bold',
                title: 'Bold',
                class: 'hover:bg-blue-100',
                action: () => props.editor.chain().focus().toggleBold().run(),
                isActive: () => props.editor.isActive('bold'),
            },
            {
                name: 'italic',
                icon: 'i-lucide-italic',
                title: 'Italic',
                class: 'hover:bg-blue-100',
                action: () => props.editor.chain().focus().toggleItalic().run(),
                isActive: () => props.editor.isActive('italic'),
            },
            {
                name: 'align-left',
                icon: 'i-lucide-align-left',
                title: 'Align Left',
                class: 'hover:bg-blue-100',
                action: () =>
                    props.editor.chain().focus().setTextAlign('left').run(),
            },
            {
                name: 'align-center',
                icon: 'i-lucide-align-center',
                title: 'Align Center',
                class: 'hover:bg-blue-100',
                action: () =>
                    props.editor.chain().focus().setTextAlign('center').run(),
            },
            {
                name: 'align-right',
                icon: 'i-lucide-align-right',
                title: 'Align Right',
                class: 'hover:bg-blue-100',
                action: () =>
                    props.editor.chain().focus().setTextAlign('right').run(),
            },
            {
                name: 'image',
                icon: 'i-lucide-image',
                title: 'Insert Image',
                class: 'hover:bg-blue-100',
                action: () => {
                    const fileInput =
                        document.querySelector('input[type=file]');
                    fileInput.click();
                },
            },
        ];

        return {
            tools,
        };
    },
};
</script>

<style>
.editor-toolbar button {
    transition: transform 0.2s;
}
.editor-toolbar button:hover {
    transform: scale(1.1);
}
</style>
