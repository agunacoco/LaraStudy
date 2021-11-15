<template>
  <!-- component -->
  <div x-data="{ open1: false, open2: false }">
    <div class="m-3 flex justify-start items-center">
      <div class="bg-white w-full h-auto px-3 py-2 flex flex-col space-y-2">
        <div class="flex items-center space-x-2">
          <div class="flex items-center justify-center space-x-2">
            <div class="block">
              <div class="flex justify-start items-center space-x-2">
                <div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
                  <div class="text-base">
                    <small>{{ comment.user.name }}</small>
                  </div>
                  <input
                    class="text-xs"
                    v-model="newComment"
                    :readonly="!updateClicked"
                    type="text"
                    :id="'comment' + comment.id"
                    required
                  />
                  <small
                    v-show="updateClicked"
                    @click="updateComment"
                    v-if="comment.user_id == login_user_id"
                    class="px-2 hover:bg-blue-400"
                    >Save</small
                  >
                </div>
              </div>
              <div class="flex justify-start items-center text-sm w-full">
                <div
                  class="
                    font-semibold
                    text-gray-700
                    px-2
                    flex
                    items-center
                    justify-center
                    space-x-1
                  "
                >
                  <button
                    @click="enableUpdate"
                    v-if="comment.user_id == login_user_id"
                    class="hover:underline"
                  >
                    <small>Update</small>
                  </button>
                  <button
                    v-if="comment.user_id == login_user_id"
                    @click="deleteComment"
                    class="hover:underline"
                  >
                    <small>Delete</small>
                  </button>
                  <small>{{ comment.updated_at }}</small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- New Comment Paste Here -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["comment", "login_user_id"],
  data() {
    return {
      newComment: "",
      updateClicked: false,
    };
  },
  created() {
    this.newComment = this.comment.comment;
  },
  methods: {
    deleteComment() {
      if (confirm("Are you sure?")) {
        axios
          .delete("/comment/" + this.comment.id)
          .then((response) => {
            console.log(response.data);
            // this.$parent.getComments();
            this.$emit("deleted");
            Swal.fire({
              position: "top-center",
              icon: "success",
              title: "댓글삭제",
              showConfirmButton: false,
              timer: 1500,
            });
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    enableUpdate() {
      this.updateClicked = true;
    },
    updateComment() {
      axios
        .patch("/comment/" + this.comment.id, {
          comment: this.newComment,
        })
        .then((response) => {
          console.log(response.status);
          console.log("댓글 수정 성공");
          this.updateClicked = false;
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "댓글수정성공",
            showConfirmButton: false,
            timer: 1500,
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>