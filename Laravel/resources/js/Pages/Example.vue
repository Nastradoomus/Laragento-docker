<template>
  <app-layout title="Example">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Example Products
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <products-list :data="data" />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ProductsList from "@/Pages/Products/List/List.vue";

export default defineComponent({
  components: {
    AppLayout,
    ProductsList,
  },
  props: {
    data: {
      type: Object,
      default: undefined,
    },
  },
});
</script>
