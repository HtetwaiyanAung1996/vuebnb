<template>
    <div class="listing-save" @click.stop.prevent="toggleSaved()">
        <!-- .stop modifier ကို click event ကို အခြား grand parent တွေကို သက်ရောက်မှု မရှိအောင် သုံးထားခြင်းဖြစ်၏
    (stop the event propagation )--> 
        <button v-if="button">
            <i :class="classes"></i>
            {{ message }}
        </button>
        <i v-else :class="classes"></i>
    </div>
</template>

<script>
export default {
    props: ['id', 'button'],
    data () {
        return {
            testing: ''
        }
    },
    methods: {
        toggleSaved () {
            this.$store.commit ('toggleSaved', this.id)
        },
    },
    computed: {
        isListingSaved () {
            return this.$store.state.saved.find( saved => saved === this.id);
        },
        // return boolean true or false

        classes () {
            let saved = this.isListingSaved;
            console.log (saved);
            return {
                'fa': true,
                'fa-lg': true,
                'fa-heart': saved,
                'fa-heart-o': !saved
            }
        },
        message () {
            return this.isListingSaved ? 'Saved' : 'Save';
        }
    }
}
</script>

<style>
    .listing-save {
        position: absolute; 
        /* absolute is calculated base on grand element ----!!! */
        /*It is based on listing summary */
        top: 20px;
        right: 20px;
        cursor: pointer; 
        /* cursor pointer is used to get hand finger sign when cursor is on the */
    }

    .listing-save .fa-heart {
        color: #ff5a5f;
    }

</style>