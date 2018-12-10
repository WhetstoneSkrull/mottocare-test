<template lang="html">
  <v-container  grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex xs12 sm12>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="Vehicle Make"
              hint="e.g Honda, Toyota etc"
              required
            ></v-text-field>

            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="Year"
              hint="manufactured date"
              required
            ></v-text-field>

            <v-text-field
              v-model="name"
              :rules="nameRules"
              :counter="10"
              label="Vehicle Registration number"
              hint="your vehicle number"
              required
            ></v-text-field>

            <v-select
              v-model="select"
              :items="items"
              :rules="[v => !!v || 'Item is required']"
              label="Item"
              required
            ></v-select>


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
        <h3>My cars</h3>
      </v-flex>

      <v-flex xs12 sm3>
        <v-card>
          <v-img
            class="blue--text"
            height="200px"
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
          >
            <v-container fill-height fluid>
              <v-layout fill-height>
                <v-flex xs12 align-end flexbox>
                  <span class="headline">Toyota</span>
                </v-flex>
              </v-layout>
            </v-container>
          </v-img>
          <v-card-title>
            <div>
              <span class="blue--text">Toyota</span><br>
              <span>Sedan</span><br>
              <span>xcaaso</span>
            </div>
          </v-card-title>
          <v-card-actions>
            <v-btn flat color="blue">edit</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>

      <v-flex xs12 sm3>
        <v-card>
          <v-img
            class="blue--text"
            height="200px"
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
          >
            <v-container fill-height fluid>
              <v-layout fill-height>
                <v-flex xs12 align-end flexbox>
                  <span class="headline">Toyota</span>
                </v-flex>
              </v-layout>
            </v-container>
          </v-img>
          <v-card-title>
            <div>
              <span class="blue--text">Toyota</span><br>
              <span>Sedan</span><br>
              <span>xcaaso</span>
            </div>
          </v-card-title>
          <v-card-actions>
            <v-btn flat color="blue">edit</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>

      <v-flex xs12 sm3>
        <v-card>
          <v-img
            class="blue--text"
            height="200px"
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
          >
            <v-container fill-height fluid>
              <v-layout fill-height>
                <v-flex xs12 align-end flexbox>
                  <span class="headline">Toyota</span>
                </v-flex>
              </v-layout>
            </v-container>
          </v-img>
          <v-card-title>
            <div>
              <span class="blue--text">Toyota</span><br>
              <span>Sedan</span><br>
              <span>xcaaso</span>
            </div>
          </v-card-title>
          <v-card-actions>
            <v-btn flat color="blue">edit</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
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
