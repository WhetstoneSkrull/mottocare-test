<template lang="html">
  <v-app>

      <div class="table-responsive">
      <table class="table">
      <thead class="thead-info">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Booking No.</th>
        <th scope="col">Service name</th>
        <th scope="col">Vehicle</th>
        <th scope="col">service date</th>
        <th scope="col">service time</th>
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody>
      <tr  v-for="(booking,index) in bookings" @key="index">
        <th scope="row">{{booking.id}}</th>
        <td>{{booking.vehicle_id}}</td>
        <td>{{booking.service_date}}</td>
        <td>{{booking.service_time}}</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>
          <button type="button" class="fa fa-pencil fa-2x" @click=""> </button>
          <button type="button" class="fa fa-trash fa-2x" @click=""> </button>
        </td>
      </tr>

      </tbody>
      </table>
      </div>

  </v-app>
</template>

<script>
export default {
  data(){
            return {
                user : null,
                bookings : [],
                vehicle:{
                  id:"",
                  user_id:"",
                  vehicle_make:"",
                  year:"",
                  pic:"",
                  vehicle_reg_no:""
                  }
            }
        },
        beforeMount(){
            this.user = JSON.parse(localStorage.getItem('user'))
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

            axios.get(`api/auth/user/${this.user.id}/bookings`)
            .then(response => {
                this.bookings = response.data
            })
            .catch(error => {
                console.error(error);
            })
        },
        methods:{
        //
        }

      }
</script>

<style lang="css">
</style>
