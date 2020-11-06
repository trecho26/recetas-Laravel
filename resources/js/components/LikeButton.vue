<template>
  <div>
      <span class="like-btn" @click="likeReceta" :class="{'like-active' : this.like}"></span>
      <p>{{cantidadLikes}} Les gusto esto</p>
  </div>
</template>

<script>
export default {
  props: ['recetaId','like','likeCount'],
  data: function(){
    return {
      totalLikes: this.likeCount,
    }
  },
  mounted(){
    console.log(this.likeCount);
  },
  methods: {
    likeReceta(){
      axios.post('/recetas/' + this.recetaId)
      .then(respuesta => {
        if (respuesta.data.attached.length > 0) {
          this.$data.totalLikes++;
        } else {
          this.$data.totalLikes--;
        }
      })
      .catch(error => {
        if (error.response.status === 401) {
          window.location = '/register';
        }
      })
    }
  },
  computed: {
    cantidadLikes: function() {
      return this.totalLikes;
    }
  }
}
</script>

<style>

</style>