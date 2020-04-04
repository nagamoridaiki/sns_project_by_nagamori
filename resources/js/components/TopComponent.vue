<template>
    <div>
        <h2>簡単メモ帳</h2>
        <form @submit.prevent="login">
        <label for="name">お名前</label>
        <div>
            <input type="text" id="name" v-model="nameForm.name">
        </div>
        <span v-if="error.inValid">お名前を入力してください</span>
        <div>
            <button type="submit">利用する</button>
        </div>
        </form>
    </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  data() {
    return {
      nameForm: {
        name: ""
      },
      error: {
        inValid: false
      }
    };
  },
  methods: {
    login() {
      if (this.nameForm.name === "") {
        this.error.inValid = true;
        return;
      } else {
        this.error.inValid = false;
      }
      this.$store.dispatch("login", this.nameForm.name);
      this.$router.push("/memo");
    }
  }
};
</script>