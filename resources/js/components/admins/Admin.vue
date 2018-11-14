<template>
    <div class="container">
      <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="/images/stock.jpg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="/images/stock.jpg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">Schedule
              <span class="badge badge-primary ml-1">New</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Reports</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="/images/face1.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="/images/face1.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="/images/face1.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, Richard V.Welsh !</span>
              <img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2">
                Manage Account
              </a>
              <a class="dropdown-item">
                Change picture
              </a>
              <a class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>

    </nav>

    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="user-wrapper">
              <div class="profile-image">
                <img src="/images/face1.jpg" alt="profile image">
              </div>
              <div class="text-wrapper">
                <p class="profile-name">Richard V.Welsh</p>
                <div>
                  <small class="designation text-muted">Manager</small>
                  <span class="status-indicator online"></span>
                </div>
              </div>
            </div>
            <button class="btn btn-success btn-block">New Project
              <i class="mdi mdi-plus"></i>
            </button>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
          <i class="menu-arrow"></i>
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-account-multiple"></i>
            <span class="menu-title">User Manager</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="pages/ui-features/buttons.html">Create new vendor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/ui-features/typography.html">Add Admin</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="menu-icon mdi mdi-room-service"></i>
            <span class="menu-title">Service Manager</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <button  class="nav-link btn btn-link" data-toggle="modal" data-target="#engine">
                  <span class="mdi mdi-engine"></span> Add Engine
                </button>
              </li>
              <li class="nav-item">
                <button  class="nav-link btn btn-link" data-toggle="modal" data-target="#category">
                  <span class="mdi mdi-theater">   Add Category</span>
                </button>
              </li>
              <li class="nav-item">
                <button  class="nav-link btn btn-link" data-toggle="modal" data-target="#service">
                    <span class="mdi mdi-format-paint"> Add Service</span>
                </button>
              </li>
              <li class="nav-item">
                <button  class="nav-link btn btn-link" data-toggle="modal" data-target="#automobile">
                  <span class="mdi mdi-tractor">  Add Automobile</span>
                </button>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
    <div class="main">
  <!-- Another variation with a button -->
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search this blog">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="button">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
</div>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-cube text-danger icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <p class="mb-0 text-right">Total Revenue</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">$65,650</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-receipt text-warning icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <p class="mb-0 text-right">Orders</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">3455</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-poll-box text-success icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <p class="mb-0 text-right">Sales</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">5693</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-account-location text-info icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <p class="mb-0 text-right">Employees</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">246</h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <div class="row d-none d-sm-flex mb-4">
                  <div class="col-4">
                    <h5 class="text-primary">Unique Visitors</h5>
                    <p>34657</p>
                  </div>
                  <div class="col-4">
                    <h5 class="text-primary">Bounce Rate</h5>
                    <p>45673</p>
                  </div>
                  <div class="col-4">
                    <h5 class="text-primary">Active session</h5>
                    <p>45673</p>
                  </div>
                </div>
                <div class="chart-container">
                  <canvas id="dashboard-area-chart" height="80"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Orders</h4>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>First name</th>
                        <th>Progress</th>
                        <th>Amount</th>
                        <th>Sales</th>
                        <th>Deadline</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="font-weight-medium">
                          1
                        </td>
                        <td>
                          Herman Beck
                        </td>
                        <td>
                          <div class="progress">
                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                              aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td>
                          $ 77.99
                        </td>
                        <td class="text-danger"> 53.64%
                          <i class="mdi mdi-arrow-down"></i>
                        </td>
                        <td>
                          May 15, 2015
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Button trigger modal -->


<!--Engine Modal -->
<div class="modal fade" id="engine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <form  @submit.prevent="addEngine"  v-loading="'submitting...'">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Add Engine Type</h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Engine Name</label>
        <input type="text" class="form-control" placeholder="Petrol, diesel, gas..." v-model="engine.name">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  </div>
</div>
</div>



<!--Automobile Modal -->
<div class="modal fade" id="automobile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <form  @submit.prevent="addAutomobile"  v-loading="'submitting...'">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Add Automobile Category</h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Automobile Name</label>
        <input type="text" class="form-control" placeholder="bike, 3-wheeler, tractor..." v-model="automobile.name">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  </div>
</div>
</div>


<!--Category Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <form @submit.prevent="addCategory"  v-loading="'submitting...'">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Add Service Category</h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Service Category Name</label>
        <input type="text" class="form-control" placeholder="major repair, electronic..." v-model="category.name">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  </div>
</div>
</div>

<!--Service Modal -->
<div class="modal fade" id="service" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <form @submit.prevent="addService"  v-loading="'submitting...'" >
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Add Service</h4>
    </div>
    <ul v-for="category in cat" v-bind:key="category.id">
      <li>{{category.name}}</li>
    </ul>
    <div class="modal-body">
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect02" v-model="service.service_category_id" >
                <option selected >Select Service category</option>
                <option value="2" v-for="category in categories" v-bind:key="category.id">major repair</option>
                <option value="2">major repair</option>
              </select>
              <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Categories</label>
              </div>
      </div>
      <div class="form-group">
        <label>Service Name</label>
        <input type="text" class="form-control" placeholder="Petrol, diesel, gas..." v-model="service.name">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  </div>
</div>
</div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
            <a href="http://www.jdlab.ng.com/" target="_blank">JDlab</a>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
            <i class="mdi mdi-heart text-danger"></i>
          </span>
        </div>
      </footer>
      <!-- partial -->
    </div>

    </div>
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
