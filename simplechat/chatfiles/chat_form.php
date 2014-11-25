<form action="" method="post" id="form_chat" onsubmit="return addChatS(this)">
<div id="name_code">
<?php
echo '<input type="hidden" name="chatroom" id="chatroom" value="'. $this->chatrooms[0]. '" />';
// if not set for logged users ($chatadd is 1) add field to set the name
// else, if $chatuser not empty, sets the field with the name, hidded
if($this->chatadd === 1) {
 echo $this->lsite['addnmcd'].': &nbsp; <em id="code_ch">'. substr(md5(date(" j-F-Y, g:i a ")), 3, 4). '</em><br />'.
  $this->lsite['name'].': <input type="text" name="chatuser" id="chatuser" size="12" maxlength="12" /> '.
  $this->lsite['code'].': <input type="text" name="cod" id="cod" size="4" maxlength="4" /> &nbsp;
  <input type="button" name="set" id="set" value="Set" onclick="setNameC(this.form)" />';
}
else if(defined('CHATUSER')) {
  echo '<input type="hidden" name="chatuser" id="chatuser" value="'. CHATUSER. '" />
   <span id="enterchat" onclick="enterChat()">'.sprintf($this->lsite['enterchat'], CHATUSER).'</span>';
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