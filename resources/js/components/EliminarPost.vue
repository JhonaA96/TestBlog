<template>
    <input 
        type="submit" 
        class="btn btn-danger mb-2 w-100 d-block" 
        value="Eliminar"
        @click = "eliminarPost"
    >
</template>

<script>
    export default{
        props:['postId'],
        methods:{
            eliminarPost(){
                this.$swal({
                    title: '¿Desea Eliminar el post?',
                    text: "Una vez eliminado no se podrá recuperrar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                    }).then((result) => {
                    if (result.value) {
                        const params={
                            id: this.postId
                        }
                        /* Se envia la petición al servidor */
                            axios.post(`/Blog/${this.postId}`, {params, _method:'delete'})
                                .then(respuesta =>{
                                    this.$swal({
                                    title: 'Post Eliminado',
                                    text: 'Se ha eliminado el post',
                                    icon: 'success'
                                    });

                                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                                })
                                .catch(error=>{
                                    console.log(error);
                                })
                    }
                    })
            }
        }
    }
</script>