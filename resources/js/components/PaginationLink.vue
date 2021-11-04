<template>
  <div class="m-4" v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, key) in links">
        <button
          v-if="link.url === null"
          :key="key"
          class="
            px-4
            py-3
            mb-1
            mr-1
            text-sm
            leading-4
            text-gray-400
            border
            rounded
          "
          v-html="link.label"
        />
        <button
          @click="pageClicked(link.url)"
          v-else
          :key="key"
          class="
            px-4
            py-3
            mb-1
            mr-1
            text-sm
            leading-4
            border
            bg-white-300
            rounded
            hover:bg-blue-100
            focus:border-indigo-500 focus:text-indigo-500
          "
          :class="{ 'bg-blue-100': link.active }"
          v-html="link.label"
        />
      </template>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
  },
  methods: {
    pageClicked(url) {
      this.$emit("pageClicked", url);
    },
  },
};
</script>