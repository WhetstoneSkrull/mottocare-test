<template lang="html">
  <v-container  grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12 sm12>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
              v-model="driver.driver_first_name"
              :rules="nameRules"
              label="First Name"
              hint="your driver's first name"
              required
            ></v-text-field>

            <v-text-field
              v-model="driver.driver_last_name"
              :rules="nameRules"
              label="Last Name"
              hint="your driver's last name"
              required
            ></v-text-field>

            <v-text-field
              v-model="driver.email"
              :rules="emailRules"
              label="E-mail address"
              hint="e-mail address of driver"
              required
            ></v-text-field>

            <v-text-field
              v-model="driver.driver_dob"
              :rules="nameRules"
              label="Date of Birth"
              hint="(yyyy-mm-dd)"
              required
            ></v-text-field>

            <v-text-field
              v-model="driver.driving_license_no"
              :rules="nameRules"
              :counter="10"
              label="Driver License No."
              hint="(yyyy-mm-dd)"
              required
            ></v-text-field>

            <v-text-field
              v-model="driver.driving_license_expiry_date"
              :rules="nameRules"
              :counter="10"
              label="Expiry date"
              hint="driver's license expiry date"
              required
            ></v-text-field>

            <v-text-field
              v-model="driver.contact_no"
              :rules="nameRules"
              :counter="10"
              label="Contact no."
              hint="mobile no."
              required
            ></v-text-field>

            <v-btn
              :disabled="!valid"
              @click="addDriver"
            >
              submit
            </v-btn>
            <v-btn @click="clearIt">clear</v-btn>
          </v-form>

        <v-divider></v-divider

      </v-flex>
      </v-flex>

      <v-flex xs12 sm12>
        <h3>My Drivers</h3>
      </v-flex>

      <div class="table-responsive">

      <table class="table">
    <thead class="thead-info">
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">License No.</th>
        <th scope="col">Mobile No.</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="driver in drivers"v-bind:key="driver.id">
        <th scope="row">1</th>
        <td>{{driver.driver_first_name}}</td>
        <td>{{driver.driver_last_name}}</td>
        <td>{{driver.driver_dob}}</td>
        <td>{{driver.driving_license_no}}</td>
        <td>{{driver.driving_license_expiry_date}}</td>
        <td>{{driver.contact_no}}</td>
        <td>{{driver.email}}</td>
        <td>
          <button type="button" class="fa fa-pencil fa-2x" @click="editDriver(driver)"> </button>
          <button type="button" class="fa fa-trash fa-2x" @click="deleteDriver(driver.id)"> </button>
        </td>
      </tr>
    </tbody>
  </table>
  </div>


    </v-layout>

  </v-container>
</template>

<script>
export default {
  data: () => ({
    user : null,
    drivers : [],
      valid: true,
      nameRules: [
        v => !!v || 'This Field is required'
      ],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      driver:{
        id:"",
        user_id:2,
        driver_first_name:"",
        driver_last_name:"",
        driver_dob:"",
        driving_license_no:"",
        driving_license_expiry_date:"",
        contact_no:"",
        email:""
      },
      driver_id:"",
      edit: false

    }),
    beforeMount(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        axios.get(`api/auth/user/${this.user.id}/drivers`)
        .then(response => {
            this.drivers = response.data
        })
        .catch(error => {
            console.error(error);
        })
    },
    methods:{
      fetchDrivers() {

      axios.get(`api/auth/user/${this.user.id}/drivers`)
      .then(response => {
          this.drivers = response.data
      })
      .catch(error => {
          console.error(error);
      })
    },
      addDriver(){

        if (this.edit === false) {
        // Add Driver
        axios.post('/api/driver',this.driver)

        .then(response=>{
            console.log(response);
            //this.$router.push('/dashboard');
            this.$toasted.global.driverAdded().goAway(1500);
            this.clearIt();
            this.fetchDrivers();

        })
        .catch(error=>{
            console.log(error.response)
        })
      }else {
        // Update
        axios.put('/api/driver',this.driver)

        .then(response=>{
            console.log(response);
            //this.$router.push('/dashboard');
            this.$toasted.global.driverUpdated().goAway(1500);
            this.clearIt();
            this.fetchDrivers();

        })
        .catch(error=>{
            console.log(error.response)
          })
        }
      },
      editDriver(driver) {
      this.edit = true;
      this.driver.id = driver.id;
      this.driver.driver_id= driver.id;
      this.driver.driver_first_name = driver.driver_first_name;
      this.driver.driver_last_name = driver.driver_last_name;
      this.driver.driver_dob = driver.driver_dob;
      this.driver.driving_license_no = driver.driving_license_no;
      this.driver.driving_license_expiry_date = driver.driving_license_expiry_date;
      this.driver.contact_no = driver.contact_no;
      this.driver.email = driver.email;
    },
    deleteDriver(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/driver/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
          //  alert('Vehicle Deleted');
          this.$toasted.global.driverDeleted().goAway(1500);
            this.fetchDrivers();
          })
          .catch(err => console.log(err));
      }
    },

      clearIt() {
        this.$refs.form.reset()
      }
    }
}
</script>

<style lang="css">
</style>
