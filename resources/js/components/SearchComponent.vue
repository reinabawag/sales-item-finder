<template>
    <div>
        <form action="">
            <div class="form-group">
                <label for="keywoard">Search Item</label>
                <input type="text" class="form-control" id="keywoard" aria-describedby="keyword" v-model="keyword">
                <span v-if="isLoading">Loading please wait...</span>
            </div> 
        </form>
        <button type="submit" class="btn btn-primary" v-on:click.stop.prevent="search">Search</button>
        <button type="submit" class="btn btn-success" v-on:click="importData">Import</button>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Item</td>
                    <td>Description</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items" :key="item.item">
                    <td>{{ item.item }}</td>
                    <td>{{ item.desc }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isLoading: false,
            keyword: '',
            items: {}
        }
    },

    methods: {
        importData() {
            this.isLoading = true;

            axios
            .get(`/import`)
            .then((respose) => {
                this.isLoading = false;
                console.log(respose.data);
            })
        },

        search() {


            if (this.keyword.length == 0) {
                window.alert('Please input keyword!');
                return;
            }

            this.isLoading = true;

            console.log('clicked');

            axios
            .get(`/api/search`, {
                params: {
                    keyword: this.keyword
                }
            })
            .then((response) => {
                this.isLoading = false;
                this.items = response.data.data;
            })
        }
    }
}
</script>