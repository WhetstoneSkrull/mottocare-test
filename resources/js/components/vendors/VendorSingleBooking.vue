<template lang="html">
  <v-container grid-list-xs,sm,md,lg,xl>
    <v-layout row wrap>
      <v-flex xs12 sm6 offset-sm-3>
        <v-card>
          <v-card-title primary-title>
            <button type="button" class="btn btn-primary spacer" v-for="service in booking.servicerenders">
                     {{service.service.service_name}}
            </button>
          </v-card-title>
          <v-card-text>
            <p><strong>vehicle:</strong> {{booking.vehicle.car.car_manufacturer}}</p>
            <p><strong>Date:</strong> {{booking.service_date}}</p>
            <p><strong>Time:</strong> {{booking.service_time}}</p>
          </v-card-text>

        </v-card>
      </v-flex>

    </v-layout>
  </v-container>
</template>

<script>
export default {
  data(){
    return{
      booking:[]
    }
  },
  beforeMount(){

    this.user = JSON.parse(localStorage.getItem('user'))
    axios.defaults.headers.common['Content-Type'] = 'application/json'
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

    axios.get(`/api/booking/${this.$route.params.id}`)
          .then(response => {
              this.booking = response.data.data
          })
          .catch(error => {
              console.error(error);
          })
  }
}
</script>

<style lang="css">
.spacer{
  margin-left: 5px;
  margin-right: 5px;
}
</style>
