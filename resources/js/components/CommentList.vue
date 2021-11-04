<template>
  <div>
    <form @submit.prevent="postComments">
      <div class="flex justify-center p-4">
        <label for="comment" class="m-2">Comment</label>
        <textarea
          type="text"
          class="m-2 form-control"
          id="comment"
          v-model="comment"
        />
        <button type="submit" class="btn btn-primary m-2">Submit</button>
      </div>
    </form>
    <button @click="getComments" class="btn btn-default m-4">
      댓글 불러오기
    </button>
    <comment-item
      v-for="(comment, index) in comments.data"
      :key="index"
      :comment="comment"
    />
    <pagination-link
      @pageClicked="getPage($event)"
      v-if="comments.links != null"
      :links="comments.links"
    />
  </div>
</template>

<script>
import CommentItem from "./CommentItem.vue";
import PaginationLink from "./PaginationLink.vue";

export default {
  props: ["post", "loginuser"],
  components: { CommentItem, PaginationLink },
  data() {
    return {
      comments: [],
      comment: "",
    };
  },

  methods: {
    getPage(url) {
      console.log(url);
      axios
        .get(url)
        .then((response) => {
          console.log(response.data);
          this.comments = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getComments() {
      axios
        .get("/comment/" + this.post.id)
        .then((response) => {
          console.log(response.data);
          this.comments = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    postComments() {
      if (this.comment == "") {
        alert("한자라도 더 써리");
        return false;
      }
      // 서버에 현재 게시글의 댓글 리스트를 비동기적으로 요청
      // 즉, axios를 이용해서 요청
      // 서버가 댓글 리스트를 주면 그놈을 어디에 할당해?
      // this.comments에 할당.
      axios
        .post("/comment/" + this.post.id, {
          comment: this.comment,
        })
        .then((response) => {
          console.log(response.data);
          this.getComments();
          this.comment = "";
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>