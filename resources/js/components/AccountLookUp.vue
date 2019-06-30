<template>
  <div>
    <!-- Account Input -->
    <div class="row mb-2">
      <div class="col-md-9">
        <input class="form-control" type="text" placeholder="Account Name" v-model="account_name" />
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-primary w-100" @click="get_account_stats">Search</button>
      </div>
    </div>

    <!-- Error Alerts -->
    <div class="alert alert-dismissible alert-danger" v-if="this.error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Oh snap!</strong>
      {{ this.error }}.
    </div>

    <!-- Stats -->
    
    <div v-if="this.player_stats.stats" class="row">
        <div class="col-md-6">
            
        </div>
        <div class="col-md-6">
            <ul v-if="this.player_stats.stats" class="list-group">
            <div v-for="(stat, index) in this.player_stats.stats" :key="index" class="border-primary stat-block">
                <li v-if="index != 'Overall'" class="list-group-item d-flex justify-content-between align-items-center border-primary py-1" style="border-color:#5B6972!important">
                {{ index }} <button class="badge badge-primary badge-pill">{{ stat.Level }}</button>
                </li>
            </div>
        </ul> 
        </div>

    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      player_stats: [],
      account_name: "",
      error: ""
    };
  },
  methods: {
    reset_errors() {
      return (this.error = "");
    },
    get_account_stats() {
      this.reset_errors();

      axios.get("/player_stats/" + this.account_name)
        .then(response => {
          if (response.data.status == "success") {
            return this.player_stats = response.data.body;
          } else if (response.data.status == "error") {
            return this.error = response.data.body.message;
          }
        })
        .catch(error => {
          return (this.error = "Something went wrong");
        });
    }
  }
};
</script>
