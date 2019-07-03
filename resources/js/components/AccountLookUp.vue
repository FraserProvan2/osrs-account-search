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

    <!-- Overll -->

    <!-- Stats -->
    <div v-if="this.player_stats_a && this.player_stats_b" class="row">
        <div class="col-md-6">
            <stats-list :player_data="player_stats_a"></stats-list>
        </div>
        <div class="col-md-6">
            <stats-list :player_data="player_stats_b"></stats-list>
        </div>
    </div>
    
  </div>
</template>

<script>
export default {
  data() {
    return {
      overall: [],
      player_stats_a: [],
      player_stats_b: [],
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
            this.overall = response.data.body.stats.overall;
            this.player_stats_a = response.data.body.stats.splices[0];
            this.player_stats_b = response.data.body.stats.splices[1];

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
