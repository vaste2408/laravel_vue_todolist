<template>
    <div>
        <h3 class="text-center">Edit Item</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateItem">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="item.title">
                    </div>
                    <div class="form-group">
                        <label>Is completed</label>
                        <input type="checkbox" class="form-control" v-model="item.is_done">
                    </div>
                    <button type="submit" class="btn btn-primary">Update item</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            item: {}
        }
    },
    created() {
        this.axios
            .get(`items/edit/${this.$route.params.id}`)
            .then((response) => {
                this.item = response.data;
            });
    },
    methods: {
        updateItem() {
            this.axios
                .post(`items/update/${this.$route.params.id}`, this.item)
                .then((response) => {
                    this.$router.push({name: 'home'});
                });
        }
    }
}
</script>
