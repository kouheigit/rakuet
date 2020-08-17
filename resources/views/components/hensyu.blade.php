<link rel="stylesheet" href="{{ asset('css/hensyu.css') }}">
<form id ="soudai" action="home2" method="post">
  {{ csrf_field() }}
   
   <h5 class="toshi">年齢</h5>
   <input class="age" type="text" name="age"maxlength="3">
   <p class="ages">歳</p>
  <h2 class="hv">体重</h2>
  <input class="heavy" type="text" name="heavy"maxlength="3">
   <p class="hensyu">kg</p>
  </input>
 <h3 class="seibetu">性別</h3>
 <select class="sexual">
  <option value="Aries">男性</option>
  <option value="Taurus">女性</option>
 </select>
 <h4 class="sintyo">身長</h4>
 <input class="tall" type="text" name="tall"maxlength="3">
 <p class="sintyo1">cm</p>
 </input>
 <br>
 <button class='homechange'type='submit'>ボディデータを登録する</button>
</form>
