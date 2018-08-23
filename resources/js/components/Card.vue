<template>
    <card class="flex flex-col items-center overflow-y-scroll overflow-x-hidden" :style="customStyle">
        <div class="px-3 py-3 max-w-full">
            <h1 class="text-center text-xl text-80">{{ title}}</h1>
            <div class="py-3 feed-item" v-for="item in items">
                <a class="py-2 text-primary dim font-bold" :href="item.link" target="_blank" v-html="item.title"></a>
                <p class="pt-2 pb-4 font-light text-right">{{ humanTime(item.date) }}</p>
                <div class="py-3 feed-description" v-html="item.description"></div>
            </div>
        </div>
    </card>
</template>

<script>
export default {
    props: ['card'],

    data() {
        return {
            title: '',
            items: []
        };
    },

    computed: {
        customStyle() {
            if (this.card.height) {
                return {
                    height: this.card.height
                };
            }

            return {};
        }
    },

    methods: {

        humanTime: function humanTime(string) {
            if (string) {
                return moment.utc(string).fromNow();
            }

            return '';
        },

        async fetchItems() {
            let limit = this.card.limit || 5;

            const data = await Nova.request().get(`/nova-vendor/beyondcode/rss-card/items?limit=${limit}&url=${this.card.feed}`);

            this.items = data.data.items;
            this.title = data.data.title;
        }
    },

    mounted() {
        this.fetchItems();
    },
}
</script>

<style scoped>
    .feed-item img {
        max-width: 100%;
    }
</style>