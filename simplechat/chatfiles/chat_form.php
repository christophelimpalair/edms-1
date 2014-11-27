<form action="" method="post" id="form_chat" onsubmit="return addChatS(this)">
<div id="name_code">

<?php

echo '<input type="hidden" name="chatroom" id="chatroom" value="'. $this->chatrooms[0]. '" />';
// if not set for logged users ($chatadd is 1) add field to set the name
// else, if $chatuser not empty, sets the field with the name, hidded

if($this->chatadd === 1) {
 echo $this->lsite['addnmcd'].': &nbsp; <em id="code_ch">'. substr(md5(date(" j-F-Y, g:i a ")), 3, 4). '</em><br />'.
  $this->lsite['name'].': <input type="text" name="chatuser" value="User" id="chatuser" size="12" maxlength="12" /> '.
  $this->lsite['code'].': <input type="text" name="cod" id="cod" size="4" maxlength="4" /> &nbsp;
  <input type="button" name="set" id="set" value="Set" onclick="setNameC(this.form)" />';
}
else if(isset($_SESSION['username'])) {
  echo '<input type="hidden" name="chatuser" id="chatuser" value="User" />
   <span id="enterchat" onclick="enterChat()">'.sprintf($this->lsite['enterchat'], $_SESSION['username']).'</span>';
}
?>
</div>
 <div id="chatadd">
  <div id="chatex">
  <input type="text" name="adchat" id="adchat" size="88" maxlength="200" /> &nbsp; 
  <input type="submit" value="<?php echo $this->lsite['chat']; ?>" id="submit"/>
  <div id="logoutchat" onclick="delCookie('name_c')"><?php echo $this->lsite['logoutchat']; ?></div>
 </div>
</form>

<script>
// Check name /code, set cookie, show field to add chat
function setNameC(frm) {
  var chatuser = frm.chatuser.value;alert(chatuser[chatuser.length - 1])
  // If name not contains only: Letters, Numbers, Space, dash, and "_", between 2 and 12 characters. Or starts /ends with space
  if (chatuser.match(/^[a-z0-9 _-]{2,12}$/ig) == null || chatuser[0] == ' ' || chatuser[chatuser.length - 1] == ' ') {
    alert(texts.err_name);
    frm.chatuser.focus();
    return false;
  }
  // If incorrect code
  else if (frm.cod.value.length<4 || frm.cod.value!=document.getElementById('code_ch').innerHTML) {
    alert(texts.err_vcode);
    document.getElementById('code_ch').style.color = 'red';
    frm.cod.focus();
    frm.cod.select();
    return false;
  }
  else if (checkNameC(chatuser)==1) {
    alert(chatuser+texts.err_nameused);
    frm.chatuser.select();
  }
  // If correct code and name
  else {
    // Sets data for cookie
    var name_cookie = 'name_c';
    var val_cookie = chatuser;
    var oned = 24*60*60*1000;      // Cookie expiration, one day in milliseconds
    var expDate = new Date();
    expDate.setTime(expDate.getTime()+oned);

    document.cookie = name_cookie + "=" + escape(val_cookie) + "; expires=" + expDate.toGMTString();     // sets cookie

    // Hides name /code, show field to add text chat, delete the code
    document.getElementById('name_code').style.display = 'none';
    document.getElementById('chatadd').style.display = 'block';
    frm.cod.value = '';
    logoutchat = 0;     // set to not delete the user from list
    return chatuserset = 1;
  }
}

// function called when logged user click to enter in chat
function enterChat() {
  logoutchat = 0;     // set to not delete the user from list
  chatuserset = 1;
    document.getElementById('name_code').style.display = 'none';
    document.getElementById('chatadd').style.display = 'block';
  callphp = 0;         // set "callphp" to 0 to force next ajax access to php file
}
</script>