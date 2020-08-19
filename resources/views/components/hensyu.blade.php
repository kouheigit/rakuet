<link rel="stylesheet" href="{{ asset('css/hensyu.css') }}">
<form id ="soudai" action="home2" method="post">
  {{ csrf_field() }}
   
  <h5 class="toshi">年齢</h5>
    <input type="number"class="age" name="age"min="12"maxlength="100">
     <p class="ages">歳</p>
   </input>
  <h2 class="hv">体重</h2>
  <input class="heavy" type="number"name="heavy"min="30"max="200">
   <p class="hensyu">kg</p>
  </input>
 <h3 class="seibetu">性別</h3>
 <select class="sexual"name="sexual">
  <option value="0">男性</option>
  <option value="1">女性</option>
 </select>
 <h4 class="sintyo">身長</h4>
 <input class="tall" type="number" name="tall"min="110"max="210">
 <p class="sintyo1">cm</p>
 </input>
 <br>
 <button class='homechange'type='submit'>ボディデータを登録する</button>
</form>
