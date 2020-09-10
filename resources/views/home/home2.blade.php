@extends('layouts.apphome')
@section('body')
<link rel="stylesheet" href="{{ asset('css/hensyu.css') }}">
<form id ="soudai" action="home2" method="post">
  {{ csrf_field() }}
  <h5 class="toshi">年齢(設定した年齢{{$users->age}}歳)</h5>
   @if ($users->age == null)
    <input type="number"class="age" name="age"min="12"maxlength="100"required>
     <p class="ages">歳</p>
   </input>
   @else
    <input type="number"class="age" name="age"min="12"maxlength="100">
     <p class="ages">歳</p>
   </input>
   @endif
  <h2 class="hv">体重(設定した体重{{$users->weight}}kg)</h2>
  @if ($users->weight == null)
  <input class="heavy" type="number"name="heavy"min="30"max="200"required>
   <p class="hensyu">kg</p>
  </input>
  @else
  <input class="heavy" type="number"name="heavy"min="30"max="200">
   <p class="hensyu">kg</p>
  </input>
 @endif
 <h3 class="seibetu">性別(設定した性別{{$users->sexual}}性)</h3>
 @if ($users->sexual == null)
<select class="sexual"name="sexual"required>
  <option value="女">女性</option>
  <option value="男">男性</option>
 </select>
@else
 <select class="sexual"name="sexual">
　<option value="0">性別は変更しない</option>
  <option value="女">女性</option>
  <option value="男">男性</option>
 </select>
@endif
 <h4 class="sintyo">身長(設定した身長{{$users->height}}cm)</h4>
 @if ($users->height == null)
 <input class="tall" type="number" name="tall"min="110"max="210"required>
 <p class="sintyo1">cm</p>
 </input>
 <br>
 @else
  <input class="tall" type="number" name="tall"min="110"max="210">
 <p class="sintyo1">cm</p>
 </input>
 <br>
@endif
 <p class="setumei1">※以前設定した設定値を変更しない場合は空欄のままでお願いします</p>
 <button class='homechange'type='submit'>ボディーデータを登録する</button>
</form>
@endsection
