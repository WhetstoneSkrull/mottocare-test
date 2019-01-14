<template lang="html">
<v-app  class="body" grid-list-md text-xs-center>
  <v-layout row wrap>

      <!--customer card-->
      <v-flex xs12 sm4>
     <v-card
     flat="true"
     >
       <v-card-title primary-title>
         <div>
           <h3 class="headline mb-0">Become a Customer<v-icon large="true">book</v-icon></h3>
         </div>
       </v-card-title>

       <v-card-actions>
         <v-btn flat color="blue" :to="{path: 'bookings'}">Go to Customer</v-btn>
       </v-card-actions>
     </v-card>
    </v-flex>
    <!--End of Booking card-->

    <!--customer card-->
    <v-flex xs12 sm4>
   <v-card
   hover="true"
   >
     <v-card-title primary-title>
       <div>
         <h3 class="headline mb-0">Become a Vendor</h3>
       </div>
     </v-card-title>

     <v-card-actions>
       <v-btn flat color="blue" :to="{path: 'vendor-register'}">Sign up Now</v-btn>
     </v-card-actions>
   </v-card>
  </v-flex>
  <!--End of Booking card-->

  <!--customer card-->
  <v-flex xs12 sm4>
 <v-card
 hover="true"
 >
   <v-card-title primary-title>
     <div>
       <h3 class="headline mb-0">Become an Agent<v-icon large="true">book</v-icon></h3>
     </div>
   </v-card-title>

   <v-card-actions>
     <v-btn flat color="blue" :to="{path: 'make-booking'}"> </v-btn>
     <v-btn flat color="blue" :to="{path: 'bookings'}"></v-btn>
   </v-card-actions>
 </v-card>
</v-flex>
<!--End of Booking card-->



</v-layout>
</v-app>
</template>

<script>
export default {
}
</script>

<style lang="css" scoped>
.body {
  background-image: url("/images/mottocare.jpg");
  background-size: cover;
	background-repeat: no-repeat;
}
</style>
