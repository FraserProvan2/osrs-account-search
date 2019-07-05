<template>
    <ul v-if="player_data" class="list-group">
        <div v-for="(stat, index) in player_data" :key="index" class="border-primary stat-block">
            <li class="list-group-item d-flex justify-content-between align-items-center border-primary py-1" style="border-color:#5B6972!important">
                
                <!-- Name of stat -->
                {{ index }} 

                <!-- Level button/popover trigger -->
                <button class="badge badge-primary badge-pill" :id="`popover-${index}`">
                    {{ stat.Level }}
                </button>

                <!-- XP and Rank pop over -->
                <b-popover
                    :target="`popover-${index}`"
                    placement="bottomleft"
                    triggers="hover focus"
                    :content="`XP: ${stat.XP}, Rank: ${stat.Rank}`"
                ></b-popover>

            </li>
        </div>
    </ul> 
</template>

<script>
export default {
  props: ['player_data'],
};
</script>
