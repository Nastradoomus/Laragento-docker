<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div>
          <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
              <jet-application-logo class="block h-12 w-auto" />
            </div>
            <div class="mt-8 text-2xl">Magento Sampledata Products</div>

            <div class="mt-6 text-gray-500">
              Fetches all sampledata products. See console for data object.
            </div>
          </div>

          <div
            class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2"
          >
            <div v-for="d in data" :key="d" class="p-6">
              <div class="flex items-center">
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                  {{ d.sku }}
                  <b>{{ d.catalog_product_entity_varchars[0].value }}</b>
                </div>
              </div>

              <div class="ml-12">
                <div class="mt-3 flex items-center">
                  <img
                    :src="getUrl(d.catalog_product_entity_varchars, d.type_id)"
                  />
                </div>
                <div
                  class="mt-2 text-sm text-gray-500"
                  v-html="d.catalog_product_entity_texts[0].value"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

const protoType = {
  entity_id: 1,
  attribute_set_id: 15,
  type_id: "simple",
  sku: "24-MB01",
  has_options: 0,
  required_options: 0,
  created_at: "2021-11-24T20:08:52.000000Z",
  updated_at: "2021-11-24T20:08:52.000000Z",
  catalog_product_entity_varchars: [
    {
      value_id: 1,
      attribute_id: 73,
      store_id: 0,
      entity_id: 1,
      value: "Joust Duffle Bag",
    },
    {
      value_id: 2,
      attribute_id: 123,
      store_id: 0,
      entity_id: 1,
      value: "joust-duffle-bag",
    },
    {
      value_id: 3,
      attribute_id: 87,
      store_id: 0,
      entity_id: 1,
      value: "/m/b/mb01-blue-0.jpg",
    },
    {
      value_id: 4,
      attribute_id: 88,
      store_id: 0,
      entity_id: 1,
      value: "/m/b/mb01-blue-0.jpg",
    },
    {
      value_id: 5,
      attribute_id: 89,
      store_id: 0,
      entity_id: 1,
      value: "/m/b/mb01-blue-0.jpg",
    },
  ],
  catalog_product_entity_ints: [
    { value_id: 1, attribute_id: 97, store_id: 0, entity_id: 1, value: 1 },
    { value_id: 2, attribute_id: 99, store_id: 0, entity_id: 1, value: 4 },
  ],
  catalog_product_entity_texts: [
    {
      value_id: 1,
      attribute_id: 75,
      store_id: 0,
      entity_id: 1,
      value:
        '<p>The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.<p>\n<ul>\n<li>Dual top handles.</li>\n<li>Adjustable shoulder strap.</li>\n<li>Full-length zipper.</li>\n<li>L 29" x W 13" x H 11".</li>\n</ul>',
    },
  ],
  catalog_product_entity_decimals: [
    { value_id: 1, attribute_id: 77, store_id: 0, entity_id: 1, value: 34 },
  ],
};

export default defineComponent({
  components: {
    JetApplicationLogo,
    AppLayout,
  },
  props: {
    data: {
      type: Object,
      default: undefined,
    },
  },
  mounted() {
    console.log(this.$props.data);
  },
  methods: {
    getUrl($catalog_product_entity_varchars, $type_id) {
      let base = "http://localhost/media/catalog/product";

      if ($type_id === "simple") {
        return (
          base +
          $catalog_product_entity_varchars[
            $catalog_product_entity_varchars.length - 2
          ].value
        );
      }
      if ($type_id === "configurable")
        return base + $catalog_product_entity_varchars[5].value;
      if ($type_id === "downloadable" || $type_id === "grouped") {
        return (
          base +
          $catalog_product_entity_varchars[
            $catalog_product_entity_varchars.length - 1
          ].value
        );
      }
      if ($type_id === "bundle")
        return base + $catalog_product_entity_varchars[7].value;
      else return;
    },
  },
});
</script>
