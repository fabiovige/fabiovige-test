<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Produtos</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Estoque</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.id">
                                <td>{{ product.id }}</td>
                                <td>{{ product.name }}</td>
                                <td>{{ product.description }}</td>
                                <td>{{ product.price }}</td>
                                <td>{{ product.stocked }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductsComponent",
    data() {
        return {
            products: {},
        }
    },
    methods: {
        getProducts(){
            axios.get('/api/products')
                .then((response)=>{
                    this.products = response.data.data
                })
        }
    },
    created() {
        this.getProducts()
    }
}
</script>

<style scoped>

</style>
