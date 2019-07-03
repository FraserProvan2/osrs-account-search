<template>
    <ul v-if="player_data" class="list-group">
        <div v-for="(stat, index) in player_data" :key="index" class="border-primary stat-block">
            <li class="list-group-item d-flex justify-content-between align-items-center border-primary py-1" style="border-color:#5B6972!important">
            {{ index }} 
            <!-- {{ stat.Rank }} {{ stat.XP }} -->
            <button class="badge badge-primary badge-pill">{{ stat.Level }}</button>
            </li>
        </div>
    </ul> 
</template>

<script>
export default {
  props: ['player_data']
};
</script>
