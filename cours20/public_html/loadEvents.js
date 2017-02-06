//at document load
$(document).ready(function(){
    //define multiple event handlers at once (through a list)
    //WARNING : '#' selects an ID, '.' selects a class and without it, a tag ('<h1>', for instance)
    $('#title1').on({
        //onclick()
        'click': function (){
            alert("fuck yeah click!");
        },
        //onMouseover()
        'mouseover':function(){
            //define several CSS changes through a list
            $(this).css({
                'background-color':'red',
                'font-weight':'2em'
            });
        }
    });
});