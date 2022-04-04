<template>
    <div>
        <h3 class="text-center">All Items</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Is done</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in list" :key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.is_done }}</td>
                <td>{{ item.title }}</td>
                <td>{{ item.created_at }}</td>
                <td>{{ item.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: item.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteItem(item.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            list: []
        }
    },
    created() {
        this.axios
            .get('api/items')
            .then(response => {
                this.list = response.data;
            });
    },
    methods: {
        deleteItem(id) {
            this.axios
                .delete(`api/items/delete/${id}`)
                .then(response => {
                    let i = this.list.map(item => item.id).indexOf(id); // find index of object
                    this.list.splice(i, 1)
                });
        }
    }
}
</script>
