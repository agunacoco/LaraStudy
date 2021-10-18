<template>
  <div class="container">
    <div class="justify-content-center">
      <button @click="getComments" class="text-xl btn btn-default">
        Look Comment
      </button>

      <comment-item
        v-for="(comment, index) in comments"
        :key="index"
        :comment="comment"
      >
      </comment-item>
    </div>
  </div>
</template>

<script>
import CommentItem from "./CommentItem.vue";

export default {
  props: ["post", "loginUser"],
  components: { CommentItem },
  data() {
    return {
      comments: [],
    };
  },
  methods: {
    getComments() {
      this.comments = ["one", "twos"];
      // 서버에 현재 게시글의 댓글 리스트를 비동기적으로 요청.
      // 즉, axios를 이용해서 요청.
      // 서버가 댓글 리스트를 주면 그놈을 어디에 할당해?
      // this.comments에 할당.
    },
  },
};
</script>
