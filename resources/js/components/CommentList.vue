<template>
  <div>
    <form @submit.prevent="getComments">
      <div class="flex justify-center p-4">
        <label for="comment" class="m-2">Comment</label>
        <textarea
          type="text"
          class="m-2 form-control"
          id="comment"
          v-model.lazy="comment"
        />
        <button type="submit" class="btn btn-primary m-2">Submit</button>
      </div>
    </form>
    <button @click="getComments" class="btn btn-default p-4">
      댓글 불러오기
    </button>
    <comment-item
      v-for="(comment, index) in comments"
      :key="index"
      :comment="comment"
    />
  </div>
</template>

<script>
import CommentItem from "./CommentItem.vue";
export default {
  props: ["post", "loginuser"],
  components: { CommentItem },
  data() {
    return {
      comment: "",
      comments: [],
    };
  },

  methods: {
    getComments() {
      // 서버에 현재 게시글의 댓글 리스트를 비동기적으로 요청
      // 즉, axios를 이용해서 요청
      // 서버가 댓글 리스트를 주면 그놈을 어디에 할당해?
      // this.comments에 할당.

      axios
        .post("/comment/" + this.post.id, {
          content: this.comment,
        })
        .then((response) => {
          console.log(response.data);

          this.comment = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  update() {},
};
</script>