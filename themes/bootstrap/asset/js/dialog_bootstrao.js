$(function dialogClick(){
  $('a .content,button .content').hide();
  $('a[target=confirm],button[target=confirm]').click(function(){
    var id = $(this).attr('target');
    var title = $(this).attr('title') || $(this).attr('header');
    var message = $(this).attr('message');
    var url = $(this).attr('href');
    var width = $(this).attr('modalWidth');
    var height = $(this).attr('modalHeight');
    dialog(id,title,message,url,width,height);
    return false;
  });
  $('a[target=modal],button[target=modal]').click(function(){
    var id = $(this).attr('target');
    var title = $(this).attr('title');
    var message = $(this).children('.content').html();
    var width = $(this).attr('modalWidth');
    var height = $(this).attr('modalHeight');
    modal(id,title,message,width,height);
    return false;
  });
  $('a[target=ajax-modal],button[target=ajax-modal]').click(function(){
    var url = $(this).attr('href');
    ajaxModal(url);
    return false;
  });
  $('a[target=delete-data],button[target=delete-data]').click(function(){
    var id = $(this).attr('rel');
    var title = $(this).attr('title') || $(this).attr('header');
    var message = $(this).attr('message');
    var url = $(this).attr('href');
    var idform = $(this).attr('form');
    var width = $(this).attr('modalWidth');
    var height = $(this).attr('modalHeight');
    deleteData(id,title,message,url,idform,width,height);
    return false;
  });
  
//   custom programmer
    $("#pcheck").click (function ()
    {
        var thisCheck = $(this);
        if (thisCheck.is (':checked'))
        {
            $(".ccheck").attr("checked", true);
        }else{
            $(".ccheck").attr("checked", false);
        }
    });
});
function dialog(id,title,message,url,width,height){
  if (width==null || height==null){
    width='400';
    height='auto';
  }
  $('#'+id+'').remove();
//  $('body').append('<div id="'+id+'" title="'+title+'" style="display:none;">'+message+'</div>');
  $('body').append('<div id="'+id+'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
        '<div class="modal-header">'+
            '<h3 id="myModalLabel" align="center">'+title+'</h3>'+
        '</div>'+
        '<div class="modal-body">'+
            '<div class="control-group">'+
                '<p align="center">'+message+'</p>'+
            '</div>'+
        '</div>'+
        '<div class="modal-footer" align="center">'+
            '<p align="center"> '+
            '<a class="btn btn-primary" id="fixhapus" href="'+url+'">Ok</a>'+
            '<button class="btn" data-dismiss="modal">Cancel</button></p>'+
        '</div>'+
    '</div>');
    $('#'+id+'').modal('show');
  }

function modal(id,title,message,width,height){
  if (width==null || height==null){
    width='400';
    height='auto';
  }
  $('#'+id+'').remove();
  $('body').append('<div id="'+id+'" title="'+title+'" style="display:none;">'+message+'</div>');
		$('#'+id+'').dialog({
			resizable: false,
			draggable: true,
      width:width,
      height:height,
      autoOpen: false,
			modal: false,
      dragStart: function(event, ui) { 
        $(this).parent().addClass('drag');
      },
      dragStop: function(event, ui) { 
        $(this).parent().removeClass('drag');
      }

	});
  $('#'+id+'').dialog('open');
  }

function ajaxModal(url){
  $('#myModelDialog').html();
  $.ajax({
                    url: url,
                    cache: false,
                    dataType: 'html',
                    success: function(msg){
                        $('#myModelDialog').html(msg);
                        $('#myModelDialog').modal('show');
                    },
                    error: function(){
                        console.log('gagal');
                    }
        });
        return true;    
  }
  
  
function deleteData(id,title,message,url,idform,width,height){
  if (width==null || height==null){
    width='400';
    height='auto';
  }
    $('#'+id+'').remove();
    $('body').append('<div id="'+id+'" title="'+title+'" style="display:none;">'+message+'</div>');
		$('#'+id+'').dialog({
			resizable: false,
			draggable: false,
      width:300,
      autoOpen: false,
			modal: true,
      buttons: {
				"OK": function() {
					$('#'+ idform).attr('action',action);
					$('#'+ idform).submit();
                    $('body').hide();
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
      dragStart: function(event, ui) { 
        $(this).parent().addClass('drag');
      },
      dragStop: function(event, ui) { 
        $(this).parent().removeClass('drag');
      }

		});
    $('#'+id+'').dialog('open');
    
}

function deleteAll(idForm,action) {
    $('#deletebox').remove();
    $('body').append('<div id="deletebox" title="Notifikasi" style="display:none;"><p>Apakah anda yakin mau menghapus data ini?</p></div>');
		$('#deletebox').dialog({
			resizable: false,
			draggable: true,
      width:300,
      autoOpen: false,
			modal: true,
      buttons: {
				"OK": function() {
					$('#'+idForm).attr('action',action);
					$('#'+ idForm).submit();
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
      dragStart: function(event, ui) { 
        $(this).parent().addClass('drag');
      },
      dragStop: function(event, ui) { 
        $(this).parent().removeClass('drag');
      }

		});
    $('#deletebox').dialog('open');
    
}


function myDialog(id,title,form,button,size){
  button.Cancel= function() {
                $('#'+id+'').remove();
                $( this ).dialog( "close" );
                return false;
            }
  var width='auto';
  var height='auto';
  if (size!=undefined){
      width =size.width;
      height=size.height;
  }
  $('#'+id+'').remove();
  $('body').append('<div id="'+id+'" title="'+title+'" style="display:none;position:relative;overflow:auto;max-height:450px"><div style="width:100%;height:100px;background:url(images/background/fbloading.gif) no-repeat center center"></div></div>');
  var dialog=null;
  $('#'+id+'').html("<form id='myModalForm'></form");
  dialog='myModalForm';
  if(form.url!=undefined){
        $('#'+dialog).load(form.url);
  }else if(form.html!=undefined){
       $('#'+dialog).html(form.html);
  }
  console.log(dialog);
    $('#'+id+'').dialog({
        resizable: false,
        draggable: true,
        width:width,
        height:height,
        autoOpen: false,
        modal: false,
        buttons: button,
        dragStart: function(event, ui) { 
            $(this).parent().addClass('drag');
        },
        dragStop: function(event, ui) { 
            $(this).parent().removeClass('drag');
        }
    });
    $('#'+id+'').dialog('open');

       return true;
}

function popitup(url) {
    var newwindow=window.open(url,'detail','height=750,width=1100');
    if (window.focus) {newwindow.focus()}
    return false;
}

// custom programmer
function cekKd(el){
    if($(el).is('[urlcek]') && $(el).attr('urlcek') !== undefined){
    var url = $(el).attr('urlcek');
    $.ajax({
        url: url,
        cache: false,
        data: String($(el).attr('name'))+'='+$(el).val(),
        dataType: 'json',
        type: "POST",
        success: function(msg){
            if(msg.length>0){
                $(el).next('label.error').remove();
                $(el).after("<label class='error' for='searchinput' style='display: block;'>maaf, data '"+$(el).val()+"' sudah ada</label>");
                $(el).val('');
            }else{
              $(el).next('label.error').remove();
            }
        }
        });
    }else{
         console.log('not have attribut URL in element')  ;
    }
    
}

$(document).ready(function(){
    $('a[href=""]').removeAttr('href');
    
})
