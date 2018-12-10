<template lang="html">
  <v-container  grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12 sm12>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="First Name"
              hint="e.g Honda, Toyota etc"
              required
            ></v-text-field>

            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="Last Name"
              hint="manufactured date"
              required
            ></v-text-field>

            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="Date of Birth"
              hint="(yyy-mm-dd)"
              required
            ></v-text-field>

            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="Driver License No."
              hint="(yyy-mm-dd)"
              required
            ></v-text-field>

            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="Expiry date"
              hint="driver's license expiry date"
              required
            ></v-text-field>

            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="Contact no."
              hint="mobile no."
              required
            ></v-text-field>

            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="E-mail address"
              hint="e-mail address of driver"
              required
            ></v-text-field>



            <v-btn
              :disabled="!valid"
              @click="submit"
            >
              submit
            </v-btn>
            <v-btn @click="clear">clear</v-btn>
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
        <th scope="col">Booking No.</th>
        <th scope="col">Service name</th>
        <th scope="col">Vehicle</th>
        <th scope="col">service date</th>
        <th scope="col">service time</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>
          <button type="button" class="fa fa-pencil fa-2x" @click=""> </button>
          <button type="button" class="fa fa-trash fa-2x" @click=""> </button>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>@mdo</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>@mdo</td>
        <td>@mdo</td>
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
      valid: true,
      name: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters'
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      select: null,
      items: [
        'SUV',
        'Truck',
        'Sedan'
      ],
      checkbox: false
    }),
    methods:{
      submit () {
        if (this.$refs.form.validate()) {
          // Native form submission is not yet supported
          axios.post('/api/submit', {
            name: this.name,
            email: this.email,
            select: this.select,
            checkbox: this.checkbox
          })
        }
      },
      clear () {
        this.$refs.form.reset()
      }
    }
}
</script>

<style lang="css">
</style>
