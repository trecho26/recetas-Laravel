<template>
    <input 
        class="btn btn-danger" 
        type="submit" 
        value="Eliminar"
        v-on:click='eliminarReceta'
    >                   
</template>

<script>
    export default {
        props: ['recetaId'],
        methods: {
            eliminarReceta(){
                this.$swal.fire({
                    title: 'Deseas eliminar esta receta?',
                    text: "Una vez eliminada, no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const params = {
                            id: this.recetaId,
                        }
                        //Peticion al servidor
                        axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'}).then(respuesta => {
                            this.$swal.fire({
                                title: 'Receta eliminada',
                                text: "Se elimino la receta",
                                icon: 'success',
                            });
                            //Eliminar la receta del nodo
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        }).catch(error => {
                            console.log(error);
                        })
                    }
                })
            }
        }
    }
</script>