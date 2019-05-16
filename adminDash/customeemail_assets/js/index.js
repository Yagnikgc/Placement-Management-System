// ************************
// display profile detail
// ************************
var thumb = $('.profile-thumb'),
    detail = $(".profile-detail"),
    hideId = null;

// hide profile detail
$('body').mousemove(function(e){
  var target = e.target;
  
  if($(target).hasClass('profile-thumb')){       
      displayProfile( e.pageY+10,
                      e.pageX+10,
                      'Rebecca Lu',
                      $(target).next('.chat-status').find('span').attr('class'));
    
  } else if($.contains(document.querySelector('.contact-list'), target)){
    var status;
    if(target.tagName.toLowerCase()=='span'){
      status = $(target).attr('class');
      target = $(target).parent('li');
    }else{
      status = $(target).find('span').attr('class');
    }
            
    var offset = $(target).offset(),
        left = offset.left + $(target).width()-10;
        
    displayProfile(offset.top-10,
                  left,
                  $(target).text(),
                  status);
                 
  } else if($(target).hasClass('profile-detail') ||
            $.contains(document.querySelector('.profile-detail'), target)){
    
    if(hideId){
      clearTimeout(hideId);
      hideId=null;
    }
    detail.show();
  } else if($(detail).is(':visible') && !hideId){
    hideId = setTimeout(function(){
                detail.hide();
    }, 1000);
  }
});

function displayProfile(top, left, name, status){
    if(hideId){
      clearTimeout(hideId);
      hideId=null;
    }
	
  detail.find('.user-name').text(name);
  setStatus(detail, status);
  detail.css({
    'top': Math.min(top, window.innerHeight-detail.height()),
    'left': left
  }).show();
}
//*********************************
//change chat status
//*********************************
$('.status-change').click(function(e) {
  e.preventDefault();
  e.stopPropagation();
  $('.profile-detail').hide();

  var menu = $('.status-menu');
  menu.toggle();

  if (menu.css('display') != 'none') {
    var height = menu.outerHeight(),
        top = $('.status-change').offset().top - height, 
        left = $('.status-change').offset().left;

    if (top < 0) {
      top = Math.min(window.innerHeight - height, 
                    $('.status-change').offset().top+$('.status-change').outerHeight());
    }

    menu.offset({
      top: top,
      left: left
    });
  }
});

function setStatus(dom, status){
  dom.find('.user-status').attr( "class", status+' user-status');
}
//*****************
//seperator
//******************
var data = null;

$('.seperator').on('mousedown', function(e){
    data = {};
    data.minY =  $('.mail-categories').offset().top;
    data.maxY = $('.tabs').offset().top;
    data.target = $('.tab-content');
    $(document).on('mousemove', onDrag);
});

function onDrag(e){
  var target = e.target;
  e.preventDefault();
  e.stopPropagation();
  
  if(data){    
    var pageY = e.pageY;
    
    if(pageY > data.minY+60 && pageY < data.maxY - 70){
      var top = pageY -4;
      data.target.offset({
        top: top
      });
      $('.mail-categories').outerHeight(top - data.minY);
    }
    $('.mail-categories').removeClass('onHover');
  }
}

$(window).on('mouseup', function(){
  data = null;
  $(document).off('mousemove', onDrag);
});

$(document).on('mouseup', function(){
  data = null;
  $(document).off('mousemove', onDrag);
});
//*********************************
// tab menu
//*********************************
//toggle
$('label[for=chat-toggle]').click(function(e){
  toggleMenu($('.chatbox'), $('.gadgetbox'));
});
$('label[for=gadgets-toggle]').click(function(e){
  toggleMenu( $('.gadgetbox'), $('.chatbox'));
});

function toggleMenu(menu, other){
  if ($('.tabs').hasClass('hideTabs') || menu.css('display') == 'none') {// if not active, show menu
    $('.tabs').removeClass('hideTabs');
    menu.show();
    other.hide();
  } else { // active, hide menu
    menu.hide();
    $('.tabs').addClass('hideTabs');
  }
}

//*********************************
// display mail categories on hover
//*********************************
$('.mail-categories').hover(onHover);
$('.title').hover(onLeave);
$('.tabs').hover(onLeave);
$('main').hover(onLeave);

function onHover(){
  if (!$(this).hasClass('onHover')) {
    $(this).attr('prevHeight', $(this).height());
    $(this).css('height', 'auto');
    $(this).addClass('onHover');
    rePos();
  };
}

function onLeave(){
  var categories = $('.mail-categories');
  if (categories.hasClass('onHover')) {
    categories.height(categories.attr('prevHeight'));
    categories.removeClass('onHover');
    rePos();
  }
}

function rePos(){
  $('.tab-content').css('top', $('.mail-categories').offset().top+$('.mail-categories').height()+'px');
}

//*********************************
// display search preferences
//*********************************
var pref = document.querySelector('.search-pref');

$('.mail-search .more').click(function(e) {
  $(pref).toggle();
  return false;
});

$('body').click(function(e){
  $('.dropdown-menu').hide();
  
  var target = e.target;
  if(!$(target).hasClass('search-pref') && !$.contains(pref, target)){
    $(pref).hide();
  }

});
$(pref).on('click', '.button-exit', function(e){
  $(pref).hide();
});
//***********************************
// display new mail
//***********************************
var hideStack =[];

$('.mail-compose').click(function() {
  newMail();
});

function newMail(recipient) {
  recipient = recipient || '';
  var width = $('.bottom-panel').width(),
      win = $(["<div class='popup-window new-mail'><div class='header'><div class='title'>New Message<div class='right'><button class='button-grey button-small button-minimize'>＿</button><button class='button-grey button-small button-fullscreen'><i class='fa fa-expand'></i></button><button class='button-grey button-small button-exit'><i class='fa fa-times'></i></button></div></div><div class='min-hide'><input class='receiver input-large' type='text' placeholder='Recipients' value='",
              recipient,
              "'/><input class='input-large' type='text' placeholder='Subject'/></div></div><textarea class='min-hide'></textarea><div class='menu footer min-hide'><button class='button-large button-blue'>Send</button> <button class='button-large button-silver'><i class='fa fa-font'></i></button> | <button class='button-large button-silver'><i class='fa fa-paperclip'></i></button><button class='button-large button-silver'><i class='fa fa-plus'></i></button><div class='right'><button class='button-large button-silver'><i class='fa fa-trash-o'></i></button>|<button class='button-large button-silver'><i class='fa fa-sort-asc'></i></button></div></div>"].join('')
            );
  
  win.appendTo($('.bottom-panel'));
  if (win.height() > window.innerHeight) {
    win.css('height', window.innerHeight+'px');
  }
  hideOverflow(win.width() +  width, win);
}

//***********************************
// diaplay new talk
//***********************************
$('.contact-list > li').click(function(e) {
  e.preventDefault();
  e.stopPropagation();

  var userName = $(this).text(),
      shown = false,
      span = $(this).find('span'),
      wrapper = $('.bottom-panel');
      
  //hide profile detail
  $(detail).hide();
  
  $('.bottom-panel .user-name').each(function(){
    if($(this).text() === userName){
      shown = true;
    }
  });
  
  if(!(shown && span.hasClass('talk'))){
    var status = span.attr('class'), 
        width = wrapper.width();

    //can't chat with the user if he/she is offline
    if(status === 'offline'){
      newMail(userName);
      return false;
    } else if (status === 'talk'){
      status = span.attr('prev_status');
    } else {
      span.attr('prev_status', status);
      span.attr('class', 'talk');
    }
        
    var talk = $(["<div class='popup-window new-talk'>  <div class='title'><span class='user-status ",
                status,
                "'></span><span class='user-name'>",
                userName,
                "</span><div class='right'><button class='button-grey button-small button-minimize'>_</button><button class='button-grey button-small'><i class='fa fa-share'></i></button><button class='button-grey button-small button-exit'><i class='fa fa-times'></i></button></div></div><div class='min-hide'><div class='menu'><button class='button-silver button-small'><i class='fa fa-video-camera'></i></button><button class='button-silver button-small'><i class='fa fa-phone'></i></button><button class='button-silver button-small'><i class='fa fa-users'></i></button><button class='right button-small button-silver'>More <i class='fa fa-sort-asc'></i></button></div><div class='chat-history'><textarea></textarea><button class='expressions'><i class='fa fa-smile-o fa-2x'></i></button></div></div></div></div>"
               ].join('')
              );
    
    talk.prependTo(wrapper);
    //hide window if total length exceeds window.innerWidth
    hideOverflow( width+talk.width(), talk); 
  }
});

//minimize
$('.bottom-panel').on('click', '.popup-window .title', function(e) {
  e.preventDefault();
  e.stopPropagation();
  minWindow($(this).closest('.popup-window'));
});

function minWindow(win){
  var width = $('.bottom-panel').width() - win.width(),
      title = win.find('.title');

  if (win.hasClass('minimized')) {
    win.removeClass('minimized');
    hideOverflow(width + win.width(), win);
  } else { // win is not minimized
    win.addClass('minimized').removeClass('fullscreen');
    showHidden(width + win.width(), win);
  }
  toggleButtonText(title, win.hasClass('minimized'));
}

function toggleButtonText(elem, isMin, isFull){
  elem.find('.button-minimize').text(isMin? '—': '_');   
  elem.find('.button-fullscreen i').attr('class', isMin||isFull ? 'fa fa-compress' : 'fa fa-expand');
}

//full screen
$('.bottom-panel').on('click', '.new-mail .button-fullscreen', function(e) {
  e.preventDefault();
  e.stopPropagation();

  var win = $(this).closest('.new-mail'),
      width = $('.bottom-panel').width();

  if (win.hasClass('minimized')) {
    width -= win.width();
    win.removeClass('minimized');
    toggleButtonText(win, false);
    hideOverflow(win.width() + width, win);
  } else if (win.hasClass('fullscreen')) {
    win.removeClass('fullscreen'); 
    $('.overlay').hide();  
    toggleButtonText(win, false);
    hideOverflow(win.width() + width, win);
  } else {
    //if any window is already fullscreen, minimize it
    minWindow($('.popup-window.fullscreen'));

    toggleButtonText(win, false, true);
    win.addClass('fullscreen');  
    $('.overlay').show();  
    showHidden();
    $('.bottom-panel .popup-window:not(.fullscreen)').addClass('minimized');
  }
});

$('.overlay').click(function(e){
  e.preventDefault();
  e.stopPropagation();
  $(this).hide();
  $('.new-mail.fullscreen').removeClass('fullscreen');
});

//exit
$('.bottom-panel').on('click', '.popup-window .button-exit', function(e) {
  e.preventDefault();
  e.stopPropagation();

  var popup = $(this).closest('.popup-window'),
      wrapper = $('.bottom-panel');
  
  //reset user chat status
  if($(this).closest('.popup-window').hasClass('new-talk')){
    $('.contact-list > li > span.talk').each(function(){
      var li = $(this).parent();
      
      if(popup.find('.user-name').text()===li.text()){
         $(this).attr('class', $(this).attr('prev_status'));
      }
    });
  }
  if (popup.hasClass('fullscreen')) {
    $('.overlay').hide();
  }
  //remove window
  popup.remove();  

  //show hidden windows
  showHidden();
});

function hideOverflow(width, newElem){
  var wrapper = $('.bottom-panel'), elem;

  if (wrapper.children('.popup-window').length === 1) { //no elements to hide
    return;
  }

  while(width >= window.innerWidth){ 
    var talkChildren = wrapper.children('.new-talk');

    if (wrapper.children('.new-mail.minimized').length) { 
      //hide minimized window first
      elem = wrapper.children('.new-mail.minimized').first();
      width -= elem.width();
      hide(elem);
    } else if( (talkChildren.length>1 && newElem.hasClass('new-talk')) ||
        (talkChildren.length && newElem.hasClass('new-mail'))) {
      //if newElem is new-talk and there is >1 new-talk window  OR
      //newElem is new-mail and there is >0 new-talk window, hide one talk window 
      elem = talkChildren.last();
      width -= elem.width();
      hide(elem);
    } else {
      elem = wrapper.children('.new-mail').first();
      width -= elem.width(); 
      elem.addClass('minimized');  
      width += elem.width();       
    }   
  }

  function hide(elem){
    hideStack.push(elem);
    elem.remove();
  }
}

function showHidden(){
  while(hideStack.length){
    var elem = hideStack[hideStack.length - 1], 
        width = $('.bottom-panel').width();
    $(elem).appendTo($('.bottom-panel'));
    width += $(elem).width();

    if( width >= window.innerWidth){
      $(elem).remove();
      break;
    } else {
      hideStack.pop();
    }
  }
}
//******************************
// button options
//******************************
$('.button-options').click(function(e){  
  e.stopPropagation();

  if(e.target.tagName != 'LABEL' && e.target.tagName != 'INPUT'){
    var menu = $(this).next('.dropdown-menu'),
        visibility = menu.css('display');
    if (visibility == 'none') {
      $('.dropdown-menu').hide();
      menu.show(); 

      // adjust menu position
      if ((menu.hasClass('drop-top') && menu.offset().top < 0) ||
          (!menu.hasClass('drop-top') && menu.offset().top + menu.height() > window.innerHeight)) {
        menu.offset({
          top: window.innerHeight - menu.height()-10
        });
        menu.css('bottom', 'auto');      
      }

    } else {
      menu.hide();
    }
    e.preventDefault();
  }
});

$('.dropdown-menu').click(function(e){
  e.preventDefault();
  e.stopPropagation();
  if (e.target.tagName === 'LI') {
    $(this).closest('.options-wrapper').find('.button-options > span').text($(e.target).text());
    $(this).hide();
  }
});

//****************************
// check mails
//****************************
$('#chkAll').change(function(e){
  $(this).removeClass('partlyChecked');
  $('.mail-box .mail-check').prop('checked', this.checked);
});

$('.mail-box .mail-check').change(function(e){
  var totalNum = $('.mail-box tr').length,
      checkedNum = $('.mail-box .mail-check:checked').length;
  if (checkedNum === 0){
    $('#chkAll').prop('checked', false).removeClass('partlyChecked');
  } else if(totalNum === checkedNum) {
    $('#chkAll').prop('checked', true).removeClass('partlyChecked');
  } else {
    $('#chkAll').prop('checked', true).addClass('partlyChecked');
  } 
});