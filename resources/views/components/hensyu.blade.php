<link rel="stylesheet" href="{{ asset('css/hensyu.css') }}">
<form action="home2" method="post">
  {{ csrf_field() }}
 <h2 class="heavy">体重</h2>
 <input class="age" type="text" name="age"maxlength="3">
  <p class="hensyu">kg</p>
 </input>
 <h3 class="seibetu">性別</h3>
 <select class="sexual">
  <option value="Aries">男性</option>
  <option value="Taurus">女性</option>
 </select>
 <h4 class="sintyo">身長</h4>
 <input class="tall" type="text" name="tall"maxlength="3">
 <br>
 <button class='homechange'type='submit'>ボディデータを登録する</button>
</form>
