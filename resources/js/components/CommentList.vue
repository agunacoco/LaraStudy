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
      this.comments = ["one", "two", "three"];
    },
  },
};
</script>
