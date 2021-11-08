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
                  <div class="text-base">
                    {{ comment.comment }}
                  </div>
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
                  <a
                    href="#"
                    class="hover:underline"
                    v-if="comment.user_id == login_user_id"
                  >
                    <small>Update</small>
                  </a>
                  <small class="self-center">.</small>
                  <a
                    href="#"
                    class="hover:underline"
                    v-if="comment.user_id == login_user_id"
                  >
                    <small>Delete</small>
                  </a>
                  <small class="self-center">.</small>
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
};
</script>