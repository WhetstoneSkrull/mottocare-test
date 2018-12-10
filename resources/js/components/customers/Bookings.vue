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

  </v-app>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
