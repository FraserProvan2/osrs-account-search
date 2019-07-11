<template>
  <div>
    <!-- Account Input -->
    <div class="row mb-2">
      <div class="col-md-9">
        <input class="form-control" type="text" placeholder="Account Name" v-model="input_name" />
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-primary w-100" @click="get_account_stats(input_name)">Search</button>
      </div>
    </div>

    <!-- Error Alerts -->
    <div class="alert alert-dismissible alert-danger" v-if="this.error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Oh snap!</strong>
      {{ this.error }}.
    </div>

    <!-- Spinner -->
    <div class="text-center mt-3" v-if="spinner === 1">
      <b-spinner variant="primary" label="Spinning"></b-spinner>
    </div>

    <!-- Overll -->
    <div class="row my-3" v-if="this.player_name">
      <div class="col-md-6">
        <h3 class="text-center my-3">
          <span class="badge badge-primary py-2 mr-1" style="font-size: 1.5rem!important;width: 46px; height: 43px;">
            {{ this.player_grade }}
          </span>
          <span class="h4 mb-1">{{ this.player_name }}</span>
        </h3>
      </div>
      <div class="col-md-6">
        <div>
          <small class="text-muted">Total Level: </small>
          <span class="h4">{{ this.overall.Level }}</span>
        </div>
        <div>
          <small class="text-muted">Rank: </small>
          {{ this.overall.Rank }}
        </div>
        <div>
          <small class="text-muted">Total XP: </small>
          {{ this.overall.XP }}
        </div>
      </div>
    </div>

    <!-- Stats -->
    <div v-if="this.player_stats_a && this.player_stats_b && spinner === 0" class="row">
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
  props: ['onload_account'],
  data() {
    return {
      player_name: "",
      overall: [],
      player_grade: "",
      player_stats_a: [],
      player_stats_b: [],
      input_name: "",
      spinner: 0,
      error: ""
    };
  },
  methods: {
    get_account_stats(account) {
      this.spinner = 1;
      this.reset_errors();

      axios.get("/player_stats/" + account)
        .then(response => {
          if (response.data.status == "success") {
            // set player data
            this.player_name = response.data.body.username;
            this.overall = response.data.body.stats.overall;
            this.player_stats_a = response.data.body.stats.splices[0];
            this.player_stats_b = response.data.body.stats.splices[1];

          } else if (response.data.status == "error") {
            this.error = response.data.body.message;
          }
          this.terminate_spinner();
        })
        .catch(error => {
          this.error = "Something went wrong";
          this.terminate_spinner();
        });
    },
    rank_player_account(player_level){
      return 'B';
    },
    reset_errors() {
      return (this.error = "");
    },
    terminate_spinner(){
      this.spinner = 0;
    },
  },
  mounted() {
    // autoload player stats with vue
    if (this.onload_account) {
      this.get_account_stats(this.onload_account);
    }

    // work out account grade
    this.player_grade = this.rank_player_account(this.overall.Level);
  },
};
</script>
