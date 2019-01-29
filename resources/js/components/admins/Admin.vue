<template>
  <v-layout row wrap>
    <v-flex xs12 sm12>
      <p class="title">Mottocare Admin Panel</p>
    </v-flex>

      <!--Booking card-->
      <v-flex xs12 sm4>
           <v-card
           hover="true"
           >
             <v-card-title primary-title>
               <div>
                 <h3 class="headline mb-0">Customers<v-icon large="true">book</v-icon></h3>
               </div>
             </v-card-title>

             <v-card-actions>
               <v-btn flat color="blue" :to="{path: 'bookings'}">Explore</v-btn>
             </v-card-actions>
           </v-card>
     </v-flex>
     <!--End of Booking card-->

     <!--Car card-->
     <v-flex xs12 sm4>
     <v-card
     hover="true"
     >
     <v-card-title primary-title>
     <div>
     <h3 class="headline mb-0">Vendors<v-icon large="true">local_car_wash</v-icon></h3>
     </div>
     </v-card-title>

     <v-card-actions>
     <!--<v-btn flat color="blue">Add</v-btn> -->
     <v-btn flat color="blue" :to="{path: 'my-vehicles'}">Explore</v-btn>
     </v-card-actions>
     </v-card>
     </v-flex>
     <!--End of Car card-->

     <!--Driver card-->
     <v-flex xs12 sm4>
         <v-card
         hover="true"
         >
           <v-card-title primary-title>
           <div>
           <h3 class="headline mb-0">Agents<v-icon large="true">person_pin</v-icon></h3>
           </div>
           </v-card-title>

           <v-card-actions>
           <!--<v-btn flat color="blue">Add</v-btn> -->
           <v-btn flat color="blue" :to="{path: 'my-drivers'}">Explore</v-btn>
           </v-card-actions>
         </v-card>

     </v-flex>

  </v-layout>
</div>

  </v-layout>
</template>
<script >
  export default {
    data() {
  return {
    cat:[],
    //automobile data
    automobiles: [],
    automobile: {
      id: '',
      name: ''
    },
    auto_id: '',
    edit: false,

    //category data
    categories:[],
    category:{
      id:'',
      name:''
    },
    category_id:'',
    edit:false,

    //engine data
    engines:[],
    engine:{
      id:'',
      name:''
    },
    engine_id:'',
    edit:false,

    //service data
    services:[],
    service:{
      id:'',
      name:'',
      service_category_id:''
    },
    service_id:'',
    edit:false,

  };
},
mounted(){
    axios.get("/api/services/category")
    .then(response => {
        this.cat = response.data
    })
    .catch(error => {
        console.error(error);
    })
},
methods:{
  addAutomobile() {
      if (this.edit === false) {
        // Add
        fetch('/api/automobile', {
          method: 'post',
          body: JSON.stringify(this.automobile),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
      let myToast = this.$toasted.show("Automobile Added");
      myToast.text("Automobile Added").goAway(2000);

      $('#button').submit(function(e) {
    e.preventDefault();
    // Coding
    $('#automobile').modal('toggle'); //or  $('#IDModal').modal('hide');
    return false;
});
    //  this.$router.push('/admin/dashboard');
          })
          .catch(err => console.log(err));
      } else {

        // Update automobile
        fetch('api/automobile', {
          method: 'put',
          body: JSON.stringify(this.automobile),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Automobile Updated');
        //    this.fetchArticles();
          })
          .catch(err => console.log(err));
        }
      },
      addCategory() {
          if (this.edit === false) {
            // Add
            fetch('/api/service/category', {
              method: 'post',
              body: JSON.stringify(this.category),
              headers: {
                'content-type': 'application/json'
              }
            })
              .then(res => res.json())
              .then(data => {
          let myToast = this.$toasted.show("Service Category Added");
          myToast.text("Service Category Added").goAway(2000);

        //  this.$router.push('/admin/dashboard');
              })
              .catch(err => console.log(err));
          } else {
            // Update
            fetch('api/service/category', {
              method: 'put',
              body: JSON.stringify(this.category),
              headers: {
                'content-type': 'application/json'
              }
            })
              .then(res => res.json())
              .then(data => {
                this.clearForm();
                alert('Category Updated');
            //    this.fetchArticles();
              })
              .catch(err => console.log(err));
            }
          },
          addEngine() {
              if (this.edit === false) {
                // Add
                fetch('/api/engine/category', {
                  method: 'post',
                  body: JSON.stringify(this.engine),
                  headers: {
                    'content-type': 'application/json'
                  }
                })
                  .then(res => res.json())
                  .then(data => {
              let myToast = this.$toasted.show("Engine Category Added");
              myToast.text("Engine Category Added").goAway(2000);

            //  this.$router.push('/admin/dashboard');
                  })
                  .catch(err => console.log(err));
              } else {
                // Update
                fetch('api/engine/category', {
                  method: 'put',
                  body: JSON.stringify(this.engine),
                  headers: {
                    'content-type': 'application/json'
                  }
                })
                  .then(res => res.json())
                  .then(data => {
                    this.clearForm();
                    alert('Engine Updated');
                //    this.fetchArticles();
                  })
                  .catch(err => console.log(err));
                }
              },
              addService() {
                  if (this.edit === false) {
                    // Add
                    fetch('/api/service', {
                      method: 'post',
                      body: JSON.stringify(this.service),
                      headers: {
                        'content-type': 'application/json'
                      }
                    })
                      .then(res => res.json())
                      .then(data => {
                  let myToast = this.$toasted.show("Service  Added");
                  myToast.text("Service Added").goAway(2000);

                //  this.$router.push('/admin/dashboard');
                      })
                      .catch(err => console.log(err));
                  } else {
                    // Update
                    fetch('api/service', {
                      method: 'put',
                      body: JSON.stringify(this.service),
                      headers: {
                        'content-type': 'application/json'
                      }
                    })
                      .then(res => res.json())
                      .then(data => {
                        this.clearForm();
                        alert('Service Updated');
                    //    this.fetchArticles();
                      })
                      .catch(err => console.log(err));
                    }
                  },
            }
  }
</script>
<style scoped="">
/* Styles for wrapping the search box */

.main {
  width: 50%;
  margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
  padding-left: 2.375rem;
}

.has-search .form-control-feedback {
  position: absolute;
  z-index: 2;
  display: block;
  width: 2.375rem;
  height: 2.375rem;
  line-height: 2.375rem;
  text-align: center;
  pointer-events: none;
  color: #aaa;
}
</style>
