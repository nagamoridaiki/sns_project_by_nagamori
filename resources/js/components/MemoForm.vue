<template>
  <div>
    <h5>ようこそ、{{ name }}さん</h5>
    <form @submit.prevent="postMemo">
      <label for="memo">メモ</label>
      <div>
        <textarea id="memo" cols="30" rows="10" v-model="memo.text"></textarea>
      </div>
      <span v-if="error.inValid">メモを入力してください</span>
      <div>
        <button type="submit">メモる</button>
      </div>
    </form>
    <MemoList :items="this.memoList" @delete="deleteMemo"/>
    <RouterLink to="/">トップに戻る</RouterLink>
  </div>
</template>