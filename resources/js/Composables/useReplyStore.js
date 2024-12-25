import { defineStore } from 'pinia';
export const useReplyStore = defineStore('currentReplying', {
    state: () => {
        return {
            replyingTo: null,
        };
    },

    actions: {
        handleReply(commentId) {
            this.replyingTo = this.replyingTo === commentId ? null : commentId;
        },
    },
});
