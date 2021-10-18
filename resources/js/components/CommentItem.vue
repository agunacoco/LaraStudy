<template>
  <!-- component -->
  <div>
    <!-- component -->
    <div class="bg-gray-100 flex justify-center items-center">
      <div
        class="
          bg-white
          w-full
          sm:max-w-7xl
          md:w-1/3
          h-auto
          px-3
          py-2
          flex flex-col
          space-y-2
        "
      >
        <div class="flex items-center space-x-2">
          <div class="flex items-center justify-center space-x-2">
            <div class="block">
              <div class="flex justify-center items-center space-x-2">
                <div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
                  <div class="font-medium">
                    <a href="#" class="hover:underline text-sm">
                      <small>Ganendra</small>
                    </a>
                  </div>
                  <div class="text-xs">{{ comment }}</div>
                </div>
              </div>
              <div class="flex justify-start items-center text-xs w-full">
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
                  <a href="#" class="hover:underline">
                    <small>Update</small>
                  </a>
                  <small class="self-center">.</small>
                  <a href="#" class="hover:underline">
                    <small>Delete</small>
                  </a>
                  <small class="self-center">.</small>
                  <a href="#" class="hover:underline">
                    <small>15 hour</small>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["comment"],
};
</script>