<?php
//=================//
$sudo = 5562473569;//ايديك
$userbot = "5562473569";
//=================//
ob_start();
$token = "5426053932:AAGIJJToQlu8LYpp4sB8LOsdZTn_zxDKIjY";
define('API_KEY',$token);
//=================//
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
    $MOHAMMEDTAG = http_build_query($datas);
        $url = "https://api.telegram.org/bot".API_KEY."/".$method."?$MOHAMMEDTAG";
        $tag = file_get_contents($url);
        return json_decode($tag);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
 $message_id = $update->callback_query->message->message_id;
  $data     = $update->callback_query->data;
 $user = $update->callback_query->from->username;
$sales = json_decode(file_get_contents('sales.txt'),true);
$buttons = json_decode(file_get_contents('button.json'),true);
}
function save($array){
    file_put_contents('sales.txt', json_encode($array));
}
function add($array){
    file_put_contents("id/$chat_id/collect.txt","$array");
}
function varer($array){
    file_put_contents("id/$chat_id/step.txt","$array");
}
function belad($array){
    file_put_contents("id/$chat_id/belad.txt","$array");
}
function point($array){
    file_put_contents("id/$chat_id/point.txt","$array");
}
function keep($array){
    file_put_contents('telegram.txt', json_encode($array));
}
function savee($array){
file_put_contents('button.json', json_encode($array));
}
$memberr = file_get_contents("stats/users.txt");
$getmember = explode("\n",$memberr);
$admin = 1379547142;
$me = bot('getme',['bot'])->result->username;
$sales = json_decode(file_get_contents('sales.txt'),1);
$telegram = json_decode(file_get_contents('telegram.txt'),1);
$clicks = file_get_contents("id/$chat_id/click.txt");
$numer = file_get_contents("id/$chat_id/num.txt");
$collect = file_get_contents("id/$chat_id/collect.txt");
$belad = file_get_contents("id/$chat_id/belad.txt");
$clock = file_get_contents("id/$chat_id/clock.txt");
$step = file_get_contents("id/$chat_id/step.txt");
$alll = file_get_contents("alltxt.txt");
$point = file_get_contents("id/$chat_id/point.txt");
$myusersidd = file_get_contents("id/$chat_id/mymembers.txt");
$myusersid = explode("\n",$myusersidd);
$idse = file_get_contents("stats/ids.txt");
$ids = explode("\n",$idse);
$alltxt = explode("\n",$alll);
if($data == "pointsfile"){
$user = (file_get_contents("sales.txt"));
file_put_contents("backup.txt",$user);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
▪ تم عمل نسخة احتياطية بنجاح
إذا البوت حذف النقاط راسلني .",
]);
}
if($data == 'c'){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
- مرحباً مطوري @$user
شبيك لبيك بوت الأرقام بين يديك... فقط أرسل طلبك وستتم تلبيته فورا...😎
- - - - - - - - - - - - - - - - - - - - - - - - -
بعض الأوامر اللازمة...👇
- - - - - - - - - - - - - - - - - - - - - - - - -
إرسال نقاط /sendcoin
خصم نقاط /takecoin
تسليم رقم /sendnumber
إرسال رسالة لمستخدم /sendmessage
إرسال تحذير /sendwarning
صفحة المشتركين والإذاعة /admin
- - - - - - - - - - - - - - - - - - - - - - - - -",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
       [['text'=>'إضافة دولة','callback_data'=>'add'],['text'=>'- حذف دولة','callback_data'=>'del']],[['text'=>'نسخة إحتياطية','callback_data'=>'pointsfile']],
       [['text'=>'تبديل','callback_data'=>'setcode'],['text'=>'','callback_data'=>'del']],
      ]
    ])
  ]);
$sales['mode'] = null;
  save($sales);
 }

if($chat_id == $admin){
 if($text == '/start'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
- مرحباً مطوري @$user
شبيك لبيك بوت الأرقام بين يديك... فقط أرسل طلبك وستتم
 تلبيته فورا...😎
- - - - - - - - - - - - - - - - - - - - - - - - -
بعض الأوامر اللازمة...👇
- - - - - - - - - - - - - - - - - - - - - - - - -
إرسال نقاط /sendcoin
خصم نقاط /takecoin
تسليم رقم /sendnumber
إرسال رسالة لمستخدم /sendmessage
إرسال تحذير /sendwarning
صفحة المشتركين والإذاعة /admin
- - - - - - - - - - - - - - - - - - - - - - - - -",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
       [['text'=>'إضافة دولة واتساب','callback_data'=>'add'],['text'=>' حذف دولةواتساب','callback_data'=>'del']],
       [['text'=>'إضافة دولة تليجرام','callback_data'=>'addtel'],['text'=>' حذف تليجرام','callback_data'=>'deltel']],
      ]
    ])
  ]);
$sales['mode'] = null;
  save($sales);
 }
 if($data == "setcode"){
$code = rand(1000000, 9999999);
$codee = rand(100000, 999999);
$codeee = rand(10000, 99999);
$codeeee = rand(1000, 9999);
$codeeeee = rand(100, 999);
$co = count($getmember)-1;
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"▪ عدد زوار جميع الروابط : ".$sales['clicker']."
▪ الاكواد الجديدة :
$code | $codee | $codeee | $codeeee | $codeeeee
$co
▪ تم وضع روابط جديدة 😎",
]);
$buttons['code1'] = $code;
$buttons['code2'] = $codee;
$buttons['code3'] = $codeee;
$buttons['code4'] = $codeeee;
$buttons['code5'] = $codeeeee;
savee($buttons);
$sales['clicker'] = 1;
save($sales);
for($i=0;$i < count($getmember); $i++){
$sales[$getmember[$i]]['short'] = "no";
$sales[$getmember[$i]]['short2'] = "no";
$sales[$getmember[$i]]['short3'] = "no";
$sales[$getmember[$i]]['short4'] = "no";
$sales[$getmember[$i]]['short5'] = "no";
save($sales);
 }
}
 if($text == "/sendcoin"){
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
أرسل أيدي الشخص الذي تريد إرسال النقاط له
",
]);
  $sales['mode'] = 'chat';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد إرسالها",
 ]);
   $sales['mode'] = 'poi';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إضافة $text نقطة إلى حساب ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تمت إضافة $text نقطة إلى حسابك في البوت من قبل المطور ",
  ]);
  $sales['mode'] = null;
  file_put_contents("alltxt.txt","".$sales['idd']."\n",FILE_APPEND);
  $collecct = file_get_contents("id/".$sales['idd']."/collect.txt");
  $comb = $collecct + $text;
file_put_contents("id/".$sales['idd']."/collect.txt","$comb");
  $sales['idd'] = null;
  save($sales);
  exit;
}
if($text == "/takecoin"){
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
أرسل أيدي الشخص الذي تريد خصم النقاط منه
",
]);
  $sales['mode'] = 'chat1';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد خصمها",
 ]);
   $sales['mode'] = 'poi1';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم خصم $text نقطة من حساب ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تمت خصم $text نقطة من حسابك في البوت من قبل المطور ",
  ]);
  $sales['mode'] = null;
  $collecct = file_get_contents("id/".$sales['idd']."/collect.txt");
  $comb = $collecct - $text;
file_put_contents("id/".$sales['idd']."/collect.txt","$comb");
  $sales['idd'] = null;
  save($sales);
  exit;
}
if($text == "/sendwarning"){
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
أرسل أيدي الشخص الذي تريد إرسال التحذير له
",
]);
  $sales['mode'] = 'chat4';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat4'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "
إضغط /Confirm لتأكيد إرسال التحذير",
 ]);
   $sales['mode'] = 'poi4';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi4'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إرسال التحذير إلى ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تحذير من الإدارة!
إستعمال حسابات وهمية الدخول لرابطك بها يؤدي إلى حظر حسابك 👉
في حال إستعمال الوهمي سينحظر حسابك... إنتبه... شكرا على تفهمك للموضوع",
  ]);
  $sales['mode'] = null;
  $sales['idd'] = null;
  save($sales);
  exit;
}
//==============//
 if($data == 'addtel'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'أرسل إسم السلعة؟!
مثال:
رقم بلجيكي 🇧🇪',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $telegram['mode'] = 'adddd';
  keep($telegram);
  exit;
 }
 if($text != '/start' and $text != null and $telegram['mode'] == 'adddd'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ إسم السلعة (الرقم)
أرسل الآن سعرها ( كم نقطة؟ )
مثال:
25'
  ]);
  $telegram['n'] = $text;
  $telegram['mode'] = 'addddm';
  keep($telegram);
  exit;
 }
 
 if($text != '/start' and $text != null and $telegram['mode'] == 'addddm'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'
ارسل الان اسم الدوله بالانجلش.
يجب ان يتطابق اسم الدوله الدوله مع اسم الدوله في الموقع
https://5sim.net'
  ]);
  $telegram['nn'] = $text;
  $telegram['mode'] = 'adddm';
  keep($telegram);
  exit;
 }
 if($text != '/start' and $text != null and $telegram['mode'] == 'adddm'){
  $code = $text;
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم حفظ الإسم والسعر...✅
   إسم السلعة: '.$telegram['n'].'
السعر: '.$telegram['nn'].'
الكود: '.$code
  ]);
  $telegram['sales'][$code]['name'] = $telegram['n'];
  $telegram['sales'][$code]['price'] = $telegram['nn'];
  $telegram['n'] = null;
  $telegram['mode'] = null;
  $telegram['nn'] = null;
  keep($telegram);
  exit;
 }
 if($data == 'deltel'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'أرسل كود السلعة للتأكيد',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $telegram['mode'] = 'del';
  keep($telegram);
  exit;
 }
 if($text != '/start' and $text != null and $telegram['mode'] == 'del'){
  if($telegram['sales'][$text] != null){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحذف بنجاح...✅
   إسم السلعة: '.$telegram['sales'][$text]['name'].'
السعر: '.$telegram['sales'][$text]['price'].'
الكود: '.$text
  ]);
  unset($telegram['sales'][$text]);
  $telegram['mode'] = null;
  keep($telegram);
  exit;
  } else {
   bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'خطأ - الكود غير صحيح'
   ]);
  }
 }
 if($data == 'add'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'أرسل إسم السلعة؟!
مثال:
رقم بلجيكي 🇧🇪',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $sales['mode'] = 'add';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'add'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ إسم السلعة (الرقم)
أرسل الآن سعرها ( كم نقطة؟ )
مثال:
25'
  ]);
  $sales['n'] = $text;
  $sales['mode'] = 'addm';
  save($sales);
  exit;
 }
 
 if($text != '/start' and $text != null and $sales['mode'] == 'addm'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'
ارسل الان اسم الدوله بالانجلش.
يجب ان يتطابق اسم الدوله الدوله مع اسم الدوله في الموقع
https://5sim.net'
  ]);
  $sales['nn'] = $text;
  $sales['mode'] = 'adddm';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'adddm'){
  $code = $text;
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم حفظ الإسم والسعر...✅
   إسم السلعة: '.$sales['n'].'
السعر: '.$sales['nn'].'
الكود: '.$code
  ]);
  
  $sales['sales'][$code]['name'] = $sales['n'];
  $sales['sales'][$code]['price'] = $sales['nn'];
  $sales['n'] = null;
  $sales['mode'] = null;
  $sales['nn'] = null;
  save($sales);
  exit;
 }
 if($data == 'del'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'أرسل كود السلعة للتأكيد',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $sales['mode'] = 'del';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'del'){
  if($sales['sales'][$text] != null){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحذف بنجاح...✅
   إسم السلعة: '.$sales['sales'][$text]['name'].'
السعر: '.$sales['sales'][$text]['price'].'
الكود: '.$text
  ]);
  unset($sales['sales'][$text]);
  $sales['mode'] = null;
  save($sales);
  exit;
  } else {
   bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'خطأ - الكود غير صحيح'
   ]);
  }
 }
} else {
if(preg_match('/\/(start)(.*)/', $text)){
	

    file_put_contents("id/$chat_id/clock.txt","Yes");
  $ex = explode(' ', $text);
  if(isset($ex[1])){
   if(!in_array($chat_id,$myusersid)){
   $coll = file_get_contents("id/".$ex[1]."/collect.txt");
   $comb = $coll + 1;
   file_put_contents("id/".$ex[1]."/collect.txt","$comb");
   
    bot('sendMessage',[
     'chat_id'=>$ex[1] ,
     'text'=>"قام @$user بالدخول لرابطك الخاص وتمت إضافة نقطة واحدة في حسابك✨\n~ عدد نقاطك الآن:".$comb, 
    ]);
file_put_contents("id/$chat_id/mymembers.txt","$chat_id\n", FILE_APPEND);
file_put_contents("id/".$ex[1]."/mymembers.txt","$ex[1]\n", FILE_APPEND);
file_put_contents("id/$chat_id/mymembers.txt","$ex[1]\n", FILE_APPEND);
file_put_contents("id/".$ex[1]."/mymembers.txt","$chat_id\n", FILE_APPEND);
   }
  }
      $status = bot('getChatMember',['chat_id'=>'@MOHAMMEDTAG','user_id'=>$chat_id])->result->status;
  if($status == 'left'){
   	   bot('sendMessage',[
       'chat_id'=>$chat_id,
       'text'=>"عذرا عزيزي... يجب الإشتراك في القناة حتى تتمكن من إستخدام البوت والحصول على رقمك المجاني...🙋‍♂
إشترك هنا👇
@MOHAMMEDTAG

ثم إضغط /start 👉",

       'reply_to_message_id'=>$message->message_id,
'disable_web_page_preview'=>'true',
   ]);
   if ($update && !in_array($chat_id, $getmember)) {
$member = file_get_contents('members.txt');
$getmember= explode("\n",$member);
file_put_contents("members.txt","$chat_id\n", FILE_APPEND);
}
   exit();
  }
  if($collect == null){
   $collect = 0;
   file_put_contents("id/$chat_id/collect.txt","$collect");
  }
/*
إستبدل chs123456789009876137954714254321 بمعرف قناتك
وتأكد أن البوت أدمن في القناة
*/
 
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
أهلا بك يا عزيزي...🍃
في بوت @Y0NBOT 🔘
يمنحك البوت رقًما لتفعيل WhatsApp...☑️
للتواصل مع مدير البوت: @Y0XBOT

نقاطك الان: ( $collect )
",
 'reply_to_message_id'=>$message->message_id,
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'شراء رقم 💶','callback_data'=>'saless']],
     [['text'=>'جمع النقاط 💲','callback_data'=>'col']],
     [['text'=>' شراء نقاط  ','callback_data'=>'buy']],
     [['text'=>'شرح البوت ⁉️','callback_data'=>'about']],
     [['text'=>'شراء بوت خاص بك 💬','callback_data'=>'buybot'],['text'=>'','callback_data'=>'bot']],
    ] 
   ])
  ]);
    if($clock != "No"){
    file_put_contents("id/$chat_id/clock.txt","Yes");
    }
     if ($update && !in_array($chat_id, $getmember)) {
$member = file_get_contents('members.txt');
$getmember= explode("\n",$member);
file_put_contents("members.txt","$chat_id\n", FILE_APPEND);
}
      if($collect == null){
   $collect = 0;
   file_put_contents("id/$chat_id/collect.txt","$collect");
  }
    if($sales[$chat_id]['collect'] != null ){
   $collect = $collect + $sales[$chat_id]['collect'];
   file_put_contents("id/$chat_id/collect.txt","$collect");
  }
  mkdir("id/$chat_id");
 }
 if($data == 'back'){

  if($collect == null){
   $collect = 0;
   file_put_contents("id/$chat_id/collect.txt","$collect");
  }
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
أهلا بك يا عزيزي...🍃
في بوت @Y0NBOT 🔘
يمنحك البوت رقًما لتفعيل WhatsApp...☑️
للتواصل مع مدير البوت: @Y0XBOT

نقاطك الان: ( $collect )
",
 'reply_to_message_id'=>$message->message_id,
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'شراء رقم 💶','callback_data'=>'saless']],
     [['text'=>'جمع النقاط 💲','callback_data'=>'col']],
     [['text'=>' شراء نقاط  ','callback_data'=>'buy']],
     [['text'=>'شرح البوت ⁉️','callback_data'=>'about']],
     [['text'=>'شراء بوت خاص بك 💬','callback_data'=>'buybot'],['text'=>'','callback_data'=>'bot']],
    ] 
   ])
  ]);
 }
    if(strpos($data, "ok-")!== false) {
    $e = explode("-",$data);
        	   if(!in_array($e[1],$myusersid)){
      $status = bot('getChatMember',['chat_id'=>'-1001179303301','user_id'=>$e[1]])->result->status;
  if($status == 'left'){
      bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'إشترك بالقناه ثم اضغط الزر ياحلو 😍',
      'show_alert'=>true,
     ]);
  }else{
      bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم التحقق من إشتراكك بالقناه ✅
الأن اضغط /start 👉
",
]);
   $coll = file_get_contents("id/".$e[2]."/collect.txt");
   $comb = $coll + 1;
   file_put_contents("id/".$e[2]."/collect.txt","$comb");
    bot('sendMessage',[
     'chat_id'=>$e[2] ,
     'text'=>"قام @$user بالدخول لرابطك الخاص وتمت إضافة نقطة واحدة في حسابك✨\n~ عدد نقاطك الآن:".$comb, 
    ]);
file_put_contents("id/".$e[1]."/mymembers.txt","$e[1]\n", FILE_APPEND);
file_put_contents("id/".$e[2]."/mymembers.txt","$e[2]\n", FILE_APPEND);
file_put_contents("id/".$e[1]."/mymembers.txt","$e[2]\n", FILE_APPEND);
file_put_contents("id/".$e[2]."/mymembers.txt","$e[1]\n", FILE_APPEND);
}
}
}

  if($data == 'buy'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'للشراء إضغط على زر شراء النقاط  
وسيحولك البوت إلى بوت التواصل مع المشرف قم بمراسلته للشراء فقط...💸',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"شراء النقاط  ",'url'=>"t.me/Y0XBOT"],['text'=>"القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
   if($data == 'buybot'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'✅ يمكنك شراء بوت مثل هذا بيمزة التسليم التلقائي بمقابل رمزي بسيط...🔥
📬 تواصل مع مطور البوت: @Y0XBOT 👉',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"حساب المطور 🌀",'url'=>"t.me/Y0XBOT"],['text'=>"القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
    if($data == 'VIP'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.

📨 حساب ViP يُتِيح لك الأتي:
1⃣ - شراء الأرقام بتخفيض 50%.
2⃣ - توفر 130 دوله في البوت للشراء منها.
3⃣ - خاصيه طلب اكثر من كود للرقم.
4⃣ - خاصيه استئجار الأرقام لمده يوم او يومين.
5⃣ - اضافه برامج نتفلكس,فيسبوك,وتويتر...الخ

لِلترقِية تواصل مع مُدير البوت: @Y0XBOT 📬
',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"حساب المدير 🌀",'url'=>"t.me/Y0XBOT"],['text'=>"القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }

    if($data == 'ss'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
البوت مقفل ➿
🔘 سيتم إشعارك عند فتح للبوت...الوقت المحدد 12:00م',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
     if($data == 'tt'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
البوت مقفل ➿
🔘 سيتم إشعارك عند فتح للبوت...الوقت المحدد 12:00م',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
   if($data == 'saless'){
   if($numer != "Yes"){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.

📬 يمكُنك من هذه القائِمه اختيار التطبيق الذي تريد تفعيل الرقم به من التطبيقات المذكورةً بالأسفل  ...فقط إِضغط على اسم التطبيق التي تريد تفعيل رقم فيه...✅" 
,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"واتساب - Whatsapp",'callback_data'=>"sales"],['text'=>"تيليجرام - Telegram",'callback_data'=>"telegram"]],
    [['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
]
])
]);
}else{
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 عذراً...لديك رقم بالفعل!!...لشراء رقم اخر قم بإلغاء الرقم الاول.
",
'show_alert'=>true,
]);
}
}

   if($data == 'salesss'){
   if($numer != "Yes"){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"
    عذراً...تم فقد بيانات الشراء 🗑
    قم بشراء رقمك مره اخرى وطلبك موافق عليه مسبقاً."
,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"واتساب - Whatsapp",'callback_data'=>"sales"],['text'=>"تيليجرام - Telegram",'callback_data'=>"telegram"]],
    [['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
]
])
]);
}else{
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 عذراً...لديك رقم بالفعل!!...لشراء رقم اخر قم بإلغاء الرقم الاول.
",
'show_alert'=>true,
]);
}
}
if($data == "about"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
إليك شرح البوت:

بعد الدخول للبوت إضغط على زر تجميع النقاط وبعدها سيرسل البوت لك رابط خاص بك فقط قم بنشره وأي شخص يدخل على الرابط تحصل على نقطة واحده

يوجد الكثير من الأرقام وكل رقم بنقاط محدده فمثلا انت قمت بجنع 15 نقطه وكان سعر الرقم الروسي 15 نقطه فيمكنك شراء هذا الرقم بنقاطك.

بعد ان يتم الشراء سيقوم البوت تلقائيا بالبحث عن رقم اولاً وخلال 10 ثواني سيتم ارسال الرقم اليك.

بعد ذلك قم بتفعيل الرقم بواتس اب اعمال عادي ويفضل يكون واتساب اعمال معدل ( يمكنك تحميله من النت ).
",
 'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"لم افهم 😰",'callback_data'=>"k1"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "k1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
ليس من الضروري اخذ رقم لك اذا كنت بهذه الغباء.
من الأفضل لك حذف البوت والمغادره من هنا.
ثم الذهاب للقناه التابعه للبوت واخذ رقم لك.
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"",'callback_data'=>"k2"],['text'=>"",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "col"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- https://t.me/Y0NBOT?start=$chat_id

👆 هذا هو رابطك الخاص 👆
قم بنشره إلى الأصدقاء 👥 والمجموعات وكل شخص يدخل من خلال هذا الرابط سوف تحصل على 1 نقطة

",
 'reply_to_message_id'=>$message->message_id,
 'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                                [
                                
                        ['text'=>"🌐 مشاركة الرابط",'switch_inline_query'=>""],
                        ],
                        [['text'=>"",'callback_data'=>"short"]],
[['text'=>"- العودة",'callback_data'=>"back"]],
                        ]
                        ])
  ]);
 }
 elseif($data == 'sales'){
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'  سعر الرقم  ','callback_data'=>'s'],['text'=>'🌀 دوله الرقم 🌀','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['price'],'callback_data'=>"nuum-$code-".$sale['price']],['text'=>$sale['name'],'callback_data'=>"nuum-$code-".$sale['price']]];
  }
  if($collect == null){
   $collect = 0;
   file_put_contents("id/$chat_id/collect.txt","$collect");
  }
$reply_markup['inline_keyboard'][] = [['text'=>"",'callback_data'=>"whatsapp-0-20"],['text'=>"",'callback_data'=>"whatsapp-0-20"]];
$reply_markup['inline_keyboard'][] = [['text'=>"",'callback_data'=>"whatsapp-2-17"],['text'=>"",'callback_data'=>"whatsapp-2-17"]];
$reply_markup['inline_keyboard'][] = [['text'=>"",'callback_data'=>"whatsapp-2-29"],['text'=>"",'callback_data'=>"whatsapp-2-29"]];
$reply_markup['inline_keyboard'][] = [['text'=>'العودة إلى القائمة الرئيسية 🔙 ','callback_data'=>'back']];
$reply_markup = json_encode($reply_markup);
  bot('editMessageText',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>'
To purchase a number, click on the name of the country you want
لشراء رقم إضغط على إسم الدولة التي تريدها

~ عدد نقاطك الآن: '.$collect,
 'reply_to_message_id'=>$message->message_id,
   'reply_markup'=>($reply_markup)
  ]);
      if($clock != "No"){
    file_put_contents("id/$chat_id/clock.txt","Yes");

    }
  if($collect >= 800 and $user == null){
$comb = $collect - 100000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
if($collect >= 800 and $user != null){
if(!in_array($chat_id,$alltxt)){
$comb = $collect - 100000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
 $step = null;
   file_put_contents("id/$chat_id/step.txt","$step");
   exit;
} 
}
//================//
 if($data == 'telegram'){

  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'  سعر الرقم  ','callback_data'=>'s'],['text'=>'🌀 دوله الرقم 🌀','callback_data'=>'s']];
  foreach($telegram['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['price'],'callback_data'=>"nnum-$code-".$sale['price']],['text'=>$sale['name'],'callback_data'=>"nnum-$code-".$sale['price']]];
  }
  if($collect == null){
   $collect = 0;
   file_put_contents("id/$chat_id/collect.txt","$collect");
  }
$reply_markup['inline_keyboard'][] = [['text'=>"",'callback_data'=>"tele-0-15"],['text'=>"",'callback_data'=>"tele-0-15"]];
$reply_markup['inline_keyboard'][] = [['text'=>"",'callback_data'=>"tele-0-20"],['text'=>"",'callback_data'=>"tele-24-20"]];
$reply_markup['inline_keyboard'][] = [['text'=>"",'callback_data'=>"tele-2-13"],['text'=>"",'callback_data'=>"tele-2-13"]];
$reply_markup['inline_keyboard'][] = [['text'=>'العودة إلى القائمة الرئيسية 🔙 ','callback_data'=>'back']];
$reply_markup = json_encode($reply_markup);
  bot('editMessageText',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>'
To purchase a number, click on the name of the country you want
لشراء رقم إضغط على إسم الدولة التي تريدها

~ عدد نقاطك الآن: '.$collect,
 'reply_to_message_id'=>$message->message_id,
   'reply_markup'=>($reply_markup)
  ]);
    if($clock != "No"){
    file_put_contents("id/$chat_id/clock.txt","Yes");
    }
    if($collect >= 20 and $user == null){
    	if(!in_array($chat_id,$alltxt)){
$comb = $collect - 100000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
}
if($collect >= 50 and $user != null){
	if(!in_array($chat_id,$alltxt)){
$comb = $collect - 100000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
   $step = null;
   file_put_contents("id/$chat_id/step.txt","$step");
   exit;
 } 
 }
 }
if(strpos($data, "ban-")!== false) {
if($clicks >= 2){
$idn= str_replace("ban-",'',$data);
$apii = file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=1a9e5484e0c844348bf37b1cadf073ec&action=setStatus&status=8&id=$idn&forward=1");
bot("editmessagetext",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
✅ تم الغاء الرقم بنجاح...شكرا لك.

📡 @MOHAMMEDTAG
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"Back - القائمة الرئيسيه!!","callback_data"=>"back"]],
]
])
]);
   $step = null;
   file_put_contents("id/$chat_id/step.txt","$step");
   $num = null;
   file_put_contents("id/$chat_id/num.txt","$num");
   $points = null;
   $belad = null;
   file_put_contents("id/$chat_id/click.txt","0");
   file_put_contents("id/$chat_id/belad.txt","$belad");
   file_put_contents("id/$chat_id/point.txt","$points");
}
else{
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"😒😪
",
'show_alert'=>true,
]);
$click = $clicks + 1;
file_put_contents("id/$chat_id/click.txt","$click");
}
}
if($data == "ban"){
if($clickers > 2){
bot("editmessagetext",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
✅ تم الغاء الرقم بنجاح...شكرا لك.

📡 @MOHAMMEDTAG
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"Back - القائمة الرئيسيه!!","callback_data"=>"back"]],
]
])
]);
   $step = null;
   file_put_contents("id/$chat_id/step.txt","$step");
   $num = null;
   file_put_contents("id/$chat_id/num.txt","$num");
   $points = null;
   $belad = null;
   file_put_contents("id/$chat_id/click.txt","0");
   file_put_contents("id/$chat_id/belad.txt","$belad");
   file_put_contents("id/$chat_id/point.txt","$points");
}
else{
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"😒😪
",
'show_alert'=>true,
]);
$click = 0 + 1;
file_put_contents("id/$chat_id/click.txt","$click");
file_put_contents("id/$chat_id/num.txt","No");
}
}
//=====code wha 5sim=====//
if(strpos($data, "request-")!== false){
if($clock != "Yes"){
$idcc = str_replace("request-",'',$data);
$explode = explode("-",$data);
$apii = file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=1a9e5484e0c844348bf37b1cadf073ec&action=getStatus&id=".$explode[1]);
if($apii == "STATUS_WAIT_CODE"){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لم يَصِل الكود لحد الأن...انتظر قليلاً
",
'show_alert'=>true,
]);
}else{
$EEX= explode(":",$apii);
$codenumber = $EEX[1];
bot("sendmessage",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🆗 الكود الخاص بك: $codenumber

✅ إذا قمت بتفعيل الواتساب اضغط على زر Done
",
'parse_mode'=>"markdown",
 'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"Done!!","callback_data"=>"done-".$explode[1]]],
]
])
]);
    file_put_contents("id/$chat_id/clock.txt","Yes");
    
   $step = null;
   file_put_contents("id/$chat_id/step.txt","$step");
   $collect = $collect - $explode[2];
   file_put_contents("id/$chat_id/collect.txt","$collect");
}
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم أستلام طلبك ووصوله للإدارة✅ 

في حال كان طلبك لا يتضمن حسابات وهمية سيتم الموافقة عليه وبعدها تسحب الرقم من البوت بشكل تلقائي

وفي حال وجود حسابات وهمية في طلبك يتم رفضه 🚯
",
]);
if($user == null){$result="لايوجد";
}else{$result=$user;}
if($user==null and $collect>=50){
$nesbah = "80%";
}
if($user!=null and $collect>=100){
$nesbah = "50%";
}
if($user==null and $collect>=100){
$nesbah = "100%";
}
if($user!=null and $collect>=300){
$nesbah = "100%";
}
if($user==null and $collect>=30){
$nesbah = "30%";
}
if($user!=null and $collect>=30){
$nesbah = "0%";
}
bot('sendmessage',[
'chat_id'=>$admin,
 'text'=>"
طلب لإستلام رقم 🤖

الأيدي: $chat_id
المعرف: $result
عدد النقاط: $collect

نسبه الوهميين: $nesbah
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"قبول",'callback_data'=>"agree-$chat_id"]],
[['text'=>"رفض",'callback_data'=>"unagree-$chat_id"]],
    ] 
   ])
]);
}
}
//==========//
if(strpos($data, "requestm-")!== false){
$idcc = str_replace("requestm-",'',$data);
$explode = explode("-",$data);
if($clock != "Yes"){
$apii = file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=c79279efe97fc8AA2A63fdbd2fe88df8&action=getStatus&id=".$explode[1]);
if($apii == "STATUS_WAIT_CODE"){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لم يَصِل الكود لحد الأن...انتظر قليلاً
",
'show_alert'=>true,
]);
}else{
$EEX= explode(":",$apii);
$codenumber = $EEX[1];
bot("sendmessage",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🆗 الكود الخاص بك: $codenumber

✅ إذا قمت بتفعيل الواتساب اضغط على زر Done
",
 'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"Done!!","callback_data"=>"done-".$explode[1]]],
]
])
]);
    file_put_contents("id/$chat_id/clock.txt","Yes");
   
   $step = null;
   file_put_contents("id/$chat_id/step.txt","$step");
   $collect = $collect - $explode[2];
   file_put_contents("id/$chat_id/collect.txt","$collect");
}
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم أستلام طلبك ووصوله للإدارة✅ 

في حال كان طلبك لا يتضمن حسابات وهمية سيتم الموافقة عليه وبعدها تسحب الرقم من البوت بشكل تلقائي

وفي حال وجود حسابات وهمية في طلبك يتم رفضه 🚯
",
]);
if($user == null){$result="لايوجد";
}else{$result=$user;}
if($user==null and $collect>=50){
$nesbah = "80%";
}
if($user!=null and $collect>=100){
$nesbah = "50%";
}
if($user==null and $collect>=100){
$nesbah = "100%";
}
if($user!=null and $collect>=300){
$nesbah = "100%";
}
if($user==null and $collect>=30){
$nesbah = "30%";
}
if($user!=null and $collect>=30){
$nesbah = "0%";
}
bot('sendmessage',[
'chat_id'=>$admin,
 'text'=>"
طلب لإستلام رقم 🤖

الأيدي: $chat_id
المعرف: $result
عدد النقاط: $collect

نسبه الوهميين: $nesbah
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"قبول",'callback_data'=>"agree-$chat_id"]],
[['text'=>"رفض",'callback_data'=>"unagree-$chat_id"]],
    ] 
   ])
]);
}
}
//======code wha pva=======//
if(strpos($data, "Req-")!== false) {
$idcc = str_replace("Req-",'',$data);
$apiinn = file_get_contents("https://api.PVAPins.com/user/api/get_sms.php?customer=6225e4b00ae7cb2e5826&number=$idcc&country=$belad&app=whatsapp");
if($apiinn == "You have not received any code yet." or $apiinn == "Error 102, check back later." or $apiinn == ""){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لم يَصِل الكود لحد الأن...انتظر قليلاً وحاول مره اخرى.
$apiinn",
'show_alert'=>true,
]);
}else{
bot("sendmessage",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🆗 الكود الخاص بك: $apiinn

✅ إذا قمت بتفعيل الواتساب اضغط على زر Done
",
 'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"Done!!","callback_data"=>"done-".$explode[1]]],
]
])
]);
   $step = null;
   file_put_contents("id/$chat_id/step.txt","$step");
   $collect = $collect - $explode[2];
   $points = null;
   $belad = null;

    file_put_contents("id/$chat_id/clock.txt","Yes");
    
   file_put_contents("id/$chat_id/belad.txt","$belad");
   file_put_contents("id/$chat_id/point.txt","$points");
   file_put_contents("id/$chat_id/collect.txt","$collect");
}
}


$type=$message->chat->type; 
if($message and $type!="private"){
bot("sendmessage",[
'chat_id'=>$chat_id,
'text'=>"
هههههههههههههاي مص زبي 😒🔥",
]);
bot("leavechat",[
"chat_id"=>$chat_id,
]);
}
//====code tele pva====//
if(strpos($data, "Reqq-")!== false) {
$numkl= str_replace("Reqq-",'',$data);
$explode = explode("-",$data);
$apii = file_get_contents("https://api.pvapins.com/user/api/get_sms.php?customer=6225e4b00ae7cb2e5826&number=".$explode[1]."&country=$belad&app=telegram");
if($apii == "You have not received any code yet." or $apii == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لم يَصِل الكود لحد الأن...انتظر قليلاً وحاول مره اخرى.
$apii...check after sometime",
'show_alert'=>true,
]);
}else{
bot("sendmessage",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🆗 الكود الخاص بك: $apii

✅ إذا قمت بتفعيل الواتساب اضغط على زر Done
",
'parse_mode'=>"markdown",
 'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"Done!!","callback_data"=>"done-$explode[1]"]],
]
])
]);
   $step = null;
   file_put_contents("id/$chat_id/step.txt","$step");
   $collect = $collect - $explode[2];
   $points = null;
   $belad = null;

    file_put_contents("id/$chat_id/clock.txt","Yes");
    
   file_put_contents("id/$chat_id/belad.txt","$belad");
   file_put_contents("id/$chat_id/point.txt","$points");
   file_put_contents("id/$chat_id/collect.txt","$collect");
}
}
//===========//

//=========//
if(strpos($data, "done-")!== false) {
$idn= str_replace("done-",'',$data);
$apii = file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=1a9e5484e0c844348bf37b1cadf073ec&action=setStatus&status=6&id=$idn&forward=1");
bot("editmessagetext",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
✅ تم انهاء الرقم بنجاح...شكرا لك.
📀 قم بعمل تحقق بخطوتين لحفظ رقمك (احتياطاً)

📡 @MOHAMMEDTAG
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"Back - القائمة الرئيسيه!!","callback_data"=>"back"]],
]
])
]);
   file_put_contents("id/$chat_id/num.txt","No");
   $step = null;
   file_put_contents("id/$chat_id/step.txt","$step");
   $points = null;
   $belad = null;
    file_put_contents("id/$chat_id/clock.txt","Yes");
   file_put_contents("id/$chat_id/belad.txt","$belad");
   file_put_contents("id/$chat_id/point.txt","$points");
}

if(strpos($data, "agree-")!== false) {
$idn= str_replace("agree-",'',$data);
bot("editmessagetext",[
'chat_id'=>$admin,
'message_id'=>$message_id,
'text'=>"
تم قبول الطلب....✅",
]);
bot("sendmessage",[
'chat_id'=>$idn,
'message_id'=>$message_id,
'text'=>"
تم منحك الإذن لشراء رقمك.
يمكنك إستلام رقمك بشكل تلقائي الان.

📡 @MOHAMMEDTAG
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"إستلام الرقم.","callback_data"=>"salesss"]],
]
])
]);
   $step = null;
   file_put_contents("id/$idn/step.txt","$step");
   $points = null;
   $belad = null;
   file_put_contents("id/$idn/belad.txt","$belad");
   file_put_contents("id/$idn/num.txt","$belad");
   file_put_contents("id/$idn/clock.txt","No");
   file_put_contents("stats/ids.txt","$idn\n",FILE_APPEND);
   file_put_contents("id/$idn/point.txt","$points");
}
if($text=="gader"){
file_put_contents("id/$chat_id/num.txt","$belad");
}
if(strpos($data, "unagree-")!== false) {
$idn= str_replace("unagree-",'',$data);
bot("editmessagetext",[
'chat_id'=>$admin,
'message_id'=>$message_id,
'text'=>"
تم قبول الطلب....✅",
]);
bot("sendmessage",[
'chat_id'=>$idn,
'message_id'=>$message_id,
'text'=>"
للأسف تم رفض منحك الإذن وتم حذف جميع نقاطك وبياناتك 🔥

يلا روح بيت امك 😒🔥😂

📡 @MOHAMMEDTAG
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"Back - القائمة الرئيسيه!!","callback_data"=>"back"]],
]
])
]);
   $step = null;
   file_put_contents("id/$idn/step.txt","$step");
   $points = null;
   $belad = null;
   file_put_contents("id/$idn/belad.txt","$belad");
   file_put_contents("id/$idn/point.txt","$points");
   file_put_contents("id/$idn/collect.txt","0");
}
date_default_timezone_set('Asia/Baghdad');
$ttn = date('h:i'); 
$tnn = explode(":",$ttn);
$tn = $tnn[1] + 03;
//========telegram-pva======//
if(strpos($data, "numm-")!== false){
$country = str_replace("numm-",'',$data);
$e = explode("-",$data);
if($e[2] <= $collect){
$apii = file_get_contents("http://api.PVAPins.com/user/api/get_number.php?customer=6225e4b00ae7cb2e5826&app=telegram&country=".$e[1]);
$belad = $e[1];
if($apii == "No free channels available check after sometime." or $apii == "" or $apii == "Not Enough balance"){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لا يوجد أرقام لِهذه الدوله حالياً...حاوِل مجدداً بعد فتره.
$apii",
'show_alert'=>true,
]);
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
',
      'show_alert'=>true,
      ]);
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
",
]);
sleep(3);
bot("editmessagetext",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.

🔰 إليك رقمك: +$apii ➡️

?? ليصلك الكود قم بتفعيل الرقم الان في تليجرام ثم اطلب الكود.

فتره وصول الكود للرقم 15 دقيقه فقط...قم بتفعيل الرقم قبل ذلك.

🔥 اطلب الكود عبر الضغط على زر Request Code.
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"Request Code - طلب الكود","callback_data"=>"Reqq-$apii-".$e[2]]],
[['text'=>"Cancle Number - الغاء الرقم",'callback_data'=>"ban"]],
]
])
]);
file_put_contents("id/$chat_id/num.txt","Yes");

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
الأيدي: $chat_id
المعرف إن وجد: @$user
- - - - - - - - - - - - - - - - - - - - - - - - -
قم بشراء $name بسعر $price
- - - - - - - - - - - - - - - - - - - - - - - - -
".$collect."
نقاطه ☝
الرقم: $apii
- - - - - - - - - - - - - - - - - - - - - - - - -"
]);
if($collect >= 800 and $user == null){
$comb = $collect - 1000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
//========//
$substr = substr($apii, 0,-4)."****";
date_default_timezone_set('Asia/Baghdad');
$time = date('h:i a'); 
$year = date('Y');
$month = date('n');
$day = date('j');
if($e[1] == 0 and $e[1] != 2){
$result = "russia";
}else{$result = $e[1];}
if($e[1] == 2 and $e[1] != 0){
$result = "kazakhstan";
}else{$result = $e[1];}
bot('sendmessage',[
'chat_id'=>-1001458464823,
 'text'=>"
- تَم تسليم رقَم من البوت بِنجاح...✅
🤖 بوت الأرقام ( @Y0NBOT )
🌀 أيدي الشخص: $chat_id
📋 تفاصيل الطلب...👇
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔘 $result",'url'=>"t.me/Y0NBOT"],['text'=>"دولة الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"+$substr",'url'=>"t.me/Y0NBOT"],['text'=>"الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"تمت ✅",'url'=>"t.me/Y0NBOT"],['text'=>"الحاله ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"تيلغرام 💬",'url'=>"t.me/Y0NBOT"],['text'=>"البرنامج ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$time",'url'=>"t.me/Y0NBOT"],['text'=>"الساعه ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$year/$month/$day",'url'=>"t.me/Y0NBOT"],['text'=>"التاريخ ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"🔘 إِضغط هُنا للدخول لِبوت الأرقام 🔘",'url'=>"t.me/Y0NBOT"]],
]
])
]);
}
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'نقاطك غير كافية لشراء هذا الرقم',
      'show_alert'=>true,
     ]);
}
}
//=======telegram-5sim=====//
if(strpos($data, "nnum-")!== false) {
$country = str_replace("nnum-",'',$data);
$e = explode("-",$data);
$apiii = file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=1a9e5484e0c844348bf37b1cadf073ec&action=getNumber&service=telegram&forward=0&operator=any&country=".$e[1]);
$EX= explode(":",$apiii);
$idnumber = $EX[1];
$number = $EX[2];
if($apiii == "NO_NUMBERS" or $apiii == "NO_BALANCE" or $apiii == ""){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 حدث خطأ ما...حاول مجدداً",
'show_alert'=>true,
]);
}
if($e[2] <= $collect){
$Link = json_decode(file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=1a9e5484e0c844348bf37b1cadf073ec&action=getNumbersStatus&country=".$e[1]))->telegram_0;
if($Link <= 6){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لا يوجد أرقام لِهذه الدوله حالياً...حاوِل مجدداً بعد فتره.",
'show_alert'=>true,
]);
}else{
	     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
',
      'show_alert'=>true,
      ]);
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
",
]);
sleep(3);
bot("editmessagetext",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.

🔰 إليك رقمك: +$number ➡️

🌀 ليصلك الكود قم بتفعيل الرقم الان في تليجرام ثم اطلب الكود.

فتره وصول الكود للرقم 15 دقيقه فقط...قم بتفعيل الرقم قبل ذلك.

🔥 اطلب الكود عبر الضغط على زر Request Code.
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Request Code | طلب الكود",'callback_data'=>"requestt-$idnumber-".$e[2]]],
[['text'=>"Cancle Number | الغاء الرقم",'callback_data'=>"ban-$idnumber"]],
]
])
]);
file_put_contents("id/$chat_id/num.txt","Yes");
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
الأيدي: $chat_id
المعرف إن وجد: @$user
- - - - - - - - - - - - - - - - - - - - - - - - -
قم بشراء $name بسعر $price
- - - - - - - - - - - - - - - - - - - - - - - - -
".$collect."
نقاطه ☝
الرقم: $number
- - - - - - - - - - - - - - - - - - - - - - - - -"
]);
if($collect >= 800 and $user == null){
$comb = $collect - 1000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
$substr = substr($number, 0,-4)."****";
date_default_timezone_set('Asia/Baghdad');
$time = date('h:i a'); 
$year = date('Y');
$month = date('n');
$day = date('j');
if($e[1] == 0 and $e[1] != 2){
$result = "russia";
}else{$result = $e[1];}
if($e[1] == 2 and $e[1] != 0){
$result = "kazakhstan";
}else{$result = $e[1];}
bot('sendmessage',[
'chat_id'=>-1001458464823,
 'text'=>"
- تَم تسليم رقَم من البوت بِنجاح...✅
🤖 بوت الأرقام ( @Y0NBOT )
🌀 أيدي الشخص: $chat_id
📋 تفاصيل الطلب...👇
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔘 $result",'url'=>"t.me/Y0NBOT"],['text'=>"دولة الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"+$substr",'url'=>"t.me/Y0NBOT"],['text'=>"الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"تمت ✅",'url'=>"t.me/Y0NBOT"],['text'=>"الحاله ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"تيلغرام 💬",'url'=>"t.me/Y0NBOT"],['text'=>"البرنامج ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$time",'url'=>"t.me/Y0NBOT"],['text'=>"الساعه ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$year/$month/$day",'url'=>"t.me/Y0NBOT"],['text'=>"التاريخ ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"🔘 إِضغط هُنا للدخول لِبوت الأرقام 🔘",'url'=>"t.me/Y0NBOT"]],
]
])
]);
}
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'نقاطك غير كافية لشراء هذا الرقم',
      'show_alert'=>true,
     ]);
}
}
//=====ruusia tele=====//
if(strpos($data, "tele-")!== false) {
$country = str_replace("tele-",'',$data);
$e = explode("-",$data);
$apiii = file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=c79279efe97fc8AA2A63fdbd2fe88df8&action=getNumber&service=tg&forward=0&operator=any&country=".$e[1]);
$EX= explode(":",$apiii);
$idnumber = $EX[1];
$number = $EX[2];
if($e[2] <= $collect){
$Link = json_decode(file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=c79279efe97fc8AA2A63fdbd2fe88df8&action=getNumbersStatus&country=".$e[1]))->tg_0;
if($Link <= 6 or $apiii == "NO_BALANCE"){
sleep(1);
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لا يوجد أرقام لِهذه الدوله حالياً...حاوِل مجدداً بعد فتره.",
'show_alert'=>true,
]);
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
',
      'show_alert'=>true,
      ]);
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
",
]);
sleep(3);
bot("editmessagetext",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.

🔰 إليك رقمك: +$number ➡️

🌀 ليصلك الكود قم بتفعيل الرقم الان في تليجرام ثم اطلب الكود.

فتره وصول الكود للرقم 15 دقيقه فقط...قم بتفعيل الرقم قبل ذلك.

🔥 اطلب الكود عبر الضغط على زر Request Code.
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Request Code | طلب الكود",'callback_data'=>"requestm-$idnumber-".$e[2]]],
[['text'=>"Cancle Number | الغاء الرقم",'callback_data'=>"ban-$idnumber"]],
]
])
]);
file_put_contents("id/$chat_id/num.txt","Yes");
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
الأيدي: $chat_id
المعرف إن وجد: @$user
- - - - - - - - - - - - - - - - - - - - - - - - -
قم بشراء $name بسعر $price
- - - - - - - - - - - - - - - - - - - - - - - - -
".$collect."
نقاطه ☝
$collect
نقاطه ☝
الرقم: $number
- - - - - - - - - - - - - - - - - - - - - - - - -"
]);
if($collect >= 800 and $user == null){
$comb = $collect - 1000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
$substr = substr($number, 0,-4)."****";
date_default_timezone_set('Asia/Baghdad');
$time = date('h:i a'); 
$year = date('Y');
$month = date('n');
$day = date('j');
if($e[1] == 0 and $e[1] != 2){
$result = "russia";
}else{$result = $e[1];}
if($e[1] == 2 and $e[1] != 0){
$result = "kazakhstan";
}else{$result = $e[1];}
bot('sendmessage',[
'chat_id'=>-1001458464823,
 'text'=>"
- تَم تسليم رقَم من البوت بِنجاح...✅
🤖 بوت الأرقام ( @Y0NBOT )
🌀 أيدي الشخص: $chat_id
📋 تفاصيل الطلب...👇
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔘 $result",'url'=>"t.me/Y0NBOT"],['text'=>"دولة الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"+$substr",'url'=>"t.me/Y0NBOT"],['text'=>"الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"تمت ✅",'url'=>"t.me/Y0NBOT"],['text'=>"الحاله ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"تيلغرام 💬",'url'=>"t.me/Y0NBOT"],['text'=>"البرنامج ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$time",'url'=>"t.me/Y0NBOT"],['text'=>"الساعه ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$year/$month/$day",'url'=>"t.me/Y0NBOT"],['text'=>"التاريخ ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"🔘 إِضغط هُنا للدخول لِبوت الأرقام 🔘",'url'=>"t.me/Y0NBOT"]],
]
])
]);
}
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'نقاطك غير كافية لشراء هذا الرقم',
      'show_alert'=>true,
     ]);
}
}
//=====whatsapp-pva=======//
if(strpos($data, "num-")!== false) {
$country = str_replace("num-",'',$data);
$e = explode("-",$data);
sleep(1);
if($e[2] <= $collect){
if($e[1]  == "Saudi Arabia" and $e[1] != "Turkey"){
$apiie = file_get_contents("http://api.PVAPins.com/user/api/get_number.php?customer=6225e4b00ae7cb2e5826&app=whatsapp1&country=".$e[1]);
}else{ $apiie = file_get_contents("http://api.PVAPins.com/user/api/get_number.php?customer=6225e4b00ae7cb2e5826&app=whatsapp&country=".$e[1]);}
if($e[1]  == "Turkey" and $e[1] != "Saudi Arabia"){
$apiie = file_get_contents("http://api.PVAPins.com/user/api/get_number.php?customer=6225e4b00ae7cb2e5826&app=whatsapp1&country=".$e[1]);
}else{ $apiie = file_get_contents("http://api.PVAPins.com/user/api/get_number.php?customer=6225e4b00ae7cb2e5826&app=whatsapp&country=".$e[1]);}
$belad = $e[1];
file_put_contents("id/$chat_id/belad.txt","$belad");
if($apiie == "No free channels available check after sometime." or $apiie == "" or $apiie == "Not Enough balance"){
sleep(1);
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لا يوجد أرقام لِهذه الدوله حالياً...حاوِل مجدداً بعد فتره.
$apiie",
'show_alert'=>true,
]);
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
',
      'show_alert'=>true,
      ]);
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
",
]);
sleep(3);
bot("editmessagetext",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.

🔰 إليك رقمك: +$apiie ➡️

🚸 ليصلك الكود في واتساب استخدم احد الخطوات:
1⃣ قم بتفعيل الرقم في واتساب الأعمال المعدل (احصل عليه من Chrome).
2⃣ قم بعمل وضع طيران وقم بتفعيل الرقم في واتس اب رسمي فقط.
3⃣ قم بفصل الشريحه ثم قم بتفعيل الرقم في واتس الأعمال الاصلي.

مدة الرقم هي 15 دقيقه...قم بتفعيله وطلب الكود قبل انتهاء المده...✅
🔥 اطلب الكود عبر الضغط على زر Request Code.
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"Request Code | طلب الكود",'callback_data'=>"Req-$apiie"]],
[['text'=>"Cancle Number | الغاء الرقم",'callback_data'=>"ban-$idnumber"]],
    ] 
   ])
  ]);
$point = $e[2];
file_put_contents("id/$chat_id/point.txt","$point");
file_put_contents("id/$chat_id/num.txt","Yes");
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
الأيدي: $chat_id
المعرف إن وجد: @$user
- - - - - - - - - - - - - - - - - - - - - - - - -
قم بشراء $name بسعر $price
- - - - - - - - - - - - - - - - - - - - - - - - -
".$collect."
نقاطه ☝
الرقم: $apii
- - - - - - - - - - - - - - - - - - - - - - - - -"
]);
if($collect >= 800 and $user == null){
$comb = $collect - 1000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
$substr = substr($apiie, 0,-4)."****";
date_default_timezone_set('Asia/Baghdad');
$time = date('h:i a'); 
$year = date('Y');
$month = date('n');
$day = date('j');
if($e[1] == 0 and $e[1] != 2){
$result = "russia";
}else{$result = $e[1];}
if($e[1] == 2 and $e[1] != 0){
$result = "kazakhstan";
}else{$result = $e[1];}
bot('sendmessage',[
'chat_id'=>-1001458464823,
'text'=>"
- تَم تسليم رقَم من البوت بِنجاح...✅
🤖 بوت الأرقام ( @Y0NBOT )
🌀 أيدي الشخص: $chat_id
📋 تفاصيل الطلب...👇
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔘 $result",'url'=>"t.me/Y0NBOT"],['text'=>"دولة الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"+$substr",'url'=>"t.me/Y0NBOT"],['text'=>"الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"تمت ✅",'url'=>"t.me/Y0NBOT"],['text'=>"الحاله ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"واتساب ➿",'url'=>"t.me/Y0NBOT"],['text'=>"البرنامج ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$time",'url'=>"t.me/Y0NBOT"],['text'=>"الساعه ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$year/$month/$day",'url'=>"t.me/Y0NBOT"],['text'=>"التاريخ ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"🔘 إِضغط هُنا للدخول لِبوت الأرقام 🔘",'url'=>"t.me/Y0NBOT"]],
]
])
]);
}
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'نقاطك غير كافية لشراء هذا الرقم',
      'show_alert'=>true,
     ]);
}
}
//=======whatsapp-5sim======//
if(strpos($data, "nuum-")!== false) {
$country = str_replace("nuum-",'',$data);
$e = explode("-",$data);
$apiii = file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=1a9e5484e0c844348bf37b1cadf073ec&action=getNumber&service=whatsapp&forward=0&operator=any&country=".$e[1]);
$EX= explode(":",$apiii);
$idnumber = $EX[1];
$number = $EX[2];
if($e[2] <= $collect){
$Link = json_decode(file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=1a9e5484e0c844348bf37b1cadf073ec&action=getNumbersStatus&country=".$e[1]))->whatsapp_0;
if($Link <= 3 or $apiii == "NO_NUMBERS" or $apiii == "NO_BALANCE" or $apiii == ""){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لا يوجد أرقام لِهذه الدوله حالياً...حاوِل مجدداً بعد فتره.",
'show_alert'=>true,
]);
}else{
	     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
',
      'show_alert'=>true,
      ]);
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
",
]);
sleep(3);
bot("editmessagetext",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.

🔰 إليك رقمك: +$number ➡️

🚸 ليصلك الكود في واتساب استخدم احد الخطوات:
1⃣ قم بتفعيل الرقم في واتساب الأعمال المعدل (احصل عليه من Chrome).
2⃣ قم بعمل وضع طيران وقم بتفعيل الرقم في واتس اب رسمي فقط.
3⃣ قم بفصل الشريحه ثم قم بتفعيل الرقم في واتس الأعمال الاصلي.

مدة الرقم هي 15 دقيقه...قم بتفعيله وطلب الكود قبل انتهاء المده...✅
🔥 اطلب الكود عبر الضغط على زر Request Code.
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"Request Code | طلب الكود",'callback_data'=>"request-$idnumber-".$e[2]]],
[['text'=>"Cancle Number | الغاء الرقم",'callback_data'=>"ban-$idnumber"]],
    ] 
   ])
  ]);
file_put_contents("id/$chat_id/num.txt","Yes");
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
الأيدي: $chat_id
المعرف إن وجد: @$user
- - - - - - - - - - - - - - - - - - - - - - - - -
قم بشراء $name بسعر $price
- - - - - - - - - - - - - - - - - - - - - - - - -
".$collect."
نقاطه ☝
الرقم: $number
- - - - - - - - - - - - - - - - - - - - - - - - -"
]);
if($collect >= 800 and $user == null){
$comb = $collect - 1000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
$substr = substr($number, 0,-4)."****";
date_default_timezone_set('Asia/Baghdad');
$time = date('h:i a'); 
$year = date('Y');
$month = date('n');
$day = date('j');
if($e[1] == 0 and $e[1] != 2){
$result = "russia";
}else{$result = $e[1];}
if($e[1] == 2 and $e[1] != 0){
$result = "kazakhstan";
}else{$result = $e[1];}
bot('sendmessage',[
'chat_id'=>-1001458464823,
 'text'=>"
- تَم تسليم رقَم من البوت بِنجاح...✅
🤖 بوت الأرقام ( @Y0NBOT )
ايدي الشخص: $chat_id
📋 تفاصيل الطلب...👇
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔘 $result",'url'=>"t.me/Y0NBOT"],['text'=>"دولة الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"+$substr",'url'=>"t.me/Y0NBOT"],['text'=>"الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"تمت ✅",'url'=>"t.me/Y0NBOT"],['text'=>"الحاله ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"واتساب ➿",'url'=>"t.me/Y0NBOT"],['text'=>"البرنامج ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$time",'url'=>"t.me/Y0NBOT"],['text'=>"الساعه ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$year/$month/$day",'url'=>"t.me/Y0NBOT"],['text'=>"التاريخ ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"🔘 إِضغط هُنا للدخول لِبوت الأرقام 🔘",'url'=>"t.me/Y0NBOT"]],
]
])
]);
  }
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'نقاطك غير كافية لشراء هذا الرقم',
      'show_alert'=>true,
     ]);
}
}
//======wa russia=====//
if(strpos($data, "whatsapp-")!== false) {
$country = str_replace("whatsapp-",'',$data);
$e = explode("-",$data);
$apiii = file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=c79279efe97fc8AA2A63fdbd2fe88df8&action=getNumber&service=wa&forward=0&operator=any&country=".$e[1]);
$EX= explode(":",$apiii);
$idnumber = $EX[1];
$number = $EX[2];
if($e[2] <= $collect){
$Link = json_decode(file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=c79279efe97fc8AA2A63fdbd2fe88df8&action=getNumbersStatus&country=".$e[1]))->wa_0;
if($Link <= 6 or $apiii == "NO_BALANCE"){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🔘 لا يوجد أرقام لِهذه الدوله حالياً...حاوِل مجدداً بعد فتره.",
'show_alert'=>true,
]);
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
',
      'show_alert'=>true,
      ]);
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.
📬 يتم تَجهِيز الرقم الأن...هذه العمليه لاتستغرق 10 ثواني...✅
",
]);
sleep(3);
bot("editmessagetext",[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
❇️ شكراً لك لإستخدامك بوت الأَرقام الخاص بنا.

🔰 إليك رقمك: +$number ➡️

🚸 ليصلك الكود في واتساب استخدم احد الخطوات:
1⃣ قم بتفعيل الرقم في واتساب الأعمال المعدل (احصل عليه من Chrome).
2⃣ قم بعمل وضع طيران وقم بتفعيل الرقم في واتس اب رسمي فقط.
3⃣ قم بفصل الشريحه ثم قم بتفعيل الرقم في واتس الأعمال الاصلي.

مدة الرقم هي 15 دقيقه...قم بتفعيله وطلب الكود قبل انتهاء المده...✅
🔥 اطلب الكود عبر الضغط على زر Request Code.
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"Request Code | طلب الكود",'callback_data'=>"requestm-$idnumber-".$e[2]]],
[['text'=>"Cancle Number | الغاء الرقم",'callback_data'=>"ban-$idnumber"]],
    ] 
   ])
  ]);
file_put_contents("id/$chat_id/num.txt","Yes");
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
الأيدي: $chat_id
المعرف إن وجد: @$user
- - - - - - - - - - - - - - - - - - - - - - - - -
قم بشراء $name بسعر $price
- - - - - - - - - - - - - - - - - - - - - - - - -
".$collect."
نقاطه ☝
الرقم: $number
- - - - - - - - - - - - - - - - - - - - - - - - -"
]);
if($collect >= 800 and $user == null){
$comb = $collect - 1000000;
 file_put_contents("id/$chat_id/collect.txt","$comb");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
تم خصم نقاطك...اذا احسست ان هذا خطأ تواصل مع المطور...✅
@Y0XBOT
",
]);
}
$substr = substr($number, 0,-4)."****";
date_default_timezone_set('Asia/Baghdad');
$time = date('h:i a'); 
$year = date('Y');
$month = date('n');
$day = date('j');
if($e[1] == 0 and $e[1] != 2){
$result = "russia";
}else{$result = $e[1];}
if($e[1] == 2 and $e[1] != 0){
$result = "kazakhstan";
}else{$result = $e[1];}
bot('sendmessage',[
'chat_id'=>-1001458464823,
 'text'=>"
- تَم تسليم رقَم من البوت بِنجاح...✅
🤖 بوت الأرقام ( @Y0NBOT )
📋 تفاصيل الطلب...👇
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔘 $result",'url'=>"t.me/Y0NBOT"],['text'=>"دولة الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"+$substr",'url'=>"t.me/Y0NBOT"],['text'=>"الرقم ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"تمت ✅",'url'=>"t.me/Y0NBOT"],['text'=>"الحاله ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"واتساب ➿",'url'=>"t.me/Y0NBOT"],['text'=>"البرنامج ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$time",'url'=>"t.me/Y0NBOT"],['text'=>"الساعه ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"$year/$month/$day",'url'=>"t.me/Y0NBOT"],['text'=>"التاريخ ⬅️",'url'=>"t.me/Y0NBOT"]],
[['text'=>"🔘 إِضغط هُنا للدخول لِبوت الأرقام 🔘",'url'=>"t.me/Y0NBOT"]],
]
])
]);
  }
}else{
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'نقاطك غير كافية لشراء هذا الرقم',
      'show_alert'=>true,
     ]);
}
}
$from_idin = $update->inline_query->from->id;
$usernameinl = $update->inline_query->from->username;
if($update->inline_query){
$inlineqt = $update->inline_query->query;
if($inlineqt == ''){
bot('answerInlineQuery', [
'inline_query_id' => $update->inline_query->id,
'results' => json_encode([[
'type' => 'article',
'id' => base64_encode(rand(5, 555)),
'title' => '◾ شارك رابطك الخاص لتحصل على النقود .',
'description' => 'اضغط هنا لمشاركة رابطك 😉',
'input_message_content' => ['parse_mode' => 'MarkDown', 'disable_web_page_preview'=> true, 'message_text' => "
- ااحصل على رقمك مجاناً 😻👏 يسلم تلقائيا فقط ولأول مره في التليجرام بوت ارقام فيه جميع الدول العربيه 😼🤞"],
'reply_markup' => [
'inline_keyboard' => [
[['text' => "- دخول للبوت 😻💯", 'url' => "http://t.me/Y0NBOT?start=$from_idin"]],
]]
]])
]);
}else {
bot('answerInlineQuery', [
'inline_query_id' => $update->inline_query->id,
'results' => json_encode([[
'type' => 'article',
'id' => base64_encode(rand(5, 555)),
'title' => '◾ شارك رابطك الخاص لتحصل على النقود .',
'description' => 'اضغط هنا لمشاركة رابطك 😉',
'input_message_content' => ['parse_mode' => 'MarkDown', 'disable_web_page_preview'=> true, 'message_text' => "
- ااحصل على رقمك مجاناً 😻👏 يسلم تلقائيا فقط ولأول مره في التليجرام بوت ارقام فيه جميع الدول العربيه 😼🤞"],
'reply_markup' => [
'inline_keyboard' => [
[['text' => "- دخول للبوت 😻💯", 'url' => "http://t.me/Y0NBOT?start=$from_idin"]],
]]
],[
'type' => 'article',
'id' => base64_encode(rand(5, 555)),
'title' => '◾ شارك رابطك الخاص لتحصل على النقود .',
'description' => 'اضغط هنا لمشاركة رابطك 😉',
'input_message_content' => ['parse_mode' => 'MarkDown', 'disable_web_page_preview'=> true, 'message_text' => "
- ااحصل على رقمك مجاناً 😻👏 يسلم تلقائيا فقط ولأول مره في التليجرام بوت ارقام فيه جميع الدول العربيه 😼🤞"],
'reply_markup' => [
'inline_keyboard' => [
[['text' => "- دخول للبوت 😻💯", 'url' => "http://t.me/Y0NBOT?start=$from_idin"]],
]]
]])
]);
}
}else {
if($inlineqt == ''){
bot('answerInlineQuery', [
'inline_query_id' => $update->inline_query->id,
'results' => json_encode([[
'type' => 'article',
'id' => base64_encode(rand(5, 555)),
'title' => '◾ شارك رابطك الخاص لتحصل على النقود .',
'description' => 'اضغط هنا لمشاركة رابطك 😉',
'input_message_content' => ['parse_mode' => 'MarkDown', 'disable_web_page_preview'=> true, 'message_text' => "
- ااحصل على رقمك مجاناً 😻👏 يسلم تلقائيا فقط ولأول مره في التليجرام بوت ارقام فيه جميع الدول العربيه 😼🤞"],
'reply_markup' => [
'inline_keyboard' => [
[['text' => "- دخول للبوت 😻💯", 'url' => "http://t.me/Y0NBOT?start=$from_idin"]],
]]
]])
]);
}else {
    bot('answerInlineQuery', [
'inline_query_id' => $update->inline_query->id,
'results' => json_encode([[
'type' => 'article',
'id' => base64_encode(rand(5, 555)),
'title' => '◾ شارك رابطك الخاص لتحصل على النقود .',
'description' => 'اضغط هنا لمشاركة رابطك 😉',
'input_message_content' => ['parse_mode' => 'MarkDown', 'disable_web_page_preview'=> true, 'message_text' => "
- ااحصل على رقمك مجاناً 😻👏 يسلم تلقائيا فقط ولأول مره في التليجرام بوت ارقام فيه جميع الدول العربيه 😼🤞"],
'reply_markup' => [
'inline_keyboard' => [
[['text' => "- دخول للبوت 😻💯", 'url' => "http://t.me/Y0NBOT?start=$from_idin"]],
]]
],[
'type' => 'article',
'id' => base64_encode(rand(5, 555)),
'title' => '◾ شارك رابطك الخاص لتحصل على النقود .',
'description' => 'اضغط هنا لمشاركة رابطك 😉',
'input_message_content' => ['parse_mode' => 'MarkDown', 'disable_web_page_preview'=> true, 'message_text' => "
- ااحصل على رقمك مجاناً 😻👏 يسلم تلقائيا فقط ولأول مره في التليجرام بوت ارقام فيه جميع الدول العربيه 😼🤞"],
'reply_markup' => [
'inline_keyboard' => [
[['text' => "- دخول للبوت 😻💯", 'url' => "http://t.me/Y0NBOT?start=$from_idin"]],
]]
]])
]);
}
}
$ary = array($admin);
$id = $message->from->id;
$admins = in_array($id,$ary);
$data = $update->callback_query->data;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$cut = explode("\n",file_get_contents("stats/users.txt"));
$users = count($cut)-1;
$mode = file_get_contents("stats/bc.txt");
#Start code 

if ($update && !in_array($id, $cut)) {
    mkdir('stats');
    file_put_contents("stats/users.txt", $id."\n",FILE_APPEND);
  }

    if(preg_match("/(admin)/",$text) && $admins) {
        bot('sendMessage',[
            'chat_id'=>$chat_id,
          'text'=>"
أهلا مطوري...
شبيك لبيك البوت بين يديك
إضغط على طلبك في القائمة وستتم تلبية الطلب تلقائيا...🌚 
-",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
    [['text'=>'عدد المشتركين 👥 ','callback_data'=>'users'],['text'=>'رسالة للكل 📩 ','callback_data'=>'set']],
    [['text'=>'حالة البوت 🔋 ','callback_data'=>'stats']],
                ]
                ])
            ]);
    }
    if($data == 'homestats'){
    bot('editMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>"
أهلا مطوري...
شبيك لبيك البوت بين يديك
إضغط على طلبك في القائمة وستتم تلبية الطلب تلقائيا...🌚 
-",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
    [['text'=>'عدد المشتركين 👥 ','callback_data'=>'users'],['text'=>'رسالة للكل 📩 ','callback_data'=>'set']],
    [['text'=>'حالة البوت 🔋 ','callback_data'=>'stats']],
                ]
                ])
    ]);
    file_put_contents('stats/bc.txt', 'no');
    }
    
    if($data == "users"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
المشتركين $users
-",
            'show_alert'=>true,
    ]);
    
    }
    
    if($data == "set"){ 
        file_put_contents("stats/bc.txt","yas");
        bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text'=>"
أرسل رسالتك ليتم إرسالها إلى $users مشترك 👥
كتابة فقط...🌚
-
    ",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>' الغاء 🚫. ','callback_data'=>'homestats']]    
            ]
        ])
        ]);
    }
    if($text and $mode == "yas" && $admins){
        bot('sendMessage',[
              'chat_id'=>$chat_id,
              'text'=>"
تم قبول رسالتك!
ويتم إرسالها إلى $users مشترك 👥
-",
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع ','callback_data'=>'homestats']]    
            ]
        ])
    ]);
    for ($i=0; $i < count($cut); $i++) { 
     bot('sendMessage',[
    'chat_id'=>$cut[$i],
    'text'=>"$text",
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    ]);
    file_put_contents("stats/bc.txt","no");
    } 
    }
    date_default_timezone_set("Asia/Baghdad");
    $getMe = bot('getMe')->result;
    $date = $message->date;
    $gettime = time();
    $sppedtime = $gettime - $date;
    $time = date('h:i');
    $date = date('y/m/d');
    $userbot = "{$getMe->username}";
    $userb = strtoupper($userbot);
    if($data == "stats"){ 
    if ($sppedtime == 3  or $sppedtime < 3) {
    $f = "ممتازة";
    }
    if ($sppedtime == 9 or $sppedtime > 9 ) {
    $f = "لا بأس";
    }
    if ($sppedtime == 10 or $sppedtime > 10) {
    $f = " سيئة جدا";
    }
     bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text' =>"
معلومات البوت:

معرف البوت @$userb
حالة البوت $f
الوقت الآن: 20$date | $time 
-",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع ','callback_data'=>'homestats']]    
            ]
        ])
       ]);
    }

//===============//
?>
