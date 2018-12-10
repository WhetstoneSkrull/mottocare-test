<template>
  <v-stepper v-model="e1">
    <v-stepper-header>
      <v-stepper-step :complete="e1 > 1" step="1">Personal Details</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step :complete="e1 > 2" step="2">Manager details</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step :complete="e1 > 3" step="3">Mechanic Details</v-stepper-step>
      <v-divider></v-divider>

      <v-stepper-step :complete="e1 > 4" step="4">Business Details</v-stepper-step>
      <v-divider></v-divider>

      <v-stepper-step :complete="e1 > 5" step="5">Preview</v-stepper-step>
    </v-stepper-header>

    <v-stepper-items>
      <v-stepper-content step="1">
        <v-form ref="form" v-model="valid" lazy-validation>
          <v-text-field
            v-model="vendor.vendor_title"
            :rules="nameRules"
            :counter="10"
            label="Business name"
            required
          ></v-text-field>
            <v-text-field
              v-model="vendor.vendor_first_name"
              :rules="nameRules"
              :counter="10"
              label="Vendor First Name"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.vendor_last_name"
              :rules="nameRules"
              :counter="10"
              label="Vendor Last Name"
              required
            ></v-text-field>

            <v-text-field
              v-model="vendor.vendor_email"
              :rules="emailRules"
              label="Business E-mail"
              required
            ></v-text-field>

            <v-text-field
              v-model="vendor.mobile_no"
              :rules="nameRules"
              :counter="10"
              label="Mobile No."
              required
            ></v-text-field>
          </v-form>

        <v-btn
          color="blue"
          :disabled="!valid"
          @click="e1 = 2"
        >
          Continue
        </v-btn>
      </v-stepper-content>

      <v-stepper-content step="2">
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
              v-model="vendor.manager_first_name"
              :rules="nameRules"
              :counter="10"
              label="Manager/Owner First Name"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.manager_last_name"
              :rules="nameRules"
              :counter="10"
              label="Manager/Owner Last Name"
              required
            ></v-text-field>

            <v-text-field
              v-model="vendor.manager_email"
              :rules="emailRules"
              label="Manager/Owner E-mail"
              required
            ></v-text-field>
          </v-form>

        <v-btn
          color="blue"
          @click="e1 = 3"
        >
          Continue
        </v-btn>
        <v-btn flat   @click="e1 = 1">Back</v-btn>
      </v-stepper-content>

      <v-stepper-content step="3">
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
              v-model="vendor.mechanic_first_name"
              :rules="nameRules"
              :counter="10"
              label="Mechanic First Name"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.mechanic_last_name"
              :rules="nameRules"
              :counter="10"
              label="Mechanic Last Name"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.mechanic_email"
              :rules="emailRules"
              label="Mechanic E-mail"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.mechanic_dob"
              :rules="nameRules"
              :counter="10"
              label="Mechanic Date of Birth"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.Mechanic_contact_no"
              :rules="nameRules"
              :counter="10"
              label="Mechanic Contact no."
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.mechanic_nationality"
              :rules="nameRules"
              :counter="10"
              label="Mechanic Nationality"
              required
            ></v-text-field>
          </v-form>

        <v-btn
          color="blue"
          @click="e1 = 4"
        >
          Continue
        </v-btn>

        <v-btn flat   @click="e1 = 2">Back</v-btn>
      </v-stepper-content>

      <v-stepper-content step="4">
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
              v-model="vendor.address"
              :rules="nameRules"
              :counter="10"
              label="Business Address"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.state"
              :rules="nameRules"
              :counter="10"
              label="State of business"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.city"
              :rules="nameRules"
              :counter="10"
              label="City"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.lga"
              :rules="nameRules"
              :counter="10"
              label="Local Government Area"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.capacity"
              :rules="nameRules"
              :counter="10"
              label="Business capacity/manpower"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.opening_time"
              :rules="nameRules"
              :counter="10"
              label="Business Opening time"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.closing_time"
              :rules="nameRules"
              :counter="10"
              label="Business Closing time"
              required
            ></v-text-field>
            <v-text-field
              v-model="vendor.off_day"
              :rules="nameRules"
              :counter="10"
              label="Off days"
              required
            ></v-text-field>
          </v-form>

        <v-btn
          color="blue"
          @click="e1 = 5"
        >
          Continue
        </v-btn>

        <v-btn flat   @click="e1 = 3">Back</v-btn>
      </v-stepper-content>

      <v-stepper-content step="5">
        <v-layout>
            <v-flex xs12 sm6 offset-sm3>

              <v-card>
                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Manager Details</h3>
                    <div class="text-center">
                  <p>Vendor First Name: {{vendor.vendor_first_name}}</p>
                  <p>Vendor Last Name: {{vendor.vendor_last_name}}</p>
                  <p>Vendor Mobile No.: {{vendor.mobile_no}}</p>
                  <p>Manager First Name: {{vendor.manager_first_name}}</p>
                  <p>Manager Last name: {{vendor.manager_last_name}}</p>
                  <p>Manager Email: {{vendor.manager_email}}</p>
                </div>
                  </div>
                </v-card-title>
                <v-card-actions>
                  <v-btn flat color="orange" @click="e1 = 1">Edit</v-btn>
                </v-card-actions>
              </v-card>
              <v-divider></v-divider>

              <v-card>
                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Mechanic Details</h3>
                    <div class="text-center">
                    <p>Mechanic First name: {{vendor.mechanic_first_name}}</p>
                    <p>Mechanic Last Name: {{vendor.mechanic_last_name}}</p>
                    <p>Mechanic Nationality: {{vendor.mechanic_nationality}}</p>
                    <p>Mechanic D-o-B: {{vendor.mechanic_dob}}</p>
                    <p>Mechanic  Contact no: {{vendor.mechanic_contact_no}}</p>
                    <p>Mechanic Email: {{vendor.mechanic_email}}</p>
                  </div>
                  </div>
                </v-card-title>
                <v-card-actions>
                  <v-btn flat color="orange" @click="e1 = 2">Edit</v-btn>
                  <v-btn flat color="orange">Explore</v-btn>
                </v-card-actions>
              </v-card>
              <v-divider></v-divider>

              <v-card>
                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Mechanic Details</h3>
                    <div class="text-center">
                  <p>Busines Address: {{vendor.address}}</p>
                  <p>State: {{vendor.state}}</p>
                  <p>City: {{vendor.city}}</p>
                  <p>LGA: {{vendor.lga}}</p>
                  <p>Capacity: {{vendor.capacity}}</p>
                  <p>Opening time: {{vendor.opening_time}}</p>
                  <p>Closing time: {{vendor.closing_time}}</p>
                  <p>Off-day: {{vendor.off_day}}</p>
                </div>
                  </div>
                </v-card-title>
                <v-card-actions>
                  <v-btn flat color="orange" @click="e1 = 3">Edit</v-btn>
                </v-card-actions>
              </v-card>


            </v-flex>
          </v-layout>
        <v-btn
          color="blue"
           @click="registerVendor"
        >
          Submit Vendor Application Form
        </v-btn>

        <v-btn flat   @click="e1 = 5">Back</v-btn>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
</template>

<script>
export default {
    data () {
      return {
        e1: 0,
        valid: true,
      name: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 25) || 'Name must be less than 25 characters'
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      vendor:{
                vendor_title:"",
                vendor_first_name:"",
                vendor_last_name:"",
            //    vendor_logo:'business',
                user_id:1,
                vendor_email:"",
                vendor_logo:"",
                mobile_no:"",
                manager_first_name:"",
                manager_last_name:"",
                manager_email:"",
                mechanic_first_name:"",
                mechanic_last_name:"",
                mechanic_email:"",
                mechanic_image:"",
                mechanic_nationality:"",
                address:"",
                state:"",
                city:"",
                lga:"",
                capacity:"",
                opening_time:"",
                closing_time:"",
                off_day:"",
                status:"pending"
              //  membership:"",
              //  lumpsum:"",

            },
      }
    },
    methods:{
      registerVendor(){
        axios.post('/api/vendor',this.vendor)
        .then(response=>{
          //localStorage.setItem('user',JSON.stringify(response.data.user))
          //localStorage.setItem('access_token',response.data.token)
            console.log(response);
            this.$router.push('/');
            this.$toasted.global.signup().goAway(1500);

        })
        .catch(error=>{
            console.log(error.response)
        })
      }
    }
  }
</script>

<style lang="css">
</style>
