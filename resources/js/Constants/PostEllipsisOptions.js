import { Ban, Bookmark, DeleteIcon, UserPlus2 } from 'lucide-vue-next';
import { inject } from "vue";
const post = inject("post");
export const ellipsisOptions = [
    {
        option: 'Bookmark',
        icon: Bookmark,
        id: 2,
        Style: { 'hello ma': true },
    },
    {
        option: 'Block',
        icon: Ban,
        id: 3,
        Style: { 'hello ma': true },
    },
    {
        option: 'follow',
        icon: UserPlus2,
        id: 4,
        Style: { 'hello ma': true },
    },
    {
        option: 'Delete',
        icon: DeleteIcon,
        id: 4,
        Style: { 'hidden': post?.author.username !== 'ike' },
    },
];
