<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $planvalue = [
		    'title' => '水泳療法',
		    'text'=>'食事に関しては1700kcal(BMR+行動量程度の食事量に抑えましょう。運動に関してですが次の2 点を必ず守って下さい（体に過度の負荷はかけない、長期的に続けられる運動にする）などの運動についての工夫は最大限にする。水泳を行った際の1時間あ たりの平均カロリーは700kcalです。水泳が得意な方であればスローペースでクロールや平泳ぎなどを中心に泳いでみましょう。しかしながら水泳が好きでは ない得意ではない方はには水中ウォーキングがおすすめです。1時間水中ウォーキングを行った際の場合は500kcal程度のカロリー消費となります。運動時間は1時間程度を目安に運動する日は週3〜多くとも週4程度の日程で運動を取り組みましょう',
	    ];
	    DB::table('plan')->insert($planvalue);

	    $planvalue = [
                    'title' => '夜間ウォーキング療法',
                    'text'=>'食事に関しては1700kcal(BMR+行動量)程度の食事量に抑えましょう。食事は主に良質なタンパク質を中心に摂取しましょう。タンパク質は主に肉、魚、プロテインなどを中心に摂取しましょう。また空腹などをもよおした際は野菜類やみそ汁などを摂取して代替えしてみましょう。運動に関しては帰社時の帰り道のみ徒歩で帰宅する、これだけでも150kcal程度の消費カロリーが期待されます。夜にある程度時間があれば2km〜3km程度の道を散歩してみましょう。時間としては1時間から2時間程度の運動をしてみましょう。カロリーとしては150kcal~250kcal程度の消費量になります運動としては無理なく週3〜週4日程度を目安に運動を行いましょう',
            ];
	    DB::table('plan')->insert($planvalue);

	    $planvalue = [
                    'title' => '自転車通勤療法',
                    'text'=>'家から会社までの距離が10km程度であれば1時間程度で自転車で通勤してみましょう。もし会社が自転車通勤を許可してくれるのであれば自転車通勤に早速切り替えてみましょう。10km、約1時間の自転車通勤の消費カロリーは大体片道で300kcal程度の消費量と考えられ往復すると会社の往来で600kcal程度のカロリーを1日に消費できます。キックボクシングの1時間あたりの消費カロリーは500kcalと考えるとかなりの消費カロリーとなります。1ヶ月あたり20日出社すると考えると月当たり換算で12000kcalが消費できる計算になり脂肪1キロ辺りに必要になるカロリーは7200kcalとなるので1ヶ月で1キロ以上の脂肪が燃焼される計算になります。食事に関しては（BMR+行動量）程度、運動量は比較的多いので2000~2100kcal程度の食事を心がけましょう。食事に関しては五体栄養素を中心にバランスよく摂取して、主にタンパク質である肉や魚、プロテイン等を意識して摂取するように心がけましょう',
            ];
	    DB::table('plan')->insert($planvalue);

	    $planvalue = [
                   'title' => 'VLCDダイエット',
                   'text'=>'VLCDダイエットとは(very low calorie diets)の略称で超低カロリー食療法の事をいい、従来のVLCDダイエットであれば1日の摂取カロリーを200～600kcalに制限し1日のカロリーの摂取量を極端に抑えるダイエット方法です。しかしながら従来通りのやり方であれば200~600kcalであると過度に体に負荷をかけるので700kcal~800kcal程度のカロリー摂取量を摂取しましょう。食事内容に関しては主に肉や魚、プロテイン等のを中心とした良質なタンパク質を中心に摂取しましょう。1日の700kcalを一気に摂取するのではなく、3食に分けて摂取する。仮にめまいがする。体調不良を起こした場合は従来通りの食事（1700〜2100カロリー程度の食事量）に戻して下さい。目安としては700〜800kcalは食事量としては大体コンビニ弁当１個分くらいのカロリーになります。',
            ];
            DB::table('plan')->insert($planvalue);  
    
          $planvalue = [
                   'title' => '週1断食ダイエット',
                   'text'=>'週に1日必ず水のみでそれ以外の食べ物は摂取しないダイエット方法であり、断食は体に多くの負荷をかけるために週1以上の断食は絶対に禁忌です。断食日を除く週6日は基本的にBMR+行動量以下である1700kcal以下を心がけましょう、一日の行動量が多い方は1700kcal+400kcal、一日の行動量が少ない場合は1700kcal+150kcalくらいが目安でこのダイエットを行って下さい。注意点としては断食明けの翌日に関して特に朝食に関しては300kcalの食事をタンパク質中心の食事（肉、魚、プロテイン）を中心の物にしましょう。そして断食明け1日の食事はBMR以下の食事を心がけ、残りの週5日に関してはBMR+行動量の1700kcal+行動量程度の食事を摂取するよう心がけましょう',
            ];
            DB::table('plan')->insert($planvalue);
   
        $planvalue = [
                   'title' => '体脂肪減少ダイエット',
                   'text'=>'まず1日に摂取する総カロリー数をBMR+行動量以下の摂取カロリー（大体1700kcal程度）に抑えましょう。食事に関しては体脂肪をためないような食生活に改善しましょう、現在洋食中心の生活であれば、食事全体を洋食から和食に変更しましょう。食事内容に関しては食物繊維中心の食事、緑黄色野菜中心の食事を意識して摂取しましょう。飲酒などを行う方に関してはビールなどの発泡酒を中心に飲む方は0カロリービールに変更するか、ウィスキーなどの蒸留酒などに変更しましょう。運動に関しては週に３〜4回無理ない程度で下半身中心の筋肉トレーニングであるスクワットやウォーキングランジなどを行いましょう。',
            ];
	    DB::table('plan')->insert($planvalue);
	$planvalue = [
                   'title' => '週１断食+分食ダイエット',
                   'text'=>'週１断食と分食法をかけ合わせたダイエット方法で、週に1日必ず水のみでそれ以外の食べ物は摂取しないダイエット方法であり、断食は体に多くの負荷をかけるために週1以上の断食は絶対に禁忌です。断食日を除く週6日は基本的にBMR+行動量以下である1700kcal以下を心がけましょう、一日の行動量が多い方は1700kcal+400kcal、一日の行動量が少ない場合は1700kcal+150kcalくらいが目安でこのダイエットを行って下さい。注意点としては断食明けの翌日に関して特に朝食に関しては300kcalの食事をタンパク質中心の食事（肉、魚、プロテイン）を中心の物にしましょう。そして断食明け1日の食事はBMR以下の食事を心がけ、残りの週5日に関してはBMR+行動量の1700kcal+行動量程度の食事を摂取するよう心がけましょう、 食事に関しては分食を取り入れ一日辺り5回〜6回に分割して食事を摂取してみましょう。朝、昼、夜の食事は五代栄養素を中心にバランス良く食事を摂取し、主食1食辺り400kcal（コンビニ弁当半分程度）を目安に摂取し、また主食の間には間食を摂取するように心がけましょう。間食は1食辺り100~250kcal程度を目安に摂取（小さいサラダひと皿+プロテインバー一本分の食事）を心がけましょう。食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（400kcal)→9時間食（100kcal)→12時昼食（400kcal)→14時間食(100kcal)→16時夜食(400kcal) →18時間食(100kcal)という食事形式になります。間食に関しては短時間で手軽に摂取出来る食事を心がけましょう。',
	   ];

	    DB::table('plan')->insert($planvalue);
	     $planvalue = [
                   'title' => 'VLCDダイエット（週2〜週3のみ)',
                   'text'=>'VLCDダイエットとは(very low calorie diets)の略称で超低カロリー食療法の事をいい、従来のVLCDダイエットであれば1日の摂取カロリーを200～600kcalに制限し1日のカロリーの摂取量を極端に抑えるダイエット方法です。しかし毎日VLCDダイエットをやるのが難しい
、体に負荷をかける、そして断食も難しいという方におすすめなのはVLCDダイエットを毎日やらず週2〜週3日のみ実施するVLCDダイエットを部分的に行うダイエット方法です。
食事内容に関しては肉や魚、プロテイン等を中心とした良質なタンパク質を中心に摂取しましょう。一日の摂取カロリーは370kcal~500kcal程度の摂取カロリーに抑え、3食に分けて
摂取しましょう。VLCDダイエット明けの食事は朝食は300kcal程度に抑え、1日の総摂取カロリーも1700kcal程度に抑えましょう。ダイエットを実施する日程は週2〜週3以上は行わず
体に負荷をかけず無理せず行いましょう
',
	    ];
	    DB::table('plan')->insert($planvalue);

        $planvalue = [
                   'title' => 'ビーマルワンダイエット',
                   'text'=>'1日の食事の摂取量は大体1700kcalに抑えましょう。食事の時間に関しては繊細な注意を払いましょう。朝食の時間は特に指定しません。昼食の時間に関しては14時頃を目処に食事を摂取して下さい。1日の摂取する最大の摂取カロリーを伴う14時に摂取しましょう。そして17時以降の食事に関しては400kcal以下のカロリーを心がけ、できるだけ夕食と朝食の間の時間を12時間程度絶食時間を設けましょう。何故14時間が良いのかというと脂肪を取り込む時計遺伝子は14時頃に一番弱まり、特に14時から〜17時の間に食事の大半である昼食、夜食を済ましておくと夜型中心の食事にするよりも脂肪が取り込まれず体質的にもより痩せやすい体になります',
            ];
	    DB::table('plan')->insert($planvalue);

           $planvalue = [
                   'title' => 'ビーマルワン+半日断食ダイエット',
                   'text'=>'ビーマルワンダイエットと半日断食ダイエットをかけ合わせてたダイエット方法です、脂肪を取り込む時計遺伝子ビーマルワンは14時頃に一番弱まります。なので1日にの摂取量はだいたい1700kcalに抑え、食事の時間に関しては等に繊細な注意を払って下さい。1日の摂取する最大の摂取カロリーを伴う14時に摂取しましょう。食事に関しては大体15時から〜16時の間にすべての食事を摂取し終えましょう。そして次の日の朝食との感覚を必ず16時間程度空けましょう
一食につき二食摂取するようなドカ食い形式にはしないように注意しましょう。あくまで三食均等に摂取することを心がけ例を挙げば、摂取カロリーは朝→550kcal、昼→550kcal,夜→500kcal等均等になるように意識してみましょう。
',
            ];
	    DB::table('plan')->insert($planvalue);

	 $planvalue = [
                   'title' => 'プロテイン置き換えダイエット+低カロリーダイエット',
                   'text'=>'このダイエット方法は少し過酷です。まず1日の摂取カロリー量を大体1000カロリーから1200カロリーにまで抑えるよう意識しましょう。大体コンビニで市販されているプロテイン飲料やプロテインバーなどを朝食に置き換えましょう、プロテイン飲料一本辺りのカロリーが99kcal程度です、食事に関してはタンパク質（肉、魚等）を中心に摂取する事を推奨しますが、ここでやってはならないのが過度な炭水化物断ちや糖質制限です。飽くまでもタンパク質を中心としてバランスの良い食事を心がけましょう。このダイエットは1日に1200kcalという低カロリーで過ごすため体に過度な負荷をかけるため体調が悪い時は即座に取りやめる、また体調に合わせて週に3〜4日に抑える等工夫して行って下さい。',];
            DB::table('plan')->insert($planvalue);

        $planvalue = [
                   'title' => 'レコーディングダイエット',
                   'text'=>'性格的にきっちりしているあなたにはレコーディング・ダイエットをおすすめします。どんなものを食べたのか、どの時間に食べたのかを食事の食品名、食品カロリーなどを詳細に記録するダイエット方法です食事内容に関しては主にタンパク質を中心とした食事（肉、魚、プロテイン）などを中心に五大栄養素をバランス良く摂取するように心がけましょう。一日に摂取するカロリー総数は大体1700kcal程度に摂取量を抑える事を常に意識しましょう。意識する点としてはちょっと下間食や軽食なども漏らすことなくきっちりカロリー計算する事を心がけましょう',
            ];
	    DB::table('plan')->insert($planvalue);

	   $planvalue = [
                   'title' => '水泳ダイエット+分食ダイエット',
                   'text'=>'まず運動に関してですが次の2 点を必ず守って下さい（体に過度の負荷はかけない、長期的に続けられる運動にする）などの運動についての工夫は最大限にしましょう。水泳を行った際の1時間あ たりの平均カロリーは700kcalです。水泳が得意な方であればスローペースでクロールや平泳ぎなどを中心に泳いでみましょう。しかしながら水泳が好きでは ない得意ではない方はには水中ウォーキングがおすすめです。1時間水中ウォーキングを行った際の場合は500kcal程度のカロリー消費となります。次に併用して行う分食ダイエットに運動療法を取り入れたダイエット方法です。基本的に1日に摂取する総カロリー数をBMR+行動量の1700kcal~2000kcalに抑えるよう心がけましょう。食事に関しては一日辺り5回〜6回に分割して食事を摂取してみましょう。朝、昼、夜の食事は五代栄養素を中心にバランス良く食事を摂取し、主食1食辺り400kcal（コンビニ弁当半分程度）を目安に摂取し、また主食の間には間食を摂取するように心がけましょう。間食は1食辺り100~250kcal程度を目安に摂取（小さいサラダひと皿+プロテインバー一本分の食事）を心がけましょう。食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（400kcal)→9時間食（100kcal)→12時昼食（400kcal)→14時間食(100kcal)→16時夜食(400kcal) →18時間食(100kcal)という食事形式になります。間食に関しては短時間で手軽に摂取出来る食事を心がけましょう。',
            ];
            DB::table('plan')->insert($planvalue);

	    $planvalue = [
                   'title' => '通勤療法+分食ダイエット',
                   'text'=>'家から会社までの距離が10km程度で１時間以上の距離があれば自転車通勤をしてみましょう。もし会社が自転車通勤を許可してくれるのであれば早速自転車通勤を始めてみましょう。走行距離10km、1時間程度での自転車通勤の消費カロリーは大体片道1時間で300kcalになるので往復の消費カロリーは600kcalになります。キックボクシング1時間相当で500kcalなので一日の消費カロリーが1時間のキックボクシング以上の消費カロリーになります。また1ヶ月辺りの20日相当の通勤すると考えると12000kcal消費でき、脂肪1キロ辺り燃焼するのに必要な消費カロリーは7200カロリーと考えると理論上1ヶ月辺り1キロ以上の脂肪を燃焼するのに必要な運動量を通勤で得ることが出来ると考えられます。次に食事に関してですがかなりハードに運動すると考えて2100kcal程度摂取しましょう。次に分食ダイエットについてですが、食事に関しては一日辺り5回〜6回に分割して食事を摂取してみましょう。朝、昼、夜の食事は五代栄養素を中心にバランス良く食事を摂取し、主食1食辺り400kcal（コンビニ弁当半分程度）を目安に摂取し、また主食の間には間食を摂取するように心がけましょう。間食は1食辺り100~250kcal程度を目安に摂取（小さいサラダひと皿+プロテインバー一本分の食事）を心がけましょう。食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（400kcal)→9時間食（100kcal)→12時昼食（400kcal)→14時間食(100kcal)→16時夜食(400kcal) →18時間食(100kcal)という食事形式になります。間食に関しては短時間で手軽に摂取出来る食事を心がけましょう。',
            ];
            DB::table('plan')->insert($planvalue);

           $planvalue = [
                   'title' => 'プロテインダイエット+分食ダイエット',
                   'text'=>'1日の食事の摂取量をBMR+行動量以下にしてみましょう。大体一日の総摂取カロリーを少し厳し目ですが1500kcal以下に抑えましょう。次に分食ダイエットに関してですが、食事に関しては一日辺り5回〜6回に分割して食事を摂取してみましょう。朝、昼、夜の食事は五代栄養素を中心にバランス良く食事を摂取し、主食1食辺り400kcal（コンビニ弁当半分程度）を目安に摂取し、また主食の間には間食を摂取するように心がけましょう。間食は1食辺り100kcal程度を目安に摂取（小さいサラダひと皿+プロテインバー一本分の食事）を心がけましょう。
間食に関しては必ずプロテイン飲料（100kcal程度）やプロテインバー（100kcal)などを中心に摂取しましょう。
食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（450kcal)→9時間食（100kcal)→12時昼食（500kcal)→14時間食(100kcal)→16時夜食(350kcal) →18時間食(100kcal)という食事形式になります。間食に関しては短時間で手軽に摂取出来る食事を心がけましょう。',
            ];
            DB::table('plan')->insert($planvalue);
	    $planvalue = [
                   'title' => '運動療法 夜間ウォーキング　+　分食法',
                   'text'=>'運動に関しては帰社時の帰り道のみ徒歩で帰宅する。これだけでも150kcal程度の消費カロリーが期待され、
夜にある程度時間があれば2km〜3km程度の道を散歩してみましょう。時間としては1時間から2時間程度の運動をしてみましょう、カロリーとしては150kcal~250kcal程度の消費量になります運動としては無理なく週3〜週4日を運動をする目安として行いましょう。
次に食事量に関しては（BMR+行動量）程度の消費カロリーの1700kcalを目安の食事量を摂取しましょう。食事は朝、昼、夜の３食は五大栄養素をバランスよく好きなものを摂取しましょう。食事に関しては分食ダイエットを用いて一日辺り5回〜6回に分割して食事を摂取してみましょう。朝、昼、夜の食事は五代栄養素を中心にバランス良く食事を摂取し、主食1食辺り400kcal（コンビニ弁当半分程度）を目安に摂取し、また主食の間には間食を摂取するように心がけましょう。間食は1食辺り100~250kcal程度を目安に摂取（小さいサラダひと皿+プロテインバー一本分の食事）を心がけましょう。食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（400kcal)→9時間食（100kcal)→12時昼食（400kcal)→14時間食(100kcal)→16時夜食(400kcal) →18時間食(100kcal)という食事形式になります。間食に関しては短時間で手軽に摂取出来る食事を心がけましょう。
',
            ];
            DB::table('plan')->insert($planvalue);

           $planvalue = [
                   'title' => '分食ダイエット',
                   'text'=>'分食ダイエットについてなのですが、一日に食事を３食ではなく、主食→間食サイクルで一日辺り5回〜6回に分割して食事を摂取しするダイエット方法です。一食辺り800kcal近くの大幅な食事をを摂取すると血糖値が急激に上昇し、体に脂肪が溜まりやすくなります。分食をすると血糖値が急激に上昇しづらくなり、体に脂肪が溜まりにくくなります。
朝、昼、夜の食事は五代栄養素を中心にバランス良く食事を摂取し、主食1食辺り400kcal（コンビニ弁当半分程度）を目安に摂取し、また主食の間には間食を摂取するように心がけましょう。間食は1食辺り100~250kcal程度を目安に摂取（小さいサラダひと皿+プロテインバー一本分の食事）を心がけましょう。食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（400kcal)→9時間食（100kcal)→12時昼食（400kcal)→14時間食(100kcal)→16時夜食(400kcal) →18時間食(100kcal)という食事形式になります。間食に関しては短時間で手軽に摂取出来る食事を心がけましょう。
',
            ];
	    DB::table('plan')->insert($planvalue);
	    $planvalue = [
                   'title' => '分食+小分けダイエット',
                   'text'=>'1日の食事が仕事などで忙しく、分食出来ないという方は分食+小分けダイエットを行いましょう。まず1日の総カロリー摂取量は1700kcal程度の摂取量に制限しましょう。朝、昼、夜の食事は五大栄養素を中心にバランスよく食事を取りましょう。朝、昼、夜の間には間食を取り入れるのですが、間食に関しては短時間で摂取でき、低カロリーなものを予め決めておいて（100kcal→カロリーメイト、プロテインバー）ルーティーンとして食事を摂取しましょう。食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（400kcal)→9時間食（100kcal)→12時昼食（400kcal)→14時間食(100kcal)→16時夜食(400kcal) →18時間食(100kcal)という食事形式になります。間食に関しては短時間で手軽に摂取出来る食事を心がけましょう。',
            ];
            DB::table('plan')->insert($planvalue);


	    $planvalue = [
                   'title' => 'レコーディング・ダイエット+分食ダイエット',
                   'text'=>'性格的にきっちりしているあなたにはレコーディング・ダイエットをおすすめします。どんなものを食べたのか、どの時間に食べたのかを食事の食品名、食品カロリーなどを詳細に記録するダイエット方法です食事内容に関しては主にタンパク質を中心とした食事（肉、魚、プロテイン）などを中心に五大栄養素をバランス良く摂取するように心がけましょう。一日に摂取するカロリー総数は大体1700kcal程度に摂取量を抑える事を常に意識しましょう。次に併用する。分食法に関してですが食事は朝、昼、夜の３食は五大栄養素をバランスよく好きなものを摂取しましょう。食事に関しては分食ダイエットを用いて一日辺り5回〜6回に分割して食事を摂取してみましょう。朝、昼、夜の食事は五代栄養素を中心にバランス良く食事を摂取し、主食1食辺り400kcal（コンビニ弁当半分程度）を目安に摂取し、また主食の間には間食を摂取するように心がけましょう。間食は1食辺り100~250kcal程度を目安に摂取（小さいサラダひと皿+プロテインバー一本分の食事）を心がけましょう。食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（400kcal)→9時間食（100kcal)→12時昼食（400kcal)→14時間食(100kcal)→16時夜食(400kcal) →18時間食(100kcal)という食事形式になります。この際6食分食したカロリーは余すことなくきっちり書き記しし、間食に関しては短時間で手軽に摂取出来る食事を心がけましょう。',
            ];
	    DB::table('plan')->insert($planvalue);


	    $planvalue = [
                   'title' => 'ビーマルワン+分食ダイエット',
                   'text'=>'1日の食事の摂取量は大体1700kcalに抑えましょう。食事の時間に関しては繊細な注意を払いましょう。朝食の時間は特に指定しません。昼食の時間に関しては14時頃を目処に食事を摂取して下さい。1日の摂取する最大の摂取カロリーを伴う14時に摂取しましょう。そして17時以降の食事に関してはできるだけ400kcal以下のカロリーを心がけましょう。次に分食法に関してですが食事は朝、昼、夜の３食は五大栄養素をバランスよく好きなものを摂取しましょう。食事に関しては分食ダイエットを用いて一日辺り5回〜6回に分割して食事を摂取してみましょう。朝、昼、夜の食事は五代栄養素を中心にバランス良く食事を摂取し、主食1食辺り400kcal（コンビニ弁当半分程度）を目安に摂取し、また主食の間には間食を摂取するように心がけましょう。間食は1食辺り100~250kcal程度を目安に摂取（小さいサラダひと皿+プロテインバー一本分の食事）を心がけましょう。食事に関しては14時頃に一日の最大の食事摂取量を心がけて、食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（500kcal)→9時間食（150kcal)→12時間食（100kcal)→14時昼食(500kcal)→16時夜食(300kcal) →18時間食(150kcal)という食事形式になります。',
            ];
	    DB::table('plan')->insert($planvalue);

	    $planvalue = [
                   'title' => '分食法+下半身筋トレダイエット',
                   'text'=>'まず1日に摂取する総カロリー数をBMR+行動量以下の摂取カロリー（大体1700kcal程度）に抑えましょう。食事内容に関しては体脂肪をためないような食生活に改善しましょう、現在洋食中心の生活であれば、食事全体を洋食から和食に変更しましょう。食事内容に関しては食物繊維中心の食事、緑黄色野菜中心の食事を意識して摂取しましょう。飲酒などを行う方に関してはビールなどの発泡酒を中心に飲む方は0カロリービールに変更するか、ウィスキーなどの蒸留酒などに変更するなど体脂肪を溜め込まない食生活を心がけるようにしましょう。次に分食法に関してですが食事は朝、昼、夜の３食は五大栄養素をバランスよく好きなものを摂取しましょう。食事に関しては分食ダイエットを用いて一日辺り5回〜6回に分割して食事を摂取してみましょう。朝、昼、夜の食事は五代栄養素を中心にバランス良く食事を摂取し、主食1食辺り400kcal（コンビニ弁当半分程度）を目安に摂取し、また主食の間には間食を摂取するように心がけましょう。間食は1食辺り100~250kcal程度を目安に摂取（小さいサラダひと皿+プロテインバー一本分の食事）を心がけましょう。食事に関しては14時頃に一日の最大の食事摂取量を心がけて、食事サイクルとしては2〜3時間おきに食事を摂取するように心がけ例をあげてみると7時朝食（500kcal)→9時間食（150kcal)→12時間食（100kcal)→14時昼食(500kcal)→16時夜食(300kcal) →18時間食(150kcal)という食事形式になります。
運動に関しては週に3〜4回無理ない程度で下半身中心の筋肉トレーニングであるスクワットやウォーキングランジなどを中心に行いましょう。
',];
            DB::table('plan')->insert($planvalue);

	    $planvalue = [
                   'title' => '糖質少食ダイエット',
                   'text'=>'食事を６回に分割して摂取するのが難しいのであれば食事量を1回だけ増やし４回程度に分割して摂取してみるのも良いでしょう。１日の摂取カロリーをBMR+行動量以下の1700kcal以下を1日の食事摂取量に抑えて下さい。1回の食事に摂取するご飯の量を70g〜100gくらい（中型茶碗半分くらい）に抑えましょう。1回の食事量を朝夕食の際は250kcal〜350kcal程度、昼食の際は500kcalから多くて700kcalに抑えて下さい。食事ルーティーンの代表例を挙げるとすると7時朝→350kcal、12時昼→700kcal、18時夜食→350kcal,20時夜食2→300kcalという食事形式になります',
            ];
	    DB::table('plan')->insert($planvalue);	
	}    
}
