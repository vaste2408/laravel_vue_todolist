<template>
    <div>
        <h3 class="text-center">Add Item</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addItem">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="item.title">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Item</button>
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
    methods: {
        addItem() {
            this.axios
                .post('api/items/add', this.item)
                .then(response => (
                    this.$router.push({name: 'home'})
                ))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        }
    }
}
</script>
